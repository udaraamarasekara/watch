<div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="rounded-t-lg" src="{{url('/watches/'.$image)}}" alt="" />
    </a>
    <div class="p-5 flex flex-row  content-center">  
        <p wire:click="deleteWatchImages('{{$image}}')" class=" items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Delete this    
        </p>
    </div>
</div>
