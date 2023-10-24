<div x-data="{ toggleSideNav : 'false' }" @resize.window=" width=(window.innerWidth > 0) ? window.innerWidth :
  screen.width; if (width> 768) {
  toggleSideNav = 'false'
  }else{
  toggleSideNav = 'true'
  }
  "
  x-init="
  width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
  if (width > 768) {
  toggleSideNav = 'false'
  }else{
  toggleSideNav = 'true'
  }
  " class="bg-slate-800 h-full min-h-screen"
  >
  <livewire:navbar />
  <livewire:sidenav />
  @yield('content')
</div>