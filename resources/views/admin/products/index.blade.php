<x-admin-layout>
   <div class="mt-10 flex justify-between ">
       <div class="w-3/4 bg-white mt-2 rounded-lg shadow-sm mx-4 px-6 py-3 border border-1 border-gray-200">
            <div class="text-xl font-semibold ml-10 ">Product Showroom</div>
            {{-- start of search panel   --}}
            <div class="my-3">
                <x-search-section>
                    <x-slot name="left">
                           <x-dropdownfield />
                           <x-dropdownfield />
                           <x-dropdownfield />
                    </x-slot>
                   
                    <x-slot name="right">
                    </x-slot>
                 </x-search-section>
            
            </div>
            {{-- end of search pannel  --}}
            <div class="products-section ml-10 mt-4">
                <div class="product-section">

                </div>
            </div>

        </div>
       <div class="w-1/4 bg-white mt-2 rounded-lg shadow-sm mx-4 border border-1 border-gray-200">
        Nisi ea consequat qui voluptate sint culpa consequat sunt amet ipsum amet nisi. Fugiat magna non ad enim ullamco dolore nostrud anim exercitation magna eiusmod. Cupidatat elit ullamco dolore eiusmod. Ullamco dolore duis sint ex ea.
      </div>
   </div>
</x-admin-layout>