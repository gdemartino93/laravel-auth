<a href="{{route('singleProduct',$product)}}" class="col-12 col-md-4 col-lg-2 d-flex flex-column myCard">
    <div >
        <div class="img">
            <img class="img-fluid" src={{$product -> img}} alt="" >
        </div>
        <h4>{{$product -> name}}</h4>
        <p>{{$product -> description}}</p>
        {{-- funzione per arrotondare cifre decimali a 2 --}}
        <span>{{round($product -> price, 2)}}&euro;</span>
        {{-- operatore terniario per sostituire 1 e 0 di ritorno dal booleano --}}
        <span>{{$product -> discount ? 'Sconto' : 'Non scontato'}}</span>
    </div>
</a>
