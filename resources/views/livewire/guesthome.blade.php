@extends('livewire.guest')
@section('content')
<div>
<livewire:navtwo/>
<div x-init="$refs.guesthome.style.marginTop=navtwoheight+'px';" x-ref="guesthome" class="flex  pt-20 pb-3 w-full justify-center">
<h3 class="text-md text-white" >Click on a image for select</h3>

</div>
<div  class="flex pb-1 mt-0  w-full flex-col md:flex-row">

  <div class="md:w-1/2  w-full py-0 px-4">  
    <x-imageslider :watches="$watches" type="coverimage"/>
  </div>
  <div class="md:w-1/2 w-full pt-0 pb-2 top-20 px-4">  
    <x-imageslider :watches="$watches" type="image"/>
  </div>
</div>
</div>
@endSection