@extends('livewire.guest')
@section('content')
<div x-data="{click:false}" class=" flex flex-col">
    <div class="w-full flex-wrap flex flex-row justify-center " >
     <form action='https://www.2checkout.com/checkout/purchase' method='post' id="regfrm" class="w-4/5 mt-20 mb-10">
         <input type='hidden' name='demo' value='Y' /> <input type='hidden' name='sid' value='1817037' /> 
         <input type='hidden' name='mode' value='2CO' />
         <input type='hidden' name='li_0_name' value='test' /> <input type='hidden' name='li_0_price' value='1.00' />
         <div class="w-full flex justify-center ">
             <h1 class="mb-10 mt-5 text-4xl font-extrabold leading-none tracking-tight text-gray-100 md:text-5xl lg:text-6xl ">
                Order now
             </h1>
         </div> 
         <div class="flex flex-wrap -mx-3 justify-center "> <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-user-name">
              Full Name
            </label>
            <input id="inputfullname" x-ref="inputfullname" wire:model.blur="fullname" @keyup="click=false"
                class="appearance-none block w-full bg-gray-200 text-gray-400 border border-red-500 rounded py-3 px-4
                mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-full-name" type="text"
                placeholder="Jane">
                 <p x-show="click && $refs.inputfullname.value=='' " class="text-red-500 text-xs italic">Please fill out thisfield.</p>
         </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-full-name">
                Email </label>
                <input id="inputemail" x-ref="inputemail" wire:model.blur="email" @keyup="click=false" class="appearance-none block
w-full bg-gray-200 text-gray-400 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none
focus:bg-white" id="grid-email" type="email" placeholder="user@gmail.com">
                <p x-show="click && $refs.inputfullname.value!='' && $refs.inputemail.value=='' "
                    class="text-red-500 text-xs italic">
                    Please fill out this field.</p>
                @error('email')
                <p x-show="click && $refs.inputfullname.value!='' && $refs.inputemail.value!='' "
                    class="text-red-500 text-xs italic">
                    Existing email.</p>
                @enderror
        </div>
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-contact">
                    Contact
                </label>
                <input id="inputcontact" x-ref="inputcontact" wire:model.blur="contact" @keyup="click=false"
                    class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                    min="10" id="grid-contact" type="number" placeholder="9021000000">
                <p x-show="click && $refs.inputcontact.value=='' && $refs.inputcity.value!=''&&  $refs.inputcountry.value!=''  && $refs.inputfullname.value!='' && $refs.inputemail.value!=''  "
                    class="text-red-500 text-xs italic">Please fill out this field.</p>
            </div>
    </div>


    <div class="flex flex-wrap -mx-3 mb-2">
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-country">
                Country
            </label>
            <input id="inputcountry" x-ref="inputcountry" wire:model.blur="country" @keyup="click=false"
                class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-country" type="text" placeholder="Albuquerque">
            <p x-show="click && $refs.inputcountry.value==''  && $refs.inputfullname.value!='' && $refs.inputemail.value!=''  "
                class="text-red-500 text-xs italic">Please fill out this field.</p>
        </div>
        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-city">
                City
            </label>
            <input id="inputcity" x-ref="inputcity" wire:model.blur="city" @keyup="click=false"
                class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-city" type="text" placeholder="Albuquerque">
            <p x-show="click && $refs.inputcity.value==''&& $refs.inputcountry.value!=''  && $refs.inputfullname.value!='' && $refs.inputemail.value!=''  "
                class="text-red-500 text-xs italic">Please fill out this field.</p>
        </div>

        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-zip">
                Zip
            </label>
            <input id="inputzip" x-ref="inputzip" wire:model.blur="zip" @keyup="click=false"
                class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-zip" type="text" placeholder="90210">
            <p x-show="click && $refs.inputzip.value=='' && $refs.inputcity.value!=''&&  $refs.inputcountry.value!=''  && $refs.inputfullname.value!='' && $refs.inputemail.value!=''  "
                class="text-red-500 text-xs italic">Please fill out this field.</p>
        </div>

    </div>
    <div class="flex flex-wrap -mx-3 ">
        <div class="w-full px-3">
            <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-password">
                Address
            </label>
            <textarea id="inputaddress" x-ref="inputaddress" wire:model.blur="address" @keyup="click=false"
                class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                rows="2" id="address" placeholder="silva matara hittatiya"></textarea>
            <p x-show="click && $refs.inputaddress.value=='' && $refs.inputqty.value!=''&& $refs.inputprice.value!='' && $refs.inputzip.value!='' && $refs.inputcity.value!=''&&  $refs.inputcountry.value!=''  && $refs.inputfullname.value!='' && $refs.inputemail.value!=''  "
                class="text-red-500 text-xs italic">Please fill out this field.</p>
        </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-2">

        <div class="w-full md:w-1/2 px-3  mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-city">
                Quantity
            </label>
            <input id="inputqty"
                @click="$refs.inputprice.value={{$defprice}}*$refs.inputqty.value==0 ?{{$defprice}}:{{$defprice}}*$refs.inputqty.value"
                min="1"
                @keyup="$refs.inputprice.value={{$defprice}}*$refs.inputqty.value==0 ?{{$defprice}}:{{$defprice}}*$refs.inputqty.value"
                x-ref="inputqty" wire:model.blur="qty" @keyup="click=false"
                class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-city" type="number" placeholder="1">
            <p x-show="click && $refs.inputcity.value!=''&& $refs.inputcountry.value!='' && $refs.inputqty.value!='' && $refs.inputfullname.value!='' && $refs.inputemail.value!=''  "
                class="text-red-500 text-xs italic">Please fill out this field.</p>
        </div>

        <div class="w-full md:w-1/2 px-3  mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-400 text-xs font-bold mb-2" for="grid-city">
                Price (USD)
            </label>
            <input id="inputprice" x-ref="inputprice" disabled wire:model.blur="price" @keyup="click=false"
                class="appearance-none block w-full bg-gray-200 text-gray-400 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                id="grid-city" type="number" placeholder="1">
            <p x-show="click  && $refs.inputcity.value!=''  && $refs.inputqty.value!=''&& $refs.inputprice.value==''&& $refs.inputcountry.value!=''  && $refs.inputfullname.value!='' && $refs.inputemail.value!=''  "
                class="text-red-500 text-xs italic">Please fill out this field.</p>
        </div>
    </div>


    <div class="flex flex-row">
        <input type="submit" id="sbt" @click="click=true" value="Submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <input type="button" id="sbt" wire:click="navigate('/allwatches')" value="Back"
            class="mx-3 bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">

    </div>
    </form>
</div>

</div>
<script>
    window.onclick = function () {
        const elements = document.querySelectorAll("input");
        elements.forEach(element => {
            if (element?.hasAttribute("readonly")) {
                element.removeAttribute("readonly");
            }
        });
        document.getElementById('address')?.hasAttribute("readonly") &&
            document.getElementById('address').removeAttribute("readonly");
    };

    function navigate(url) {
        Livewire.emit('navigate', url);
    }
</script>

<script defer type="text/javascript" src="https://secure.2checkout.com/cpanel/js/third-party-apps/avangate.js"></script>
<div id="avangate-hero" class="hide"></div>
@endSection