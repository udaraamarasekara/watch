@extends('livewire.guest')
@section('content')
<div>
<livewire:navtwo />
<div class="flex pt-40 pb-3 w-full px-7 my-7">
  <ul class="list-disc text-white my-7">  
   @foreach($output as $row)
    <li wire:click="showit({{$row['id']}},'{{$row['type']}}')" class="cursor-pointer hover:underline">   
      @php
       $ary=  $row->toArray();
      @endphp
     @foreach($ary as $k=>$v)
      @if($k!='id' && $k!='type' )
       {{$k}} : {{$v}}
      @endif 
     @endforeach 
    </li>   
   @endforeach
  </ul>
</div>  
</div>
@endSection