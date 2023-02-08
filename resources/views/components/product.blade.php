<div class="col-12 col-md-4 col-lg-2 d-flex flex-column myCard">
    <div class="img">
        <img src={{$product -> img}} alt="">
    </div>
    <h4>{{$product -> name}}</h4>
    <p>{{$product -> description}}</p>
    <span>{{($product -> price)}}</span>
    <span>{{$product -> discount ? 'Sconto' : 'Non scontato'}}</span>
    
</div>