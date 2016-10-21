@extends('user.elements.base')

@include('user.elements.css')
@include('user.elements.js-header')
@include('user.elements.js-footer')
@include('user.elements.top-bar')

@section('container')

    <div class="container">

        @yield('content-header')

        @yield('content')

    <div>

@endsection