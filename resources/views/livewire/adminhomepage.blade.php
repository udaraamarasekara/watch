@extends('livewire.admindashboard')
@section('content')
<div class="md:pl-60 grid grid-cols-1 gap-4 pt-40 mx-10  md:grid-cols-3">
  @foreach($data as $row) 
   <x-imagecard :key="$row->id" :id="$row->id" :image="$row->coverimage->image" :name="$row->name" :price="$row->price"  sold="" />
  @endforeach 

</div>
@endSection