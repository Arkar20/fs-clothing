<div>
 <x-search-section>
        <x-slot name="left">
                <x-text-field  
                    type="search"
                    model='search' autofocus/>


                <x-text-field  
                    type="date"
                    model='searchStartDate' />

                <x-text-field  
                    type="date"
                    model='searchEndDate' />


  
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
        <th>Supplier Name</th> 
        <th>Total Amount ($)</th>
        <th>Purchase Date</th>
        <th>~</th>
      </tr>
    </thead> 
    <tbody>
    @forelse ($purchase_records as $index=>$record)
        <tr>
        <th>PUR-00000{{$record->id}}</th> 
        <td>{{$record->supplier->name}}</td> 
        <td>{{$record->total_amount}}</td> 
        <td>{{$record->created_at}}</td> 
        <td><a href="{{ route('purchase.detail', $record) }}" class="btn btn-ghost"> view </a>
</td>
      </tr>
    @empty
        
    @endforelse
   
      
    </tbody>
  </table>
  {{$purchase_records->links()}}
</div>

</div>
