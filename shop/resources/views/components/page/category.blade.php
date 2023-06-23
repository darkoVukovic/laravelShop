<div style='width:100%'>
    <div>
        <h2>Category</h2>
        <h2>{{$category->name}}</h2>
        <p>products</p>
    
    </div>
    <div class='category_{{$category->id_shopCategory}}' id='items'>
        @foreach($categoryProducts as $product) 
            <div class='product' id='{{$product->id}}' style='border:1px solid #333'>
                <div style='height: 75%'>
                    <a href="{{url('/product/'.$product->id_shopItem. '/'. $product->item_name)}}">

                    <img src="{{ asset(config('constants.IMAGE_BASE_PATH')) . '/'. $product->imagePath}}" alt="Item Image">
                </div>
                <div>
                    <h3>naziv: {{$product->item_name}}</h3>
                    <h3>opis: {{$product->about}}</h3>
                    <h3>cena: {{$product->price}}</h3>
                </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
