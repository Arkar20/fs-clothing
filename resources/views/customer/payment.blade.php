<x-customer-app-layout>
    <div class="box-container flex justify-center items-center w-screen h-screen">
        <form class="box-section shadow-lg bg-white rounded-md  py-3 mx-10 space-y-4">
           <div class="px-2 py-4 bg-gray-300">
               <h3>Your Order ID-ORD_000{{$order->id}}</h3>
           </div>
            <select class="w-full">
                <option value="">Choose Your Payment Account</option>
                <option value="">KBZ Pay</option>
                <option value="">CB Pay Pay</option>
                <option value="">Aya Bank</option>
                <option value="">MAB Bank</option>
            </select>
            <input type="file" class="">

           <x-text-area 
                placeholder="Note" 
                model='Hi'  />

      <button class="btn btn-primary" >Confirm Order</button>

        </form>
    </div>
</x-customer-app-layout>