<div id="{{$id}}" class="min-w-sm bg-white border border-gray-200 rounded-lg shadow ">
    <a class="grid justify-items-stretch mt-5" href="#">
        <img class="rounded-t-lg justify-self-center" src="{{url('/watchesCoverImages/'.$image)}}" alt="" />
    </a>
    <div class="p-5 m-1 bg-gray-200">
        <a class="flex justify-center w-full" href="#">
            <h5 class="mb-2  text-2xl font-bold tracking-tight text-gray-900 ">{{$name}}</h5>
        </a>
        <hr class="w-screen h-1 max-w-full mb-3 bg-red-800" >
        <div class="flex flex-row justify-between">    
                <p class="mb-3 bg-yellow-400 px-4 py-2 font-normal text-gray-700 ">Price. {{$price}}</p>
                <p class="mb-3 bg-red-400 px-4 py-2 text-white font-normal text-gray-700 ">Price. {{$price}}</p>
        </div>
        <hr class="w-screen h-1 max-w-full mb-3 bg-red-800" >
       <div class="flex flex-row w-full h-full justify-between">
        <a href="singlewatch/{{$id}}" wire:navigate class="inline-flex items-center  px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Read more
            <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
            </svg>
        </a>
        @if(Auth::user()  && Auth::user()->admin)
        <a href="editsinglewatch/{{$id}}" wire:navigate class="inline-flex items-center  px-3 py-2 text-sm font-medium text-center text-gray-700 bg-yellow-300 rounded-lg hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-300 dark:bg-yellow-600 dark:hover:bg-yellow-400 dark:focus:ring-yellow-800">
            Edit
           <i class="fa fa-edit pt-1 px-2 "></i>
        </a>
        @elseif(Auth::user())
        @else
        <a href="#" @click="viewpopup({{$id}})" class="inline-flex items-center  px-3 py-2 text-sm font-medium text-center text-gray-700 bg-green-300 rounded-lg hover:bg-green-400 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-400 dark:focus:ring-green-800">
            Order
           <i class="fa fa-shopping-cart pt-1 px-2 "></i>
        </a>
        @endif
      </div>
    </div>



    <div id="info-popup" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
  <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
      <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 md:p-8">
      <div class="w-full flex justify-end">
      <i id="close-modal" class="fa fa-close hover:text-red-600 cursor-pointer"></i>
      </div>  

          <div class="mb-4 w-full  text-sm font-light text-gray-500 dark:text-gray-400">
            <div class="flex justify-center"> 
            <h3 class="mb-3 items-center text-2xl font-bold text-gray-900 dark:text-white">Select method</h3>
            </div> 
          </div>
          <div class="justify-between items-center pt-0 space-y-4 sm:flex sm:space-y-0">
              <div class="items-center justify-center w-full space-y-4 sm:space-x-4 sm:flex sm:space-y-0">
                  <button wire:click="navigate('directorder/{{$id}}')" type="button"  class="py-2 px-4 w-full text-sm font-medium text-center text-white rounded-lg bg-red-700 sm:w-auto hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Direct Order</button>
                  <button wire:click="navigate('register')" id="confirm-button" type="button" class="py-2 px-4 w-full text-sm font-medium text-center text-white rounded-lg bg-primary-700 sm:w-auto hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Create account</button>
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