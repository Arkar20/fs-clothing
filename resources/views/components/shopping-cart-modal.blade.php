 <!-- This example requires Tailwind CSS v2.0+ -->
<div
x-cloak
x-data="{edit:false,shoppingcart:false,addtocart:false}"
x-init=" 
         Livewire.on('itemaddedtocart',()=>{addtocart=false;edit=false;})
      
      "
  @close-modal.window="edit = false"
   
    @opencart.window="
    
             edit=true
             shoppingcart=true
             addtocart=false
           
    "
    @addtocart.window="
                         edit=true
                      shoppingcart=false
                      addtocart=true
                    
                    "
x-show="edit"
class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
  <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
   
 
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

    <!-- This element is to trick the browser into centering the modal contents. -->
    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

    <div 
    
    @click.away="edit=false;shoppingcart=false"
     x-show="edit"
            x-transition.duration.600ms
            x-transition.duration:enter="ease-out duration-300"
            x-transition.duration:enter-start="opacity-0 translate-y-full sm:scale-100"
            x-transition.duration:enter-end="opacity-100 translate-y-0 sm:scale-100"
         class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
      
         <livewire:item.shopping-cart />

       <livewire:item.item-addtocart />


         

  
</div>
</div>


</div>