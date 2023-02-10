@extends('layouts.main-layout')

@section('title')
    <title> {{$product -> name}}    </title>
@endsection

@section('contents')
<div class="container d-flex justify-content-center">
        <div class="col-12 col-md-12 col-lg-12 d-flex flex-column myCard" >
            <div class="img-single align-self-center col-2">
                <img class="img-fluid" src={{$product -> img}} alt="" >
            </div>
            <h4>{{$product -> name}}</h4>
            <p>{{$product -> description}}</p>
            {{-- funzione per arrotondare cifre decimali a 2 --}}
            <span>{{round($product -> price, 2)}}&euro;</span>
            {{-- operatore terniario per sostituire 1 e 0 di ritorno dal booleano --}}
            <span>{{$product -> discount ? 'Sconto' : 'Non scontato'}}</span>
        </div>
</div>

@endsection