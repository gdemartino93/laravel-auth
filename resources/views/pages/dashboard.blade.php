@extends('layouts.main-layout')

@section('title')
    <title>Dashboard</title>
@endsection

{{-- ciclo gli array in modo da poter usare le singole chiavi --}}
@foreach ($products as $product) @endforeach
@foreach ($users as $user) @endforeach

@section('contents')
<section class="d-flex flex-column align-items-center container">
    <div class="users">
        <span class="fs-2">Utenti Registrati:</span>
        <span class="fs-2">{{$users -> count()}}</span>
    </div >
    <div class="products">
        <span class="fs-2">Prodotti inseriti:</span>
        <span class="fs-2">{{$products -> count()}}</span>
    </div>
    <div class="products-discount">
        <span class="fs-2">Prodotti in sconto:</span>
        <span class="fs-2">{{$discounts -> count() }}</span>
    </div>
    <div>
        <span class="fs-2">Totale prezzo dei prodotti in vendita:</span>
        <span class="fs-2 text-success">{{round($prices , 2)}} &euro;</span>
    </div>
    <section class="cmd-btn col-6 my-3 d-flex align-items-center ">
        <a href="{{route('createNew')}}">
            <button class="btn btn-success">Aggiungi nuovo prodotto</button>
        </a>
            
    </section>

</section>

@endsection