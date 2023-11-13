<div x-init=" width=(window.innerWidth > 0) ? window.innerWidth : screen.width; Alpine.data('open',true); if (width >
  768) { open=true }else{ open=false } " x-data=" { open: true }" @resize.window="
    width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    if (width > 768) {
     open = true
    }else{
      open = false  
    }
    ">

  <nav class="bg-red-950  border-gray-200 md:h-20 min-h-[8%] z-50 overflow-auto fixed top-0 w-full">
    <div :class="typeof normalit =='undefined' && 'md:pl-60'"
      class="w-full h-full flex flex-wrap items-center justify-between  mx-auto md:pl-4">
      <a href="#" class="flex flex-col  h-full ml-3">
        <div class="flex pt-5">
          <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 mr-3" alt="Flowbite Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Flowbite</span>
        </div>
      </a>
      <button data-collapse-toggle="navbar-multi-level" @click="open=!open"
        :onfocusout="!open && this?.classList?.add('bg-red-950')" type="button"
        class="inline-flex items-center p-2 w-10 h-full justify-center text-sm text-white rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:bg-yellow-700 focus:text-yellow-300"
        aria-controls="navbar-multi-level" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
      <div x-show="open" class="w-full bg-red-950 h-max md:h-full  py-0 my-0 md:block md:w-auto"
        id="navbar-multi-level">
        <ul
          class="flex h-full flex-col font-medium px-4 py-0 md:p-0 my-0 border border-gray-100  bg-red-950 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-red-950">
          @auth
          <li>
            <a href="#" wire:navigate @click.outside="$refs?.logout?.classList?.remove('bg-yellow-700')"
              wire:click="logout" @click="$refs?.logout?.classList?.add('bg-yellow-700')" x-ref="logout"
              class="block  py-6 pl-5 pr-6 text-white hover:bg-yellow-700 hover:text-yellow-300 h-full "
              aria-current="page">Logout</a>
          </li>
          @if(request()->is('/'))
          <li>
            <a href="/dashboard" wire:navigate @click.outside="$refs?.dashboard?.classList?.remove('bg-yellow-700')"
              @click="$refs?.dashboard?.classList?.add('bg-yellow-700')" x-ref="dashboard"
              class="block  py-6 pl-5 pr-6 text-white hover:bg-yellow-700 hover:text-yellow-300 h-full "
              aria-current="page">Dashboard</a>
          </li>
          @else
          <li class="md:hidden">
            <a href="/" wire:navigate @click.outside="$refs?.home?.classList?.remove('bg-yellow-700')"
              @click="$refs?.home?.classList?.add('bg-yellow-700')" x-ref="home"
              class="block  py-6 pl-5 pr-6 text-white hover:bg-yellow-700 hover:text-yellow-300 h-full "
              aria-current="page">Home</a>
          </li> 
          @endif
          @else
          @if(!request()->is('login') && !request()->is('register') )
          <li>
            <a href="/login" wire:navigate @click.outside="$refs.login.classList.remove('bg-yellow-700')"
              @click="$refs?.login?.classList?.add('bg-yellow-700')" x-ref="login"
              class="block py-6 pl-5  pr-6 text-white hover:bg-yellow-700 hover:text-yellow-300 h-full  "
              aria-current="page">Login</a>
          </li>
          <li>
            <a href="/register" wire:navigate @click.outside="$refs.register.classList.remove('bg-yellow-700')"
              @click="$refs?.register?.classList?.add('bg-yellow-700')" x-ref="register"
              class="block  py-6 pl-5 pr-6 text-white hover:bg-yellow-700 hover:text-yellow-300  h-full "
              aria-current="page">Register</a>
          </li>
          @else
          <li>
            <a href="/" wire:navigate @click.outside="$refs.home.classList.remove('bg-yellow-700')"
              @click="$refs?.home?.classList?.add('bg-yellow-700')" x-ref="home"
              class="block  py-6 pl-5 pr-6 text-white hover:bg-yellow-700 hover:text-yellow-300  h-full "
              aria-current="page">Home</a>
          </li>
          @endif
          @endauth
          @if(auth()->user() && auth()->user()->admin)
          <li class="md:hidden">
            <a href="/additem" wire:navigate class="block py-6 pl-5 pr-6 text-white hover:bg-yellow-700 hover:text-yellow-300  h-full "
              aria-current="page">Add Item</a>
          </li>
          <li class="md:hidden">
            <a href="/paidorders"
                wire:navigate
              class="md:hidden block py-6 pl-5 pr-6 text-white hover:bg-yellow-700 hover:text-yellow-300  h-full "
              aria-current="page">Paid orders</a>
          </li>
          <li class="md:hidden">
            <a href="#"
              class="md:hidden block py-6 pl-5 pr-6 text-white hover:bg-yellow-700 hover:text-yellow-300  h-full "
              aria-current="page">Ongoing Deliveries</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

</div>