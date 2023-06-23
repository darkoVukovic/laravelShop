    @foreach($products as $product)
           @php 
           $urlProductName = str_replace(' ', '-', $product->name);
           @endphp
           <a href="<?= url("brand/".$product->bName."/".$urlProductName)?>"">
            <div>
            {{$product->name}}
             </div>
        </a>
        @endforeach
    
<!--
    jquery :(
        <script>
            let leftSlide =   document.querySelector(".leftSlide"); 
            let rightSlide =   document.querySelector(".rightSlide"); 
            
            let divs = document.querySelector('.productsDiv div');
            leftSlide.onclick  = function() {
                divs.style.marginLeft += '-400px';
            }

            rightSlide.onclick  = function() {
                divs.style.marginLeft += '+400px';
            }
        </script>

    -->