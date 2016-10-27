@extends('user.elements.base')

@include('user.elements.css')
@include('user.elements.js-header')
@include('user.elements.js-footer')
@include('user.elements.top-bar')
@include('user.elements.footer')

@section('container')

    @yield('content-header')

    @yield('content')

@endsection