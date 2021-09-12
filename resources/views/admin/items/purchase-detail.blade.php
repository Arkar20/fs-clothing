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
       PUR-0000{{$purchase->id}}
        
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
        <th>Date</th>
      </tr>
    </thead> 
    <tbody>
        {{-- {{dd($purchase->purchase_items)}} --}}
    @forelse ($purchase->purchase_items as $index=>$record)
        <tr class="text-center">
        {{-- {{dd($record->item)}} --}}

        <th>{{$record->item->name}}</th> 
        <td>{{$record->size->size}}</td> 
        <td>{{$record->color->color}}</td> 
        <td>{{$record->quantity}}</td> 
        <td>{{$record->item->price}}</td> 
        <td>{{$record->created_at}}
            <span class="text-sm font-semibold">({{$record->created_at->diffForHumans()}})</span>
        </td> 
</td>
      </tr>
    @empty
        
    @endforelse
   
      
    </tbody>
  </table>
</div>

</div>


   <x-order-detail-card 
    :totalAmount="$purchase->total_amount"
    :tax="0"
    :subtotal="$purchase->total_amount"
  />
 <div class="overflow-x-auto shadow-xl border-1 mx-10 border-gray-200"> 
<p class="font-semibold text-2xl mt-10 mb-5">Supplier  information</p>
    <x-supplier-information-form :supplierprofile="$purchase->supplier"/>
</div>



</x-admin-layout>