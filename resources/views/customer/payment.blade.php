<x-customer-app-layout>

     <div >
       
        <div
       
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
    <div class="box-container flex justify-center items-center w-screen h-screen">
        <form class="box-section shadow-lg bg-white rounded-md px-4 py-3 mx-10 space-y-4" action="{{route('payment.store')}}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="order_id" value="{{$order->id}}" />
            @csrf
            <div class="px-2 py-4 bg-gray-300">
               <h3>Your Order ID-ORD_000{{$order->id}}</h3>
           </div>
            <select class="w-full" name="payment_method">
                <option value="">Choose Your Payment Account</option>
                <option value="KBZ Pay">KBZ Pay</option>
                <option value="CB Pay Pay">CB Pay Pay</option>
                <option value="Aya Bank">Aya Bank</option>
                <option value="MAB Bank">MAB Bank</option>
            </select>
              @error('payment_type')
                <span class="text-red-400">{{$message}}</span>
            @enderror
            <br>
            <input type="file" name="payment_screenshot">
            @error('payment_screenshot')
                <span class="text-red-400 block">{{$message}}</span>
            @enderror

          <textarea name="desc" class="w-full rounded-md " rows="5"></textarea>
            @error('desc')
                 <span class="text-red-400 block">{{$message}}</span>
            @enderror
      <button type="submit" class="btn btn-primary" >Confirm Payment</button>

        </form>
    </div>
</x-customer-app-layout>