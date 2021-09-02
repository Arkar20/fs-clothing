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
            <x-modal-button>Register Brand</x-modal-button>
        </x-slot>
     
    </x-search-section>
{{-- end of search banner --}}

{{-- start of modal form --}}
 <x-entry-form label="Brand" >
   
      <x-text-field label="Brand Name" model='name'  x-ref="fieldToFocus"  />
      <x-text-field label="Brand Name" model='name'  x-ref="fieldToFocus"  />
             
      <x-text-field label="Company" model='company'  />

      <x-text-area 
        placeholder="Description" 
        model='desc'  />
    
      <div  x-show="!showUpdate" class="inline">
       <x-loading-confirm wire:target="store"/>
     </div>

     <Button class="btn btn-accent" x-show="showUpdate" wire:click="update" >Update</Button>
  </x-entry-form>
{{-- end of modal form --}}

<x-table-layout :data="$brands" :headers="$headers"/>

</div>
