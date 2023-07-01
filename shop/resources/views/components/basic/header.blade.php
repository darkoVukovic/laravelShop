<div>
    LaravelShop
</div>
<ul>
    <form action="{{url('/')}}" method="GET">
        <input type="text" name='search' placeholder="Search here">
    </form>
   @foreach($navigationItems as $navigationItem) 
        <li><a href="{{url('/')}}">{{$navigationItem->name}}</a></li>
   @endforeach
</ul>


<div id='mobile_menu'>
        <button>Menu</button>
</div>
<ul id='user_details'>
    @auth
    <span>dobrodosao {{auth()->user()->name}} |</span>
    <a href="{{url('products/manage')}}">Tvoji itemi | </a>
    <a href="{{url('product/create')}}">postavi item | </a>
    <a href="{{url('?user='.auth()->id())}}">prateci itemi | </a>

    <form method="POST" action="{{url('logout')}}">
        @csrf
        <button type="submit">logout</button>
    </form>

    @else
    <a href="{{url('login')}}">login</a>
    <a href="{{url('register')}}">register</a>
    @endauth
</ul>