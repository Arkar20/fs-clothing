 {{-- start of nav --}}
 <div>
<div 
    x-cloak
    x-show="drawer" 
    class="absolute top-18 right-0 bg-black opacity-40 w-screen h-screen"></div>

    <ul 
    @click.away="drawer=false"
    x-cloak
    x-show.transtion.duration-400ms="drawer"
    x-transition.duration:enter="ease-out duration-300"
    x-transition.duration:enter-start="opacity-0 -translate-x-full sm:scale-100"
    x-transition.duration:enter-end="opacity-100 translate-x-0 sm:scale-100"
    x-transition.duration:leave="ease-out duration-200"
    x-transition.duration:leave-start="opacity-100 translate-x-0 sm:scale-100"
    x-transition.duration:leave-end="opacity-0 -translate-x-full sm:scale-100"
    class="absolute  w-64 h-screen transform   z-20 overflow-auto transition-all duration-300  bg-white text-base-content  border border-1 ">
      
    <li class="mx-10 my-3 flex justify-center cursor-pointer">
        <div class="w-96 text-center text-gray-600 py-4 px-4 hover:bg-purple-500 hover:text-white rounded-3xl flex justify-center">
           
             <span class="text-left">Dashboard</span>
        </div>
    </li>
    <li class="mx-10 my-3 flex justify-center cursor-pointer">
        
        <a  href="/brand" class="w-96 text-center text-gray-600 py-4 px-4 hover:bg-purple-500 hover:text-white rounded-3xl flex justify-center">
           
             <span class="text-left">Brand</span>
        </a>
    </li>
    <li class="mx-10 my-3 flex justify-center cursor-pointer">
        <a href="/category" class="w-96 text-center text-gray-600 py-4 px-4 hover:bg-purple-500 hover:text-white rounded-3xl flex justify-center">
           
             <span class="text-left">Category</span>
        </a>
    </li>
    <li class="mx-10 my-3 flex justify-center cursor-pointer">
        <a href="/color" class="w-96 text-center text-gray-600 py-4 px-4 hover:bg-purple-500 hover:text-white rounded-3xl flex justify-center">
           
             <span class="text-left">Color</span>
        </a>
    </li>
    <li class="mx-10 my-3 flex justify-center cursor-pointer">
        <a href="/supplier" class="w-96 text-center text-gray-600 py-4 px-4 hover:bg-purple-500 hover:text-white rounded-3xl flex justify-center">
           
             <span class="text-left">Supplier</span>
        </a>
    </li>
{{--    
      <li class="flex justify-center my-4"> 
            <a class="text-center p-2 md:p-4 w-44  fill-current  text-gray-700 hover:bg-purple-800 hover:text-white cursor-pointer flex ">
                <svg class="w-10 md:w-20" xmlns="http://www.w3.org/2000/svg" width="25" height="17.395" viewBox="0 0 25 17.395">
                    <path id="Icon_metro-profile" data-name="Icon metro-profile" d="M27.713,10.2H25.965V7.763l-3.609-.051.019,2.485H11.53L11.6,7.712,8.07,7.763v2.485L6.284,10.2A1.725,1.725,0,0,0,4.5,11.854v11.6a1.725,1.725,0,0,0,1.786,1.657H27.713A1.725,1.725,0,0,0,29.5,23.45v-11.6A1.725,1.725,0,0,0,27.713,10.2ZM23.249,8.54h1.786v3.313H23.249ZM11.642,14.183A2.2,2.2,0,0,1,13.6,16.564a2.2,2.2,0,0,1-1.954,2.381,2.2,2.2,0,0,1-1.954-2.381,2.2,2.2,0,0,1,1.954-2.381ZM8.963,8.54h1.786v3.313H8.963ZM7.773,21.75s.212-1.575.693-1.873a7.268,7.268,0,0,1,1.866-.5s.9.89,1.28.89,1.279-.89,1.279-.89a7.246,7.246,0,0,1,1.867.5c.565.35.706,1.873.706,1.873H7.773Zm18.154-.785H17.892v-.828h8.036Zm0-1.657H17.892V18.48h8.036Zm0-1.657H17.892v-.828h8.036Zm0-1.657H17.892v-.828h8.036Z" transform="translate(-4.499 -7.712)" />
             </svg>
            <span >Dashboard</span>
            </a>
      </li> 
      <li>
            <a class="text-center p-2 md:p-4 w-full fill-current  text-gray-700 hover:bg-purple-800 hover:text-white cursor-pointer flex ">
                <svg class="w-10 md:w-20" xmlns="http://www.w3.org/2000/svg" width="25" height="17.395" viewBox="0 0 25 17.395">
                    <path id="Icon_metro-profile" data-name="Icon metro-profile" d="M27.713,10.2H25.965V7.763l-3.609-.051.019,2.485H11.53L11.6,7.712,8.07,7.763v2.485L6.284,10.2A1.725,1.725,0,0,0,4.5,11.854v11.6a1.725,1.725,0,0,0,1.786,1.657H27.713A1.725,1.725,0,0,0,29.5,23.45v-11.6A1.725,1.725,0,0,0,27.713,10.2ZM23.249,8.54h1.786v3.313H23.249ZM11.642,14.183A2.2,2.2,0,0,1,13.6,16.564a2.2,2.2,0,0,1-1.954,2.381,2.2,2.2,0,0,1-1.954-2.381,2.2,2.2,0,0,1,1.954-2.381ZM8.963,8.54h1.786v3.313H8.963ZM7.773,21.75s.212-1.575.693-1.873a7.268,7.268,0,0,1,1.866-.5s.9.89,1.28.89,1.279-.89,1.279-.89a7.246,7.246,0,0,1,1.867.5c.565.35.706,1.873.706,1.873H7.773Zm18.154-.785H17.892v-.828h8.036Zm0-1.657H17.892V18.48h8.036Zm0-1.657H17.892v-.828h8.036Zm0-1.657H17.892v-.828h8.036Z" transform="translate(-4.499 -7.712)" />
             </svg>
            <span >Manage Customers</span>
            </a>
      </li> 
      <li>
          <button tabindex="0" class=" dropdown dropdown-right text-center p-2 md:p-4 w-full fill-current  text-gray-700 hover:bg-purple-800 hover:text-white cursor-pointer flex ">
               <svg class="w-10 md:w-20" xmlns="http://www.w3.org/2000/svg" width="23.707" height="23.708" viewBox="0 0 23.707 23.708">
                      <path id="Icon_awesome-tools" data-name="Icon awesome-tools" d="M23.2,18.321,17.778,12.9a3.438,3.438,0,0,0-3.954-.644L8.888,7.32V4.445L2.962,0,0,2.963,4.444,8.89H7.319l4.936,4.936a3.445,3.445,0,0,0,.644,3.954L18.32,23.2a1.721,1.721,0,0,0,2.44,0l2.44-2.44a1.73,1.73,0,0,0,0-2.44Zm-7.843-7.9a4.871,4.871,0,0,1,3.468,1.435l.9.9a6.554,6.554,0,0,0,2.028-1.366,6.659,6.659,0,0,0,1.755-6.329.554.554,0,0,0-.931-.255L19.13,8.246l-3.144-.523-.523-3.144,3.445-3.445A.559.559,0,0,0,18.644.2a6.67,6.67,0,0,0-6.325,1.755,6.561,6.561,0,0,0-1.908,4.8l3.8,3.8A5.044,5.044,0,0,1,15.357,10.418Zm-4.811,3.8L7.921,11.589.865,18.65a2.963,2.963,0,0,0,4.19,4.19l5.723-5.723a4.972,4.972,0,0,1-.232-2.9Zm-7.584,7.64a1.111,1.111,0,1,1,1.111-1.111A1.114,1.114,0,0,1,2.962,21.854Z" transform="translate(0.004)"/>
                </svg>
            <div>
                <div >Manage Utilites</div> 
                <ul class="shadow menu dropdown-content bg-base-100 rounded-box w-52 text-gray-500">
                    <li>
                    <a>Item 1</a>
                    </li> 
                    <li>
                    <a>Item 2</a>
                    </li> 
                    <li>
                    <a>Item 3</a>
                    </li>
                </ul>
                </div>
            </button>
               
      </li> --}}
      
    </ul>
     </div>
    {{-- end of nav --}}