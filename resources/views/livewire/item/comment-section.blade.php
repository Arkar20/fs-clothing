 <div 
         x-data="{showcomment:false}"
         class="mx-4 md:mx-10 duration-600 bg-white mt-2 rounded-lg shadow-sm px-4   py-3  border border-1 border-gray-300 ">
            <h3 @click.prevent="showcomment=!showcomment" class="uppercase font-semibold cursor-pointer">Comments ({{$commentCount}}) </h3>
            <div 
                @click.away="showcomment="
                x-show="showcomment"
                class="comments-section"
          {{-- wire:init='fetchAllComments' --}}
               
                >
               
               {{-- start of commens   --}}
              @if($comments)
               {{-- start of commens   --}}
                @forelse($comments as $comment)
           
                <div class="comment flex justify-start items-center">
                    <div class="avatar placeholder p-4">
                                        <div class="bg-neutral-focus text-neutral-content rounded-full w-14 h-14">
                                            <span>{{$comment->customer_id}}</span>
                                        </div>
                     </div>
                    <div>
                        <p class="text-md font-semibold">{{$comment->customer->name}}
                             @if($comment->is_favourite)
                        <span class="badge badge-sm ">Favorite</span> 
                        @endif
                        </p>
                  
                        <p class="text-sm">{{$comment->desc}}
                            <span class="text-2xs text-gray-400">{{$comment->created_at->diffForHumans()}}</span>
                        </p>
                    </div>
                    <div class="ml-auto space-x-2">
                        <button
                             wire:click="deleteComment({{$comment->id}})"
                             class="btn btn-error  btn-sm border-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-4 h-4 stroke-current">   
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>                       
                            </svg>
                        </button> 
                        @if(!$comment->is_favourite)
                        <button class="btn btn-sm btn-accent" wire:click="markAsFav({{$comment->id}})">Mark As Favorite</button> 
                        @endif
                    </div>

                </div>
                     @empty
                     <p>No Comments</p>
              
                @endforelse

                <div>
                    {{$comments->links()}}
                </div>
            @endif
            
              
             {{-- end of comments  --}}
            
            <form class="form-control" wire:submit.prevent='addComment'>
                    <label class="label">
                        <span class="label-text">Your Comment</span>
                    </label> 
                    <textarea wire:model="commenttxt" class="textarea h-24 textarea-bordered" placeholder="Feel free to share your opinions..."></textarea>
                    <button class="btn btn-primary my-2 ">Submit</button> 
                </form>

            </div>

        </div>