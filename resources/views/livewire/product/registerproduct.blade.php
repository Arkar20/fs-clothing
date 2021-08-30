<div>
    <h2 class="title px-4 py-3 text-2xl font-bold">Register Products</h2>
    <form  wire:submit.prevent='store' class=" min-w-screen mx-10 duration-600 bg-white mt-2 rounded-lg shadow-sm px-4   py-3  border border-1 border-gray-300">
        <x-text-field label="Product Name" model='name'  autofocus />
             
        <x-text-field label="Price"  model='price' type="number" />

        <x-text-field label="Retail Price"  model='retail_price' type="number"  />

        {{-- start of img upload section  --}}
        <div class="img-upload-section flex justify-around space-x-2 my-2">
                
            <x-img-upload-field model="img1" :tempimg="$img1?$img1->temporaryUrl():''"/>

            <x-img-upload-field model="img2" :tempimg="$img2?$img2->temporaryUrl():''"/>

            <x-img-upload-field model="img3" :tempimg="$img3?$img3->temporaryUrl():''"/>

        </div>
        {{-- end of img upload section  --}}


        <x-text-area placeholder="Description"  model='desc'  />

        <x-dropdownfield label="All Brands" :options="$brands" model="brand"/>
        
        <x-dropdownfield label="All Categories" :options="$categories" model="category"/>

        <div class="w-full flex justify-end">
                 <x-loading-confirm wire:target="store"/>

                <button type="reset" class="btn m-2" @click="showModal=false;showUpdate=false">Cancel</button>
        </div>
      

    </form>
</div>

