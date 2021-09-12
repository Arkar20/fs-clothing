<div 
        x-data="{selected:false}"
        x-init="
                window.livewire.on('singleItemHasSelected',()=>{
                    selected=true
                })

              
                "
        x-transition="transition-width ease-in"
        :class="selected?'md:w-3/4 ':'min-w-full mx-auto  '">

                {{-- banner --}}
                <div class="w-100 flex-col md:flex justify-between items-center mx-12 ">
                     <div class="text-sm breadcrumbs">
                        <ul>
                            <li>
                                  <a>Dashboard</a>
                            </li> 
                            <li>
                                  <a>Product Showroom</a>
                            </li> 
                           
                           
                        </ul>
                    </div>

                     <a href="/items/register" class="w-48 flex justify-center items-center space-x-2 btn-md btn-primary rounded-md" @click="
                        ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <span>Register Product</span>
                    </a>
                </div>
                {{-- banner --}}
                  
                
       <div class="mx-4 md:mx-10 duration-600 bg-white mt-2 rounded-lg shadow-sm px-4   py-3  border border-1 border-gray-300">
            {{-- start of search panel   --}}
                <x-search-section>
                    <x-slot name="left">
                           <x-dropdownfield label="All Brands"
                                            table="brands" 
                                            :options="$brands" model="brand"/>
                           <x-dropdownfield label="All Categories"
                                            table="categories"
                                            :options="$categories" model="category"/>
                         
                    </x-slot>
                   
                    <x-slot name="right">
                         <x-text-field 
                                 model="search"
                                 placeholder="Please Type and search"
                                 autofocus />
                    </x-slot>
                 </x-search-section>
            
            {{-- end of search pannel  --}}

            @if ($brand || $category)
                <p class="px-10">You are filtering with
                    
                    {!!$brand?'<span class="font-bold">Brand </span> " '.$brand.'".':''!!} 
                    
                    
                    {!!$category?'<span class="font-bold">Category "</span>'.$category.'"':''!!}

                    {!!$search?'<span class="font-bold">Search "</span>'.$search.'"':''!!}
                
                </p>
            @endif


            <div  class="products-section mt-4 grid grid-cols-2 md:grid-cols-4 md:px-10 gap-4">
                @forelse ($items as $item)
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
                        <svg 
                                 x-data
                                 wire:click="
                                        selecteditemtocart({{$item->id}})
                                        "
                                @click="
                                        $dispatch('addtocart')
                                          Livewire.on('itemaddedtocart',()=>{$dispatch('closecart')})
                                        
                                        "

                       class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                    </div>
                </div>
                  {{-- end of product single --}}

                @empty
                <p class="col-span-4 text-center text-3xl font-semibold">No Items Found...</p>
                @endforelse
                       
            </div>
            <div class="flex justify-between px-4 py-3">
                {{$items->links()}}
            </div>
        </div>
    </div>
