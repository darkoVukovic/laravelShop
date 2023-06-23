<p>Brand {{$brandName}}</p>

<div>

@foreach($brandProducts as $product) 
        @php 
        $urlProductName = str_replace(' ', '-', $product->name);
        $urlBrandName = str_replace(' ', '-', $brandName);
        
        @endphp
    <a href="<?= url("brand/".$brandName."/".$urlProductName)?>">{{$product->name}}</a>
    <img src={} alt="">
@endforeach

</div>
