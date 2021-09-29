<x-customer-app-layout>
    <ul class="w-full steps">
        <li class="step step-primary">Product Showroom</li> 
        <li class="step step-primary">Add To Cart</li> 
        <li class="step step-primary">Checkout</li> 
    </ul>
  <div x-data="{shoppingcart:true}">
    <livewire:item.shopping-cart />
  </div>
  <livewire:customer.deliver-checkout-form />
{{-- <livewire:item.checkoutsupplierform /> --}}
</x-customer-app-layout>