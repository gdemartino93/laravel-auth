@extends('layouts.main-layout')
@section('title')
    <title>Home Page</title>
@endsection
@section('contents')
    <div class="container">
        <div class="col-12 d-flex flex-column justify-content-center text-center">
            <h1>Ecco la lista di tutti i prodotti</h1>
            <p class="fw-bold">Ricordati di registrarti per accedere ai prodotti in sconto.</p>
            <div class="wrapper">
                @foreach ($products as $product)
                    @include('components.product')
                @endforeach
            </div>
        </div>
    </div>
@endsection