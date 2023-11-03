@extends('livewire.guest')
@section('content')
<div>
<livewire:navtwo />
<div class=" pt-40 pb-3 w-full px-7 my-7">
 <h2 class=" text-white my-2">Watches</h2> 
 <br>
  <ul class="list-disc text-white my-7"> 
   @foreach($watches as $row)
    <li wire:click="showit({{$row['id']}},'{{$row['type']}}')" class="cursor-pointer hover:underline">   
      
       {{$row->name }}
     
    </li>   
   @endforeach
   </ul>
   <h2 class=" text-white my-2">Orders</h2> 
   <br>

   <ul class="list-disc text-white my-7"> 

   @foreach($orders as $row)
    <li  @click ="viewpopup2({{$row['id']}})" class="cursor-pointer hover:underline">   
      
       {{$row->watch->name}}
     
    </li>   
   @endforeach
  </ul>
</div>  
@if(session()->has('error'))
    <div x-data="{error:true}"  x-show="error"    class="w-1/3 h-1/7 top-10 left-10 z-50 fixed bg-red-100 border border-red-400 text-red-700 px-4 py-3  rounded" role="alert">
        <strong class="font-bold">Error</strong>
        <span class="block sm:inline">{{session('error')}}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-red-500" wire:click="setit" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
    @endif
<div id="info-popup2" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
     <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 md:p-8">
            <div class="w-full flex justify-end">
            <i id="close-modal2" class="fa fa-close hover:text-red-600 cursor-pointer"></i>
            </div>  
            <div class="mb-4 w-full flex flex-row  text-sm font-light text-gray-500 dark:text-gray-400">

             
                <div class="w-full px-3  mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-city">
                      Enter Order Code to verify:
                   </label>
                    <input id="ordercodeinput" x-ref="ordercodeinput" wire:model="ordercode"   @keyup="click=false"
                        class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-city" type="text" placeholder="1234">
                </div>

            </div>
            <div class="justify-between items-center pt-0 space-y-4 sm:flex sm:space-y-0">
                <div class="items-center justify-center w-full space-y-4 sm:space-x-4 sm:flex sm:space-y-0">
                    @if(isset($row))
                    <button wire:click="showit({{$row['id']}},'order')" id="confirm-button2" type="button" class="py-2 px-4 w-full text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-auto hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Order</button>
                    @endif
                  </div>
            </div>
         </div>
        </div>
    </div>

<script defer>
   function viewpopup2($id)
{ 

    const modalEl = document.getElementById('info-popup2');
const privacyModal = new Modal(modalEl, {
    placement: 'center'
});

privacyModal.show();

const closeModalEl = document.getElementById('close-modal2');
closeModalEl.addEventListener('click', function() {
    privacyModal.hide();
});

const acceptPrivacyEl = document.getElementById('confirm-button2');
acceptPrivacyEl.addEventListener('click', function() {
    privacyModal.hide();
});
}

</script> 

</div>
@endSection