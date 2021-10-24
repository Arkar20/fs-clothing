<x-admin-layout>


<div class="overflow-x-auto m-10 shadow-xl border-1 border-gray-200">

<div class="text-sm breadcrumbs">
  <ul>
    <li>
      <a href="{{route('admin.dashboard')}}">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-2 stroke-current">          
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"></path>                
        </svg>
            Dashboard
          
      </a>
    </li> 

    <li>
        <a href="{{url()->previous()}}">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-2 stroke-current">                    
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>      
      </svg>
        Manage Purchase
        </a>
    </li>
    <li>
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-4 h-4 mr-2 stroke-current">                    
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m5 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>      
      </svg>
       PUR-0000{{$order->id}}
        
    </li>
  </ul>
</div>
<div>
  <table class="table w-full table-zebra">
    <thead>
      <tr  class="text-center">
        <th>Product Name</th> 
        <th>Size</th> 
        <th>Color</th>
        <th>Quantity</th>
        <th>Price ($)</th>
        <th>Total Price</th>
      </tr>
    </thead> 
    <tbody>
      {{-- {{dd($purchase)}} --}}
        {{-- {{ddd($purchase)}} --}}
    @forelse ($order_records as $index=>$record)

        <tr class="text-center">
        
        <td>{{$record->getItemName()}}</td> 
        <td>{{$record->getItemSize()}}</td> 
        <td>{{$record->getItemColor()}}</td> 
        <td>{{$record->quantity}}</td> 
        <td>{{$record->price}}</td> 
        <td>{{$record->price * $record->quantity}}</td>   
       {{-- <td>{{$record->created_at}}  --}}
        

      </tr>
    @empty
        
    @endforelse
   
      
    </tbody>
  </table>
</div>

</div>


   <x-order-detail-card 
    :totalAmount="$order->total_amount"
    :tax="0"
    :subtotal="$order->total_amount"
  />
 <div class="overflow-x-auto shadow-xl border-1 mx-10 mb-10 border-gray-200"> 
<p class="font-semibold text-2xl mt-10 mb-5">Customer  information</p>
    {{-- <x-supplier-information-form :supplierprofile="$purchase->supplier"/> --}}

        <div class="">
      <label class="block text-sm text-gray-00" for="cus_name">Name</label>
      <input class="w-full px-5 py-1 text-gray-700 bg-gray-100 rounded" disabled id="cus_name" name="cus_name" type="text" value="{{$order->customer->name}}">
    </div>
    <div class="mt-2">
      <label class="block text-sm text-gray-600" for="cus_email">Email</label>
      <input class="w-full px-5  py-4 text-gray-700 bg-gray-100 rounded" id="cus_email" name="cus_email" type="text" value="{{$order->customer->email}}" disabled>
    </div>
    <div class="mt-2">
      <label class=" block text-sm text-gray-600" for="cus_email">Hot-Line (1)</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-100 rounded" id="cus_email" name="cus_email" type="text" value="{{$order->customer->phnum1}}" disabled>
    </div>

    <div class="mt-2">
      <label class=" block text-sm text-gray-600" for="cus_email">Address</label>
      <input class="w-full px-2 py-2 text-gray-700 bg-gray-100 rounded" id="cus_email" name="cus_email" type="text" value="{{$order->customer->address}}" disabled>
    </div>

   
   
</div>

 <div class="overflow-x-auto m-10 shadow-xl border-1 border-gray-200">
  
    <div class=" my-3 py-3  ">
 
  <div class="overflow-x-auto shadow-xl border-1 border-gray-200 px-10"> 
    <p class="font-semibold text-2xl mt-10 mb-5">Payment Status</p>
    <div class="w-full flex-col space-y-4">
     
    @if($order->payment != null)
         <h3>Payment ScreenShot</h3>
         <img src="{{asset($order->payment->payment_screenshot)}}"/>
    @endif

    <div class="screenshot flex justify-center border-1 border-gray-400 rounded-lg shadow-xl">
    <div class="w-full flex justify-between text-md">
        <p>Payment Status</p>
        <livewire:admin.payment-confirm :order="$order" />
      </div>

    </div>

  </div>
     
  </div>
   <div class="overflow-x-auto shadow-xl border-1 border-gray-200 px-10"> 
    <p class="font-semibold text-2xl mt-10 mb-5">Order Status</p>
    <div class="w-full flex-col space-y-4">
      <livewire:admin.item-confirm :order="$order"/>
      
      
    </div>
  </div>

  </div>
  </div>

   
</div>



</x-admin-layout>