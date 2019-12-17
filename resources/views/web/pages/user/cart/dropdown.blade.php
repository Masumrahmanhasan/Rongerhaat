@php
    if(auth()->guard('web')->check())
    {
        $carts = \App\Model\Cart::with('product')->where('usr_id', webUser('id'))->orderBy('id', 'desc')->get();
    } else {
        $carts = [];
    }
@endphp

<a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
    <span class="cart-count">{{ count($carts) }}</span>
</a>

<div class="dropdown-menu" >
    <div class="dropdownmenu-wrapper">
        @if (count($carts) > 0)
            <div class="dropdown-cart-products" style="max-height: 300px; overflow-y: scroll; overflow-x: hidden;">
                @foreach ($carts as $c)
                    @php
                        $prodImg = \App\Model\ProductImage::where('prod_id', $c->product->id)->first();
                    @endphp
                    <div class="product">
                        <div class="product-details">
                            <h4 class="product-title">
                                <a href="{{ webRoute('product.details', [clean($c->product->name.'-'.$c->product->post_id)]) }}">{{ $c->product->name }}</a>
                            </h4>

                            <span class="cart-product-info">
                                <span class="cart-product-qty">{{ $c->quantity }}</span>
                                x ৳{{ $c->price }}
                            </span>
                        </div>

                        <figure class="product-image-container">
                            <a href="{{ webRoute('product.details', [clean($c->product->name.'-'.$c->product->post_id)]) }}" class="product-image">
                                @if ($prodImg)
                                    <img src="{{ source('upload/products/100x100'.$prodImg->image) }}" alt="product">
                                @else
                                    <img src="https://via.placeholder.com/100x100?text=No+Image" alt="Image">
                                @endif
                            </a>
                            <a href="#" class="btn-remove delete-cart" data-cart_id="{{ $c->id }}" data-page="header" title="Remove Product"><i class="icon-cancel"></i></a>
                        </figure>
                    </div>
                @endforeach
            </div>

           {{--  <div class="dropdown-cart-total">
                <span>Total</span>
                <span class="cart-total-price">{{ $c->sum('price') }}</span>
            </div> --}}

            <div class="dropdown-cart-action">
                <a href="{{ webRoute('user.cart.index') }}" class="btn">View Cart</a>
                <a href="{{ webRoute('user.order.preview') }}" class="btn">Checkout</a>
            </div><!-- End .dropdown-cart-total -->
        @else
            <h4 class="text-danger text-center">No items</h4>
        @endif
    </div>
</div>
