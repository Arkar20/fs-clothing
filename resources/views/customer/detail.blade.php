<x-customer-app-layout>
    {{-- banner --}}
                <div class="w-100 flex-coljustify-between md:items-center mx-12 ">
                     <div class="text-sm breadcrumbs">
                        <ul>
                            <li>
                                <a href="{{url()->previous()}}">Shop</a>
                            </li> 
                            <li>
                               {{$item->name}}
                            </li> 
                        </ul>
                    </div>
                </div>
                {{-- banner --}}

       <div class="mx-4 md:mx-10 duration-600 bg-white mt-2 rounded-lg shadow-sm px-4   py-3  border border-1 border-gray-300 flex-none md:flex justify-start md:space-x-4">
        <div class="w-full  md:w-1/2 lg:w-1/3  flex-col">
            <img src="{{asset($item->img1)}}" class="w-full">
             
            <div class="w-100 md:w-full flex-none my-2 overflow-x-auto">
                <div class="flex space-x-1 w-1/4 ">

                    <img src="{{asset($item->img1)}}" >
                    <img src="{{asset($item->img2)}}" >
                    <img src="{{asset($item->img3)}}" >
                    <img src="{{asset($item->img3)}}" >
                </div>
            
        </div>
        </div>
        <div class="item-detail md:w-2/4">
            <h3 class="text-3xl font-semibold py-3">{{$item->name}}</h3>
            <div class="rating">
                <p class="text-sm"><span class="text-purple-500">100</span> people like this item</p>
            </div>
            <div class="brand py-1">
                <p class="text-sm inline">
                        Brand:
                        <span class="text-purple-500 uppercase">{{$item->brand->name}}</span>
                </p>
                <p class="text-sm inline">
                        Category:
                        <span class="text-purple-500 uppercase">{{$item->category->category}}</span>
                </p>
            </div>
            <div class="price my-6 md:my-10 ">
                <h2 class="text-4xl font-light text-purple-600">${{$item->price}}</h2>
            </div>
            <div class="promotion ">
                <p class="text-sm">Promotion:
                        <span class="badge badge-info">15% discount</span> 
                </p>
            </div>
            <div class="add-to-cart mt-10">
                 <div class="flex  items-center space-x-3">

                    <label for="">Quantity</label>
                        <input class="border text-center w-14 " type="text" wire:model="qty"/>
                        @error('qty')
                            <span class="text-red-600 text-xs font-semibold">{{$message}}</span>
                        @enderror
                       </div>
                 <div class="flex md:justify-start my-3  space-x-3 ">
                              <button 
                                   x-data
                                   wire:click="add()"
                                  @click="
                                          $dispatch('addtocart')
                                          "
                                  class="w-48 py-3 text-center   rounded-md bg-purple-500 shadow-md text-white">Buy Now</button>
                              <button 
                                   x-data
                                   wire:click="add()"
                                  @click="
                                          $dispatch('addtocart')
                                          "
                                  class="w-48 py-3 text-center  rounded-md bg-yellow-500 shadow-md text-white">Add To Cart</button>
                           </div>
            </div>
        </div>
    <div class="max-w-1/4 recommended-list hidden md:block">
                                    
        <h2 class="p-2">Similar Items</h2>         
    
        <div class="recommends  space-y-3">    
    <div class=" artboard  flex  justify-start">
                <img src="{{asset($item->img1)}}" class="w-20 h-20" />
                <div class="px-4">
                    <h2 class="card-title text-sm">{{$item->name}}
                    <div class="badge mx-2">NEW</div>
                    </h2> 
                    <p class="">{{$item->desc}}</p> 
                    {{-- <div class="card-actions">
                    <button class="btn btn-primary">Get Started</button> 
                    <button class="btn btn-ghost">More info</button>
                    </div> --}}
                </div>
                </div>
    <div class=" artboard  flex  justify-start">
                <img src="{{asset($item->img1)}}" class="w-20 h-20" />
                <div class="px-4">
                    <h2 class="card-title text-sm">{{$item->name}}
                    <div class="badge mx-2">NEW</div>
                    </h2> 
                    <p class="">{{$item->desc}}</p> 
                    {{-- <div class="card-actions">
                    <button class="btn btn-primary">Get Started</button> 
                    <button class="btn btn-ghost">More info</button>
                    </div> --}}
                </div>
                </div>
    <div class=" artboard  flex  justify-start">
                <img src="{{asset($item->img1)}}" class="w-20 h-20" />
                <div class="px-4">
                    <h2 class="card-title text-sm">{{$item->name}}
                    <div class="badge mx-2">NEW</div>
                    </h2> 
                    <p class="">{{$item->desc}}</p> 
                    {{-- <div class="card-actions">
                    <button class="btn btn-primary">Get Started</button> 
                    <button class="btn btn-ghost">More info</button>
                    </div> --}}
                </div>
                </div>
    <div class=" artboard  flex  justify-start">
                <img src="{{asset($item->img1)}}" class="w-20 h-20" />
                <div class="px-4">
                    <h2 class="card-title text-sm">{{$item->name}}
                    <div class="badge mx-2">NEW</div>
                    </h2> 
                    <p class="">{{$item->desc}}</p> 
                    {{-- <div class="card-actions">
                    <button class="btn btn-primary">Get Started</button> 
                    <button class="btn btn-ghost">More info</button>
                    </div> --}}
                </div>
                </div>
            </div>
            <a href="/shop?brand={{$item->brand->name}}" class="flex justify-center px-2 py-3 uppercase hover:bg-purple-500 hover:text-white cursor-pointer"> view more</a>
            </div>
    </div>
    <div  tabindex="0"  class=" mx-4 md:mx-10 duration-600 bg-white mt-2 rounded-lg shadow-sm px-4   py-3  border border-1 border-gray-300 ">
            <h3 class="uppercase font-semibold">Product Detail of {{$item->name}}</h3>
            <p class="my-2">{{$item->desc}}</p>
        </div>
        
                 
            <livewire:item.comment-section :item='$item' />
      
            </div>
</x-customer-app-layout>