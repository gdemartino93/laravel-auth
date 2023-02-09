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
    <section class="cmd-btn col-10 my-3 d-flex align-items-center flex-column">
        <a href="{{route('createNew')}}" class="mb-5">
            <button class="btn btn-success">Aggiungi nuovo prodotto</button>
        </a>   
        <table class="table">
            <thead>
              <tr>
                <th scope="col">id</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">IMG</th>
                <th scope="col">Discount</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{$product -> id}}</th>
                    <td>{{$product -> name}}</td>
                    <td>{{$product -> description}}</td>
                    <td>{{round($product -> price, 2) }}&euro;</td>
                    <td>{{($product -> img) ? 'Yes' : 'No'}}</td>
                    <td>{{$product -> discount ? 'Yes' : 'No'}}</td>
                    <td>
                        <a href="{{route('product.delete',$product)}}">
                            <i class="fa-solid fa-trash"></i>
                        </a>
                        <a href="{{route('product.redirectedit',$product)}}">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                    </td>
                  </tr>
                @endforeach

            </tbody>
          </table>
    </section>
    
</section>

@endsection