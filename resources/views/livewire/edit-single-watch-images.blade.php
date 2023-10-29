@extends('livewire.dashboard')
@section('content')
<div>
  <div class="md:pl-60 grid grid-cols-1 gap-4 pt-40 mx-10 md:grid-cols-3"> @foreach($data as $row) <x-editImage
    :key="$row->id" :id="$row->id" :image="$row->image" />
  @endforeach

  </div>
  {{$data->links()}}
</div>
@endSection