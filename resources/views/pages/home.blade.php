@extends('layouts.main-layout')
@section('contents')
    <div class="container">
        <div class="col-12 d-flex flex-column justify-content-center text-center">
            <h1>conteuti della home</h1>
            <div class="wrapper">
                @foreach ($products as $product)
                    @include('components.product')
                @endforeach
            </div>
        </div>
    </div>
@endsection