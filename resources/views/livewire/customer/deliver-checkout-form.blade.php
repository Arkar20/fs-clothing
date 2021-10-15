<div>

  {{-- delivery form  --}}
     <div class="container mx-auto mt-10  py-3  ">
  <div class="overflow-x-auto shadow-xl border-1 border-gray-200 px-10  my-3"> 
    <p class="font-semibold text-2xl mt-10 mb-5">Fill Delivery Information</p>
    <form class="w-full flex-col space-y-4">
             <x-text-field label="Address" model='address'   />
            <x-text-area 
                placeholder="Say saysomething about the order if you wish..." 
                model='note'  />



    </form>
  </div>
  </div>
  {{-- end of delivery form  --}}


  {{-- start of payment form  --}}
     <div class="container mx-auto  my-3 py-3  ">
  <div class="overflow-x-auto shadow-xl border-1 border-gray-200 px-10"> 
    <p class="font-semibold text-2xl mt-10 mb-5">Credit Card</p>
    <form class="w-full flex-col space-y-4 my-4" x-data="{showpayments:false}">
      <div>
        <input type="radio" 
                class="mb-2" 
                wire:model="payment"
                value="cod"
                @click="showpayments=false"   />    


        <span class="text-lg uppercase mt-4">Cash On Delivery</span>
      </div>
       <div >
        <input type="radio" 
            class="mb-2" 
            @click="showpayments=!showpayments"
            wire:model="payment"
            value="prepaid"
             
            />   
        <span class="text-lg uppercase mt-4 cursor-pointer" >Prepaid</span>
        <div
        x-show="showpayments"
       
        value="payment"
        class="payment-methods-desc space-y-4 bg-gray-200 px-4 border border-1 border-gray-300 shadow-md ">
            <h3 class="text-center text-lg uppercase font-bold  py-4">We Allow These Payment Methods!</h3>
            <div class="flex items-center mx-10 space-x-10"> 
               

              <img src="https://play-lh.googleusercontent.com/cnKJYzzHFAE5ZRepCsGVhv7ZnoDfK8Wu5z6lMefeT-45fTNfUblK_gF3JyW5VZsjFc4=s180-rw" class="h-12" />
              <p>Acc Number-98320482309423047</p>
              
            </div>
            <div class="flex items-center mx-10 space-x-10"> 
               

              <img src="https://play-lh.googleusercontent.com/z-wRjDo9L-3c1-39ZH-VyKwofSHsmI79VH3T_pSqlj_fRhZSpc7zbDlFKS4hle0bLOk=s180-rw" class="h-12" />
              <p>Acc Number-98320482309423047</p>
              
            </div>
            <div class="flex items-center mx-10 space-x-10"> 
               

              <img src="https://play-lh.googleusercontent.com/4_vU8WAmVZMol_HmuicV2_XJfrg0V0nP5Vi_e_0do3lx8oMbyIX2UugA_Ep5pC5JhQ=s180-rw" class="h-12" />
              <p>Acc Number-98320482309423047</p>
              
            </div>
            <div class="flex items-center mx-10 space-x-10"> 
               

              <img src="https://play-lh.googleusercontent.com/BV5zzOvoFYVsflRSfOTm7OXbT5HsG6f2mnQqEJKFOGPG1ZJFJXovjdEGMKWYgLLcCdtq=s180-rw" class="h-12" />
              <p>Acc Number-98320482309423047</p>
              
            </div>
        </div>
      </div>
      {{-- <x-text-field label="Enter Your Credit Card" model='card'   />
            --}}
      <button class="btn btn-primary" wire:click.prevent="orderConfirm">Confirm Order</button>

    </form>
  </div>
  </div>
  {{-- end of payment form  --}}
</div>
