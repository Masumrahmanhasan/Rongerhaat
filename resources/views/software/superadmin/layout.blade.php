<!DOCTYPE html>
<html lang="en">
<head>
    @include(SAROOT.'partials.head')
    
    @yield('style')

    <script type="text/javascript">
        iziToast.settings({
            timeout: 3000,
            position: 'bottomRight',
            overlay: false,
            overlayColor: 'rgba(0, 0, 0, 0.1)',
            progressBar: false,
            transitionIn: 'flipInX',
            transitionOut: 'flipOutX'
        });
    </script>
</head>

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">
    @include(SAROOT.'partials.left_menu')

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
            //swal({title:'{{$text}}', icon:'{{$type}}', button:true});
            // $.notify('{{$text}}','{{$type}}');
            iziToast.{{$type}}( {title: '{{ ucfirst($type) }}', message: '{{$text}}'} );

            // iziToast.show({
            //     theme: 'dark',
            //     icon: '{{ $icon }}',
            //     iconColor: '{{ $color }}',
            //     title: '{{$text}}',
            //     message: '',
            // });
        </script>
    @endif

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        @include(SAROOT.'partials.header')

        <div class="content-wrapper">
            <div class="content-header row"></div>
            @yield('content')
        </div>
    </div>
    
    {{-- @include(SAROOT.'partials.control_sidebar') --}}

    {{-- <div class="buy-now"><a href="https://bit.ly/2GzkehH" target="_blank" class="btn btn-danger">Buy Now</a></div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div> --}}

    @include(SAROOT.'partials.footer')
    @include(SAROOT.'partials.js_src')

    @yield('script')
</body>
</html>