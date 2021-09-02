   <div>
   <div 
   x-data="{ showModal: false,showUpdate:false }"
  @close-modal.window="showModal = false"
  @showupdatemodal.window="  
                            showModal=true;
                            showUpdate=true
                            $nextTick(()=>$refs.fieldToFocus.focus())      
                            "
  @keydown.escape="showModal = !showModal"
   class="register-button flex justify-end md:mx-80 my-3">
         <x-modal-button>Color And Size</x-modal-button>

                <x-entry-form label="New Size And Color" >
            
                        <x-dropdownfield label="All Colors" 
                                        table="colors"
                                        :options="$colors" model="color" x-ref="fieldToFocus" />
                        
                        <x-dropdownfield label="All Size" 
                                        table='sizes'
                                        :options="$sizes" model="size"  />
                                
                        <x-text-field label="Quantity" model='quantity'  />

                     
                     <Button class="btn btn-accent" x-show="showUpdate" wire:click.prevent="update" >Update</Button>
                        
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
                        <td class="p-2 border-r flex justify-center space-x-3">
                            {{-- edit btn  --}}
                            <button    
                                type="button"  
                                class=" w-8 h-8 rounded-2xl flex justify-center items-center btn-accent" 
                                wire:click="editItemDetail({{$detail->id}})"
                                 @click="
                                 $dispatch('showupdatemodal')
                                   
                                    "  >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                            </button>
                            {{-- edit btn   --}}   
                            {{-- remove btn  --}}
                            <button 
                                type="button" 
                                 class=" w-8 h-8 rounded-2xl flex justify-center items-center  btn-error"
                                 wire:click.prevent='deleteItemDetail({{$detail->id}})'>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>

                            </button>
                            {{-- remove btn  --}}

                        </td>
                    </tr>
                @endforeach




       </table>
       
    </div>
    <span class="text-red-500 text-sm flex justify-center">Please note that you are editing the quantity manually without purchasing from  supplier.</span>
</div>