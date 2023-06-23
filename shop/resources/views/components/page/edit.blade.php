<div>
<?php 
        $currentCategories = explode(',', $item->category_id);
    ?>
    <h1>Edit item</h1>
    <form action="{{url('product/' . $item->id_shopItem)}}" method="POST" enctype="multipart/form-data" class='editForm'>
        @csrf
        @method('PUT')
        <label for="image">upload sliku</label>
        <input type="FILE" name='image'>
        <img src="{{ asset(config('constants.IMAGE_BASE_PATH')) . '/'. $item->imagePath}}" alt="Item Image">

        <label for="name">Naziv</label>
        <input type="text" name='name' value={{$item->product_name}}>
        @error('name')
        <p>{{$message}}</p>
        @enderror
        <label for="about">opis</label>
        <input type="text" name='about' value={{$item->about}}>
        @error('about')
        <p>{{$message}}</p>
        @enderror
        <label for="price">cena</label>
        <input type="number" name='price' value={{$item->price}}>
        @error('price')
        <p>{{$message}}</p>
        @enderror
        <label for="categories[]">izabrati kojoj kategoriji pripada(ctr levi klik za multi select)</label>
        <select multiple name="categories[]">
            
            @foreach($categories as $category)
            <option value="{{ $category->id_shopCategory }}" {{ in_array($category->id_shopCategory, $currentCategories) ? 'selected' : '' }}>
                {{ $category->name }}
                @error('image')
                    <p>{{$message}}</p>
                @enderror
            @endforeach
        </select>
        @error('categories')
        <p>{{$message}}</p>
        @enderror
        <button>Snimi</button>
    </form>
</div>