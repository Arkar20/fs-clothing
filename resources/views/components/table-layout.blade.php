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
                        <div class="flex justify-center gap-5">
                            <button type="button"  class="btn btn-accent" wire:click="edit({{$item->id}})" @click="showModal=true;showUpdate=true"  >Edit</button>
                            <button type="button"  class="btn btn-error" wire:click='delete({{$item->id}})'>Remove</button>
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