<x-admin-layout>
    <ul class="w-full steps">
        <li class="step step-primary">Product Showroom</li> 
        <li class="step step-primary">Add To Cart</li> 
        <li class="step">Purchase</li> 
    </ul>
   <div class="mt-10 flex justify-between space-x-4 ">
       <livewire:item.items />
       
       <livewire:item.item-single />
       {{-- modal  --}}

</x-admin-layout>