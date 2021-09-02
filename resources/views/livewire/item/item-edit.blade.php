<div>

    {{-- start of go back and delte section  --}}
        <livewire:item.item-delete :item="$item"/>
    {{-- end of go back and delte section  --}}
   
  
  <div  wire:submit.prevent='store' class=" min-w-screen mx-10 duration-600 bg-white mt-2 rounded-lg shadow-sm px-4   py-3  border border-1 border-gray-300">
      <h1 class="title text-xl font-bold flex  px-3  py-2 space-x-1 ">Item/{{$item->name}}</h1>
        
      <div class="img-container flex justify-around space-x-2 my-2">

             <x-img-upload-field 
                        model="img1" 
                        {{-- :tempimg="$img1?$img1->temporaryUrl():$item->img1" --}}
                        :tempimg="$item->img1"
                        />

            <x-img-upload-field 
                    model="img2"
                     {{-- :tempimg="$img2?$img2->temporaryUrl():$item->img2" --}}
                        :tempimg="$item->img2"
                     
                     />

            <x-img-upload-field 
                        model="img3"
                        {{-- :tempimg="$img3?$img3->temporaryUrl():$item->img3" --}}
                        :tempimg="$item->img3"
                        
                        />
      </div>
      <div class="brand-section flex space-x-12 px-3  py-2 ">
     
        <div class="brand w-48 flex justify-between">
                <h2 class="font-semibold text-lg">Brand</h2>
                <h2 class=" text-lg">{{$item->brand->name}}</h2>
                <x-edit-icon 
                    
                    @click="
                        $dispatch('edit',{modal:'Edit Brand',field:'brand'})
                    "
                />
        </div>


        <div class="brand w-48 flex justify-between space-x-4">
                <h2 class="font-semibold text-lg">Category</h2>
                <h2 class=" text-lg">{{$item->category->category}}</h2>
                 <x-edit-icon 
                  @click="
                        $dispatch('edit',{modal:'Edit Category'})
                    "
                 />
        </div>


      </div>

          <div class="brand-section flex space-x-12 px-3  py-2 ">
     
        <div class="brand w-48 flex-col space-y-8">
                
                <div class="font-semibold  flex-col justify-center text-lg">
                   <div class="flex  space-x-4">
                    <p>
                        Available Size 
                    </p>
                    
                     <x-edit-icon />

                   </div>
                    
                    <div class="size-icons flex space-x-2">
                            <div class="size-icon text-xs  border-2 border-black w-5 h-5 flex items-center justify-center">s</div>
                            <div class="size-icon text-xs  border-2 border-black w-5 h-5 flex items-center justify-center">s</div>
                            <div class="size-icon text-xs  border-2 border-black w-5 h-5 flex items-center justify-center">s</div>
                            <div class="size-icon text-xs  border-2 border-black w-5 h-5 flex items-center justify-center">s</div>
                     </div>
                </div>
                <div class="font-semibold  flex-col justify-center text-lg">
                   <div class="flex  space-x-4">
                    <p>
                        Available Color 
                    </p>
                    
                     <x-edit-icon />

                   </div>
                    
                    <div class="size-icons flex space-x-2">
                            <div class="size-icon text-xs  border-2 border-black w-5 h-5 flex items-center justify-center">s</div>
                            <div class="size-icon text-xs  border-2 border-black w-5 h-5 flex items-center justify-center">s</div>
                            <div class="size-icon text-xs  border-2 border-black w-5 h-5 flex items-center justify-center">s</div>
                            <div class="size-icon text-xs  border-2 border-black w-5 h-5 flex items-center justify-center">s</div>
                     </div>
                </div>
        </div>


        <div class="brand w-3/4 flex-col justify-between ">
                <h2 class="flex space-x-4 font-semibold text-lg ">
                   <p>Description</p>
                     <x-edit-icon
                     
                     @click="
                        $dispatch('edit',{modal:'Edit Description'})
                    "
                     />
                </h2>
                <h2 class=" text-lg my-3">
                    {{$item->desc}}
                </h2>
        </div>


      </div>
     
            <livewire:item.item-edit-table :item="$item"/>
        <div class="price-container flex-col space-y-4">
                 <div class="brand w-48 flex justify-between">
                        <h2 class="font-semibold text-lg">Price</h2>
                        <h2 class=" text-lg">
                            $ <span class="text-blue-600">{{$item->price}}</span>
                        </h2>
                     <x-edit-icon 
                        @click="$dispatch('edit',{modal:'Edit Price'})"
                     />

                </div>
                 <div class="brand w-48 flex justify-between">
                        <h2 class="font-semibold text-lg">Retail Price</h2>
                        <h2 class=" text-lg">
                            $ <span class="text-blue-600">{{$item->retail_price}}</span>
                        </h2>
                     <x-edit-icon 
                        @click="$dispatch('edit',{modal:'Edit Retail Price'})"
                     
                     />

                </div>
                 <div class="brand w-80 flex justify-between">
                        <h2 class="font-semibold text-lg">Total Quantity</h2>
                        <h2 class=" text-lg">
                             <span class="text-red-600 font-bold">{{$item->total_qty}} pcs Available</span>
                        </h2>
                </div>
    </div>
     
    <div class="btngroup mt-3">


        <button type="button" class="btn btn-success" >Set Visible In Store</button>
        <button type="button" class="btn btn-red" > Not Visible in Store</button>
    </div>
      
          
