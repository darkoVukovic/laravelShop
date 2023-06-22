
<nav>
    <div>Laravel Shop</div>
    <ul>
        @unless(count($navigation) == 0)
        @foreach($navigation as $nav) 
        @php
        $urlName = str_replace(' ', '-', $nav->name);
        @endphp
            <li><a href={{url($urlName)}}>{{$nav->name}}</a></li>
        @endforeach
        <p>Cart</p>
        @else
            <p>no nav</p>
        @endunless
    </ul>
</nav>


