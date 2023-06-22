<div class='mainImageDiv'>
   <img src="<?= asset('/images/mainImages/'.$mainImages[0]->imageName);?>" alt="main image">
</div>
<h2 style="text-align: center; margin: 20px 0;">Choose some of our brands </h2>

<div class='brandsDiv'>
   @include('partials._allBrands')
</div>
<h2 style='text-align:center;margin:10px 0'> Choose one of our most popular products</h2>

<div class='productsDiv'>
   <button class='leftSlide'>left</button>
   <button class='rightSlide'>Right</button>
   @include('partials._popularProducts')

</div>
