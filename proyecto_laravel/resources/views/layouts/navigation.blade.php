<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="/">
            <x-application-logo width="36" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-nav-link>
                <x-nav-link href="{{ route('users') }}" :active="request()->routeIs('users')">
                    {{ __('Users') }}
                </x-nav-link>
                <x-nav-link href="{{ route('images') }}" :active="request()->routeIs('images')">
                    {{ __('Images') }}
                </x-nav-link>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav">

                <!-- Settings Dropdown -->
                @auth
                    <x-dropdown id="settingsDropdown">
                        <x-slot name="trigger">
                            <img src="https://img.jakpost.net/c/2021/03/04/2021_03_04_111037_1614825725._large.jpg" class="profile-pic rounded-circle">
                            {{ Auth::user()->name }}
                        </x-slot>

                        <x-slot name="content">
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
                @endauth
            </ul>
        </div>
    </div>
</nav>