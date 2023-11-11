<div>
   <h2 class="mx-4 mt-12 mb-3 text-5xl text-white text-center py-10" >Top Sales</h2>
   @foreach($topSaleItems as $item)
   <div :key="{{$item->id}}" class="flex md:flex-row flex-col my-5 mx-4">
      <img class="rounded-lg justify-self-center object-cover h-48" src="{{url('/watchesCoverImages/'.$item->coverimage->image)}}" alt="" />
      <div class="w-full">
         <div class="text-2xl text-white flex w-full justify-around" >
           <div> {{$item->name}} </div>
           <div class="flex "><div>{{$item->sold}} : </div> Sales</div>
        </div>
        <div class="text-xl m-4 px-4 pb-4 h-36 overflow-y-hidden text-white">
            <p>
            overflow-y-hidden
            overflow-y-hiddenoverflow-y-hidden
            overflow-y-hidden
            overflow-y-hiddenoverflow-y-hidden

            overflow-y-hidden
            overflow-y-hidden
            overflow-y-hidden

            overflow-y-hiddenoverflow-y-hiddenoverflow-y-hidden
            overflow-y-hidden
            overflow-y-hidden
            overflow-y-hidden
            overflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenv
            overflow-y-hidden
            overflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hidden
                {{$item->description}}
            overflow-y-hidden
            overflow-y-hiddenoverflow-y-hidden
            overflow-y-hidden
            overflow-y-hiddenoverflow-y-hidden

            overflow-y-hidden
            overflow-y-hidden
            overflow-y-hidden

            overflow-y-hiddenoverflow-y-hiddenoverflow-y-hidden
            overflow-y-hidden
            overflow-y-hidden
            overflow-y-hidden
            overflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenv
            overflow-y-hidden
            overflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hiddenoverflow-y-hidden
                {{$item->description}}
            </p>
           </div>
      </div>  
    </div>  
   @endforeach 
</div>
