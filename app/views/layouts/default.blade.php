@extends('layouts.master')

@section('head')
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="images/favicon.ico" />

    <title>Laravel Base</title>
@stop

@section('styles')
    @include('layouts.stylesheets')
    @yield('stylesheets')
@stop

@section('header')
    <header class="container">

    </header>
@stop

@section('container')
    <?php /*
    <div class="container">
        @include('layouts.messages')
    </div>
    */ ?>
    <section class="container">
        @yield('content')
    </section>
@stop

@section('scripts')
    @include('layouts.javascripts')
    @yield('javascripts')
@stop