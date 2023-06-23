<h2>welcome to Shop page ;)</h2>
<div class='shopProducts'>
@foreach($products as $product)
   <a href="123">
      <div>
         <p>{{$product->name}}</p>
         <img src={{$product->imagePath}} alt="">
      </div>
      <button class='addToCartBtn'>dodaj u kantu</button>
   </a>
@endforeach
</div>
