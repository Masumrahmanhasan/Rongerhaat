<?php

namespace App\Http\Controllers\Web\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Product;
use App\Model\WebAuth;
use App\Model\Invoice;
use App\Model\Order;

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\CreditCard;
use PayPal\Api\CreditCardToken;
use PayPal\Api\FundingInstrument;

class OrderCn extends Controller
{
    private $apiContext;

    public function __construct($foo = null)
    {
        $paypalConf = config()->get('paypal');

        $this->apiContext = new ApiContext(new OAuthTokenCredential(
            $paypalConf['client_id'],
            $paypalConf['secret']
        ));

        $this->apiContext->setConfig($paypalConf['settings']);
    }

    public function index()
    {
        $data['user']  = WebAuth::where('id', webUser('id'))->first();
        return webView('pages.user.order.index', $data);
    }

    public function list()
    {
        $data['invoices']   = Invoice::where('usr_id', webUser('id'))->orderBy('id', 'desc')->get();
        return webView('pages.user.order.list', $data);
    }

    public function details($id)
    {
        $data['invoice']    = Invoice::with('orders')->where(['id' => $id, 'usr_id' => webUser('id')])->orderBy('id', 'desc')->first();
        return webView('pages.user.order.details', $data);
    }

    public function create($id = null)
    {

    }

    public function addInfo(Request $request)
    {
        $orderInfo = $request->all();
        session()->put('orderInfo', $orderInfo);
        return redirect()->route('web.user.order.preview');
    }

    public function preview()
    {
        $data['user']       = WebAuth::where('id', webUser('id'))->first();
        $data['orderInfo']  = (session()->get('orderInfo')) ? (object) session()->get('orderInfo') : '';
        $data['carts']      = Cart::with('product')->where('usr_id', webUser('id'))->orderBy('id', 'desc')->get();
        if(count($data['carts']) > 0)
        {
            return webView('pages.user.order.preview', $data);
        } else {
            return redirect()->route('web.home');
        }
    }

    public function store(Request $request)
    {
        $pay_id         = uniqNum().webUser('id').str_random(12);
        $pay_status     = 'Pending';
        $carts          = Cart::where(['usr_id' => webUser('id')])->orderBy('id', 'desc')->get();
        if(count($carts) == 0) return redirect()->route('web.home');

        if ($request->pay_type == 'Paypal') {
            $payer = new Payer();
            $payer->setPaymentMethod("paypal");

            $item_1 = new Item();
            $item_1->setName('Payment')
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($carts->sum('total_price'));

            $item_list = new ItemList();
            $item_list->setItems(array($item_1));

            $amount = new Amount();
            $amount->setCurrency('USD')->setTotal($carts->sum('total_price'));

            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($item_list)
                ->setDescription('Payment');

            $redirect_urls = new RedirectUrls();
            $redirect_urls->setReturnUrl(webRoute('user.paypal.success'))->setCancelUrl(webRoute('user.paypal.cancel'));

            $payment = new Payment();
            $payment->setIntent('Sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirect_urls)
                ->setTransactions(array($transaction));

            try {
                $result         = $payment->create($this->apiContext);
                $pay_id         = $payment->getId();
                $pay_status     = 'Success';
            } catch (\PayPal\Exception\PayPalConnectionException $ex) {
                // dd($ex);
                // session()->flash('msg', ['type' => 'error', 'text' => 'Connection timeout']);
                msgFlash('Some error occur, sorry for inconvenient', 'error');
                return redirect()->route('web.user.order.preview');
            }

            foreach ($payment->getLinks() as $link) {
                if ($link->getRel() == 'approval_url') {
                    $redirect_url = $link->getHref();
                    break;
                }
            }

            if (isset($redirect_url)) {
                /** redirect to paypal **/
                return redirect()->away($redirect_url);
            }
        }

        $prod_ids = '';
        foreach ($carts as $key => $c) {
            $prod_ids .= $c->prod_id.',';
        }

        $inv['inv_no']              = uniqNum().webUser('id');
        $inv['usr_id']              = webUser('id');
        $inv['prod_ids']            = substr($prod_ids, 0, -1);
        $inv['quantity']            = $carts->sum('quantity');
        $inv['sub_price']           = $carts->sum('total_price');
        $inv['total_price']         = $carts->sum('total_price');
        $inv['shipping_address']    = webUser('shipping_address');
        $inv['billing_address']     = webUser('billing_address');
        $inv['pay_type']            = $request->pay_type;
        //$inv['pay_id']              = $pay_id;
        $inv['pay_status']          = $pay_status;
        $inv['status']              = 'Pending';
        $invSave    = Invoice::create($inv)->id;

        $data['usr_id']             = webUser('id');
        $data['pay_type']           = $request->pay_type;

        foreach ($carts as $key => $c) {
            $data['inv_id']              = $invSave;
            $data['usr_id']              = webUser('id');
            $data['prod_id']             = $c->prod_id;
            $data['quantity']            = $c->quantity;
            $data['price']               = $c->price;
            $data['sub_price']           = $c->total_price;
            $data['prod_data']           = json_encode(Product::with('category', 'subCategory', 'brand', 'productImg')->find($c->prod_id));
            $data['status']              = 'Pending';

            $orderSave = Order::create($data);
        }

        $cartDelete = Cart::where('usr_id', webUser('id'))->delete();

        session()->flash('msg', ['text' => 'Order Successfull', 'type' => 'success']);
        return redirect()->route('web.user.order.list');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {
        $update = Cart::whereId($request->cart_id)->update(['quantity' => $request->quantity]);

        $viewCart = view('web.pages.user.cart.ajax_list')->render();
        $cartDropDown   = view('web.pages.user.cart.dropdown')->render();
        return response()->json(['msg' => 'updated', 'cartDropDown' => $cartDropDown, 'viewCart' => $viewCart]);
    }

    public function destroy(Request $request)
    {
        $delete = Cart::destroy($request->cart_id);
        
        $viewCart       = view('web.pages.user.cart.ajax_list')->render();
        $cartDropDown   = view('web.pages.user.cart.dropdown')->render();

        return response()->json(['msg' => 'success', 'page' => $request->page, 'cartDropDown' => $cartDropDown, 'viewCart' => $viewCart]);
    }

    public function success()
    {        
        try {
            // $payment    = Payment::get(request()->input('paymentId'), $this->apiContext);

            // if (request()->input('PayerID')) {
            //     $execution = new PaymentExecution();
            //     $execution->setPayerId(request()->input('PayerID'));
            //     $payment = $payment->execute($execution, $this->apiContext);
            // }
            
            msgFlash('Payment successfull', 'success');
            return redirect()->route('web.user.order.list');
        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            dd($ex);
        }
    }

    public function cancel()
    {
        msgFlash('Payment canceled', 'error');
        return redirect()->route('web.user.order.preview');
    }
}