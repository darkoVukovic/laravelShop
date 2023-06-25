@if(session()->has('message')) 
<div class="absolute top-0 left-1/2 transform -translate-x-1/2 bg-steelblue text-black px-48 py-3" id="messageBox">
    <p>
            {{session('message')}}
        </p>
    </div>
@endif