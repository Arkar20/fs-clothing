<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">

                </script> 
    @livewireStyles

    <style>
           [x-cloak=""] { display: none; }
    </style>
</head>
                    <x-livewire-alert::scripts />
<body  x-data="{drawer:false}" class="position-relative">
           {{-- app bar --}}

    <div class="flex justify-between px-3 md:py-2 shadow-sm bg-white">
        <div class="logo-section flex justify-center space-x-3 items-center">
                <div class="menu align-bottom">
                <button class="" @click="drawer=!drawer">
                <img src="{{ asset('assets/menu.svg')}} "/>
            </button>
                </div>
                <div class="logo">
                    <h1 class="text-md md:text-2xl text-gray-400 uppercase">FS CLothing Admin Panel</h1>
                </div>
        </div>
        <div class="rounded-full md:w-14 md:h-14 w-10 h-10 bg-red-300">
            <img src="https://images.unsplash.com/photo-1598226863630-2826f1d31532?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1yZWxhdGVkfDR8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60" class="rounded-full h-full w-full"/>
        </div>
    </div>
    {{-- end of app bar --}}

    {{-- start of navigation --}}
        @include('admin.navbar')
    {{-- end of navigation --}}

<main class="mt-14">
    {{ $slot ?? '' }}
</main>


    

    @livewireScripts


</body>
</html>