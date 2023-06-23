<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    <link rel="stylesheet" href="{{url('/css/index2.css')}}" />
    <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">
    <script src="{{ url(mix('js/app.js')) }}"></script>
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
</body>
</html>