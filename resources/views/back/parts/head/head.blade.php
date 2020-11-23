<?php
use App\Models\Settings;
?>
<!DOCTYPE html>
<html class="loading" lang="{{getLang()}}" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>{{Settings::first()->site_name}}</title>
    <meta name="description" content="{{Settings::first()->description}}">
    <meta name="author" content="{{Settings::first()->author_name}}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{Settings::first()->favicon}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/vendors/css/weather-icons/climacons.min.css">
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/fonts/meteocons/style.css">
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/vendors/css/charts/chartist.css">
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/vendors/css/charts/chartist-plugin-tooltip.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN MODERN CSS-->
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/css/app.css">
    <!-- END MODERN CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/css/pages/timeline.css">
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/vendors/css/extensions/toastr.css">
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}app-assets/css/plugins/extensions/toastr.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{env('BACK')}}assets/css/style.css">
    <!-- END Custom CSS-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    @yield('css')
</head>
