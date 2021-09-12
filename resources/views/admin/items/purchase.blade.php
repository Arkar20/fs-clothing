<x-admin-layout>
   <ul class="w-full steps">
        <li class="step step-primary">Product Showroom</li> 
        <li class="step step-primary">Add To Cart</li> 
        <li class="step step-primary">Purchase</li> 
    </ul>
  <div x-data="{shoppingcart:true}">
    <livewire:item.shopping-cart />
  </div>
  
<livewire:item.checkoutsupplierform />

</x-admin-layout>