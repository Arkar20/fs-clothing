
  <div class="container mx-auto   ">
  <div class="  bg-white rounded shadow-xl px-10 my-10"> 
    <p class="font-semibold text-2xl mt-10 mb-5">Supplier information</p>
     <div class=" ">
  <select wire:model='supplier' class="border w-full border-gray-300 rounded-full text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
    <option>Choose Supplier</option>
    @foreach (App\Models\Supplier::all() as $supplier )
         <option value="{{$supplier->id}}">{{$supplier->name}} From {{$supplier->company_name}}</option>
    @endforeach
  </select>
  <span class="text-xs font-bold text-center">Have not Registered Your Supplier?<a href="/supplier" class="text-red-500">Click Here To Register New Supplier!</a></span>

</div>
@if($this->supplierprofile)
  <x-supplier-information-form :supplierprofile="$supplierprofile"/>
   <div class="mt-4 ">
      <button
         wire:click='purchase'
      class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Purchase</button>
    </div>
@endif
</div>