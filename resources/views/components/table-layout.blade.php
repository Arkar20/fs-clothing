<div>
   <div class="p-1 md:p-2 md:mx-10 mx-2 overflow-x-auto">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-50 border-b">
                    @foreach ($headers as $item)
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            {{strtoupper($item)}}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                    @endforeach
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
                

                @forelse ($items as $index=>$item)
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r">{{$index+1}}</td>
                    @foreach ($headers as $col)
                            @if ($col !== 'id')
                                      <td class="p-2 border-r">
                                          {{
                                                ($col=='created_at'|| $col=='updated_at')
                                                ?$item->$col->diffForHumans()
                                                :(
                                                    ($col=="price")
                                                    ?'$'.$item->$col
                                                    :$item->$col
                                                )
                                          }}
                                        </td>
                            @endif
                    @endforeach
                      <td class="p-2 border-r">
                        <div class="flex justify-center space-x-2">
                            
                            {{-- edit btn  --}}
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
                            

                            {{-- remove btn  --}}
                            <button 
                                type="button" 
                                 class=" w-8 h-8 rounded-2xl flex justify-center items-center  btn-error"
                                 wire:click='delete({{$item->id}})'>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>

                            </button>
                            {{-- remove btn  --}}
                            
                            
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
        {{$items->links()}}
    </div>
</div>