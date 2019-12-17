<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

@hasSection('meta')
   @yield('meta')
@else
    <title>Online Shopping In Bangladesh-Rongerhaat.com</title>
    <meta name="author" content="Rongerhaat.com">
    <meta name="keywords" content="Rongerhaat.com" />
    <meta name="description" content="Online Shopping In Bangladesh-Rongerhaat.com">
@endif

<link rel="shortcut icon" href="{{ source('assets/web/images/icons/favicon.ico') }}" type="image/x-icon">
<link rel="icon" href="{{ source('assets/web/images/icons/favicon.ico') }}" type="image/x-icon">



<link rel="stylesheet" href="{{ source('assets/web/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ source('assets/web/css/style.min.css') }}">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.1/animate.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jsSocials/1.5.0/jssocials.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/jsSocials/1.5.0/jssocials-theme-plain.min.css" rel="stylesheet">

<link href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">


<link rel="stylesheet" href="{{ source('assets/web/my_assets/css/custom.css') }}">

<script src="{{ source('assets/web/js/jquery.min.js') }}"></script>
<script src="{{ source('assets/web/js/typeahead.js') }}"></script>

{{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jsSocials/1.5.0/jssocials.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.4/clipboard.min.js"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<script src="{{ source('assets/web/my_assets/js/sweetalert.min.js') }}"></script>

<!-- Js -->
<script type="text/javascript">
    (function(){
        var AJAX = {
            token: function() { return '{{ csrf_token() }}'; }
        };
        window.AJAX = AJAX;
    }());

</script>
