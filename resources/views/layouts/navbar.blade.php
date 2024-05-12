<nav id="navbar" class="w-100 flex h-[10dvh] items-center justify-between bg-[#01283C] px-5 py-7">
    <img src="{{ asset('Aset/Logo/OceanWell\'s Logo.png') }}" class="w-[120px] cursor-pointer" alt="logo">
    <ul>
        <li class="ms-4 inline-block list-none">
            <x-nav-link href="#" :active="request()->routeIs('dashboard')">About Us</x-nav-link>
        </li>
        <li class="ms-4 inline-block list-none">
            <x-nav-link href="#" :active="request()->routeIs('donate')">Donate</x-nav-link>
        </li>
        <li class="ms-4 inline-block list-none">
            <x-nav-link href="#" :active="request()->routeIs('vounteer')">Volunteer</x-nav-link>
        </li>
        <li class="ms-4 inline-block list-none">
            <x-nav-link href="#" :active="request()->routeIs('articles')">Articles</x-nav-link>
        </li>
    </ul>
</nav>
