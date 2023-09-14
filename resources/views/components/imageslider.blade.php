<div id="default-carousel{{$type}}"  x-init="initFlowbite()" class=" w-full top-30 " data-carousel="slide">
    <!-- Carousel wrapper -->
    <div  class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
         @foreach($watches as $watch) 
            @if($type=='coverimage')  
                <div :key="$watch->id"  class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img  src="{{url('/watchesCoverImages/'.$watch->coverimage->image)}}" class="absolute  block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            @else
            @foreach($watch->images as $img)
            <div :key="$img->id" class="hidden duration-700 ease-in-out" data-carousel-item>
               <img  src="{{url('/watches/'.$img->image)}}" class="absolute  block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>  
             @endforeach
            @endif
         @endforeach

    </div>
    <!-- Slider indicators -->
   
    <!-- Slider controls -->
</div>
