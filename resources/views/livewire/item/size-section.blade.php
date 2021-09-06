 <div 
 x-data="{ showModal: false,showUpdate:false }"
 
  @close-modal.window="showModal = false"
  @keydown.escape="showModal = !showModal"  
  >

    {{-- start of search banner --}}
    <x-search-section>
        <x-slot name="left">
                <x-text-field 
                  model="search" />
                
        </x-slot>
        <x-slot name="right">
            <x-modal-button>Register Size</x-modal-button>
        </x-slot>
     
    </x-search-section>
{{-- end of search banner --}}

{{-- start of modal form --}}
 <x-entry-form label="Size" >
   
      <x-text-field label="Size With Country" model='size'  x-ref="fieldToFocus"  />

      <x-text-field label="Waist" model='waist'    />
             
      <x-text-field label="Hips" model='hip'  />

      <x-text-field label="Inside Leg" model='inside_leg'  />

      <x-text-field label="Weight (lb)" model='weight'  />
 
    
      <div  x-show="!showUpdate" class="inline">
       <x-loading-confirm wire:target="store"/>
     </div>

     <Button class="btn btn-accent" x-show="showUpdate" wire:click="update" >Update</Button>
  </x-entry-form>
{{-- end of modal form --}}

<x-table-layout :data="$sizes" :headers="$headers"/>

</div>
