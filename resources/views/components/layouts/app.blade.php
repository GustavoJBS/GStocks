<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>GStocks</title>

        @wireUiScripts
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-[Roboto] font-medium w-screen h-screen">
        <div 
            class="flex bg-slate-100" 
            x-data="{ sideBarOpen: false }"  
            x-cloak
        >
            <x-sidebar />

            {{ $slot }}
        </div>
    </body>
</html>
