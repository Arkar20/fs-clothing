<div>

  {{-- delivery form  --}}
     <div class="container mx-auto mt-10  py-3  ">
  <div class="overflow-x-auto shadow-xl border-1 border-gray-200 px-10  my-3"> 
    <p class="font-semibold text-2xl mt-10 mb-5">Fill Delivery Information</p>
    <form class="w-full flex-col space-y-4">
             <x-text-field label="Address" model='address'   />
            <x-text-area 
                placeholder="Say saysomething about the order if you wish..." 
                model='note'  />



    </form>
  </div>
  </div>
  {{-- end of delivery form  --}}


  {{-- start of payment form  --}}
     <div class="container mx-auto  my-3 py-3  ">
  <div class="overflow-x-auto shadow-xl border-1 border-gray-200 px-10"> 
    <p class="font-semibold text-2xl mt-10 mb-5">Credit Card</p>
    <form class="w-full flex-col space-y-4 my-4">
             <x-text-field label="Enter Your Credit Card" model='card'   />
           
      <button class="btn btn-primary" wire:click.prevent="orderConfirm">Confirm Order</button>

    </form>
  </div>
  </div>
  {{-- end of payment form  --}}
</div>
