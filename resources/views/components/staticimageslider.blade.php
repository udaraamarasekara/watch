<div id="default-carousel-static"  x-init="initFlowbite()" class=" w-full  top-30 " data-carousel="static">
    <!-- Carousel wrapper -->
    <div  class="relative  h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
            @foreach($watch->images as $img)
            <div key="{{$img->id}}" class="hidden duration-700 ease-in-out" data-carousel-item>
               <img  src="{{url('/watches/'.$img->image)}}" class="absolute  block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>  
             @endforeach

    </div>
    @auth
    <button type="button" class="absolute md:top-80 top-56 left-0  md:left-60 z-30 flex items-center justify-center  md:pt-0  px-4 cursor-default group " >
        <span class="focus:outline-none cursor-pointer inline-flex items-center justify-center w-10 h-10  md:mb-40 mb-32 rounded-full bg-white/30 dark:bg-gray-800/30 data-carousel-prev group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    @else
    <button type="button" class="absolute md:top-80 top-56 left-0 z-30 flex items-center justify-center  px-4  md:pt-0 group cursor-default" >
        <span data-carousel-prev class="cursor-pointer inline-flex items-center justify-center w-10 h-10  md:mb-40 mb-32 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    @endauth
    <button type="button" class="absolute md:top-80 top-56 right-0 z-30 flex items-center justify-center  px-4 group   md:pt-0  cursor-default" >
        <span data-carousel-next class="cursor-pointer  inline-flex items-center justify-center w-10 h-10 md:mb-40 mb-32 rounded-full bg-white/30 group  dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4  text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>