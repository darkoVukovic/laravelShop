<div style='width:calc(100% - 400px);display:flex;justify-content:space-around'>
    <div>
        <div style='margin: 20px' class='items' itemId='{{$item->id_shopItem}}'>
            <div>
                <img src="{{ asset(config('constants.IMAGE_BASE_PATH')) . '/'. $item->imagePath}}" alt="Item Image">
                <h3>Item:{{$item->product_name}}</h3>
                <p>opis: {{$item->about}}</p>
                <p>Cena: {{$item->price}}</p>
            </div>
        </div>
        <div style='text-align:center'>
                <button id='followItemBtn'>prati</button>
                @auth

                <?php if($seller->id == auth()->id()) { 
                   ?> <a href="{{ url('/product/' . $item->id_shopItem . '/edit') }}">Edit</a>
                        <form method="POST" action="{{url('product/'. $item->id_shopItem)}}">
                            @csrf
                            @method('DELETE')
                           <button class="text-red-500"><i class="fa-solid fa-trash">delete</i></button>
                        </form>
                <?php }
                ?>
           
                @endauth
        </div>
    </div>
    <div style='margin: 20px'>

        <h3>prodavac: {{$seller->name}} </h3>
        <p>ocena: </p>
        <p>Kontakt prodavca: {{$seller->phone_number}}</p>
    </div>
</div>
    
<script src="{{ url('js/index.js') }}"></script>
