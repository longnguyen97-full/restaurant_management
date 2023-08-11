<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Sorae Restaurant - @yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('user-screen/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user-screen/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('user-screen/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user-screen/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user-screen/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('user-screen/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('user-screen/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('user-screen/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('user-screen/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('user-screen/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('user-screen/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('user-screen/css/style.css') }}">
</head>

<body>
    @include('layouts.navbar')
    @include('layouts.slider')

