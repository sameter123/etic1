<?php
use App\Models\Settings;
?>
<!DOCTYPE html>
<html lang="{{getLang()}}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{Settings::first()->site_name}}</title>
    <meta name="description" content="{{Settings::first()->description}}">
    <meta name="author" content="{{Settings::first()->author_name}}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{Settings::first()->favicon}}">

    <script type="text/javascript">
        WebFontConfig = {
            google: { families: [ 'Open+Sans:300,400,600,700,800','Poppins:300,400,500,600,700','Segoe Script:300,400,500,600,700' ] }
        };
        (function(d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{env('FRONT')}}assets/css/bootstrap.min.css">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{env('FRONT')}}assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{env('FRONT')}}assets/vendor/fontawesome-free/css/all.min.css">
    @yield('css')
</head>
