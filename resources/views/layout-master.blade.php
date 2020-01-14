<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>
            @isset($title)
                - {{ $title }}
            @endisset()  
        </title>
        <meta name="author" content="AppDev" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

       @yield('css')
    </head>

    <body class="@yield('body-class')"> 
        
        @yield('content') 

        @yield('js') 
    
    </body>
</html>