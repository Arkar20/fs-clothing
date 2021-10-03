<div class="shadow-lg bg-neutral text-neutral-content">

<div 
x-init
x-data="{profile:false}"
class=" navbar  mx-4 md:mx-10  relative">
  <div class="py-2  navbar-start">
    <p class="text-lg font-bold">
           FS 
           
         <span class="text-purple-500">CLOTHING</span>
          </p>
  </div> 
  <div class="hidden p-2 navbar-center lg:flex">
    <div class="flex items-stretch">
      <a class="btn btn-ghost btn-sm rounded-btn" href="/">
              Home
            </a> 
      <a class="btn btn-ghost btn-sm rounded-btn" href="{{route('home.shop')}}">
             SHOPS
            </a> 
      <a class="btn btn-ghost btn-sm rounded-btn">
              About
            </a> 
      <a class="btn btn-ghost btn-sm rounded-btn">
              Contact
            </a>
    </div>
  </div> 
  <div class="navbar-end ">
    <button class="btn btn-square btn-ghost">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-6 h-6 stroke-current">     
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>                     
      </svg>
    </button> 
    <button class="btn btn-square btn-ghost">
                     <livewire:item.cart-icon />

    </button>
    {{-- profile page  --}}
    <div 
    @click="profile=!profile"
    @click.away="profile=false"
    class="avatar placeholder ml-4 cursor-pointer relative">
      <div class="bg-neutral-focus text-neutral-content rounded-full w-10 h-10">
        <span>A</span>
      </div>
  
</div>
  </div>
      
  <ul 
  x-show="profile"
  class="menu absolute text-gray-500 py-3 shadow-lg bg-base-100 rounded-box top-16 right-0">
   @auth('customer')
   <form action="{{route('customer.logout')}}" method="POST">
    @csrf
    <li class="text-red-400 ">
      <button type="submit" class="flex  space-x-4">
        <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
       </svg>
          <p>Logout</p>
     </button>
    </li> 
    </form>
 
    <li>
      <a href="{{route('customer.profile',auth()->guard('customer')->id())}}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 mr-2 stroke-current">        
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path> 
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>                 
        </svg>
           Profile
          
      </a>
    </li> 
    <li>
      <a>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-5 h-5 mr-2 stroke-current">          
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>                
        </svg>
            Item with icon
            
        <div class="badge ml-2 success">3</div>
      </a>
    </li>
    @endif
  </ul>
</div>
</div>
