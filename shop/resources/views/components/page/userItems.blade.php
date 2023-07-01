<p>User: {{auth()->user()->name}}</p>
<div style='width:calc(100% - 400px)'>
    <div id='items'>
        @foreach ($items as $item)
            <div style='margin: 10px' class='itemDiv' itemId="{{$item->id_shopItem}}">
                    <div style='height:50%;margin-top:20px'>
                        <a href="{{url('/product/'.$item->id_shopItem. '/'. $item->product_name)}}">
                        <img src="{{ asset(config('constants.IMAGE_BASE_PATH')) . '/'. $item->imagePath}}" alt="Item Image">
                    </div>
                    <div>
                        <h3>naziv:{{$item->product_name}}</h3>    
                        <p>opis:{{$item->about}}</p>    
                        <p>cena: {{$item->price}} RSD</p>    
                    </a>
                    </div>

                @php
                $categoriesNames = explode(',', $item->category_names);
                $categoriesId =  explode(',', $item->category_id);

                $baseUrl = url('/');
                @endphp
                    <div style='display:flex;justify-content:space-around'>
                @for($i = 0; $i < min(count($categoriesNames), 3); $i++)
                        <div  style='padding:10px;border:1px solid #333;'>
                          <a href={{url('/?category='.trim($categoriesNames[$i]))}}>{{$categoriesNames[$i]}}</a>
                        </div>
                @endfor
     
                    </div>
                    @auth
                    <a href="{{ url('/product/' . $item->id_shopItem . '/edit') }}">Edit</a>
                         <form method="POST" action="{{url('product/'. $item->id_shopItem)}}">
                             @csrf
                             @method('DELETE')
                            <button class="text-red-500"><i class="fa-solid fa-trash">delete</i></button>
                         </form>
                 
                 @endauth
            </div> 
      
        @endforeach
        
    </div>
    <div class="mt-6 p-4 ">
        {{$items->links()}}
    </div>

</div>

    
