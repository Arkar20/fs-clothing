<x-customer-app-layout>
    

<div class="hero min-h-screen bg-base-200">
  <div class="text-center hero-content text-white">
    <div class="max-w-md">
      <h1 class="mb-5 text-5xl font-bold">
            Hello there
          </h1> 
      <p class="mb-5">
            Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.
          </p> 
      <button class="btn btn-primary">Shop Now</button>
    </div>
  </div>
</div>


{{-- start of popular items  --}}
<div class="m-5 shadow-xl border border-1 border-gray-100 ">
<h3 class="p-4 text-xl font-semibold">Top Items</h3>
<div class="w-100 carousel">
  @forelse ($topitems as $item)
      <div class="topitem w-1/4 carousel-item cursor-pointer relative ">
         <a href="{{route('shop.detail', $item->name)}}" class="topitemlink hover:border-purple-500 hover:text-purple-500 absolute top-40 left-28 text-white p-4 border border-1 border-white rounded-3xl">View Detail</a>
        <img src="{{$item->img1}}" class="topitemimg w-full hover:opacity-40" alt="">
     </div> 
  @empty
      <div class="w-1/4 carousel-item relative">
       
        <img src="https://picsum.photos/id/500/256/144" class="w-full">
   </div> 
  @endforelse
  
</div>
</div>

{{-- end of popular items  --}}
</x-customer-app-layout>
