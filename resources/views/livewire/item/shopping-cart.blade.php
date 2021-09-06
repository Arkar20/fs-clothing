{{-- shopping cart  --}}
       <div
       x-show="shoppingcart"
       class="container mx-auto mt-10">
    <div class="flex shadow-md mt-10 mb-4">
      <div class="w-full bg-white px-10 ">
        <div class="flex justify-between ">
          <h1 class="font-semibold text-2xl">Shopping Cart</h1>
          <h2 class="font-semibold text-2xl">{{$cartcount}} Items</h2>
        </div>
        <div class="flex mt-10 mb-5">
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-2/5">Product Name</h3>
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Quantity</h3>
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Price</h3>
          <h3 class="font-semibold text-gray-600 text-xs uppercase w-1/5 text-center">Total</h3>
        </div>
        @forelse($cartitems as $key=>$cart)
        <div class="flex items-center hover:bg-gray-100 -mx-8 px-6 py-5">
          <div class="flex w-2/5"> <!-- product -->
            {{-- <div class="w-20">
              <img class="h-24" src="https://drive.google.com/uc?id=18KkAVkGFvaGNqPy2DIvTqmUH_nk39o3z" alt="">
            </div> --}}
            <div class="flex flex-col justify-between ml-4 flex-grow">
              <span class="font-bold text-sm">{{$cart->name}}</span>
                 <span class="text-purple-500 text-xs">{{$cart->options['size']}}|{{$cart->options['color']}}</span>
              <button
                wire:click.prevent="removefromcart('{{$key}}')"
              class="font-semibold hover:text-red-500 text-gray-500 text-xs">Remove</button>
            </div>
          </div>


          <div class="flex justify-center w-1/5">
            <svg 
            wire:click="decreaseCart('{{$key}}')"
            class="fill-current text-gray-600 w-3 cursor-pointer" viewBox="0 0 448 512"><path d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
            </svg>

            <input class="mx-auto border text-center w-14 " disabled type="text" value="{{$cart->qty}}">

            <svg
                wire:click="increaseCart('{{$key}}')"
                class="fill-current text-gray-600 w-3 cursor-pointer" viewBox="0 0 448 512">
              <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"/>
            </svg>
          </div>
          <span class="text-center w-1/5 font-semibold text-sm">${{$cart->price}}</span>
          <span class="text-center w-1/5 font-semibold text-sm">${{$cart->total()}}</span>
        </div>
        @empty
        <p>No Items In the Cart.</p>
        @endforelse

       
        <div class="flex justify-between items-center">
            <a href="#" class="flex font-semibold text-indigo-600 text-sm mt-10">
          
              <svg class="fill-current mr-2 text-indigo-600 w-4" viewBox="0 0 448 512"><path d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"/></svg>
              Continue Shopping
            </a>
            <div>
                <button 
                
                wire:click.prevent='clearcart'
                class="btn">Clear Cart</button>
            </div>
        </div>
      </div>


    </div>
  </div>
        {{-- shopping cart  --}}