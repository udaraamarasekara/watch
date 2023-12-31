<div  
>
  <!-- Sidenav -->
  <nav
    id="side-nav"
    class="fixed left-0 top-0 z-[1035] h-screen w-60 -translate-x-full overflow-hidden bg-yellow-700 shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] dark:bg-zinc-800 md:data-[te-sidenav-hidden='false']:translate-x-0"
    data-te-sidenav-init
    data-te-sidenav-mode-breakpoint-over="0"
    data-te-sidenav-mode-breakpoint-side="sm"
    :data-te-sidenav-hidden="toggleSideNav"
    data-te-sidenav-color="dark"
    data-te-sidenav-content="#content"
    data-te-sidenav-scroll-container="#scrollContainer">
    <div class="pt-6">
      <div id="header-content" class="pl-4 ml-4">
        <img
          src="https://tecdn.b-cdn.net/img/Photos/Avatars/img%20(23).webp"
          alt="Avatar"
          class="mb-4 h-auto rounded-full align-middle"
          style="max-width: 50px;" />

        <h4 class="mb-2 text-2xl font-medium leading-[1.2]"></h4>
        <p class="mb-4 text-gray-100 overflow-hidden mr-5">{{Auth::user()->username}}</p>
      </div>
      <hr class="border-gray-300" />
    </div>
    <div id="scrollContainer">
      <ul
        class="relative m-0 list-none px-0"
        data-te-sidenav-menu-ref>
        <li class="relative">
          <a
            class="group flex h-12 cursor-pointer items-center truncate  px-6 py-4 text-[0.875rem] text-gray-100 outline-none transition duration-300 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:bg-gray-300/30 focus:text-inherit focus:outline-none active:bg-gray-300/30 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none "
            href="/" wire:navigate
            data-te-sidenav-link-ref>
            <span>
              <i class="fa fa-home mr-4"></i>
            </span>
            <span>Home</span>
          </a>
        </li> 
        <li class="relative">
          <a
            class="group flex {{request()->is('dashboard') ? 'bg-gray-300/30 outline-none text-inherit ':'' }} h-12 cursor-pointer items-center truncate  px-6 py-4 text-[0.875rem] text-gray-100 outline-none transition duration-300 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:bg-gray-300/30 focus:text-inherit focus:outline-none active:bg-gray-300/30  active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none "
            href="/dashboard" wire:navigate
            data-te-sidenav-link-ref>
            <span>
              <i class="fa fa-dashboard mr-4"></i>
            </span>
            @if(Auth::user()->admin)
            <span>Admin Dashboard</span>
            @else
            <span>User Dashboard</span>
            @endif
          </a>
        </li>    

        @if(Auth::user()->admin)
        <li class="relative">
          <a
            class="group flex {{request()->is('additem') ? 'bg-gray-300/30 outline-none text-inherit ':'' }} h-12 cursor-pointer items-center truncate  px-6 py-4 text-[0.875rem] text-gray-100 outline-none transition duration-300 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:bg-gray-300/30 focus:text-inherit focus:outline-none active:bg-gray-300/30 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none "
            href="/additem" wire:navigate
            data-te-sidenav-link-ref>
            <span>
              <i class="fa fa-plus mr-4"></i>
            </span>
            <span>Add Item</span>
          </a>
        </li>    
       
        <li class="relative">
          <a
            class="group flex {{request()->is('paidorders') ? 'bg-gray-300/30 outline-none text-inherit ':'' }} h-12 cursor-pointer items-center truncate  px-6 py-4 text-[0.875rem] text-gray-100 outline-none transition duration-300 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:bg-gray-300/30 focus:text-inherit focus:outline-none active:bg-gray-300/30 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none "
            href="/paidorders" wire:navigate
            data-te-sidenav-link-ref>
            <span>
              <i class="fa fa-check mr-4"></i>
            </span>
            <span>Paid Orders</span>
          </a>
        </li>  
        
        <li class="relative">
          <a
            class="group flex {{request()->is('paidorders') ? 'bg-gray-300/30 outline-none text-inherit ':'' }} h-12 cursor-pointer items-center truncate  px-6 py-4 text-[0.875rem] text-gray-100 outline-none transition duration-300 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:bg-gray-300/30 focus:text-inherit focus:outline-none active:bg-gray-300/30 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none "
            href="#!"
            data-te-sidenav-link-ref>
            <span>
              <i class="fa fa-tasks mr-4"></i>
            </span>
            <span>Ongoing Deliveries</span>
          </a>
        </li> 
        @endif   
        <li class="relative">
          <a
            class="group flex {{request()->is('addcomment') ? 'bg-gray-300/30 outline-none text-inherit ':'' }} h-12 cursor-pointer items-center truncate  px-6 py-4 text-[0.875rem] text-gray-100 outline-none transition duration-300 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:bg-gray-300/30 focus:text-inherit focus:outline-none active:bg-gray-300/30 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none "
            href="/addcomment" wire:navigate
            data-te-sidenav-link-ref>
            <span>
              <i class="fa fa-comment mr-4"></i>
            </span>
            <span>Review Service</span>
          </a>
        </li> 
        @if(Auth::user() && !Auth::user()->admin)
        <li class="relative">
          <a
            class="group flex h-12 {{request()->is('userorders') ? 'bg-gray-300/30 outline-none text-inherit ':'' }} cursor-pointer items-center truncate  px-6 py-4 text-[0.875rem] text-gray-100 outline-none transition duration-300 ease-linear hover:bg-gray-300/30 hover:text-inherit hover:outline-none focus:bg-gray-300/30 focus:text-inherit focus:outline-none active:bg-gray-300/30 active:text-inherit active:outline-none data-[te-sidenav-state-active]:text-inherit data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none "
            href="/userorders" wire:navigate
            data-te-sidenav-link-ref>
            <span>
              <i class="fa fa-cart-arrow-down mr-4"></i>
            </span>
            <span>My orders</span>
          </a>
        </li> 
        @endif
     
      </ul>
    </div>
  </nav>
  
  <!-- Sidenav -->

  
</div>
