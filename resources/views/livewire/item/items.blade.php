<div 
        x-data="{selected:false}"
        x-init="
                window.livewire.on('singleItemHasSelected',()=>{
                    selected=true
                })

                "
        
        :class="selected?'md:w-3/4 ':'w-100 mx-auto'"
        class="  transition duration-600 bg-white mt-2 rounded-lg shadow-sm px-4   py-3  border border-1 border-gray-300">
            <p class="text-xl font-semibold flex justify-center py-2 ">Product Showroom</p>
            {{-- start of search panel   --}}
                <x-search-section>
                    <x-slot name="left">
                           <x-dropdownfield />
                           <x-dropdownfield />
                           <x-dropdownfield />
                    </x-slot>
                   
                    <x-slot name="right">
                    </x-slot>
                 </x-search-section>
            
            {{-- end of search pannel  --}}
            <div  class="products-section  mt-4 grid grid-cols-2 md:grid-cols-4 px-10 gap-4">
                 
                @foreach ($items as $item)
                {{-- start of product single --}}
               
                <div 
                
                wire:click='selectToDisplay({{$item}})'
                class="product-single border border-1 border-gray-200 shadow-lg hover:border-gray-900 cursor-pointer" >
                    <div >
                        <img 
                            src="{{$item->img1}}"
                           width="100%"
                        />
                    </div>
                    <div class="w-full bg-white flex justify-between items-center px-2 py-3">
                        <p>{{$item->name}}</p>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                </div>
                  {{-- end of product single --}}
                @endforeach
                       
            </div>
            <div class="flex justify-between px-4 py-3">
                {{$items->links()}}
            </div>
        </div>
