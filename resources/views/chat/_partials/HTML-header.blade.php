<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{!! csrf_token() !!}"/>
        <title>
            @yield('title')
        </title>
        <!-- bootstrap -->
        <link href="{!! asset('assets/css/bootstrap.min.css') !!}" rel="stylesheet" id="bootstrap-css">
        <link href="{!! asset('assets/css/style.css') !!}" rel="stylesheet">


    </head>
<body>
<div id="app">