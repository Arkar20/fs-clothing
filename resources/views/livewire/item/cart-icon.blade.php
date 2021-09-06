 <div class="cart-icon relative">
                    <svg 
                        x-data
                        @click="$dispatch('opencart')"
                    class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                  </svg>
                    
                  <div class="absolute -top-2 left-4 text-2xs w-6 h-6 p-1 flex justify-center items-center  rounded-full  bg-red-400 text-white">
                    {{$cartcount}}
                  </div>
 </div>