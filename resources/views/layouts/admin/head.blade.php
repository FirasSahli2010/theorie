<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-confirmation/1.0.5/bootstrap-confirmation.min.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Reishcool Wallat :: theorie') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <title>
      Reishcool Wallat :: theorie
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

      <link href="{{ asset('assets') }}/css/font-awesome.css" rel="stylesheet" crossorigin="anonymous">

      <link href="{{ asset('assets') }}/css/editor.css" rel="stylesheet">
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0" />

      <meta name="csrf-token" content="{{ csrf_token() }}">

      <title>{{ config('app.name_amdin', 'SHAMS CMS Dashboard') }}</title>
      <!-- Favicon -->
      <link href="{{ asset('assets') }}/img/brand/favicon.png" rel="icon" type="image/png">
      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
      <!-- Extra details for Live View on GitHub Pages -->
       <!-- WEB FONTS -->
       <!-- up to 10% speed up for external res -->
       <link rel="dns-prefetch" href="https://fonts.googleapis.com/">
       <link rel="dns-prefetch" href="https://fonts.gstatic.com/">
       <link rel="preconnect" href="https://fonts.googleapis.com/">
       <link rel="preconnect" href="https://fonts.gstatic.com/">
       <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin,latin-ext,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css" />

       <link rel="preload" href=" {{ asset('assets') }}/fonts/flaticon/Flaticon.woff2" as="font" type="font/woff2" crossorigin>

      <!-- CORE CSS -->

      <!-- non block rendering : page speed : js = polyfill for old browsers missing `preload` -->
      <!-- <link rel="stylesheet" href="{{ asset('assets') }}/css/core.min.css" > -->
      <link rel="stylesheet" href="{{ asset('assets') }}/css/vendor_bundle.min.css" >
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap">

      <!-- <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet"> -->


      <link rel="shortcut icon" href="{{ asset('assets') }}/img/favicon.ico">
      <link rel="apple-touch-icon" href="{{ asset('assets') }}/images/logo/icon_512x512.png">

      <link rel="manifest" href="{{ asset('assets') }}/img/manifest/manifest.json">
      <meta name="theme-color" content="#7952b3">

      <!-- End included code -->
      <!-- Argon CSS -->
      <!-- <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet"> -->

      <!-- <link href="{{ asset('assets') }}/css/sb-admin-2.min.css" rel="stylesheet"> -->
      <link href="{{ asset('assets') }}/css/style.css" rel="stylesheet">
      <script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>

      <script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>

      <link rel="stylesheet" href="{{ asset('vendor') }}/laraberg/css/laraberg.css">

      <script src="{{ asset('vendor') }}/laraberg/js/laraberg.js"></script>

      <script src="https://kit.fontawesome.com/401d2eb4ee.js" crossorigin="anonymous"></script>
    </head>
