@extends('layouts.master')

@section('head')
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="images/favicon.ico" />

    <title>{{ Config::get('app.name') }}</title>
@stop

@section('styles')
    @include('layouts.stylesheets')
    @yield('stylesheets')
@stop

@section('header')
    <header class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-brand">{{ t('Administrator') }}</div>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li>{{ link_to('/', t('Dashboard')) }}</li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ t('Posts') }} <i class="fa fa-angle-down"></i></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">{{ t('Posts') }}</li>
                <li>{{ link_to('/posts/create', t('+ Add')) }}</li>
                <li>{{ link_to('/posts', t('See all')) }}</li>
                <li class="divider"></li>
                <li class="dropdown-header">{{ t('Categories') }}</li>
                <li><a href="#link-sample">{{ t('Sample') }}</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }} <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/sign_out') }}"><i class="fa fa-power-off"></i> {{ t('Sign out!') }}</a></li>
                </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </header>
@stop

@section('container')
    <div class="container">
        @include('layouts.alerts')
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
