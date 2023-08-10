<!doctype html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">


<title>@yield("title", "BikeShop | จําหน่ายอะไหล่จักรยานออนไลน์")</title>

<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<script src="{{ asset('js/jquery-3.7.0.min.js') }}"></script>
<script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>

</head>

<body>
    @yield("content")
    @if(session('msg'))
    @if(session('ok'))
    <script>toastr.success("{{ session('msg') }}")</script>
    @else
    <script>toastr.error("{{ session('msg') }}")</script>
    @endif
    @endif
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>