<aside>
<h2 style='text-align:center'>Categories</h2>
  <div style='display:flex;flex-flow:column;justify-content:space-between;align-items:center;margin:10px 0;'>
      @foreach($categories as $category)
        <a href={{url('/?category='.$category->name)}}>{{$category->name}}</a>
      @endforeach
  </div>
  
</aside>




