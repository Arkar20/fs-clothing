<div>
      <button type="button" 
            @click="
                  showModal = true
                  $nextTick(()=>$refs.fieldToFocus.focus())
                  " 
            
            class="btn btn-md btn-primary">{{$slot}}</button>
</div>