<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="title" content="PixelPhoto">
    <meta name="description"
          content="PixelPhoto is a PHP Media Sharing Script, PixelPhoto is the best way to start your own media sharing script!">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="PixelPhoto - Login"/>
    <meta name="twitter:description"
          content="PixelPhoto is a PHP Media Sharing Script, PixelPhoto is the best way to start your own media sharing script!"/>
    <meta name="twitter:image" content=""/>
    <meta name="twitter:creator" content="@PixelPhoto">
    <meta name="keywords" content="social, pixelphoto, social site">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/popup.css')}}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('/media/img/icon.png') }}"/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <script src="{{ asset('/apps/default/main/static/js/libs/jquery-3.2.1.js') }}"></script>
    <script src="{{ asset('/apps/default/main/static/css/libs/bs3/js/bootstrap.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/apps/default/main/static/css/libs/bs3/css/bootstrap.css') }}">
    <script src="{{ asset('/apps/default/main/static/js/libs/highcharts/highcharts.js') }}"></script>
    <script src="{{ asset('/apps/default/main/static/js/libs/highcharts/exporting.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('/apps/default/main/static/css/styles.master.css') }}">
    <link rel="stylesheet" href="{{ asset('/apps/default/main/static/css/styles.welcome.css') }}">
    <script src="{{ asset('/apps/default/main/static/js/libs/gridAlicious/jquery.grid-a-licious.js') }}"></script>
    <script src="{{ asset('/apps/default/main/static/js/libs/jquery-form.v3.51.0.js') }}"></script>
    <script src="{{ asset('/apps/default/main/static/js/script.master.js') }}"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto:400,500" rel="stylesheet">
    <script src="{{ asset('/apps/default/main/static/js/libs/afterglow.min.js') }}" class="home_script"></script>
    <script src="{{ asset('/apps/default/main/static/js/libs/jquery.pause.js') }}" class="home_script"></script>
    <script>
        function xhr_url() {
            return 'https://demo.pixelphotoscript.com/aj/';
        }

        function site_url(path) {
            return 'https://demo.pixelphotoscript.com/' + path;
        }

        function ajax_load_url() {
            return 'https://demo.pixelphotoscript.com/load/';
        }

        function get_theme() {
            return 'https://demo.pixelphotoscript.com/apps/default';
        }

        window.logo = 'https://demo.pixelphotoscript.com/media/img/logo.png';
        window.light_logo = 'https://demo.pixelphotoscript.com/media/img/light-logo.png';
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@10.19.0/dist/lazyload.min.js"></script>
    <script src="{{asset('js/popup.js')}}"></script>
    <script src="{{ asset('js/header.js') }}"></script>
    <script src="{{asset('js/like.js')}}"></script>
</head>
@include('core.navbar')

