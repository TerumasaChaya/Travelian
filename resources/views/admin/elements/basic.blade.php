@extends('admin.elements.base')

@include('admin.elements.css')
@include('admin.elements.js-header')
@include('admin.elements.js-footer')
@include('admin.elements.top-bar')
@include('admin.elements.side-bar')

@section('container')

    <div id="page-wrapper">

        @yield('content-header')

        @yield('content')

    </div>

@endsection