 {{-- add to cart  --}}
 <div>
     @if($item)
     <div
           x-show="addtocart"
          
          
           class="container mx-auto mt-10">
               <div class="rounded overflow-hidden shadow-lg">
          <img class="w-full" src="{{asset($item->img1)}}" alt="Mountain">
          <div class="px-6 py-4">
            <div class="font-bold text-xl leading-none">{{$item->name}}</div>
            <span class="mb-2 text-sm">{{$item->brand->name}}|{{$item->category->category}}</span>

            <p class="text-gray-700 text-base">
                {{$item->desc}}
            </p>
          </div>
          <h2 class="px-6 text-gray-700 text-lg font-bold">Available Size</h2>
          <div class="px-6 pt-4 pb-2 flex flex-wrap ">
            
            @forelse($item->getUniqueSize() as $detail)
            <div class="flex items-center mr-4 mb-4">
                    <input id="{{$detail->size_id}}" type="radio" wire:model="size"  class="hidden" value="{{$detail->size_id}}" />
                    <label for="{{$detail->size_id}}" class="flex items-center cursor-pointer">
                    <span class="w-4 h-4 inline-block mr-1 rounded-full border border-grey"></span>
                    {{$detail->size->size}}</label>
                </div>
            @empty 
            <div class="flex items-center mr-4 mb-4 font-light text-red-400">
                NO SIZE FOR THIS ITEM YET!
            </div>

            @endforelse
            </div>

          <h2 class="px-6 text-gray-700 text-lg font-bold">Available Color</h2>
          <div class="px-6 pt-4 pb-2 ">
           {{-- @php
               dd($colors);
           @endphp  --}}
           
            {{-- @if ($colors)
                 @forelse($colors as $detail)
                    <div class="flex items-center mr-4 mb-4">
                            <input id="{{$detail->color_id}}" type="radio" wire:model="addtocartitemid" value="{{$detail->id}}" class="hidden" checked />
                            <label for="{{$detail->color_id}}" class="flex items-center cursor-pointer">
                            <span class="w-4 h-4 inline-block mr-1 rounded-full border border-grey"></span>
                        {{$detail->color->color}}</label>
                        </div>
                        @empty
                        <p>No Color found</p>
            @endforelse 
            @endif --}}
             {{-- <x-dropdownfield label="Choose Available Color" :options="$colors" model="addtocartitemid" table="colors"/> --}}
               @if($itemdetail && $size)
             <select class="my-2 w-full rounded-xl border-1 border-purple-400 focus:border-purple-600" 
             wire:model='color'>
                       

                                @forelse ($itemdetail as $color)
                                            <option 
                                                value="{{$color->color_id}}">
                                                
                                                {{$color->color->color}}

                                            </option>
                                    @empty
                                            <p>No Records Found...</p>
                                    @endforelse
                           
                </select>
                 @else
                             <div class="flex items-center mr-4 mb-4 font-light text-red-400">
                                NO COLOR FOR THIS ITEM YET!
                            </div>

                            @endif
                 <p class="font-bold text-lg py-2 block ">{{$availableqty}} pcs available</p> 
                    <div class="flex  items-center space-x-3">

                    <label for="">Quantity</label>
                        <input class="border text-center w-14 " type="text" wire:model="qty"/>
                        @error('qty')
                            <span class="text-red-600 text-xs font-semibold">{{$message}}</span>
                        @enderror
                       </div>

                </div>
                         <div class="flex justify-center my-3">
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
        @endif
        
</div>   
{{-- add to cart  --}}