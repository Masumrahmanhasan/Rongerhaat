<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{ Html::favicon('assets/software/app-assets/images/ico/favicon.ico') }}

    <title>Control Panel - Log in </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    {{ Html::style("assets/software/app-assets/vendors/css/vendors.min.css") }}
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    {{ Html::style("assets/software/app-assets/css/bootstrap.min.css") }}
    {{ Html::style("assets/software/app-assets/css/bootstrap-extended.min.css") }}
    {{ Html::style("assets/software/app-assets/css/colors.min.css") }}
    {{ Html::style("assets/software/app-assets/css/components.min.css") }}
    {{ Html::style("assets/software/app-assets/css/themes/dark-layout.min.css") }}
    {{ Html::style("assets/software/app-assets/css/themes/semi-dark-layout.min.css") }}

    <!-- BEGIN: Page CSS-->
    {{ Html::style("assets/software/app-assets/css/core/menu/menu-types/vertical-menu.min.css") }}
    {{ Html::style("assets/software/app-assets/css/core/colors/palette-gradient.min.css") }}
    {{ Html::style("assets/software/app-assets/css/pages/authentication.css") }}
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    {{ Html::style("assets/software/assets/css/style.css") }}
    <!-- END: Custom CSS-->

    <!-- BEGIN: Vendor JS-->
    {{ Html::script("assets/software/app-assets/vendors/js/vendors.min.js") }}
    <!-- BEGIN Vendor JS-->
    
    {{ Html::script("https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js") }}
</head>
<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column">
    @yield('content')

    <!-- BEGIN: Theme JS-->
    {{ Html::script("assets/software/app-assets/js/core/app-menu.min.js") }}
    {{ Html::script("assets/software/app-assets/js/core/app.min.js") }}
    {{ Html::script("assets/software/app-assets/js/scripts/components.min.js") }}
    <!-- END: Theme JS-->
</body>
</html>