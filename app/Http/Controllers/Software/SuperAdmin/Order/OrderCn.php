<?php

namespace App\Http\Controllers\Software\SuperAdmin\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Invoice;
use App\Model\Order;
use App\Model\Product;
use Image;

class OrderCn extends Controller
{
    public function index()
    {
        $data['invoices'] = Invoice::with('user')->orderBy('id', 'desc')->get();
        return saView('pages.order.index', $data);
    }

    public function details($id = null)
    {
        $data['invoice'] = Invoice::with('user', 'orders')->where('id', $id)->orderBy('id', 'desc')->firstOrFail();
        return saView('pages.order.details', $data);
    }

    public function action($type, $id)
    {
        $invoice = Invoice::with('orders')->where('id', $id)->orderBy('id', 'desc')->firstOrFail();
        $prod_ids               = explode(',', $invoice->prod_ids);
        
        if ($type == 'apporve') {
            $data['status']         = 'Completed';
            $data['pay_status']     = 'Completed';
            $data['pay_at']         = \Carbon\Carbon::now();
            $data['completed_at']   = \Carbon\Carbon::now();

            $invUpdate      = Invoice::whereId($id)->update($data);   
            
            foreach ($prod_ids as $v) {
                Order::where(['inv_id' => $invoice->id, 'prod_id' => $v])->update(['status' => 'Completed', 'completed_at' => \Carbon\Carbon::now()]);
            }
        }

        if ($type == 'cancel') {
            $data['status']     = 'Cancelled';
            $invUpdate          = Invoice::whereId($id)->update($data);   
            
            foreach ($prod_ids as $v) {
                Order::where(['inv_id' => $invoice->id, 'prod_id' => $v])->update(['status' => 'Cancelled']);
            }
        }

        return redirect()->back();
    }

    public function create($id = null)
    {
        
    }

    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        $update = Product::whereId($request->id)->update(['deleted_by' => saUser('id')]);

        if(!isSoftDl('App\Model\Category')){
            dbClearFile('category', ['id' => $request->id], 'upload/category/', ['cat_image']);
        }
        
        $delete = Product::destroy($request->id);
        msgFlash(DESTROY);

        return response()->json(['msg' => 'success']);
    }
}