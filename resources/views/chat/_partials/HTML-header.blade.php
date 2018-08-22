<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{!! csrf_token() !!}"/>
        <title>
            @yield('title')
        </title>

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta name="user_id" content="{!!  Auth::check()?Auth::id():null !!}">
        @yield('meta')

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- bootstrap -->
        <link href="{!! asset('assets/css/bootstrap.min.css') !!}" rel="stylesheet" id="bootstrap-css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



        <style>
            @yield('style')
        </style>
    </head>
<body>
    <div id="app">