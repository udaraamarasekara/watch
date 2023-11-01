@extends('livewire.dashboard')
@section('content')
<div class="flex flex-col  pt-10 md:pl-60">
    
<div  class="mx-10 w-11/12  mt-20 flex-wrap flex flex-row justify-center overflow-x-auto p-4" >
    <table class="w-full  text-sm text-left text-gray-500 dark:text-gray-400">
        <tbody>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="col" class="px-6 py-3">
                    User details
                </th>
                <th scope="col" class="px-6 py-3">
                    Watch details
                </th>
                <th scope="col" class="px-6 py-3">
                    Order details
                </th>
                <th scope="col" class="px-6 py-3">
                   Actions
                </th>
            </tr>
            @foreach($orders as $order)
            <tr class="bg-white dark:bg-gray-800">
                <td scope="row" class="px-6 py-4">
                   <p><b>Name:</b> {{$order->orderable->username ? $order->orderable->username:$order->orderable->fullname }}</p>
                   <p><b>Country:</b> {{$order->orderable->country}}  </p>
                   <p><b>City:</b> {{$order->orderable->city}}</p>
                   <p><b>Zip:</b> {{$order->orderable->zip}}</p>
                   <p><b>Email:</b> {{$order->orderable->email}}</p>
                   <p><b>Contact:</b> {{$order->orderable->contact}}</p>
                   <p><b>Address:</b> {{$order->orderable->address}}</p>

                </td>
                <td class="px-6 py-4">
                   <p><b>Watch:</b> {{$order->watch->name}}</p>
                   <p><b>Price:</b> {{$order->watch->price}}</p>
                </td>
                <td class="px-6 py-4">
                    <p><b>Quantity:</b> {{$order->quantity}}</p>
                    <p><b>Total bill:</b> {{$order->price}}</p>
                    <p><b>Status:</b> {{$order->status}}</p>

                </td>
                <td class="px-6 py-4">
                   <input   type="submit" wire:click="update($order->id)" @click="viewpopup({{$order->id}})" value="Update status"
                   class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                </td>
            </tr>
            @endforeach
        
        </tbody>
    </table>
</div>
<div class="mx-10 my-3 w-full  justify-center flex flex-row">
      {{$orders->links('vendor.livewire.tailwind')}}
</div>


<div id="info-popup" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
     <div x-data="{ship:false}" class="relative p-4 w-full max-w-lg h-full md:h-auto">
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 md:p-8">
            <div class="w-full flex justify-end">
            <i id="close-modal" class="fa fa-close hover:text-red-600 cursor-pointer"></i>
            </div>  
            <div class="mb-4 w-full  text-sm font-light text-gray-500 dark:text-gray-400">
                <div class="flex justify-center"> 
                <h3 class="mb-3 items-center text-2xl font-bold text-gray-900 dark:text-white">Update Order Status</h3>
                </div> 
            </div>
            <div class="mb-4 w-full  text-sm font-light text-gray-500 dark:text-gray-400">

                <label for="status"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                <select x-ref="status"  @click="$refs.status.value=='shipped' ? ship=true:ship=false" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="paid" selected>Paid</option>
                <option value="shipped">Shipped</option>
                <option value="canceled">Canceled</option>
                </select>
            </div>  
            <div x-show="ship" class="mb-4 w-full  text-sm font-light text-gray-500 dark:text-gray-400">  
               <input id="link" placeholder="Order Tracking link" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="justify-between items-center pt-0 space-y-4 sm:flex sm:space-y-0">
                <div class="items-center justify-center w-full space-y-4 sm:space-x-4 sm:flex sm:space-y-0">
                    <button wire:click="updateOrder()" type="button"  class="py-2 px-4 w-full text-sm font-medium text-center text-white rounded-lg bg-red-700 sm:w-auto hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Direct Order</button>
                </div>
            </div>
         </div>
        </div>
    </div>

<script>

function viewpopup($id)
{
   
    const modalEl = document.getElementById('info-popup');
const privacyModal = new Modal(modalEl, {
    placement: 'center'
});

privacyModal.show();

const closeModalEl = document.getElementById('close-modal');
closeModalEl.addEventListener('click', function() {
    privacyModal.hide();
});

const acceptPrivacyEl = document.getElementById('confirm-button');
acceptPrivacyEl.addEventListener('click', function() {
    alert('privacy accepted');
    privacyModal.hide();
});
}


</script> 



</div>
@endSection