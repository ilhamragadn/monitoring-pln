<nav x-data="{ open: false }" class="fixed top-0 z-40 left-12 w-screen bg-white dark:bg-gray-800">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                {{-- <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div> --}}

                <!-- Navigation Links -->
                {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div> --}}

                {{-- <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link>
                        {{ __('MDU') }}
                    </x-nav-link>
                </div> --}}
                <div
                    class="flex items-center ml-40 my-1 pl-4 text-white border-4 border-gray-800 border-l-red-600 rounded-l-lg">
                    <h2 class="text-xl">@yield('page_title')</h2>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div class="text-lg">{{ Auth::user()->name }}</div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
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
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        {{-- <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div> --}}

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
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

<aside x-data="{ open: true }"
    class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-white dark:bg-gray-800 border-r border-gray-100 sm:translate-x-0 dark:border-gray-700">
    <div class="h-full px-2 py-4 overflow-y-auto bg-white dark:bg-gray-800">
        {{-- START UP3 --}}
        {{-- START MANAGER PERENCANAAN --}}
        @if (Auth::user()->role === 'Manager Perencanaan')
            <div class="pb-2 border-b-2 border-indigo-400 dark:border-indigo-600">
                <a href="{{ route('dashboard.mngr.perencanaan') }}">
                    <x-application-logo
                        class="h-14 w-auto flex mx-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
            </div>
            <ul class="mt-10 space-y-2 font-medium">
                <li>
                    <x-nav-link :href="route('dashboard.mngr.perencanaan')" class="my-4 text-xl px-4 py-1" :active="request()->routeIs('dashboard.mngr.perencanaan')">
                        <span class="mx-auto py-2 flex">
                            {{ __('Dashboard') }}
                        </span>
                    </x-nav-link>
                </li>

                <li>
                    <x-dropdown-sidebar align="right" width="auto">
                        <x-slot name="trigger">
                            <x-nav-link class="mt-4 text-xl px-4 py-1 " :active="request()->routeIs('hargapasang-mngr-ren.index') ||
                                request()->routeIS('hargapasang-mngr-ren.create') ||
                                request()->routeIS('hargapasang-mngr-ren.show') ||
                                request()->routeIS('hargapasang-mngr-ren.edit') ||
                                request()->routeIs('hargabongkar-mngr-ren.index') ||
                                request()->routeIS('hargabongkar-mngr-ren.create') ||
                                request()->routeIS('hargabongkar-mngr-ren.show') ||
                                request()->routeIS('hargabongkar-mngr-ren.edit')">
                                <span class="mx-auto py-2 flex ">
                                    {{ __('Daftar Harga') }}
                                </span>
                                <svg class="fill-current h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </x-nav-link>
                        </x-slot>
                        <x-slot name="content">
                            <ul>
                                <li>
                                    <x-nav-link :href="route('hargapasang-mngr-ren.index')" class="text-xl px-4 py-1" :active="request()->routeIs('hargapasang-mngr-ren.index') ||
                                        request()->routeIS('hargapasang-mngr-ren.create') ||
                                        request()->routeIS('hargapasang-mngr-ren.show')">
                                        <span class="mx-auto py-2 flex ">
                                            {{ __('Harga Pasang') }}
                                        </span>
                                    </x-nav-link>
                                </li>
                                <li>
                                    <x-nav-link :href="route('hargabongkar-mngr-ren.index')" class="text-xl px-4 py-1" :active="request()->routeIs('hargabongkar-mngr-ren.index') ||
                                        request()->routeIS('hargabongkar-mngr-ren.create') ||
                                        request()->routeIS('hargabongkar-mngr-ren.show')">
                                        <span class="mx-auto py-2 flex ">
                                            {{ __('Harga Bongkar') }}
                                        </span>
                                    </x-nav-link>
                                </li>
                            </ul>
                        </x-slot>
                    </x-dropdown-sidebar>
                </li>
                <li>
                    <x-nav-link :href="route('capel-mngr-ren.index')" class="my-4 text-xl px-4 py-1" :active="request()->routeIs('capel-mngr-ren.index') ||
                        request()->routeIs('capel-mngr-ren.create') ||
                        request()->routeIs('capel-mngr-ren.show') ||
                        request()->routeIs('capel-mngr-ren.edit')">
                        <span class="mx-auto py-2 flex">
                            {{ __('Calon Pelanggan') }}
                        </span>
                    </x-nav-link>
                </li>
            </ul>
        @endif
        {{-- END MANAGER PERENCANAAN --}}

        {{-- START TL RENSIS --}}
        @if (Auth::user()->role === 'TL Rensis')
        @endif
        {{-- END TL RENSIS --}}
        {{-- END UP3 --}}

        {{-- START UNIT --}}
        {{-- START MANAGER UNIT --}}
        @if (Auth::user()->role === 'Manager Unit')
            <div class="pb-2 border-b-2 border-indigo-400 dark:border-indigo-600">
                <a href="{{ route('dashboard.mngr.unit') }}">
                    <x-application-logo
                        class="h-14 w-auto flex mx-auto fill-current text-gray-800 dark:text-gray-200" />
                </a>
            </div>
            <ul class="mt-10 space-y-2 font-medium">
                <li>
                    <x-nav-link :href="route('dashboard.mngr.unit')" class="my-4 text-xl px-4 py-1" :active="request()->routeIs('dashboard.mngr.unit')">
                        <span class="mx-auto py-2 flex">
                            {{ __('Dashboard') }}
                        </span>
                    </x-nav-link>
                </li>
                <li>
                    <x-dropdown-sidebar align="right" width="auto">
                        <x-slot name="trigger">
                            <x-nav-link class="mt-4 text-xl px-4 py-1 " :active="request()->routeIs('hargapasang-mngr-unit.index') ||
                                request()->routeIs('harga-bongkar.index') ||
                                request()->routeIS('hargapasang-mngr-unit.create') ||
                                request()->routeIS('hargapasang-mngr-unit.show') ||
                                request()->routeIS('hargapasang-mngr-unit.edit')">
                                <span class="mx-auto py-2 flex ">
                                    {{ __('Daftar Harga') }}
                                </span>
                                <svg class="fill-current h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </x-nav-link>
                        </x-slot>
                        <x-slot name="content">
                            <ul>
                                <li>
                                    <x-nav-link :href="route('hargapasang-mngr-unit.index')" class="text-xl px-4 py-1" :active="request()->routeIs('hargapasang-mngr-unit.index') ||
                                        request()->routeIS('hargapasang-mngr-unit.create') ||
                                        request()->routeIS('hargapasang-mngr-unit.show')">
                                        <span class="mx-auto py-2 flex ">
                                            {{ __('Harga Pasang') }}
                                        </span>
                                    </x-nav-link>
                                </li>
                                <li>
                                    <x-nav-link class="text-xl px-4 py-1  hover:dark:bg-gray-500" :active="request()->routeIs('harga')">
                                        <span class="mx-auto py-2 flex ">
                                            {{ __('Harga Bongkar') }}
                                        </span>
                                    </x-nav-link>
                                </li>
                            </ul>
                        </x-slot>
                    </x-dropdown-sidebar>
                </li>
            </ul>
        @endif
        {{-- END MANAGER UNIT --}}
        {{-- START TL TEKNIK --}}
        @if (Auth::user()->role === 'TL Teknik')
        @endif
        {{-- END TL TEKNIK --}}
        {{-- END UNIT --}}

        {{-- START PEGAWAI --}}
        @if (Auth::user()->role === 'Pegawai')
        @endif
        {{-- END PEGAWAI --}}


        {{-- <ul class="mt-10 space-y-2 font-medium">
            <li>
                <x-nav-link :href="route('dashboard')" class="my-4 text-xl px-4 py-1" :active="request()->routeIs('dashboard')">
                    <span class="mx-auto py-2 flex">
                        {{ __('Dashboard') }}
                    </span>
                </x-nav-link>
            </li>
            <li>
                <x-dropdown-sidebar align="right" width="auto">
                    <x-slot name="trigger">
                        <x-nav-link class="mt-4 text-xl px-4 py-1 " :active="request()->routeIs('harga-pasang.index') ||
                            request()->routeIs('harga-bongkar.index') ||
                            request()->routeIS('harga-pasang.create') ||
                            request()->routeIS('harga-pasang.show') ||
                            request()->routeIS('harga-pasang.edit')">
                            <span class="mx-auto py-2 flex ">
                                {{ __('Daftar Harga') }}
                            </span>
                            <svg class="fill-current h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </x-nav-link>
                    </x-slot>
                    <x-slot name="content">
                        <ul>
                            <li>
                                <x-nav-link :href="route('harga-pasang.index')" class="text-xl px-4 py-1" :active="request()->routeIs('harga-pasang.index') ||
                                    request()->routeIS('harga-pasang.create') ||
                                    request()->routeIS('harga-pasang.show')">
                                    <span class="mx-auto py-2 flex ">
                                        {{ __('Harga Pasang') }}
                                    </span>
                                </x-nav-link>
                            </li>
                            <li>
                                <x-nav-link class="text-xl px-4 py-1  hover:dark:bg-gray-500" :active="request()->routeIs('harga')">
                                    <span class="mx-auto py-2 flex ">
                                        {{ __('Harga Bongkar') }}
                                    </span>
                                </x-nav-link>
                            </li>
                        </ul>
                    </x-slot>
                </x-dropdown-sidebar>
            </li>

        </ul> --}}

    </div>
</aside>
