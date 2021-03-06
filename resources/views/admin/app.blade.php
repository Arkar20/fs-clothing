<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Fs Clothing</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">

                </script> 
    @livewireStyles

    <style>
           [x-cloak=""] { display: none; }
    </style>
</head>



<x-livewire-alert::scripts />




<body  
    x-data="{drawer:false}"
     x-init=" 
     drawer=false
                @if(session()->has('productRegistered'))
                Swal.fire({
                        icon: 'success',
                        title: '{{session()->get('productRegistered')}}',
                        })
                @endif

                @if(session()->has('purchased'))
                Swal.fire({
                        icon: 'success',
                        title: '{{session()->get('purchased')}}',
                        })
                @endif
                
               

            
                @if(session()->has('itemdeleted'))
                    Swal.fire({
                        icon: 'error',
                        title: '{{session()->get('itemdeleted')}}',
                        })
                @endif
                "
    
class="position-relative">
    

    {{-- app bar --}}

    <div class="flex justify-between px-3 md:py-2 shadow-sm bg-white">
        <div class="logo-section flex justify-center space-x-3 items-center">
            <div class="menu align-bottom">
                    
                <button class="" @click="drawer=!drawer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                    </svg>
                </button>
            
            </div>
                <div class="logo">
                    <h1 class="text-md md:text-2xl text-gray-400 uppercase">F</h1>
                </div>
        </div>
        <div class="flex-none">
          
            <div
           
            class="flex items-center space-x-4">
               <livewire:item.cart-icon />
                 <div class="dropdown dropdown-end">
                    <div tabindex="0" >
                <img src="https://avataaars.io/?avatarStyle=Circle&topType=ShortHairTheCaesarSidePart&accessoriesType=Sunglasses&hairColor=BrownDark&facialHairType=BeardMajestic&facialHairColor=BrownDark&clotheType=ShirtScoopNeck&clotheColor=Gray01&eyeType=Side&eyebrowType=RaisedExcited&mouthType=Twinkle&skinColor=Light" 
                class="md:w-12 md:h-12 w-10 h-10 rounded-full cursor-pointer"/>
                    </div> 
                    <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
                        @auth
                        <li>
                         <a href="{{route('admin.profile',auth()->id())}}">Profile</a>
                        </li> 
                        <li class="text-red-600 focus:bg-red-600 focus:text-white">
                             <form action="{{route('logout')}}" method="post">
                                @csrf
                                    <button type="submit" >Log out</button>
                                 
                             </form>
                        </li> 
                        @endauth

                        @if(!auth()->check())
                        
                        <li class=" focus:text-white">
                              <a href="{{route('login')}}">Login</a>
                        </li> 
                        
                        @endif
                       
                    </ul>
                    </div>
               
            </div>
        </div>
    </div>
    {{-- end of app bar --}}
@auth
{{-- start of navigation --}}
    @include('admin.navbar')
{{-- end of navigation --}}
@endauth

<main >
    {{ $slot ?? '' }}
</main>
@auth
    
   <x-shopping-cart-modal />
   
@endauth

       
   </div>

    @livewireScripts

@livewireChartsScripts


</body>

</html>