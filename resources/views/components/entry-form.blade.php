<div
    x-cloak
         class="my-4 bg-black"
           
>
    <!-- Trigger for Modal -->



    <!-- Modal -->
    <div
        class="bg-black fixed inset-0 z-30 flex items-center justify-center overflow-auto  bg-opacity-50"
         x-show.transition.duration-100ms="showModal"
  
    >
  
        <!-- Modal inner -->
        <div
            class="max-w-3xl lg:px-24 lg:py-10 px-12 py-6 mx-auto text-left transform bg-white rounded-lg shadow-lg"
            @click.away="showModal = false;
                        showUpdate=false
                        Livewire.emit('clearForm')
                        
                        "
             x-show="showModal"
            x-transition.duration.600ms
            x-transition.duration:enter="ease-out duration-300"
            x-transition.duration:enter-start="opacity-0 translate-y-full sm:scale-100"
            x-transition.duration:enter-end="opacity-100 translate-y-0 sm:scale-100"
           
        >
            <!-- Title / Close-->
            <div class="flex items-center justify-between">
                <h5 class="w-full  mr-3 text-black max-w-none" x-show="showUpdate">Update {{$label}}</h5>
                <h5 class="w-full mr-3 text-black max-w-none"x-show="!showUpdate">Register {{$label}}</h5>

                <button type="button" class="z-50 cursor-pointer" @click="showModal = false;showUpdate=false"  wire:click='clearForm'>
                   
                   {{-- loading svg --}}
                     <svg wire:loading wire:target='edit' class="animate-spin -ml-1 mr-3 h-5 w-5 text-purple-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                   {{-- loading svg --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- content -->
            <form
            
             
                
                >
                
                {{$slot}}
                
                <button type="reset" class="btn m-2" wire:click='clearForm' @click="showModal=false;showUpdate=false">Cancel</button>

            </form>
        </div>
   
    </div>
</div>
