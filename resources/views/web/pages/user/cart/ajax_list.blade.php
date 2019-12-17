@php
    $carts = \App\Model\Cart::with('product')->where('usr_id', webUser('id'))->orderBy('id', 'desc')->get();
@endphp

@if (count($carts) > 0)
    <div class="col-lg-8">
        <div class="cart-table-container">
            <table class="table table-cart">
                <thead>
                    <tr>
                        <th class="product-col">Product</th>
                        <th class="price-col">Price</th>
                        <th class="qty-col">Qty</th>
                        <th>Subtotal</th>
                        <th>Action</th>
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
                                            <img src="{{ source('upload/products/400x400'.$prodImg->image) }}" alt="product" style="height: 238px;">
                                        @else
                                            <img src="https://via.placeholder.com/400x400?text=No+Image" alt="Image" style="height: 238px;">
                                        @endif
                                    </a>
                                </figure>
                                <h2 class="product-title">
                                    <a href="{{ webRoute('product.details', [clean($c->product->name.'-'.$c->product->post_id)]) }}">{{ $c->product->name }}</a>
                                </h2>
                            </td>
                            <td>৳{{ $c->price }}</td>
                            <td>
                                <input class="form-control update-cart" type="number" min="1" value="{{ $c->quantity }}" data-cart_id="{{ $c->id }}" style="width: 60px;">
                            </td>
                            <td>৳{{ $c->price*$c->quantity }}</td>
                            <td>
                                <div class="float-right">
                                    <a href="javascript:;" title="Remove product" class="btn-remove delete-cart" data-cart_id="{{ $c->id }}" data-page="list"><span class="sr-only">Remove</span></a>
                                </div><!-- End .float-right -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="5" align="center" class="clearfix">
                            <a href="{{ webRoute('home') }}" class="btn btn-outline-secondary">Continue Shopping</a>

                            {{-- <div class="float-right">
                                <a href="#" class="btn btn-outline-secondary btn-clear-cart">Clear Shopping Cart</a>
                            </div> --}}
                        </td>
                    </tr>
                </tfoot>
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

            <div class="checkout-methods">
                <a href="{{ webRoute('user.order.preview') }}" class="btn btn-block btn-sm btn-primary">Go to Checkout</a>
                <a href="#" class="btn btn-link btn-block">Check Out with Multiple Addresses</a>
            </div><!-- End .checkout-methods -->
        </div><!-- End .cart-summary -->
    </div><!-- End .col-lg-4 -->
@else
    <div class="col-lg-12 text-center" style="margin-top: 100px;">
        <h4 style="color: red;">No items</h4>
        <a href="{{ webRoute('home') }}" class="btn btn-outline-secondary">Continue Shopping</a>
    </div>
@endif