<div>
@if($item)
 <div class="hidden md:block w-1/4 bg-white mt-2 rounded-lg shadow-sm  border border-1 border-gray-200 fixed right-0">
                {{-- start of preview section     --}}
            <div class="flex items-center p-4 space-x-4">
                <svg  class="h-4 w-4 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <p class="tracking-wide uppercase text-md">Preview</p>
            </div>
                {{-- end of preview section     --}}

                {{-- start of img section     --}}
            <div class="flex justify-center">
                        <img 
                        class="shadow-lg"
                        src="{{asset($item->img1??'')}}"    
                        />
                    </div>
                {{-- end of img section     --}}

                {{-- start of detail info sectio   --}}
                <div class="detail-section my-3 px-8">
                    <p class="tracking-wide uppercase  text-lg" 
                    
                    >
                        {{$item->name??''}}
                        
                        </p>
                    <div class="text-gray-500 text-sm">
                        {{-- start of available size  --}}
                    <div class="text-gray my-3">
                        <p>Available Size</p>
                        <div class="size-icons flex space-x-2">
                            <div class="size-icon text-xs  border-2 border-black w-5 h-5 flex items-center justify-center">s</div>
                            <div class="size-icon text-xs  border-2 border-black w-5 h-5 flex items-center justify-center">s</div>
                            <div class="size-icon text-xs  border-2 border-black w-5 h-5 flex items-center justify-center">s</div>
                            <div class="size-icon text-xs  border-2 border-black w-5 h-5 flex items-center justify-center">s</div>
                        </div>
                    </div>
                        {{-- end of available size  --}}
                    <div class="text-gray my-3">
                        <p>Available Color</p>
                        <div class="size-icons flex space-x-2">
                            <div class="size-icon text-xs   w-5 h-5 flex items-center justify-center bg-red-600"></div>
                            <div class="size-icon text-xs   w-5 h-5 flex items-center justify-center bg-yellow-600"></div>
                            <div class="size-icon text-xs   w-5 h-5 flex items-center justify-center bg-green-600"></div>
                            <div class="size-icon text-xs   w-5 h-5 flex items-center justify-center bg-blue-600"></div>

                        </div>
                    </div>
                        {{-- end of available size  --}}

                    <div class="font-bold italic">
                        200pcs available
                    </div>    

                    <div class="font-bold text-purple-500">
                        ${{$item->price??''}}
                    </div>    

                    <div class="flex justify-center">
                        <button class="w-48 h-12 rounded-md bg-purple-500 shadow-md text-white">Inventory</button>
                    </div>
                    </div>
                </div>
                {{-- end of detail info sectio   --}}
                
                
            </div>
            @endif  
</div>