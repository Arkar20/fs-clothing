
 <div x-data="{ showModal: false,showUpdate:false }"
  @close-modal.window="showModal = false"
  @keydown.escape="showModal = false"  
  >
{{-- start of search bar --}}
    <x-search-section>
        <x-slot name="left">
                <x-text-field  wire:model='search' autofocus/>
                <Button type="date"> 

                  <svg xmlns="http://www.w3.org/2000/svg" width="27" height="30" viewBox="0 0 27 30">
                      <path id="Icon_material-date-range" data-name="Icon material-date-range" d="M13.5,16.5h-3v3h3Zm6,0h-3v3h3Zm6,0h-3v3h3ZM28.5,6H27V3H24V6H12V3H9V6H7.5A2.986,2.986,0,0,0,4.515,9L4.5,30a3,3,0,0,0,3,3h21a3.009,3.009,0,0,0,3-3V9A3.009,3.009,0,0,0,28.5,6Zm0,24H7.5V13.5h21Z" transform="translate(-4.5 -3)"/>
                  </svg>

                </Button>
                {{$search}}
        </x-slot>
        <x-slot name="right">
            <x-modal-button>Register Delivery</x-modal-button>
        </x-slot>
     
    </x-search-section>
{{-- end of search bar --}}

{{-- start of modal form --}}
 <x-entry-form label="Delivery">
      <x-text-field label="Deliver Township" wire:model='township' />
      <x-text-field label="Zip Code" wire:model='zipcode'    />
      <x-text-field type="number" label="Price" wire:model='price'   />
     
     <div  x-show="!showUpdate" class="inline">
       <x-loading-confirm wire:target="store"/>
     </div>
     <Button class="btn btn-accent" x-show="showUpdate" wire:click="update" >Update</Button>
  </x-entry-form>
{{-- end of modal form --}}

{{-- start of table --}}
<x-table-layout :data="$deliveries" :headers="$headers"/>
{{-- end of table --}}

</div>
