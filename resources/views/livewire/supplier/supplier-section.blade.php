 <div x-data="{ showModal: false,showUpdate:false }"
  @close-modal.window="showModal = false"
  @keydown.escape="showModal = false"  
  >
{{-- start of search bar --}}
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

             <select 
                  wire:model="status"
                  class="mt-2 w-full rounded-xl border-1 border-purple-400 focus:border-purple-600"> 
                <option value="">All</option>
                <option value="Top Supplier of All Time">Top Supplier of All Time</option>
                <option value="Supplier Of the Month">Supplier Of the Month</option>
                <option value="Supplier of the Year">Supplier of the Year</option>
              </select>

                  {{-- <svg xmlns="http://www.w3.org/2000/svg" width="27" height="30" viewBox="0 0 27 30">
                      <path id="Icon_material-date-range" data-name="Icon material-date-range" d="M13.5,16.5h-3v3h3Zm6,0h-3v3h3Zm6,0h-3v3h3ZM28.5,6H27V3H24V6H12V3H9V6H7.5A2.986,2.986,0,0,0,4.515,9L4.5,30a3,3,0,0,0,3,3h21a3.009,3.009,0,0,0,3-3V9A3.009,3.009,0,0,0,28.5,6Zm0,24H7.5V13.5h21Z" transform="translate(-4.5 -3)"/>
                  </svg>

                </Button> --}}
        </x-slot>
        <x-slot name="right">
            <x-modal-button>Register Supplier</x-modal-button>
        </x-slot>
     
    </x-search-section>
{{-- end of search bar --}}

{{-- start of modal form --}}
 <x-entry-form 
    label="Supplier"
    
 >
      <x-text-field label="Name" model='name'   x-ref="fieldToFocus" />
      <x-text-field label="Email" model='email'  />
      <x-text-field label="Hot-Line (1)" model='hotline1' />
      <x-text-field label="Hot-Line (2)" model='hotline2'  />
      <x-text-field label="Company Name" model='company_name'  />
      <x-text-area aria-placeholder="Address" model='address'  />
     
     <div  x-show="!showUpdate" class="inline">
       <x-loading-confirm wire:target="store"/>
     </div>
     <Button class="btn btn-accent" x-show="showUpdate" wire:click="update" >Update</Button>
  </x-entry-form>
{{-- end of modal form --}}

{{-- start of table --}}
<x-table-layout :data="$suppliers" :headers="$headers"/>
{{-- 
<div>
   <div class="p-1 md:p-2 md:mx-10 mx-2 overflow-x-auto">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-50 border-b">
                  @foreach ($headers as $item)
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                             {{strtoupper($item)}} No
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            {{-- {{strtoupper($item)}} Name
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                                Email
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                                Hotline-1
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                               Company
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                               Address
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                               Total Orders
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                   
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                               Total Purchae Amount
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                     <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                               Created At
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    {{-- @endforeach 
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
                

                @forelse ($suppliers as $index=>$item)
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r">{{$index+1}}</td>
                    <td class="p-2 border-r">{{$item->name}}</td>
                    <td class="p-2 border-r">{{$item->email}}</td>
                    <td class="p-2 border-r">{{$item->hotline1}}</td>
                    <td class="p-2 border-r">{{$item->company_name}}</td>
                    <td class="p-2 border-r">{{$item->address}}</td>
                    <td class="p-2 border-r">{{$item->purchases_count}}</td>
                    <td class="p-2 border-r">{{$item->total_purchases?:'0'}}</td>
                    <td class="p-2 border-r">{{$item->created_at}}</td>

                   
                      <td class="p-2 border-r">
                        <div class="flex justify-center space-x-2">
                            
                            {{-- edit btn  
                            <button    
                                type="button"  
                                class=" w-8 h-8 rounded-2xl flex justify-center items-center btn-accent" 
                                wire:click="edit({{$item->id}})"
                                 @click="
                                    showModal=true;
                                    showUpdate=true
                                    $nextTick(()=>$refs.fieldToFocus.focus())
                                    "  >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                            </button> 
                            {{-- edit btn   --}}
                            

                            {{-- remove btn  
                            <button 
                                type="button" 
                                 class=" w-8 h-8 rounded-2xl flex justify-center items-center  btn-error"
                                 wire:click='delete({{$item->id}})'>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>

                            </button>
                             {{-- remove btn  
                            
                            
                        </div>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-2xl">
                            No Records Found...
                        </td>
                    </tr>
                @endforelse
                
                
            </tbody>
        </table>
        {{$suppliers->links()}}
    </div>
</div> --}}
{{-- end of table --}}

</div>
