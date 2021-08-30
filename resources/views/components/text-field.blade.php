
 <div class="mt-2 ">
                  <label for="" class="block w-42 text-left">{{$label}}</label>
                  <input 
                  wire:model='{{$model}}'
                  type="{{$type}}"
                    class="w-full rounded-md border focus:border-1 focus:border-purple-600" 
                  value="{{$model}}"
                    {{$attributes}}/>
                    <br>
               @error($model)
                <span class="text-red-600 font-bold text-xs">{{$message}}</span>
               @enderror
 </div>