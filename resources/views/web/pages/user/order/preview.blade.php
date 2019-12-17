@extends(webLayout())

@section('content')
    @php
        $sInfo = (object) json_decode($user->shipping_address);
        $bInfo = (object) json_decode($user->billing_address);
    @endphp

    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container-fluid">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ webRoute('home') }}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Order Preview</a></li>
            </ol>
        </div>
    </nav>

    <div class="main-container">
        <div class="main-content"><br>
            <div class="container-fluid">
                <div class="row" style="display: none;">
                    <div class="col-lg-6">
                        <h2 class="step-title">Shipping Address</h2>
                        <table class="table">
                            <tr>
                                <td><b>Full Name: </b> {{ $sInfo->s_name ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>Address: </b> {{ $sInfo->s_address ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>Country: </b> {{ $sInfo->s_country ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>City: </b> {{ $sInfo->s_city ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>State: </b> {{ $sInfo->s_state ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>Zip: </b> {{ $sInfo->s_zip ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>Phone: </b> {{ $sInfo->s_phone ?? '' }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-lg-6">
                        <h2 class="step-title">Billing Address</h2>
                        <table class="table">
                            <tr>
                                <td><b>Full Name: </b> {{ $bInfo->b_name ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>Address: </b> {{ $bInfo->b_address ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>Country: </b> {{ $bInfo->b_country ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>City: </b> {{ $bInfo->b_city ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>State: </b> {{ $bInfo->b_state ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>Zip: </b> {{ $bInfo->b_zip ?? '' }}</td>
                            </tr>
                            <tr>
                                <td><b>Phone: </b> {{ $bInfo->b_phone ?? '' }}</td>
                            </tr>
                        </table>
                    </div>

                    {{-- <div class="col-lg-12 text-center">
                        <a href="{{ webRoute('user.order.index') }}" class="btn btn-outline-secondary">Edit Info</a>
                    </div> --}}
                </div>

                <br><br>
                
                <div class="row">
                    <div class="col-lg-8">
                        <div class="cart-table-container">
                            <table class="table table-cart">
                                <thead>
                                    <tr>
                                        <th class="product-col">Product</th>
                                        <th class="price-col">Price</th>
                                        <th class="qty-col">Qty</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $subTotal = 0; @endphp 
                                    @foreach ($carts as $c)
                                        @php
                                            $subTotal   = $subTotal+($c->price*$c->quantity);
                                            $prodImg    = \App\Model\ProductImage::where('prod_id', $c->product->id)->first();
                                        @endphp                                        
                                        <tr class="product-row">
                                            <td class="product-col">
                                                <figure class="product-image-container">
                                                    <a href="{{ webRoute('product.details', [clean($c->product->name.'-'.$c->product->post_id)]) }}" class="product-image">
                                                        @if ($prodImg)
                                                            <img src="{{ source('upload/products/400x400'.$prodImg->image) }}" alt="product" style="height: 200px;">
                                                        @else
                                                            <img src="https://via.placeholder.com/400x400?text=No+Image" alt="Image" style="height: 200px;">
                                                        @endif
                                                    </a>
                                                </figure>
                                                <h2 class="product-title">
                                                    <a href="{{ webRoute('product.details', [clean($c->product->name.'-'.$c->product->post_id)]) }}">{{ $c->product->name }}</a>
                                                </h2>
                                            </td>
                                            <td>৳{{ $c->price }}</td>
                                            <td>
                                                {{ $c->quantity }}
                                            </td>
                                            <td>৳{{ $c->price*$c->quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="cart-discount" style="display: none;">
                            <h4>Apply Discount Code</h4>
                            <form action="#">
                                <div class="input-group">
                                    <input type="text" class="form-control form-control-sm" placeholder="Enter discount code"  required>
                                    <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="submit">Apply Discount</button>
                                    </div>
                                </div><!-- End .input-group -->
                            </form>
                        </div><!-- End .cart-discount -->
                    </div><!-- End .col-lg-8 -->

                    <div class="col-lg-4">                        
                        <div class="cart-summary">
                            <h3>Billing & Shipping</h3>

                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                        <td><b>Ship To</b></td>
                                        <td>
                                            <a href="#address_book" data-toggle="modal" title="Edit" class="btn-edit"><i class="icon-pencil"></i></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            @if (isset($sInfo->s_name))
                                                <var>
                                                    {{ $sInfo->s_name }}<br>
                                                    {{ $sInfo->s_address }}<br>
                                                    {{ $sInfo->s_state.', '.$sInfo->s_city.'-'.$sInfo->s_zip.', '.$sInfo->s_country }}<br>
                                                    {{ $sInfo->s_phone }}<br>
                                                </var>
                                            @else
                                                <span style="color: red;">Not Given</span>
                                            @endif
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td><b>Bill To</b></td>
                                        <td>&nbsp;</td>
                                    </tr>

                                    <tr>
                                        <td>
                                            @if (isset($bInfo->b_name))
                                                <var>
                                                    {{ $bInfo->b_name }}<br>
                                                    {{ $bInfo->b_address }}<br>
                                                    {{ $bInfo->b_state.', '.$bInfo->b_city.'-'.$bInfo->b_zip.', '.$bInfo->b_country }}<br>
                                                    {{ $bInfo->b_phone }}<br>
                                                </var>
                                            @else
                                                <span style="color: red;">Not Given</span>
                                            @endif
                                        </td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                            @if (!isset($sInfo->s_name) && !isset($bInfo->b_name))
                                <div class="text-center">
                                    <small style="color: red; font-size: 10px;">Please fill your <b>Billing & Shipping</b> address for place order!</small>
                                </div>
                            @endif
                        </div>

                        <div class="cart-summary">
                            <h3>Summary</h3>

                            <table class="table table-totals">
                                <tbody>
                                    <tr>
                                        <td>Subtotal</td>
                                        <td>৳{{ $subTotal }}</td>
                                    </tr>

                                    <tr>
                                        <td>Tax</td>
                                        <td>৳0.00</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>Order Total</td>
                                        <td>৳{{ $subTotal }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div><!-- End .col-lg-4 -->

                    @if (isset($sInfo->s_name) && isset($bInfo->b_name))
                        <div class="col-lg-12" style="margin-top: 20px;">
                            <div class="cart-summary">
                                <h3>Select Payment Method</h3>

                                <form action="{{ webRoute('user.order.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group" style="margin-bottom: 20px;">
                                        <div class="select-custom">
                                            <select class="form-control" name="pay_type" style="max-width: 100%;">
                                                <option value="Cash">Cash on Delivery</option>
                                                {{-- <option value="Paypal">Paypal</option> --}}
                                            </select>
                                        </div><!-- End .select-custom -->
                                    </div><!-- End .form-group -->

                                    <button type="submit" class="btn btn-block btn-sm btn-primary">Place Order</button>
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Address Book Popup --}}
<div class="login-popup modal fade" id="address_book" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body" style="max-height: 100% !important;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="float-left">
                            <h2 class="title mb-2">Edit Billing & Shipping Address.</h2>
                        </div>
                        <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="col-md-12" style="padding: 0px;">
                        @include('web.pages.user.address_book.form')
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
@endsection