
<div style='width: 400px;margin: 40px auto'>
    <form action="{{url('product')}}" method="POST" enctype="multipart/form-data" id='createItemForm'>
        @csrf
        <input type="FILE" name='image'>
        <label for="name">Naziv</label>
        <input type="text" name='name' value={{old('name')}}>
        @error('name')
        <p>{{$message}}</p>
        @enderror
        <label for="about">opis</label>
        <input type="text" name='about' value={{old('about')}}>
        @error('about')
        <p>{{$message}}</p>
        @enderror
        <label for="price">cena</label>
        <input type="number" name='price' value={{old('price')}}>
        @error('price')
        <p>{{$message}}</p>
        @enderror
        <label for="categories[]">izabrati kojoj kategoriji pripada(ctr levi klik za multi select)</label>
        <select multiple name="categories[]">
            @foreach($categories as $category)
            <option value="{{ $category->id_shopCategory }}" {{ in_array($category->id_shopCategory, old('categories', [])) ? 'selected' : '' }}>
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