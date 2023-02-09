@extends('layouts.main-layout')

@section('title')
    <title>Aggiungi prodotto</title>
@endsection

@section('contents')
    <div class="container col-12 my-5">
        <div class="col-6 mx-auto ">
            @if ($errors ->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors -> all() as $error)
                            <li> {{$error}} </li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('product.store')}}" method="POST" class="d-flex flex-column justify-content-center align-items-center">
                @csrf
                <label for="name">Name</label>
                <input type="text" name="name">
                <label for="description">Description</label>
                <input type="text" name="description">
                <label for="price">Price</label>
                <input type="number" name="price">
                <label for="img">Img Link</label>
                <input type="text" name="img">
                {{-- <div class="d-flex gap-5 "> --}}
                    <label for="discount">Discount:</label>
                    <input type="checkbox" name="discount" id="">    
                {{-- </div> --}}
                <button type="submit" class=" col-2 btn btn-success my-3">Add</button>
            </form>
        </div>
    </div>

@endsection