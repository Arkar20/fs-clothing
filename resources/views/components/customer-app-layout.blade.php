<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">

                </script> 
    @livewireStyles
 <x-livewire-alert::scripts />


    <style>
           [x-cloak=""] { display: none; }
    </style>
    <title>FS CLOTHING</title>
</head>
<body>
    
    @include('customer.layouts.navbar')
    <div>
        {{$slot}}
    </div>
       <x-shopping-cart-modal />

    @include('customer.layouts.footer')

</body>
@livewireScripts
</html>
