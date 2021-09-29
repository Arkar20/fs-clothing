{{-- shopping cart  --}}
    <div
       x-show="shoppingcart"
     
     
       class="container mx-auto mt-10">
     <div class="flex shadow-md mt-10 mb-4">
      <div class="w-full bg-white px-10 ">
       
        <x-shoppingcart-table :data="$cartitems" :cartcount="$cartcount"/>

       
        <div class="flex justify-end items-center my-3">
        
            <div>
                <button 
                
                wire:click.prevent='clearcart'
                class="btn btn-sm">Clear Cart</button>
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