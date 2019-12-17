<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

@hasSection('meta')
   @yield('meta')
@else
    <title>{{ basic('title') }}</title>
    <meta name="author" content="Taylor Otwell">
    <meta name="description" content="Laravel - The PHP framework for web artisans.">
    <meta name="keywords" content="laravel, php, framework, web, artisans, taylor otwell">
@endif

{{ Html::favicon('assets/software/my_assets/img/laravel.jpg') }}

<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

<!-- BEGIN: Vendor CSS-->
{{ Html::style("assets/software/app-assets/vendors/css/vendors.min.css") }}
{{ Html::style("assets/software/app-assets/vendors/css/charts/apexcharts.css") }}
{{ Html::style("assets/software/app-assets/vendors/css/extensions/tether-theme-arrows.css") }}
{{ Html::style("assets/software/app-assets/vendors/css/extensions/tether.min.css") }}
{{ Html::style("assets/software/app-assets/vendors/css/extensions/shepherd-theme-default.css") }}
{{ Html::style("assets/software/app-assets/vendors/css/tables/datatable/datatables.min.css") }}
{{ Html::style("assets/software/app-assets/vendors/css/file-uploaders/dropzone.min.css") }}
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
{{ Html::style("assets/software/app-assets/vendors/css/extensions/sweetalert2.min.css") }}
{{ Html::style("assets/software/app-assets/css/bootstrap.min.css") }}
{{ Html::style("assets/software/app-assets/css/bootstrap-extended.min.css") }}
{{ Html::style("assets/software/app-assets/css/colors.min.css") }}
{{ Html::style("assets/software/app-assets/css/components.min.css") }}
{{ Html::style("assets/software/app-assets/css/themes/dark-layout.min.css") }}
{{ Html::style("assets/software/app-assets/css/themes/semi-dark-layout.min.css") }}

{{ Html::style("assets/software/app-assets/vendors/css/extensions/toastr.css") }}
{{ Html::style("assets/software/app-assets/css/plugins/extensions/toastr.min.css") }}

<!-- BEGIN: Page CSS-->
{{ Html::style("assets/software/app-assets/css/core/menu/menu-types/vertical-menu.min.css") }}
{{ Html::style("assets/software/app-assets/css/core/colors/palette-gradient.min.css") }}
{{ Html::style("assets/software/app-assets/css/pages/dashboard-analytics.min.css") }}
{{ Html::style("assets/software/app-assets/css/pages/card-analytics.min.css") }}
{{ Html::style("assets/software/app-assets/css/plugins/tour/tour.min.css") }}
{{ Html::style("assets/software/app-assets/vendors/css/ui/prism.min.css") }}
{{ Html::style("assets/software/app-assets/css/plugins/file-uploaders/dropzone.min.css") }}
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
{{ Html::style("assets/software/assets/css/style.css") }}

{{-- My Assets --}}
{{ Html::style("assets/software/my_assets/plugin/iziModal/css/iziModal.css") }}
{{ Html::style("assets/software/my_assets/plugin/iziToast/dist/css/iziToast.css") }}
{{ Html::style("assets/software/my_assets/css/custom.css") }}

{{-- Js --}}
{{ Html::script("assets/software/app-assets/vendors/js/vendors.min.js") }}

<!-- Js -->
<script type="text/javascript">
    (function(){
        var AJAX = {
            token: function() { return '{{ csrf_token() }}'; }
        };
        window.AJAX = AJAX;
    }());

</script>

{{ Html::script("assets/software/my_assets/plugin/iziModal/js/iziModal.js") }}
{{ Html::script("assets/software/my_assets/plugin/iziToast/dist/js/iziToast.js") }}


<style type="text/css">
    .hide_spin{-moz-appearance:textfield !important;}
    .hide_spin::-webkit-inner-spin-button, 
    .hide_spin::-webkit-outer-spin-button { 
      -webkit-appearance: none !important; 
      margin: 0; 
    }

    .switchable-holder{
        float: none;
    }
    .switchable-holder .switchable-switcher {
        display: block;
    }
</style>