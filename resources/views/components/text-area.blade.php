<div>
    <textarea 
    wire:model.defer='{{$model}}'
    value="{{$model}}"
    class="w-full h-24 rounded-lg shadow-md border border-1 hover:border-purple-700 mt-2" {{$attributes}}>
</textarea>
<br>
    @error($model)
        <span class="text-red-600 font-bold text-xs">{{$message}}</span>
    @enderror

</div>