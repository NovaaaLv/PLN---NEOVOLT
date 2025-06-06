<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
  <!-- Primary Navigation Menu -->
  <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="flex justify-between h-16">
      <div class="flex">
        <!-- Logo -->
        <div class="flex items-center shrink-0">
          <a href="#" class="text-lg font-bold text-indigo-600 ">
            PLNEOVLT
          </a>
        </div>

        <!-- Navigation Links -->
        <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

          @if (Auth::user()->role === 'admin')
            <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index')">
              {{ __('Pengguna ( Team )') }}
            </x-nav-link>
            <x-nav-link :href="route('tarif.index')" :active="request()->routeIs('tarif.index')">
              {{ __('Tarif') }}
            </x-nav-link>
            <x-nav-link :href="route('pelanggan.index')" :active="request()->routeIs('pelanggan.index')">
              {{ __('Pelanggan') }}
            </x-nav-link>
            <x-nav-link :href="route('pemakaian.index')" :active="request()->routeIs('pemakaian.index')">
              {{ __('Pemakaian') }}
            </x-nav-link>
            <x-nav-link :href="route('pembayaran.index')" :active="request()->routeIs('pembayaran.index')">
              {{ __('Pembayaran') }}
            </x-nav-link>
          @endif

          @if (Auth::user()->role === 'petugas_loket')
            <x-nav-link :href="route('pelanggan.index')" :active="request()->routeIs('pelanggan.index')">
              {{ __('Pelanggan') }}
            </x-nav-link>
            <x-nav-link :href="route('pembayaran.index')" :active="request()->routeIs('pembayaran.index')">
              {{ __('Pembayaran') }}
            </x-nav-link>
          @endif
        </div>
      </div>

      <!-- Settings Dropdown -->
      <div class="hidden sm:flex sm:items-center sm:ms-6">
        <x-dropdown align="right" width="48">
          <x-slot name="trigger">
            <button
              class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
              <div>{{ Auth::user()->email }}</div>

              <div class="ms-1">
                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                  <path fill-rule="evenodd"
                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                    clip-rule="evenodd" />
                </svg>
              </div>
            </button>
          </x-slot>

          <x-slot name="content">
            <x-dropdown-link :href="route('profile.edit')">
              {{ __('Profile') }}
            </x-dropdown-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
              @csrf

              <x-dropdown-link :href="route('logout')"
                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                {{ __('Log Out') }}
              </x-dropdown-link>
            </form>
          </x-slot>
        </x-dropdown>
      </div>

      <!-- Hamburger -->
      <div class="flex items-center -me-2 sm:hidden">
        <button @click="open = ! open"
          class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
          <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
              stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Responsive Navigation Menu -->
  <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
    <div class="pt-2 pb-3 space-y-1">
      @if (Auth::user()->role === 'admin')
        <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
          {{ __('Dashboard') }}
        </x-responsive-nav-link>
      @endif

      <x-responsive-nav-link :href="route('pemakaian.index')" :active="request()->routeIs('pemakaian.index')">
        {{ __('Pemakaian') }}
      </x-responsive-nav-link>


      @if (Auth::user()->role === 'admin')
        <x-responsive-nav-link :href="route('tarif.index')" :active="request()->routeIs('tarif.index')">
          {{ __('Tarif') }}
        </x-responsive-nav-link>
        <x-responsive-nav-link :href="route('pelanggan.index')" :active="request()->routeIs('pelanggan.index')">
          {{ __('Pelanggan') }}
        </x-responsive-nav-link>
      @endif
    </div>

    <!-- Responsive Settings Options -->
    <div class="pt-4 pb-1 border-t border-gray-200">
      <div class="px-4">
        <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
      </div>

      <div class="mt-3 space-y-1">
        <x-responsive-nav-link :href="route('profile.edit')">
          {{ __('Profile') }}
        </x-responsive-nav-link>

        <!-- Authentication -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf

          <x-responsive-nav-link :href="route('logout')"
            onclick="event.preventDefault();
                                        this.closest('form').submit();">
            {{ __('Log Out') }}
          </x-responsive-nav-link>
        </form>
      </div>
    </div>
  </div>
</nav>
