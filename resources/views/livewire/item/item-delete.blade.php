<div>
<div class="actionbar flex justify-between items-center px-6  ">
     
    <a href="{{url()->previous()}}" class="title text-xl font-bold  space-x-1 ">
          <svg  class=" w-6  align-bottom inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span>Back With Previous Filters</span>
      </a>
              {{-- remove btn  --}}
        <button 
            type="button" 
                class="px-4 py-2 rounded-lg flex justify-center items-center space-x-3 btn-error"
                wire:click='deleteItem({{$item->id}})'>
                    <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    <span>Delete</span>

        </button>
              {{-- remove btn  --}}

  </div>
</div>