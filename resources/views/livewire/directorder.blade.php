@extends('livewire.guest')
@section('content')
 <div x-data="{click:false}" class=" flex flex-col" >
    <div class="w-full flex-wrap flex flex-row justify-center " >
    <form wire:submit.prevent="register" id="regfrm" class="w-4/5 mt-20 mb-10">
     <div class="w-full flex justify-center ">   
    <h1 class="mb-10 mt-5 text-4xl font-extrabold leading-none tracking-tight text-gray-100 md:text-5xl lg:text-6xl ">Register now</h1>
    </div>
    <div class="flex flex-wrap -mx-3 justify-center mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-user-name">
            User Name
        </label>
        <input  id="inputusername" x-ref="inputusername" wire:model.blur="username" @keyup="click=false" class="appearance-none block w-full bg-gray-200 text-gray-400 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-user-name" type="text" placeholder="Jane">
        <p  x-show="click && $refs.inputusername.value=='' "  class="text-red-500 text-xs italic">Please fill out this field.</p>
        </div>
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-user-name">
               Email
            </label>
            <input id="inputemail" x-ref="inputemail" wire:model.blur="email"  @keyup="click=false" class="appearance-none block w-full bg-gray-200 text-gray-400 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-email" type="email" placeholder="user@gmail.com">
            <p x-show="click && $refs.inputusername.value!='' && $refs.inputemail.value=='' " class="text-red-500 text-xs italic">Please fill out this field.</p>
           @error('email')
            <p x-show="click && $refs.inputusername.value!='' && $refs.inputemail.value!='' " class="text-red-500 text-xs italic">Existing email.</p>
           @enderror
        </div>
    </div>

    <div class="flex flex-wrap -mx-3 justify-center mb-6">

        <div class="w-full md:w-1/2 px-3">
            <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-password">
                Password
            </label>
            <input id="inputpassword" x-ref="inputpassword" wire:model.blur="password"  @keyup="click=false" class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="password" placeholder="******************">
            <p x-show="click && $refs.inputpassword.value==''  && $refs.inputusername.value!='' && $refs.inputemail.value!=''  "  class="text-red-500 text-xs italic">Please fill out this field.</p>
            <p x-show="click && $refs.inputpassword.value!='' && ( !$refs.inputpassword.value.match(/\d/) || $refs.inputpassword.value.length < 8) && $refs.inputusername.value!='' && $refs.inputemail.value!=''  "  class="text-red-500 text-xs italic">Week password (must be above 8 characters and one number).</p>
            @if(session()->has('password'))
            <p x-show="click && $refs.inputpassword.value!=''&& $refs.inputpasswordconfirmation.value!=$refs.inputpassword.value  && ( $refs.inputpassword.value.match(/\d/) || $refs.inputpassword.value.length > 8) && $refs.inputusername.value!='' && $refs.inputemail.value!=''  "  class="text-red-500 text-xs italic">Password already taken.</p>
            @endif
        </div>
        <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-last-name">
            Password confirmation
        </label>
        <input id="inputpasswordconfirmation" type="password" x-ref="inputpasswordconfirmation" wire:model.blur="password_confirmation"  @keyup="click=false" class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" placeholder="Doe">
        <p x-show="click && $refs.inputpasswordconfirmation.value==''&& $refs.inputusername.value!=''  " class="text-red-500 text-xs italic">Please fill out this field.</p>
        <p x-show="click  && $refs.inputpasswordconfirmation.value!=''&& $refs.inputpasswordconfirmation.value!=$refs.inputpassword.value && $refs.inputusername.value!=''  && $refs.inputemail.value!='' " class="text-red-500 text-xs italic">Password and confirmation missmatch.</p>

        </div>
        
      
    </div>
    <div class="flex flex-wrap -mx-3 mb-2">
    <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-country">
            Country
        </label>
        <input id="inputcountry" x-ref="inputcountry" wire:model.blur="country"  @keyup="click=false" class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-country" type="text" placeholder="Albuquerque">
        <p x-show="click && $refs.inputpasswordconfirmation.value!=$refs.inputpassword.value && ( !$refs.inputpassword.value.match(/\d/) || $refs.inputpassword.value.length < 8) && $refs.inputpassword.value!=''&& $refs.inputcountry.value==''  && $refs.inputusername.value!='' && $refs.inputemail.value!=''  "  class="text-red-500 text-xs italic">Please fill out this field.</p>
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-city">
            City
        </label>
        <input id="inputcity" x-ref="inputcity"  wire:model.blur="city" @keyup="click=false" class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-city" type="text" placeholder="Albuquerque">
        <p x-show="click && $refs.inputpasswordconfirmation.value!=$refs.inputpassword.value && ( !$refs.inputpassword.value.match(/\d/) || $refs.inputpassword.value.length < 8) && $refs.inputcity.value==''&&  $refs.inputpassword.value!=''&& $refs.inputcountry.value!=''  && $refs.inputusername.value!='' && $refs.inputemail.value!=''  "  class="text-red-500 text-xs italic">Please fill out this field.</p>
        </div>
        
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-zip">
            Zip
        </label>
        <input id="inputzip" x-ref="inputzip" wire:model.blur="zip"  @keyup="click=false" class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-zip" type="text" placeholder="90210">
        <p x-show="click && $refs.inputpasswordconfirmation.value!=$refs.inputpassword.value && ( !$refs.inputpassword.value.match(/\d/) || $refs.inputpassword.value.length < 8) && $refs.inputzip.value=='' && $refs.inputcity.value!=''&&  $refs.inputpassword.value!=''&& $refs.inputcountry.value!=''  && $refs.inputusername.value!='' && $refs.inputemail.value!=''  "  class="text-red-500 text-xs italic">Please fill out this field.</p>

    </div>     
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-password">
            Address
        </label>
        <textarea id="inputaddress" x-ref="inputaddress" wire:model.blur="address" @keyup="click=false" class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" rows="2" id="address"  placeholder="silva matara hittatiya"></textarea>
        <p x-show="click && $refs.inputpasswordconfirmation.value!=$refs.inputpassword.value && ( !$refs.inputpassword.value.match(/\d/) || $refs.inputpassword.value.length < 8) && $refs.inputaddress.value=='' && $refs.inputzip.value!='' && $refs.inputcity.value!=''&&  $refs.inputpassword.value!=''&& $refs.inputcountry.value!=''  && $refs.inputusername.value!='' && $refs.inputemail.value!=''  "  class="text-red-500 text-xs italic">Please fill out this field.</p>
        </div>
    </div>
     <div class="flex flex-row"> 
        <input type="submit"  id="sbt"  @click="click=true" value="Submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <p class="text-yellow-500 text-xs mt-3 ml-3 cursor-pointer italic"   wire:click="navigate('login')" >Already have an account. click to login</p>
    </div>
    </form>
    </div>

</div>
<script>
    window.onclick= function(){const elements = document.querySelectorAll("input");
elements.forEach(element => {
    if(element?.hasAttribute("readonly"))
    {
        element.removeAttribute("readonly");
    }
});
document.getElementById('address')?.hasAttribute("readonly") &&
document.getElementById('address').removeAttribute("readonly");
};

function navigate(url){
Livewire.emit('navigate',url);
}
</script>
@endSection
