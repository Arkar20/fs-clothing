
<div>
    <select class="my-2 w-full rounded-xl border-1 border-purple-400 focus:border-purple-600" 
    wire:model='{{$model}}'>
    <option value="">All {{$model}}</option>
        @foreach ($options as $option)
                <option 
                    value="{{$option->$name}}">
                    
                    {{$option->$name}}

                </option>
        @endforeach
     </select>
</div>