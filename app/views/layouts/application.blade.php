@extends('layouts.master')

@section('head')
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="images/favicon.ico" />

    <title>{{ Config::get('app.name') }}</title>
@stop

@section('styles')
    {{ HTML::style('stylesheets/application.css') }}
    @yield('stylesheets')
@stop

@section('header')
    <header class="container">
        <h3>{{ Config::get('app.name') }}</h3>
    </header>
@stop

@section('container')
    <div class="container">
        @include('layouts.messages')
    </div>

    <section class="container">
        @yield('content')
    </section>
@stop

@section('footer')
    <div class="container">
        <hr>
        <div class="row">
            <div class="col-md-6">{{ date('Y') }}</div>
            <div class="col-md-6 text-right">
                <a href="//pianolab.com.br" target="blank">
                    {{ HTML::image('images/pianolab.png') }}
                </a>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @include('layouts.javascripts')
    @yield('javascripts')
@stop
