   <div>
   <div 
   x-data="{ showModal: false,showUpdate:false }"
  @close-modal.window="showModal = false"
  @keydown.escape="showModal = !showModal"
   class="register-button flex justify-end md:mx-80 my-3">
         <x-modal-button>Color And Size</x-modal-button>

                <x-entry-form label="New Size And Color" >
            
                        <x-dropdownfield label="All Colors" :options="$colors" model="color" x-ref="fieldToFocus" />
                        
                        <x-dropdownfield label="All Size" :options="$sizes" model="size"  />
                                
                        <x-text-field label="Quantity" model='quantity'  />

                     
                        
                        <div  x-show="!showUpdate" class="inline">
                        <x-loading-confirm wire:target="store"/>
                        </div>

            </x-entry-form>
         </div>
      <div class="flex justify-center">

        <table class="w-1/2 border">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Size
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Color
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Quantity
                        </div>
                    </th>
                     <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Actions
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                

                @foreach ($item->getDetailsFromLatest() as $detail)
                    <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    
                        <td class="p-2 border-r">{{$detail->size->size}}</td>
                        <td class="p-2 border-r">{{$detail->color->color}}</td>
                        <td class="p-2 border-r">{{$detail->quantity}}</td>
                        <td class="p-2 border-r flex justify-center">
                            <x-edit-icon />

                        </td>
                    </tr>
                @endforeach




       </table>
       
    </div>
    <span class="text-red-500 text-sm flex justify-center">Please note that you are editing the quantity manually without purchasing from  supplier.</span>
</div>