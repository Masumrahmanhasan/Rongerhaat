<!DOCTYPE html>
<html lang="en">
<head>
    @include(WEBROOT.'partials.head')
    
    @yield('style')
</head>

<body class="homepage" data-spy="scroll" data-target="#category-list" data-offset="130">
    <div class="page-wrapper">
        @include(WEBROOT.'partials.header')
        @include(WEBROOT.'pages.auth.popup')

        @php
            $msg  = session()->get('msg');
            $text = $msg['text'] ?? '';
            $type = $msg['type'] ?? '';
        @endphp

        @if($text & $type)
            @php
                if($type == 'success') { $icon = 'fa fa-check'; $color = '#06d79c'; }
                if($type == 'error') { $icon = 'fa fa-bug'; $color = '#fb9678'; }
                if($type == 'warning') { $icon = 'fa fa-exclamation-triangle'; $color = '#e0bc00'; }
                if($type == 'info') { $icon = 'fa fa-info-circle'; $color = '#f96197'; }
            @endphp
            <script type="text/javascript">
                swal({title:'{{$text}}', icon:'{{$type}}', button:true});
                {{-- $.notify('{{$text}}','{{$type}}'); --}}
                // iziToast.{{$type}}( {title: '{{ ucfirst($type) }}', message: '{{$text}}'} );

                // iziToast.show({
                //     theme: 'dark',
                //     icon: '{{ $icon }}',
                //     iconColor: '{{ $color }}',
                //     title: '{{$text}}',
                //     message: '',
                // });
            </script>
        @endif

        <main class="main">
            @yield('content')
        </main>          
        
        @include(WEBROOT.'partials.footer')
    </div>
    
    @include(WEBROOT.'partials.mobile_menu')

    <div class="newsletter-popup mfp-hide" id="newsletter-popup-form" style="background-image: url({{ source('assets/web/images/newsletter_popup_bg.jpg') }})">
        <div class="newsletter-popup-content">
            <img src="{{ source('assets/web/images/logo-black.png') }}" alt="Logo" class="logo-newsletter">
            <h2>BE THE FIRST TO KNOW</h2>
            <p>Subscribe to the Rongerhaat eCommerce newsletter to receive timely updates from your favorite products.</p>
            <form action="#">
                <div class="input-group">
                    <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Email address" required>
                    <input type="submit" class="btn" value="Go!">
                </div><!-- End .from-group -->
            </form>
            <div class="newsletter-subscribe">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="1">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div><!-- End .newsletter-popup-content -->
    </div><!-- End .newsletter-popup -->

    <a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>

    @include(WEBROOT.'partials.js_src')
    @yield('script')

    <script type="text/javascript">
        $('.add-cart').click(function(){
            var prod_id     = $(this).data('prod_id');
            var price       = $(this).data('price');
            var quantity    = $('#quantity').val();

            $.ajax({
                type:'post',
                url:"{{ webRoute('user.cart.store') }}",
                data:{'prod_id':prod_id, 'quantity':quantity, 'price':price, '_token':AJAX.token},
                dataType:'json',
                success:function(data)
                {
                    console.log(data);
                    $('#loadCart').html(data.cartDropDown);
                    if(data.msg == 'added') $.notify('Item is added','success');
                    if(data.msg == 'exists') $.notify('Item already Exists','error');

                }
            });
        });

        $('body').delegate('.update-cart', 'change', function(){
            var cart_id     = $(this).data('cart_id');
            var quantity    = $(this).val();

            $.ajax({
                type:'post',
                url:"{{ webRoute('user.cart.update') }}",
                data:{'cart_id':cart_id, 'quantity':quantity, '_token':AJAX.token},
                dataType:'json',
                success:function(data)
                {
                    $('#loadViewCart').html(data.viewCart);
                    $('#loadCart').html(data.cartDropDown);

                }
            });
        });

        $('body').delegate('.delete-cart', 'click', function(){
            var cart_id     = $(this).data('cart_id');
            var page        = $(this).data('page');

            $.ajax({
                type:'delete',
                url:"{{ webRoute('user.cart.destroy') }}",
                data:{'cart_id':cart_id, 'page':page, '_token':AJAX.token},
                dataType:'json',
                success:function(data)
                {
                    if(data.page == 'list')
                    {
                        $('#loadViewCart').html(data.viewCart);
                        $('#loadCart').html(data.cartDropDown);
                    } else {
                        $('#loadCart').html(data.cartDropDown);
                    }
                }
            });
        });
    </script>
</body>
</html>