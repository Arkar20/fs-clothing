<x-customer-app-layout>
    {{-- banner --}}
                <div class="w-100 flex-coljustify-between md:items-center mx-12 ">
                     <div class="text-sm breadcrumbs">
                        <ul>
                            <li>
                                <a href="{{route('home.shop')}}">Shop</a>
                            </li> 
                            <li>
                               {{$item->name}}
                            </li> 
                        </ul>
                    </div>
                </div>
                {{-- banner --}}

       <div class="mx-4 md:mx-10 duration-600 bg-white mt-2 rounded-lg shadow-sm px-4   py-3  border border-1 border-gray-300 flex justify-start space-x-2">
        <div class="w-full md:w-1/2 lg:w-1/3  flex-col">
            <img src="{{asset($item->img1)}}" class="w-full">
             
            <div class="flex-none my-2 overflow-x-auto">
                <div class="flex space-x-1 w-1/4 ">

                    <img src="{{asset($item->img1)}}" >
                    <img src="{{asset($item->img2)}}" >
                    <img src="{{asset($item->img3)}}" >
                    <img src="{{asset($item->img3)}}" >
                </div>
            
        </div>
        </div>
    
    </div>
         <div class="mx-4 md:mx-10 duration-600 bg-white mt-2 rounded-lg shadow-sm px-4   py-3  border border-1 border-gray-300 ">
            <h3 class="uppercase font-semibold">Product Detail of {{$item->name}}</h3>
            <p class="my-2">{{$item->desc}}</p>
        </div>
         <div class="mx-4 md:mx-10 duration-600 bg-white mt-2 rounded-lg shadow-sm px-4   py-3  border border-1 border-gray-300 ">
            <h3 class="uppercase font-semibold">Comments Section </h3>
            <div class="comments-section">
               
               {{-- start of commens   --}}
                <div class="comment flex justify-start items-center">
                    <div class="avatar placeholder p-4">
                                        <div class="bg-neutral-focus text-neutral-content rounded-full w-14 h-14">
                                            <span>MX</span>
                                        </div>
                     </div>
                     <p class="text-sm">Exercitation est commodo adipisicing nostrud eu pariatur amet eu nisi officia aute minim officia non. Sit laboris ipsum in Lorem sint ullamco et irure ea dolore sit mollit. Culpa id magna labore ad in anim voluptate.</p>
                     
                </div>
                <div class="comment flex justify-start items-center">
                    <div class="avatar placeholder p-4">
                                        <div class="bg-neutral-focus text-neutral-content rounded-full w-14 h-14">
                                            <span>MX</span>
                                        </div>
                     </div>
                     <p class="text-sm">Exercitation est commodo adipisicing nostrud eu pariatur amet eu nisi officia aute minim officia non. Sit laboris ipsum in Lorem sint ullamco et irure ea dolore sit mollit. Culpa id magna labore ad in anim voluptate.</p>
                     
                </div>
                <div class="comment flex justify-start items-center">
                    <div class="avatar placeholder p-4">
                                        <div class="bg-neutral-focus text-neutral-content rounded-full w-14 h-14">
                                            <span>MX</span>
                                        </div>
                     </div>
                     <p class="text-sm">Exercitation est commodo adipisicing nostrud eu pariatur amet eu nisi officia aute minim officia non. Sit laboris ipsum in Lorem sint ullamco et irure ea dolore sit mollit. Culpa id magna labore ad in anim voluptate.</p>
                     
                </div>
                <div class="comment flex justify-start items-center">
                    <div class="avatar placeholder p-4">
                                        <div class="bg-neutral-focus text-neutral-content rounded-full w-14 h-14">
                                            <span>MX</span>
                                        </div>
                     </div>
                     <p class="text-sm">Exercitation est commodo adipisicing nostrud eu pariatur amet eu nisi officia aute minim officia non. Sit laboris ipsum in Lorem sint ullamco et irure ea dolore sit mollit. Culpa id magna labore ad in anim voluptate.</p>
                     
                </div>
                <div class="comment flex justify-start items-center">
                    <div class="avatar placeholder p-4">
                                        <div class="bg-neutral-focus text-neutral-content rounded-full w-14 h-14">
                                            <span>MX</span>
                                        </div>
                     </div>
                     <p class="text-sm">Exercitation est commodo adipisicing nostrud eu pariatur amet eu nisi officia aute minim officia non. Sit laboris ipsum in Lorem sint ullamco et irure ea dolore sit mollit. Culpa id magna labore ad in anim voluptate.</p>
                     
                </div>
                 
                {{-- end of comments  --}}
            
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Your Comment</span>
                </label> 
                <textarea class="textarea h-24 textarea-bordered" placeholder="Feel free to share your opinions..."></textarea>
                </div>
            </div>
            <button class="btn btn-primary my-2 ">Submit</button> 

        </div>
</x-customer-app-layout>