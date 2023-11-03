@extends('livewire.dashboard')
@section('content')
<div>
  <div class="md:pl-60 grid grid-cols-1 gap-4 pt-40 mx-10 md:grid-cols-3">
    
  @if(session()->has('Done'))
    <div x-data="{success:true}"  x-show="success"    class="w-1/3 h-1/7 md:ml-60 top-10 left-10 z-50 fixed bg-green-100 border border-green-400 text-green-700 px-4 py-3  rounded" role="alert">
        <strong class="font-bold">Done</strong>
        <span class="block sm:inline">{{Session::get('Done')}}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" @click="success=false" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
    @endif
    @if(session()->has('error'))
    <div x-data="{error:true}"  x-show="error"    class="w-1/3 h-1/7 md:ml-60 top-10 left-10 z-50 fixed bg-red-100 border border-red-400 text-red-700 px-4 py-3  rounded" role="alert">
        <strong class="font-bold">Error</strong>
        <span class="block sm:inline">{{Session::get('error')}}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" @click="error=false" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
    @endif
  @foreach($data as $row) <x-imagecard
    :key="$row->id" :id="$row->id" :image="$row->coverimage->image" :name="$row->name" :price="$row->price" sold="" />
  @endforeach

  </div>
  {{$data->links()}}
</div>
@endSection