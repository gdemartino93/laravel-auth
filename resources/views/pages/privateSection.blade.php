@extends('layouts.main-layout')

@section('title')
<title>Offerte</title>
@endsection
@section('contents')
    <h1> sezione privata per gli utenti registrati</h1>
    <div class="wrapper container">
        @foreach ($products as $product)
            @include('components.product')
        @endforeach
    </div>
@endsection
</div>