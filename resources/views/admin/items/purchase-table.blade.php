<x-admin-layout>
    <livewire:item.purchase-table />
 <div style="height:400px">
    @if(App\Models\Purchase::all()->count())
    
     <livewire:admin.purchase-chart />
     @endif
</div>  
</x-admin-layout>