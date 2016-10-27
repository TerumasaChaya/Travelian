@extends('user.elements.base')

@include('user.elements.css')
@include('user.elements.js-header')
@include('user.elements.js-footer')
@include('user.elements.top-bar')

@section('container')

    @yield('content-header')

    <section class="section section-default point">

        <div class="container">
            @yield('content')
        </div>
    </section>

@endsection