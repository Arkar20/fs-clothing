<div class="w-full flex justify-between text-md">
        <p>Order Status</p>
        <p class="badge {{$order->getOrderStatusClass()}}">{{$order->getOrderStatusText()}}</p>
         <button    
                                type="button"  
                                class=" w-8 h-8 rounded-2xl flex justify-center items-center btn-accent" 
                                wire:click="confirmOrder"

                                 >
                            </button>
      </div>