<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{url('/css/index2.css')}}" />
    <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">
    <script src="{{ url(mix('js/app.js')) }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
    <title>Laravel shop</title>
</head>
<body>
    <header>

        @component('components.basic.header', ($navigationItems ? compact('navigationItems') : []))

        @endcomponent
    </header>
    <main>  
        @if(!isset($view)) 
        @php
            $view = 'content';
         @endphp
        @endif
        <div id='content'>
            @component('components.basic.sidebar', ($categories ? compact('categories') : []))
            @endcomponent
            
            
            @component('components.page.'.$view, ($renderContentData ? compact($renderContentData) : []))
            @endcomponent
        </div>
    </main>
    <x-flash-message />
    <x-footer />

</body>
</html>


<script>
    $(() => {
        var $myDiv = $('#messageBox');

            if ( $myDiv.length){
                setTimeout(() => {
                    $('#messageBox').remove();
                }, 2000);
            }

            
        let menuBtn = $('#mobile_menu');

        menuBtn.on('click', () => {
            alert('soon');
        })
        })


                
</script>