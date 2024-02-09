<nav x-data="{ open: false }"
    class="bg-white dark:bg-gray-800 border-b border-indigo-500 dark:border-b dark:border-indigo-500">
    <!-- Primary Navigation Menu -->
    <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center lg:ml-56 md:ml-60 text-gray-900 dark:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="h-7 w-7 text-red-600 rounded-md px-1 mx-1">
                    <path fill-rule="evenodd"
                        d="M14.615 1.595a.75.75 0 01.359.852L12.982 9.75h7.268a.75.75 0 01.548 1.262l-10.5 11.25a.75.75 0 01-1.272-.71l1.992-7.302H3.75a.75.75 0 01-.548-1.262l10.5-11.25a.75.75 0 01.913-.143z"
                        clip-rule="evenodd" />
                </svg>
                <div class="flex items-center">
                    <div
                        class="lg:text-lg sm:text-xs font-semibold italic mx-1 font-mono hover:underline hover:underline-offset-2">
                        Dalang Saékapraya.
                    </div>
                    <div class="text-sm mt-1">
                        @yield('page_title')
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-900 dark:text-gray-400 bg-transparent dark:bg-gray-800 hover:text-red-600 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
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
                        {{-- <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link> --}}

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
            <div class="sm:mr-2 flex items-center sm:hidden ">
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
    <div :class="{ 'block': open, 'hidden': !open }" class="sm:hidden">

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <!--START UP3-->
            <!-- START MANAGER PERENCANAAN -->
            @if (Auth::user()->role === 'Manager Perencanaan')
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard.mngr.perencanaan')" :active="request()->routeIs('dashboard.mngr.perencanaan')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>
                <div class="mt-3 space-y-1">
                    <x-dropdown-sidebar align="right" width="auto">
                        <x-slot name="trigger">
                            <x-responsive-nav-link class="flex items-center" :active="request()->routeIs('hargapasang-mngr-ren.index') ||
                                request()->routeIS('hargapasang-mngr-ren.create') ||
                                request()->routeIS('hargapasang-mngr-ren.show') ||
                                request()->routeIS('hargapasang-mngr-ren.edit')">
                                {{ __('Harga Material') }}
                                <svg class="fill-current h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </x-responsive-nav-link>
                        </x-slot>
                        <x-slot name="content">
                            <x-responsive-nav-link :href="route('hargapasang-mngr-ren.index')" :active="request()->routeIs('hargapasang-mngr-ren.index') ||
                                request()->routeIS('hargapasang-mngr-ren.create') ||
                                request()->routeIS('hargapasang-mngr-ren.show')">
                                {{ __('Harga Pasang') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link>
                                {{ __('Harga Bongkar') }}
                            </x-responsive-nav-link>
                        </x-slot>
                    </x-dropdown-sidebar>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('pelanggan-mngr-ren.index')" :active="request()->routeIs('pelanggan-mngr-ren.index') ||
                        request()->routeIs('pelanggan-mngr-ren.create') ||
                        request()->routeIs('pelanggan-mngr-ren.show') ||
                        request()->routeIs('pelanggan-mngr-ren.edit')">
                        {{ __('Data Pelanggan') }}
                    </x-responsive-nav-link>
                </div>
            @endif
            <!--END MANAGER PERENCANAAN-->

            <!-- START TL RENSIS-->
            @if (Auth::user()->role === 'TL Rensis')
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard.tl.rensis')" :active="request()->routeIs('dashboard.tl.rensis')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>
                <div class="mt-3 space-y-1">
                    <x-dropdown-sidebar align="right" width="auto">
                        <x-slot name="trigger">
                            <x-responsive-nav-link class="flex items-center" :active="request()->routeIs('hargapasang-tl-rensis.index') ||
                                request()->routeIS('hargapasang-tl-rensis.create') ||
                                request()->routeIS('hargapasang-tl-rensis.show') ||
                                request()->routeIS('hargapasang-tl-rensis.edit')">
                                {{ __('Harga Material') }}
                                <svg class="fill-current h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </x-responsive-nav-link>
                        </x-slot>
                        <x-slot name="content">
                            <x-responsive-nav-link :href="route('hargapasang-tl-rensis.index')" :active="request()->routeIs('hargapasang-tl-rensis.index') ||
                                request()->routeIS('hargapasang-tl-rensis.create') ||
                                request()->routeIS('hargapasang-tl-rensis.show')">
                                {{ __('Harga Pasang') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link>
                                {{ __('Harga Bongkar') }}
                            </x-responsive-nav-link>
                        </x-slot>
                    </x-dropdown-sidebar>
                </div>
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('pelanggan-tl-rensis.index')" :active="request()->routeIs('pelanggan-tl-rensis.index') ||
                        request()->routeIs('pelanggan-tl-rensis.create') ||
                        request()->routeIs('pelanggan-tl-rensis.show') ||
                        request()->routeIs('pelanggan-tl-rensis.edit')">
                        {{ __('Data Pelanggan') }}
                    </x-responsive-nav-link>
                </div>
            @endif
            <!--END TL RENSIS-->
            <!--END UP3-->

            <!-- START UNIT -->
            <!-- START MANAGER UNIT -->
            @if (Auth::user()->role === 'Manager Unit')
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard.mngr.unit')" :active="request()->routeIs('dashboard.mngr.unit')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>

                    <x-dropdown-sidebar align="right" width="auto">
                        <x-slot name="trigger">
                            <x-responsive-nav-link class="flex items-center" :active="request()->routeIs('hargapasang-mngr-unit.index') ||
                                request()->routeIS('hargapasang-mngr-unit.show')">
                                {{ __('Harga Material') }}
                                <svg class="fill-current h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </x-responsive-nav-link>
                        </x-slot>
                        <x-slot name="content">
                            <x-responsive-nav-link :href="route('hargapasang-mngr-unit.index')" :active="request()->routeIs('hargapasang-mngr-unit.index') ||
                                request()->routeIS('hargapasang-mngr-unit.show')">
                                {{ __('Harga Pasang') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link>
                                {{ __('Harga Bongkar') }}
                            </x-responsive-nav-link>
                        </x-slot>
                    </x-dropdown-sidebar>

                    <x-responsive-nav-link :href="route('pelanggan-mngr-unit.index')" :active="request()->routeIs('pelanggan-mngr-unit.index') ||
                        request()->routeIs('pelanggan-mngr-unit.show')">
                        {{ __('Data Pelanggan') }}
                    </x-responsive-nav-link>
                </div>
            @endif
            <!-- END MANAGER UNIT -->

            <!-- TL TEKNIK -->
            @if (Auth::user()->role === 'TL Teknik')
                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard.tl.teknik')" :active="request()->routeIs('dashboard.tl.teknik')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>

                    <x-dropdown-sidebar align="right" width="auto">
                        <x-slot name="trigger">
                            <x-responsive-nav-link class="flex items-center" :active="request()->routeIs('hargapasang-tl-teknik.index') ||
                                request()->routeIS('hargapasang-tl-teknik.show')">
                                {{ __('Harga Material') }}
                                <svg class="fill-current h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </x-responsive-nav-link>
                        </x-slot>
                        <x-slot name="content">
                            <x-responsive-nav-link :href="route('hargapasang-tl-teknik.index')" :active="request()->routeIs('hargapasang-tl-teknik.index') ||
                                request()->routeIS('hargapasang-tl-teknik.show')">
                                {{ __('Harga Pasang') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link>
                                {{ __('Harga Bongkar') }}
                            </x-responsive-nav-link>
                        </x-slot>
                    </x-dropdown-sidebar>

                    <x-responsive-nav-link :href="route('pelanggan-tl-teknik.index')" :active="request()->routeIs('pelanggan-tl-teknik.index') ||
                        request()->routeIs('pelanggan-tl-teknik.show')">
                        {{ __('Data Pelanggan') }}
                    </x-responsive-nav-link>
                </div>
            @endif
            <!-- END TL TEKNIK -->
            <!-- END UNIT -->

            <div class="mt-3 space-y-1">
                {{-- <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link> --}}

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
    class="fixed top-0 left-0 z-40 transition-transform -translate-x-full sm:translate-x-0">
    <div
        class="h-screen w-full sm:w-64 px-2 py-4 overflow-y-auto bg-white dark:bg-gray-800 border-r border-indigo-600 dark:border-r dark:border-indigo-600">
        <!--START UP3-->
        <!-- START MANAGER PERENCANAAN -->
        @if (Auth::user()->role === 'Manager Perencanaan')
            <div class="pb-2 border-b-2 border-indigo-400 dark:border-indigo-600">
                <a href="{{ route('dashboard.mngr.perencanaan') }}">
                    <x-application-logo />
                </a>
            </div>
            <ul class="mt-6 space-y-2 font-medium">
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
                                request()->routeIS('hargapasang-mngr-ren.edit')">
                                <span class="mx-auto py-2 flex ">
                                    {{ __('Harga Material') }}
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
                                    <x-nav-link class="text-xl px-4 py-1">
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
                    <x-nav-link :href="route('pelanggan-mngr-ren.index')" class="my-4 text-xl px-4 py-1" :active="request()->routeIs('pelanggan-mngr-ren.index') ||
                        request()->routeIs('pelanggan-mngr-ren.show')">
                        <span class="mx-auto py-2 flex">
                            {{ __('Data Pelanggan') }}
                        </span>
                    </x-nav-link>
                </li>

            </ul>
        @endif
        <!--END MANAGER PERENCANAAN-->

        <!-- START TL RENSIS-->
        @if (Auth::user()->role === 'TL Rensis')
            <div class="pb-2 border-b-2 border-indigo-400 dark:border-indigo-600">
                <a href="{{ route('dashboard.tl.rensis') }}">
                    <x-application-logo />
                </a>
            </div>
            <ul class="mt-10 space-y-2 font-medium">
                <li>
                    <x-nav-link :href="route('dashboard.tl.rensis')" class="my-4 text-xl px-4 py-1" :active="request()->routeIs('dashboard.tl.rensis')">
                        <span class="mx-auto py-2 flex">
                            {{ __('Dashboard') }}
                        </span>
                    </x-nav-link>
                </li>

                <li>
                    <x-dropdown-sidebar align="right" width="auto">
                        <x-slot name="trigger">
                            <x-nav-link class="mt-4 text-xl px-4 py-1 " :active="request()->routeIs('hargapasang-tl-rensis.index') ||
                                request()->routeIS('hargapasang-tl-rensis.create') ||
                                request()->routeIS('hargapasang-tl-rensis.show') ||
                                request()->routeIS('hargapasang-tl-rensis.edit')">
                                <span class="mx-auto py-2 flex ">
                                    {{ __('Harga Material') }}
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
                                    <x-nav-link :href="route('hargapasang-tl-rensis.index')" class="text-xl px-4 py-1" :active="request()->routeIs('hargapasang-tl-rensis.index') ||
                                        request()->routeIS('hargapasang-tl-rensis.create') ||
                                        request()->routeIS('hargapasang-tl-rensis.show')">
                                        <span class="mx-auto py-2 flex ">
                                            {{ __('Harga Pasang') }}
                                        </span>
                                    </x-nav-link>
                                </li>
                                <li>
                                    <x-nav-link class="text-xl px-4 py-1">
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
                    <x-nav-link :href="route('pelanggan-tl-rensis.index')" class="my-4 text-xl px-4 py-1" :active="request()->routeIs('pelanggan-tl-rensis.index') ||
                        request()->routeIs('pelanggan-tl-rensis.create') ||
                        request()->routeIs('pelanggan-tl-rensis.show') ||
                        request()->routeIs('pelanggan-tl-rensis.edit')">
                        <span class="mx-auto py-2 flex">
                            {{ __('Data Pelanggan') }}
                        </span>
                    </x-nav-link>
                </li>

            </ul>
        @endif
        <!--END TL RENSIS
        END UP3-->

        <!--START UNIT
        START MANAGER UNIT-->
        @if (Auth::user()->role === 'Manager Unit')
            <div class="pb-2 border-b-2 border-indigo-400 dark:border-indigo-600">
                <a href="{{ route('dashboard.mngr.unit') }}">
                    <x-application-logo />
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
                                request()->routeIS('hargapasang-mngr-unit.show')">
                                <span class="mx-auto py-2 flex ">
                                    {{ __('Harga Material') }}
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
                <li>
                    <x-nav-link :href="route('pelanggan-mngr-unit.index')" class="my-4 text-xl px-4 py-1" :active="request()->routeIs('pelanggan-mngr-unit.index') ||
                        request()->routeIs('pelanggan-mngr-unit.show')">
                        <span class="mx-auto py-2 flex">
                            {{ __('Data Pelanggan') }}
                        </span>
                    </x-nav-link>
                </li>
            </ul>
        @endif
        <!--END MANAGER UNIT-->


        <!--START TL TEKNIK-->
        @if (Auth::user()->role === 'TL Teknik')
            <div class="pb-2 border-b-2 border-indigo-400 dark:border-indigo-600">
                <a href="{{ route('dashboard.tl.teknik') }}">
                    <x-application-logo />
                </a>
            </div>
            <ul class="mt-10 space-y-2 font-medium">
                <li>
                    <x-nav-link :href="route('dashboard.tl.teknik')" class="my-4 text-xl px-4 py-1" :active="request()->routeIs('dashboard.tl.teknik')">
                        <span class="mx-auto py-2 flex">
                            {{ __('Dashboard') }}
                        </span>
                    </x-nav-link>
                </li>

                <li>
                    <x-dropdown-sidebar align="right" width="auto">
                        <x-slot name="trigger">
                            <x-nav-link class="mt-4 text-xl px-4 py-1 " :active="request()->routeIs('hargapasang-tl-teknik.index') ||
                                request()->routeIS('hargapasang-tl-teknik.create') ||
                                request()->routeIS('hargapasang-tl-teknik.show') ||
                                request()->routeIS('hargapasang-tl-teknik.edit')">
                                <span class="mx-auto py-2 flex ">
                                    {{ __('Harga Material') }}
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
                                    <x-nav-link :href="route('hargapasang-tl-teknik.index')" class="text-xl px-4 py-1" :active="request()->routeIs('hargapasang-tl-teknik.index') ||
                                        request()->routeIS('hargapasang-tl-teknik.create') ||
                                        request()->routeIS('hargapasang-tl-teknik.show')">
                                        <span class="mx-auto py-2 flex ">
                                            {{ __('Harga Pasang') }}
                                        </span>
                                    </x-nav-link>
                                </li>
                                <li>
                                    <x-nav-link class="text-xl px-4 py-1">
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
                    <x-nav-link :href="route('pelanggan-tl-teknik.index')" class="my-4 text-xl px-4 py-1" :active="request()->routeIs('pelanggan-tl-teknik.index') ||
                        request()->routeIs('pelanggan-tl-teknik.create') ||
                        request()->routeIs('pelanggan-tl-teknik.show') ||
                        request()->routeIs('pelanggan-tl-teknik.edit')">
                        <span class="mx-auto py-2 flex">
                            {{ __('Data Pelanggan') }}
                        </span>
                    </x-nav-link>
                </li>

            </ul>
        @endif
        <!--END TL TEKNIK
        END UNIT-->

        <!--START PEGAWAI-->
        @if (Auth::user()->role === 'Pegawai')
        @endif
        <!--END PEGAWAI-->

    </div>
</aside>
