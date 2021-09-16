 {{-- start of nav --}}
 <div>
<div 
    x-cloak
    x-show="drawer" 
    class="z-10 fixed top-18 right-0 bg-black opacity-40 w-screen max-h-100 "></div>

    <ul 
    @click.away="drawer=false"
    x-show.transtion.duration-400ms="drawer"
    x-transition.duration:enter="ease-out duration-300"
    x-transition.duration:enter-start="opacity-0 -translate-x-full sm:scale-100"
    x-transition.duration:enter-end="opacity-100 translate-x-0 sm:scale-100"
    x-transition.duration:leave="ease-out duration-200"
    x-transition.duration:leave-start="opacity-100 translate-x-0 sm:scale-100"
    x-transition.duration:leave-end="opacity-0 -translate-x-full sm:scale-100"
    class="absolute  w-64 h-full transform   z-20 overflow-auto transition-all duration-300  bg-white text-base-content  border border-1 ">
      
   
    <li class="mx-10 my-3 flex justify-center cursor-pointer">
        
       <a  href="{{route('admin.dashboard')}}" class="w-96 text-center text-gray-600 py-4 px-4 hover:bg-purple-500 hover:text-white rounded-3xl flex justify-center">
           
             <span class="text-left">Dashboard</span>
        </a>
    </li>
    <li class="mx-10 my-3 flex justify-center cursor-pointer">
        
        <a  href="{{route('admin.brand')}}" class="w-96 text-center text-gray-600 py-4 px-4 hover:bg-purple-500 hover:text-white rounded-3xl flex justify-center">
           
             <span class="text-left">Brand</span>
        </a>
    </li>
    <li class="mx-10 my-3 flex justify-center cursor-pointer">
        
        <a  href="{{route('admin.size')}}" class="w-96 text-center text-gray-600 py-4 px-4 hover:bg-purple-500 hover:text-white rounded-3xl flex justify-center">
           
             <span class="text-left">Size</span>
        </a>
    </li>

    {{-- product showroom  --}}
    <li class="mx-10 my-3 flex justify-center cursor-pointer">
        
        <a  href="{{route('item.showroom')}}" class="w-96 text-center text-gray-600 py-4 px-4 hover:bg-purple-500 hover:text-white rounded-3xl flex justify-center">
           
             <span class="text-left">Showroom</span>
        </a>
    </li>
    {{-- product showroom --}}
    
    {{-- product register  --}}
    <li class="mx-10 my-3 flex justify-center cursor-pointer">
        
        <a  href="{{route('item.register')}}" class="w-96 text-center text-gray-600 py-4 px-4 hover:bg-purple-500 hover:text-white rounded-3xl flex justify-center">
           
             <span class="text-left">Register Product</span>
        </a>
    </li>
    {{-- product register --}}


    <li class="mx-10 my-3 flex justify-center cursor-pointer">
        <a href="{{route('admin.category')}}" class="w-96 text-center text-gray-600 py-4 px-4 hover:bg-purple-500 hover:text-white rounded-3xl flex justify-center">
           
             <span class="text-left">Category</span>
        </a>
    </li>
    <li class="mx-10 my-3 flex justify-center cursor-pointer">
        <a href="{{route('admin.color')}}" class="w-96 text-center text-gray-600 py-4 px-4 hover:bg-purple-500 hover:text-white rounded-3xl flex justify-center">
           
             <span class="text-left">Color</span>
        </a>
    </li>
    <li class="mx-10 my-3 flex justify-center cursor-pointer">
        <a href="{{route('admin.supplier')}}" class="w-96 text-center text-gray-600 py-4 px-4 hover:bg-purple-500 hover:text-white rounded-3xl flex justify-center">
           
             <span class="text-left">Supplier</span>
        </a>
    </li>
    <li class="mx-10 my-3 flex justify-center cursor-pointer">
        <a href="{{route('items.purchase')}}" class="w-96 text-center text-gray-600 py-4 px-4 hover:bg-purple-500 hover:text-white rounded-3xl flex justify-center">
           
             <span class="text-left">Purchase</span>
        </a>
    </li>

      
    </ul>
     </div>
    </div>
    {{-- end of nav --}}