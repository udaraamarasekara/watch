@extends('livewire.guest')
@section('content')
 <div x-data="{click:false}" class=" flex flex-col" >
    <div class="w-full flex-wrap flex flex-row justify-center " >
    @if(session()->has('success'))
    <div x-data="{error:true}"  x-show="error"    class=" z-50  bg-green-100 border border-green-400 text-green-700 px-4 py-3  rounded" role="alert">
        <strong class="font-bold">You signed in</strong>
        <span class="block sm:inline"></span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg class="fill-current h-6 w-6 text-green-500" @click="error=false" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
        </span>
    </div>
    @endif

    <form wire:submit.prevent="" id="regfrm" class="w-4/5 mt-20 mb-10">
     <div class="w-full flex justify-center ">   
    <h1 class="mb-10 mt-5 text-4xl font-extrabold leading-none tracking-tight text-gray-100 md:text-5xl lg:text-6xl ">Login</h1>
    </div>
    <div class="flex flex-wrap -mx-3 justify-center mb-6">
        <div class="w-full px-3 mb-6 md:w-1/2 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-user-name">
               Email
            </label>
            <input id="inputemail" x-ref="inputemail" wire:model.lazy="email"  @keyup="click=false" class="appearance-none block w-full bg-gray-200 text-gray-400 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-email" type="email" placeholder="user@gmail.com">
            <p x-show="click && $refs.inputemail.value=='' " class="text-red-500 text-xs italic">Please fill out this field.</p>
            @error('email')
            <p x-show="click && $refs.inputemail.value!='' " class="text-red-500 text-xs italic">Invalid email.</p>
            @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 justify-center mb-6">

        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-password">
                Password
            </label>
            <input id="inputpassword" x-ref="inputpassword" wire:model.lazy="password"  @keyup="click=false" class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
            @if(session()->has('password'))
            <p x-show="click && $refs.inputpassword.value!=''&& $refs.inputpasswordconfirmation.value!=$refs.inputpassword.value  && ( $refs.inputpassword.value.match(/\d/) || $refs.inputpassword.value.length > 8) && $refs.inputusername.value!='' && $refs.inputemail.value!=''  "  class="text-red-500 text-xs italic">Password already taken.</p>
            @endif
        </div>
    </div>
  
     <div class="flex flex-wrap -mx-3 justify-center mb-6">
        <div class="w-full md:w-1/2 px-3 flex  flex-col">
            <input type="submit"  id="sbt"  @click="click=true" text="Submit" class="w-1/2 bg-blue-500 hover:bg-blue-700 self-center text-white font-bold py-2 px-4 rounded">
            <p class="w-1/2 text-yellow-500 self-center text-xs mt-3 ml-3 cursor-pointer italic" @click="Turbolinks.visit('register')" >Dont have an account. click to register</p>
        </div>
    </div>
    </form>
    </div>

</div>
<script>
    window.onclick= function(){const elements = document.querySelectorAll("input");
elements.forEach(element => {
    element.removeAttribute("readonly");
});
document.getElementById('address').removeAttribute("readonly");
};
</script>
@endSection