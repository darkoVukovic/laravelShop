<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1" />
    
    <link rel="stylesheet" href="<?= asset('/css/index.css');?>" />
    <title>Laravel shop</title>
</head>
<body>
    <header>
        @include('partials._header')
    </header>

    <main>
        @if(!isset($view)) 
        @php
            $view = 'main';
         @endphp
        @endif
        @include('partials._'.$view)
    </main>

    <footer>
        @include('partials._footer')
    </footer>
</body>
</html>