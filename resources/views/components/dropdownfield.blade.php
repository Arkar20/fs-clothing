
<div>
    <select class="my-2 w-full rounded-xl border-1 border-purple-400 focus:border-purple-600" 
    wire:model='{{$model}}'>
    <option value="">All {{$model}}</option>
    @forelse ($options as $option)
                <option 
                    value="{{$option->$name}}">
                    
                    {{$option->$name}}

                </option>
        @empty
                <p>No Records Found...</p>
        @endforelse
     </select>
         @error($model)
            <span class="text-red-600 font-bold text-xs">{{$message}}</span>
        @enderror
</div>