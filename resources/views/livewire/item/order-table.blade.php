<div>
 <x-search-section>
        <x-slot name="left">
                <x-text-field  
                    placeholder="Type Something..."
                    type="search"
                    model='search' autofocus/>


                <x-text-field  
                    type="date"
                    model='searchStartDate' />

                <x-text-field  
                    type="date"
                    model='searchEndDate' />
            <div class="mt-2">


              <select 
                  wire:model="status"
                  class=" w-full rounded-xl border-1 border-purple-400 focus:border-purple-600"> 
                <option value="">All Statuses</option>
                <option value="Payment Pending">Payment Pending</option>
                <option value="Order Pending">Order Pending</option>
                <option value="Payment Confirmed">Payment Confirmed</option>
                <option value="Order Confirmed">Order Confirmed</option>
              </select>
            </div>
          
  
                  {{-- <svg xmlns="http://www.w3.org/2000/svg" width="27" height="30" viewBox="0 0 27 30">
                      <path id="Icon_material-date-range" data-name="Icon material-date-range" d="M13.5,16.5h-3v3h3Zm6,0h-3v3h3Zm6,0h-3v3h3ZM28.5,6H27V3H24V6H12V3H9V6H7.5A2.986,2.986,0,0,0,4.515,9L4.5,30a3,3,0,0,0,3,3h21a3.009,3.009,0,0,0,3-3V9A3.009,3.009,0,0,0,28.5,6Zm0,24H7.5V13.5h21Z" transform="translate(-4.5 -3)"/>
                  </svg>

                </Button> --}}
        </x-slot>
        <x-slot name="right">
        </x-slot>
     
    </x-search-section>
<div class="overflow-x-auto m-10 shadow-xl border-1 border-gray-200">
  <table class="table w-full table-zebra">
    <thead>
      <tr>
        <th>Purchase ID</th> 
        <th>Customer Name</th> 
        <th>Total Amount ($)</th>
        <th>Purchase Date</th>
        <th>Order Status</th>
        <th>Payment Status</th>
        <th>~</th>
      </tr>
    </thead> 
    <tbody>
    @forelse ($purchase_records as $index=>$record)
        <tr>
        <th>ORD-00000{{$record->id}}</th> 
        <td>{{$record->customer->name}}</td> 
        <td>{{$record->total_amount}}</td> 
        <td>{{$record->created_at}}</td> 
        <td>
             <span class="badge {{$record->getOrderStatusClass()}}">{{$record->getOrderStatusText()}}</span> 

        </td>
        <td>
             <span class="badge {{$record->getPaymentStatusClass()}}">{{$record->getPaymentStatusText()}}</span> 

        </td>
        <td>
            <a href="{{ auth()->guard('web')->check()? route('order.detail', $record):route('customer.orderdetail',$record) }}" class="btn btn-ghost"> view </a>
            
</td>
      </tr>
    @empty
        
    @endforelse
   
      
    </tbody>
  </table>
  {{$purchase_records->links()}}
</div>

</div>
