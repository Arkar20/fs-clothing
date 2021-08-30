<div class="single-img my-2 border border-1 border-gray-100 shadow-lg">
                    <img src="{{$tempimg}}" alt="img1" class="w-100 h-72 border boder-1 border-gray-200 shadow-lg ">
                        <div class="flex justify-center">
                            <button

                                type="button" class="my-3 w-32 btn bg-blue-500 ">
                                <svg fill="#FFF" height="18" viewBox="0 0 24 24" width="18">
                                        <path d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M9 16h6v-6h4l-7-7-7 7h4zm-4 2h14v2H5z"/>
                                </svg>
                                <span >Upload</span>  
                            <input
                                     wire:model.defer="{{$img}}"
                                    class="cursor-pointer   py-2 px-4 w-full opacity-0 pin-r pin-t"
                                    type="file"
                                  
                                >
                            </button>
                        </div>
</div>