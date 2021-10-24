<div>
<p class="badge {{$order->getPaymentStatusClass()}}">{{$order->getPaymentStatusText()}}</p>
         <button    
                                type="button"  
                                class=" w-8 h-8 rounded-2xl flex justify-center items-center btn-accent" 
                                wire:click="confirmPayment"
                                 >
                                       <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                       <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                     </svg>
                            </button>
                        </div>