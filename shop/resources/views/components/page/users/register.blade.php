<div id='register'>
    <form method="POST" action="{{url('users')}}">
        @csrf
        <label for="name">ime</label>
        <input type="text"  name='name' value={{old('name')}}>
        @error('name')
        <p>{{$message}}</p>

        @enderror
        <label for="email">email</label>
        <input type="email"  name='email' value={{old('email')}}>
        @error('email')
        <p>{{$message}}</p>

        @enderror
        <label for="password">sifra</label>
        <input type="password"  name='password' value={{old('password')}}>

        @error('password')
        <p>{{$message}}</p>

        @enderror
        <label for="password_confirm">potvrdi sifru</label>
        <input type="password"  name='password_confirmation' value={{old('password_confirmation')}}>
        @error('cpassword')
        <p>{{$message}}</p>
        @enderror

        <label for="phone_number">phone number</label>
        <input type="number"  name='phone_number' value={{old('phone_number')}}>

        @error('phone_number')
        <p>{{$message}}</p>

        @enderror


        <button>register</button>
    </form>
    <p>vec imas nalog?<a href="{{url('login')}}"> login</a></p>
</div>