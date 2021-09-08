
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
<div class="">
      <label class="block text-sm text-gray-00" for="cus_name">Name</label>
      <input class="w-full px-5 py-1 text-gray-700 bg-gray-100 rounded" disabled id="cus_name" name="cus_name" type="text" value="{{$supplierprofile->name}}">
    </div>
    <div class="mt-2">
      <label class="block text-sm text-gray-600" for="cus_email">Email</label>
      <input class="w-full px-5  py-4 text-gray-700 bg-gray-100 rounded" id="cus_email" name="cus_email" type="text" value="{{$supplierprofile->email}}" disabled>
    </div>
    <div class="mt-2">
      <label class=" block text-sm text-gray-600" for="cus_email">Hot-Line (1)</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-100 rounded" id="cus_email" name="cus_email" type="text" value="{{$supplierprofile->hotline1}}" disabled>
    </div>
    <div class="mt-2">
      <label class=" block text-sm text-gray-600" for="cus_email">Hot-Line (2)</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-100 rounded" id="cus_email" name="cus_email" type="text" value="{{$supplierprofile->hotline2}}" disabled>
    </div>
    <div class="mt-2">
      <label class=" block text-sm text-gray-600" for="cus_email">Address</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-100 rounded" id="cus_email" name="cus_email" type="text" value="{{$supplierprofile->address}}" disabled>
    </div>
    <div class="mt-2">
      <label class=" block text-sm text-gray-600" for="cus_email">Company Name</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-100 rounded" id="cus_email" name="cus_email" type="text" value="{{$supplierprofile->company_name}}" disabled>
    </div>
   
    <div class="mt-4">
      <button
         wire:click='purchase'
      class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Purchase</button>
    </div>
</div>
@endif
</div>