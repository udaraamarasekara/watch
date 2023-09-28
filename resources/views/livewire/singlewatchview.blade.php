@extends('livewire.dashboard')
@section('content')
<div class="md:pl-60 pt-40 flex-row" >
<figure class="h-1/3 w-full flex justify-center">
  <img class="w-1/2 h-full rounded-lg" src="{{url('/watchesCoverImages/'.$watch->coverimage->image)}}" alt="image description">
</figure>
<div class=" w-full flex justify-center">
  <h3 class="mb-10 mt-5 text-4xl font-extrabold leading-none tracking-tight text-gray-100 md:text-5xl lg:text-6xl ">{{$watch->name}}</h3>
</div>
<div class=" w-full flex justify-between ">
  <p class="mb-10 mt-5 text-4xl font-extrabold leading-none tracking-tight text-gray-100 md:text-5xl lg:text-6xl ">{{$watch->description}}</p>
</div>
</div>
@endSection