<div id='login'>
    <form method="POST" action="{{url('/users/authenticate')}}">
        @csrf
        <label for="email">email</label>
        <input type="email"  name='email' value="{{old('email')}}">
        @error('email')
        <p>{{$message}}</p>

        @enderror
        <label for="password">sifra</label>
        <input type="password"  name='password' value="{{old('password')}}">
        @error('password')
        <p>{{$message}}</p>

        @enderror


        <button>login</button>
    </form>
    <p>Nemas nalog ?<a href="{{url('register')}}"> register</a></p>
</div>