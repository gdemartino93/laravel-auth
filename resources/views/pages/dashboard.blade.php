@extends('layouts.main-layout')

@section('title')
    <title>Dashboard</title>
@endsection

{{-- ciclo gli array in modo da poter usare le singole chiavi --}}
@foreach ($products as $product) @endforeach
@foreach ($users as $user) @endforeach

@section('contents')
<div class="d-flex flex-column align-items-center">
    <section class="users">
        <span class="fs-2">Utenti Registrati:</span>
        <span class="fs-2">{{$users -> count()}}</span>
    </section >
    <section class="products">
        <span class="fs-2">Prodotti inseriti:</span>
        <span class="fs-2">{{$products -> count()}}</span>
    </section>
    <section class="products-discount">
        <span class="fs-2">Prodotti in sconto:</span>
        <span class="fs-2">{{$discounts -> count() }}</span>
        <span>{{$products -> count()}}</span>
    </section>
</div>

@endsection