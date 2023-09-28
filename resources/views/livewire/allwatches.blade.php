@extends('livewire.guest')
@section('content')
<div>
<livewire:navtwo/>

@auth
<div x-init="$refs.pageallwatches.style.marginTop=navtwoheight+10+'px';" class="grid  md:pl-60 grid-cols-1 gap-4 pt-40 mx-10  md:grid-cols-3">
@else
<div x-init="$refs.pageallwatches.style.marginTop=navtwoheight+10+'px';" x-ref="pageallwatches" class="grid  grid-cols-1 gap-4 mx-10 pt-40  md:grid-cols-3">
@endauth
@foreach($data as $row) 
   <x-imagecard :key="$row->id" :id="$row->id" :image="$row->coverimage->image" :name="$row->name" :price="$row->price"  sold="" />
@endforeach 

</div>
<div class="mx-10 my-3 w-full  justify-center flex flex-row">
{{$data->links('vendor.livewire.tailwind')}}
</div>
</div>
@endSection
