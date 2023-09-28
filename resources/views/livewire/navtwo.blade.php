<div x-init="navtwoheight=$refs.navtwo.offsetHeight" 

x-ref="navtwo" class="w-full bg-yellow-700 md:h-20  z-40 flex md:flex-row flex-col top-[8%] md:top-20 fixed" >
    <ul x-show="openh" class="md:w-1/3 px-1 w-full" wire:click="navigate('/ ')"> 
        <li class=" h-full pt-4 md:pt-7 justify-center text-center  text-white w-full hover:bg-red-950 hover:text-yellow-300 " >
            <a href="#" class="w-full  font-bold  h-full"  @click.outside="$refs.gusethome.classList.remove('bg-yellow-700')" @click="$refs.gusethome.classList.add('bg-yellow-700')" x-ref="gusethome"  aria-current="page">Home</a>
        </li>
    </ul>
    <div x-show="openh" class="md:my-1 mx-1 mt-2 ">
    <div class="md:h-full bg-gray-300 md:w-1 w-full h-1 "></div>
     </div>
    <ul x-show="openh" class="md:w-1/3 px-1 w-full " wire:click="navigate('/allwatches')"> 
        <li class=" h-full pt-4 md:pt-7 justify-center text-center  text-white w-full hover:bg-red-950 hover:text-yellow-300 " >
            <a href="#" class="w-full  font-bold  h-full"  @click.outside="$refs.allwatches.classList.remove('bg-yellow-700')" @click="$refs.allwatches.classList.add('bg-yellow-700')" x-ref="allwatches"  aria-current="page">All Watches</a>
        </li>
    </ul>
    <div x-show="openh" class="md:my-1 mx-1 mt-2 ">
    <div class="md:h-full bg-gray-300 md:w-1 w-full h-1 "></div>
     </div>
    <input class="appearance-none fa w-4/5 self-center block md:w-1/3 bg-yellow-200 text-red-950 border border-red-500 rounded  p-4 m-3 leading-tight focus:outline-none " id="grid-first-name" type="text" placeholder="&#xF002 search your order or watch">    
</div>