</div>
  
    {{-- modal  --}}
<!-- This example requires Tailwind CSS v2.0+ -->
<div
x-cloak
x-data="{edit:false,name:'',field:''}"
  @close-modal.window="edit = false"

@edit.window="  
    edit=true
    name=$event.detail.modal
    field=$event.detail.field
    $nextTick(()=>$refs.field.focus())
    "
x-show="edit"
class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
   
    -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div 
    
    @click.away="edit=false"
     x-show="edit"
            x-transition.duration.600ms
            x-transition.duration:enter="ease-out duration-300"
            x-transition.duration:enter-start="opacity-0 translate-y-full sm:scale-100"
            x-transition.duration:enter-end="opacity-100 translate-y-0 sm:scale-100"
         class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
        <h4 class="text-xl font-bold" x-text="name"></h4>
       
       
        <div x-show="name==='Edit Category'">
        <x-dropdownfield 
         x-ref="category"  
         table="categories"
         label="All Categories" :options="$categories" model="category"/>

       </div>

       <div x-show="name==='Edit Brand'">
        <x-dropdownfield 
         x-ref="brand"
         label="All Categories" 
         table="brands"
         :options="$brands" model="brand"/>

       </div>

        <div x-show="name==='Edit Description'">
            
            <x-text-area 
                placeholder="Description" 
                model='desc'
                value="{{$item->desc}}"
                 x-ref="fieldToFocus"

                />


       </div>

        <div x-show="name==='Edit Price'">
            
                 <x-text-field
                 label="Price"
                  model='price'
                  x-ref="price"
                  />


       </div>
        <div x-show="name==='Edit Retail Price'">
            
                 <x-text-field
                 label="Retail Price" 
                 model='retail_price'  
                />


       </div>
         

      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse ">
            <div x-show="name==='Edit Brand'">
                   <Button class="btn btn-accent"  wire:click="updateBrand()" >Update</Button>
            </div>    
            <div x-show="name==='Edit Category'" >
                    <Button class="btn btn-accent" wire:click="updateCategory()" >Update</Button>

            </div>    
            <div x-show="name==='Edit Description'" >
                    <Button class="btn btn-accent" wire:click="updateDescription()" >Update</Button>

            </div>    
            <div x-show="name==='Edit Price'" >
                    <Button class="btn btn-accent" wire:click="updatePrice()" >Update</Button>

            </div>    
            <div x-show="name==='Edit Retail Price'" >
                    <Button class="btn btn-accent" wire:click="updateRetailPrice()" >Update</Button>

            </div>    

                <button type="reset" class="btn "  @click="edit=false">Cancel</button>

      </div>
    </div>
</div>
</div>


</div>
</div>