<div>

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
        <td>{{$record->created_at->diffForHumans()}}</td> 
        <td><a href="{{ route('purchase.detail', $record) }}" class="btn btn-ghost"> view </a>
</td>
      </tr>
    @empty
        
    @endforelse
   
      
    </tbody>
  </table>
</div>

</div>
