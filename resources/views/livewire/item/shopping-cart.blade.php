{{-- shopping cart  --}}
    <div
       x-show="shoppingcart"
     
     
       class="container mx-auto mt-10">
     <div class="flex shadow-md mt-10 mb-4">
      <div class="w-full bg-white px-10 ">
       
        <x-shoppingcart-table :data="$cartitems" :cartcount="$cartcount"/>

       
        <div class="flex justify-between items-center">
            <a href="{{route('item.showroom')}}" class="flex font-semibold text-indigo-600 text-sm mt-10">
          
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

    <x-order-detail-card 
    :totalAmount="\Cart::total()"
    :tax="\Cart::tax()"
    :subtotal="\Cart::subtotal()"
  />

  </div>
        {{-- shopping cart  --}}