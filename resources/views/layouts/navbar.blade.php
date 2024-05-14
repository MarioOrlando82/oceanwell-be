<nav id="navbar" class="w-100 flex h-[10dvh] items-center justify-between bg-[#01283C] px-5 py-7">
    <a href="{{ route('home') }}">
        <img src="{{ asset('Aset/Logo/OceanWell\'s Logo.png') }}" class="w-[120px] cursor-pointer" alt="logo">
    </a>
    <ul>
        <li class="ms-4 inline-block list-none">
            <x-nav-link href="#" :active="request()->routeIs('dashboard')">About Us</x-nav-link>
        </li>
        <li class="ms-4 inline-block list-none">
            <x-nav-link href="#" :active="request()->routeIs('donate')">Donate</x-nav-link>
        </li>
        <li class="ms-4 inline-block list-none">
            <x-nav-link :href="route('index')" :active="request()->routeIs('index')">Volunteer</x-nav-link>
        </li>
        <li class="ms-4 inline-block list-none">
            <x-nav-link :href="route('articles.index')" :active="request()->routeIs('articles.index')">Articles</x-nav-link>
        </li>
        @if (!Auth::check())
            <li class="ms-4 inline-block list-none">
                <x-nav-link :href="route('login')" :active="request()->routeIs('login')">Login</x-nav-link>
            </li>
            <li class="ms-4 inline-block list-none">
                <x-nav-link :href="route('register')" :active="request()->routeIs('login')">Register</x-nav-link>
            </li>
        @else
            <li class="ms-4 inline-block list-none">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <x-nav-link :href="route('register')"
                        onclick="event.preventDefault();
                                                this.closest('form').submit();">{{ __('Log Out') }}</x-nav-link>
                </form>
            </li>
        @endif
    </ul>
</nav>
