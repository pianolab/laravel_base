@extends('layouts.master')

@section('head')
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="" />
    <link rel="shortcut icon" href="images/favicon.ico" />

    <title>{{ Config::get('app.name') }}</title>
@stop

@section('styles')
    {{ HTML::style('stylesheets/administration.css') }}
    @yield('stylesheets')
@stop

@section('header')
    <header class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">{{ t('Toggle') }}</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="navbar-brand">{{ _t('administrator') }}</div>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li>{{ link_to('/admin', _t('dashboard')) }}</li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ _t('posts') }} <i class="fa fa-angle-down"></i></b></a>
              <ul class="dropdown-menu">
                <li class="dropdown-header">{{ _t('posts') }}</li>
                <li>{{ link_to_route('admin.posts.create', t('+ add')) }}</li>
                <li>{{ link_to_route('admin.posts.index', t('see all')) }}</li>
                <li class="divider"></li>
                <li class="dropdown-header">{{ _t('categories') }}</li>
                <li><a href="#link-sample">{{ t('sample') }}</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->username }} <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu">
                    <li><a href="{{ url('/sign_out') }}"><i class="fa fa-power-off"></i> {{ _t('sign out') }}!</a></li>
                </ul>
            </li>
            <li>
                @if (App::getLocale() == 'en')
                    <a href="{{ url('/lang/br') }}">
                        {{ HTML::image('images/lang/icon-br.png') }}
                    </a>
                @else
                    <a href="{{ url('/lang/en') }}">
                        {{ HTML::image('images/lang/icon-en.png') }}
                    </a>
                @endif
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
      <span id="loading"><i class="fa fa-spinner fa-spin"></i> {{ t('loading') }}...</span>
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
    @include('layouts.admin.javascripts')
    @yield('javascripts')
@stop
