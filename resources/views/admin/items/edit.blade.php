<x-admin-layout>
  <div class="actionbar flex justify-between items-center px-6 py-3 ">
      <div class="title text-xl font-bold flex space-x-1 ">
          <svg  class=" w-6  align-bottom" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
        <span>Back</span>
      </div>
              {{-- remove btn  --}}
                            <button 
                                type="button" 
                                 class="px-4 py-2 rounded-lg flex justify-center items-center space-x-3 btn-error"
                                 wire:click='delete({{$item->id}})'>
                                        <svg  class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                        <span>Delete</span>

                            </button>
              {{-- remove btn  --}}

  </div>
   
  
  <form  wire:submit.prevent='store' class=" min-w-screen mx-10 duration-600 bg-white mt-2 rounded-lg shadow-sm px-4   py-3  border border-1 border-gray-300">
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
                <h2 class=" text-lg">Adidas</h2>
        </div>


        <div class="brand w-48 flex justify-between">
                <h2 class="font-semibold text-lg">Category</h2>
                <h2 class=" text-lg">Shirt</h2>
        </div>


      </div>

          <div class="brand-section flex space-x-12 px-3  py-2 ">
     
        <div class="brand w-48 flex-col space-y-8">
                <div class="font-semibold text-lg">
                    Available SIzes
                </div>
                <div class="font-semibold text-lg">
                    Available Color
                </div>
        </div>


        <div class="brand w-3/4 flex-col justify-between ">
                <h2 class="font-semibold text-lg ">Description</h2>
                <h2 class=" text-lg my-3">
                    Qui laborum nisi id in. Enim voluptate in id aute do proident est occaecat consequat qui enim irure. Eiusmod eiusmod ipsum culpa ad veniam cillum. Laborum incididunt deserunt amet id laboris. Enim irure Lorem consequat proident do consequat amet consequat anim.
                    Qui laborum nisi id in. Enim voluptate in id aute do proident est occaecat consequat qui enim irure. Eiusmod eiusmod ipsum culpa ad veniam cillum. Laborum incididunt deserunt amet id laboris. Enim irure Lorem consequat proident do consequat amet consequat anim.
                </h2>
        </div>


      </div>
      <div class="flex justify-center">
       <table class="w-1/2 border">
            <thead>
                <tr class="bg-gray-50 border-b">
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Size
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Color
                        </div>
                    </th>
                    <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Quantity
                        </div>
                    </th>
                     <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                        <div class="flex items-center justify-center">
                            Actions
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                            </svg>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                

                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r">XS</td>
                    <td class="p-2 border-r">Red</td>
                    <td class="p-2 border-r">20</td>
                    <td class="p-2 border-r flex justify-center">
                          <button    
                                type="button"  
                                class=" w-8 h-8 rounded-2xl flex justify-center items-center btn-accent" 
                                wire:click="edit({{$item->id}})"
                                 @click="
                                    showModal=true;
                                    showUpdate=true
                                    $nextTick(()=>$refs.fieldToFocus.focus())
                                    "  >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                            </button>

                    </td>
                </tr>



                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r">XS</td>
                    <td class="p-2 border-r">Red</td>
                    <td class="p-2 border-r">20</td>
                    <td class="p-2 border-r flex justify-center">
                          <button    
                                type="button"  
                                class=" w-8 h-8 rounded-2xl flex justify-center items-center btn-accent" 
                                wire:click="edit({{$item->id}})"
                                 @click="
                                    showModal=true;
                                    showUpdate=true
                                    $nextTick(()=>$refs.fieldToFocus.focus())
                                    "  >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                            </button>

                    </td>
                </tr>
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r">XS</td>
                    <td class="p-2 border-r">Red</td>
                    <td class="p-2 border-r">20</td>
                    <td class="p-2 border-r flex justify-center">
                          <button    
                                type="button"  
                                class=" w-8 h-8 rounded-2xl flex justify-center items-center btn-accent" 
                                wire:click="edit({{$item->id}})"
                                 @click="
                                    showModal=true;
                                    showUpdate=true
                                    $nextTick(()=>$refs.fieldToFocus.focus())
                                    "  >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                            </button>

                    </td>
                </tr>
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r">XS</td>
                    <td class="p-2 border-r">Red</td>
                    <td class="p-2 border-r">20</td>
                    <td class="p-2 border-r flex justify-center">
                          <button    
                                type="button"  
                                class=" w-8 h-8 rounded-2xl flex justify-center items-center btn-accent" 
                                wire:click="edit({{$item->id}})"
                                 @click="
                                    showModal=true;
                                    showUpdate=true
                                    $nextTick(()=>$refs.fieldToFocus.focus())
                                    "  >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                            </button>

                    </td>
                </tr>
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r">XS</td>
                    <td class="p-2 border-r">Red</td>
                    <td class="p-2 border-r">20</td>
                    <td class="p-2 border-r flex justify-center">
                          <button    
                                type="button"  
                                class=" w-8 h-8 rounded-2xl flex justify-center items-center btn-accent" 
                                wire:click="edit({{$item->id}})"
                                 @click="
                                    showModal=true;
                                    showUpdate=true
                                    $nextTick(()=>$refs.fieldToFocus.focus())
                                    "  >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                            </button>

                    </td>
                </tr>
                <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                    <td class="p-2 border-r">XS</td>
                    <td class="p-2 border-r">Red</td>
                    <td class="p-2 border-r">20</td>
                    <td class="p-2 border-r flex justify-center">
                          <button    
                                type="button"  
                                class=" w-8 h-8 rounded-2xl flex justify-center items-center btn-accent" 
                                wire:click="edit({{$item->id}})"
                                 @click="
                                    showModal=true;
                                    showUpdate=true
                                    $nextTick(()=>$refs.fieldToFocus.focus())
                                    "  >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                            </button>

                    </td>
                </tr>


            </tbody>

       </table>
      
    </div>
       <span class="text-red-500 text-sm flex justify-center">Please note that you are editing the quantity manually without purchasing from  supplier.</span>
    <div class="price-container flex-col space-y-4">
                 <div class="brand w-48 flex justify-between">
                        <h2 class="font-semibold text-lg">Price</h2>
                        <h2 class=" text-lg">
                            $ <span class="text-blue-600">20</span>
                        </h2>
                </div>
                 <div class="brand w-48 flex justify-between">
                        <h2 class="font-semibold text-lg">Retail Price</h2>
                        <h2 class=" text-lg">
                            $ <span class="text-blue-600">20</span>
                        </h2>
                </div>
                 <div class="brand w-80 flex justify-between">
                        <h2 class="font-semibold text-lg">Total Quantity</h2>
                        <h2 class=" text-lg">
                             <span class="text-red-600 font-bold">200 pcs Available</span>
                        </h2>
                </div>
    </div>
     
    <div class="btngroup mt-3">


        <button type="button" class="btn btn-success" >Set Visible In Store</button>
        <button type="button" class="btn btn-red" > Not Visible in Store</button>
    </div>
      
          
</form>


</x-admin-layout>