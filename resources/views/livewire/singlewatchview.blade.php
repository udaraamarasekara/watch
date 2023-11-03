@extends('livewire.dashboard')
@section('content')
<div class="md:pl-60 px-5 pt-40 flex-row" >
<figure class="h-1/3 w-full flex justify-center">
  <div class="w-1/2 h-full">
  <x-staticimageslider :watch="$watch"/> 
  </div>
</figure>
<div class=" w-full flex justify-center">
  <h3 class="mb-10 mt-5 text-4xl font-extrabold leading-none tracking-tight text-gray-100 md:text-5xl lg:text-6xl ">{{$watch->name}}</h3>
</div>
<div class=" w-full ml-5 flex justify-between ">
  <p class="mb-10 mt-5 text-2xl leading-none tracking-tight text-gray-100 md:text-2xl lg:text-2xl ">{{$watch->description}}</p>
</div>
<div class="flex flex-row justify-end p-5">
<button  @click="viewpopup2({{$id}})" type="button"  class="m-3  w-full px-3 py-2 text-sm font-medium text-center text-gray-700 sm:w-auto bg-green-300 rounded-lg hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-400 dark:focus:ring-green-800">Order</button>

<button wire:click="navigate('/allwatches')" type="button"  class="py-2 m-3  px-4 w-full text-sm font-medium text-center text-white rounded-lg bg-red-700 sm:w-auto hover:bg-red-400 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Back</button>

</div>    
<div id="info-popup2" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
     <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 md:p-8">
            <div class="w-full flex justify-end">
            <i id="close-modal2" class="fa fa-close hover:text-red-600 cursor-pointer"></i>
            </div>  
            <div class="mb-4 w-full flex flex-row  text-sm font-light text-gray-500 dark:text-gray-400">

                <div class="w-1/2 px-3  mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-city">
                        Quantity
                    </label>
                    <input id="inputqty"
                        @click="$refs.inputprice.value={{$watch->price}}*$refs.inputqty.value==0 ?{{$watch->price}}:{{$watch->price}}*$refs.inputqty.value"
                        min="1"
                        @keyup="$refs.inputprice.value={{$watch->price}}*$refs.inputqty.value==0 ?{{$watch->price}}:{{$watch->price}}*$refs.inputqty.value"
                        x-ref="inputqty" wire:model.blur="qty" @keyup="click=false"
                        class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-city" type="number" placeholder="1">
                </div>

                <div class="w-1/2 px-3  mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-city">
                        Price (USD)
                    </label>
                    <input id="inputprice" x-ref="inputprice" disabled value="{{$watch->price}}" @keyup="click=false"
                        class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        id="grid-city" type="number" placeholder="1">
                </div>

            </div>
            <div class="justify-between items-center pt-0 space-y-4 sm:flex sm:space-y-0">
                <div class="items-center justify-center w-full space-y-4 sm:space-x-4 sm:flex sm:space-y-0">
                    <button wire:click="order({{$id}})" id="confirm-button2" type="button" class="py-2 px-4 w-full text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-auto hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Order</button>
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