<div>
     <h2 class="my-5 text-gray-700 text-sm font-bold">Available Size</h2>
          <div class="flex flex-wrap ">
            
            @forelse($item->getUniqueSize() as $detail)
            <div class="flex items-center mr-4 ">
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
    <h2 class="my-5 text-gray-700 text-sm font-bold">Available Color</h2>
          
              @if($colors)
             <select class="my-2 w-full rounded-xl border-1 border-purple-400 focus:border-purple-600" 
             wire:model='color'>
                       

                                @forelse ($colors as $color)
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
                               
                                 
                                  class="w-48 py-3 text-center   rounded-md bg-purple-500 shadow-md text-white">Buy Now</button>
                              <button 
                                   x-data
                                   wire:click="add"
                                  
                                  class="w-48 py-3 text-center  rounded-md bg-yellow-500 shadow-md text-white">Add To Cart</button>
                           </div>
            </div>
            </div>
        