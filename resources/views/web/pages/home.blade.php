@extends(webLayout())

@section('content')
    <div class="home-slider-container" style="overflow: hidden;">
        <div class="row">
            <div class="col-lg-3 d-none d-lg-block">
                <div class="cat_wrap p-3" style="margin: 120px 0px 0px 50px; background: #fff; border-radius: 20px; box-shadow: 0px 0px 10px 0px #ccc; height: 100%;">
                    <h3 class="pt-3 pl-2" style="font-weight: bolder;"><i class="icon-list"></i> &nbsp; MY MARKETS</h3>
                    <ul class="nav">
                        @foreach ($categories as $key => $nav_cat)
                            <li class="nav-item" style="width: 100%;">
                                <a href="#cat-{{ $nav_cat->id }}" class="nav-link d-flex">
                                    <span class="cat-list-icon" style="width: 20px; min-height: 40px; margin-right: 10px;">
                                        <img src="{{ source('upload/category/'.$nav_cat->cat_image) }}" alt="{{ $nav_cat->cat_name }}" style="margin-top: 5px;">
                                    </span>
                                    <span class="cat-list-text" style="margin-top: 10px;">{{ $nav_cat->cat_name }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="home-slider owl-carousel owl-theme">
                    <div class="home-slide">
                        <div class="slide-bg owl-lazy" data-src="{{ source('assets/web/images/slider/slide-1.jpg') }}"></div><!-- End .slide-bg -->
                        
                        <div class="home-slide-content container">
                            <div class="slide-content-wrapper">
                                <p>It’s the best time of the year!</p>
                                <h3>HAPPY HOLIDAYS</h3>
                                <h1>GET UP TO<br>70% OFF</h1>
                                <a href="category.html" class="btn btn-outline-primary">Shop Now!</a>
                            </div><!-- End .slide-content-wrapper -->
                        </div><!-- End .home-slide-content -->
                    </div><!-- End .home-slide -->

                    <div class="home-slide">
                        <div class="slide-bg owl-lazy" data-src="{{ source('assets/web/images/slider/slide-2.jpg') }}"></div><!-- End .slide-bg -->
                        <div class="home-slide-content container">
                            <div class="row">
                                <div class="col-md-6 offset-md-6">
                                    <p>It’s the best time of the year!</p>
                                    <h3>Brand new Promo</h3>
                                    <h1 class="smaller">Woman`s summer hat</h1>
                                    <a href="category.html" class="btn btn-outline-primary">Shop Now!</a>
                                </div><!-- End .col-lg-5 -->
                            </div><!-- End .row -->
                        </div><!-- End .home-slide-content -->
                    </div><!-- End .home-slide -->
                </div><!-- End .home-slider -->
            </div>
        </div>
    </div>

    <div class="main-container">
        <div class="category-list" id="category-list">
            <ul class="nav category-list-nav">
                @foreach ($categories as $key => $nav_cat)
                    <li class="nav-item green">
                        <a href="#cat-{{ $nav_cat->id }}" class="nav-link">
                            <span class="cat-list-icon"><img src="{{ source('upload/category/'.$nav_cat->cat_image) }}" width="28" alt="{{ $nav_cat->cat_name }}"></span>
                            <span class="cat-list-text">{{ $nav_cat->cat_name }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="main-content">
            <div class="container-fluid">
                @foreach ($categories as $key => $cat)
                    <div id="cat-{{ $cat->id }}" class="category-section">
                        <div class="category-title">
                            <div class="cat-title">{{ $cat->cat_name }}</div>
                            <a href="#" class="btn btn-outline-primary">See more</a>
                        </div>

                        <div class="products-carousel owl-carousel owl-theme">
                            @foreach ($cat->products as $key => $prod)
                            @php
                                $prodImg = \App\Model\ProductImage::where('prod_id', $prod->id)->first();
                                if ($prod->discount > 0)
                                {
                                    $prPrice = $prod->discount;
                                } else {
                                    $prPrice = $prod->price;
                                }
                            @endphp
                                <div class="product">
                                    <figure class="product-image-container">
                                        <a href="{{ webRoute('product.details', [clean($prod->name.'-'.$prod->post_id)]) }}" class="product-image">
                                            @if ($prodImg)
                                                <img src="{{ source('upload/products/400x400'.$prodImg->image) }}" alt="product" style="height: 292px;">
                                            @else
                                                <img src="https://via.placeholder.com/400x400?text=No+Image" alt="Image" style="height: 292px;">
                                            @endif
                                        </a>
                                        <a href="ajax/product-quick-view.html" class="btn-quickview">Quickview</a>
                                    </figure>
                                    <div class="product-details">
                                        <h2 class="product-title">
                                            <a href="{{ webRoute('product.details', [clean($prod->name.'-'.$prod->post_id)]) }}">{{ $prod->name }}</a>
                                        </h2>
                                        <div class="price-box">
                                            @if ($prod->discount > 0)
                                                <span class="old-price">৳{{ $prod->price }}</span>
                                                <span class="product-price">৳{{ $prod->discount }}</span>
                                            @else
                                                <span class="product-price">৳{{ $prod->price }}</span>
                                            @endif
                                        </div><!-- End .price-box -->

                                        <div class="product-action">
                                            <a href="#" class="paction add-wishlist" title="Add to Wishlist">
                                                <span>Add to Wishlist</span>
                                            </a>

                                            @if (auth()->guard('web')->check())
                                                <a href="javascript:;" class="paction add-cart" title="Add to Cart" data-prod_id="{{ $prod->id }}" data-price="{{ $prPrice }}">
                                                    <span>Add to Cart</span>
                                                </a>
                                            @else
                                                <a href="#login-popup" data-toggle="modal" class="paction add-cart" title="Add to Cart">
                                                    <span>Add to Cart</span>
                                                </a>
                                            @endif

                                            <a href="#" class="paction add-compare" title="Add to Compare">
                                                <span>Add to Compare</span>
                                            </a>
                                        </div><!-- End .product-action -->
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="banners-group">
                            <div class="row row-sm">
                                <div class="col-sm-6">
                                    <div class="banner banner-image">
                                        <a href="#">
                                            <img src="{{ source('assets/web/images/banners/banner-3.jpg') }}" alt="banner">
                                        </a>
                                    </div><!-- End .banner -->
                                </div><!-- End .col-sm-6 -->

                                <div class="col-sm-6">
                                    <div class="banner banner-image">
                                        <a href="#">
                                            <img src="{{ source('assets/web/images/banners/banner-4.jpg') }}" alt="banner">
                                        </a>
                                    </div><!-- End .banner -->
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .banners-group -->
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection