<header class="fixed top-0 left-0 right-0 transition-all duration-300 z-20 ease-in-out" id="header">
    <div class="mx-auto flex h-20  w-[95%] items-center gap-8 px-4 sm:px-6 lg:px-8">
        <!-- Logo -->
        <x-application-logo class="text-white text-xl"/>

        <div class="flex flex-1 items-center justify-end md:justify-between">
            <nav aria-label="Global" class="hidden md:block">
                <ul class="flex items-center gap-6 text-base">
                    <li>
                        <a class="text-white transition hover:text-teal-600 link  px-3 py-2 rounded-md nav-link"
                           href="#about"> About </a>
                    </li>
                    <li>
                        <a class="text-white transition hover:text-teal-600 link  px-3 py-2 rounded-md nav-link"
                           href="#services"> Services </a>
                    </li>
                    <li>
                        <a class="text-white transition hover:text-teal-600 link px-3 py-2 rounded-md nav-link"
                           href="{{ route('pages.explore-events') }}"> Explore Events </a>
                    </li>
                    <li>
                        <a class="text-white transition hover:text-teal-600 link px-3 py-2 rounded-md nav-link"
                           href="#blog"> Blog </a>
                    </li>
                </ul>
            </nav>

            <div class="flex items-center gap-4">
                <div class="sm:flex sm:gap-4">

                    @auth
                        <div class="relative">
                            <button id="settingBtn">
                                <img src="{{ asset('storage/'. auth()->user()->picture) }}" alt="profile" class="h-10 w-10  rounded-full">
                            </button>
                            <div class="absolute top-[95%] z-50 scale-90 opacity-0 invisible transition-all duration-300  right-[5px] min-w-[180px] bg-white rounded-md shadow" id="settingWrapper">
                                <ul class="py-1 text-sm">
                                    <li>
                                        <a
                                            class="block py-2 px-4 hover:bg-gray-100 "
                                            href="{{ route('organizer') }}"
                                        >
                                            dashboard organizer
                                        </a>
                                    </li>
                                    <li>
                                        <a
                                            class="block py-2 px-4 hover:bg-gray-100 "
                                            href="/profile"
                                        >
                                            Profile
                                        </a>
                                    </li>
                                    <li>
                                        <form
                                            class="block py-2 px-4 hover:bg-gray-100 "
                                            method="post" action="{{ route('logout') }}"
                                        >
                                            @csrf
                                            <button type="submit">Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    @else
                        <a
                            class="block rounded-md bg-teal-700   px-5 py-2.5 text-sm font-medium text-white transition hover:bg-teal-700"
                            href="/login"
                        >
                            Login
                        </a>

                        <a
                            class="hidden rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600 transition hover:text-teal-600/75 md:block"
                            href="/register"
                        >
                            Register
                        </a>
                    @endauth

                </div>

                <button
                    class="block rounded bg-gray-100 p-2.5 text-gray-600 transition hover:text-gray-600/75 md:hidden"
                    id="toggle-btn">
                    <span class="sr-only">Toggle menu</span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
                <!-- nav-mobile -->
                <nav aria-label="Global"
                     class="absolute w-full h-[0px] overflow-hidden transition-all duration-500  left-0 top-full md:hidden"
                     id="navbar-mobile">
                    <ul class="flex flex-col w-full items-start p-5 bg-yellow-600/20 gap-6 text-base ransition-all duration-300 ease-in-out"
                        id="nav-links">
                        <li>
                            <a class="text-white transition hover:text-teal-600 link" href="#"> About </a>
                        </li>
                        <li>
                            <a class="text-white transition hover:text-teal-600 link" href="#"> Services </a>
                        </li>

                        <li>
                            <a class="text-white transition hover:text-teal-600 link" href="#"> Explorer Events </a>
                        </li>

                        <li>
                            <a class="text-white transition hover:text-teal-600 link" href="#"> Blog </a>
                        </li>
                        @if(!auth()->user())
                            <li>
                                <a
                                    class=" rounded-md bg-gray-100 px-5 py-2.5 text-sm font-medium text-teal-600 transition hover:text-teal-600/75 sm:block"
                                    href="#"
                                >
                                    Register
                                </a>
                            </li>
                        @endif


                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
{{-- Manipulation navigation --}}
<script>
    const btnToggle = document.getElementById('toggle-btn')
    const navMobile = document.getElementById('navbar-mobile')

    btnToggle.addEventListener('click', () => {
        console.log('ok')
        if (navMobile.classList.contains('h-[0px]')) {
            navMobile.classList.replace('h-[0px]', 'h-[280px]');
        } else {
            navMobile.classList.replace('h-[280px]', 'h-[0px]');
        }
    })
    // onscroll
    const header = document.getElementById('header');
    const links = document.querySelectorAll('.link')
    const navLinks = document.getElementById('nav-links')
    window.addEventListener('scroll', () => {

        if (window.scrollY > 30) {
            header.classList.add('bg-white', 'shadow-md')
            navLinks.classList.replace('bg-yellow-600/20', 'bg-white')

            links.forEach((link, index) => {
                link.classList.replace('text-white', 'text-teal-600')
            })
        } else {
            header.classList.remove('bg-white', 'shadow-md')
            navLinks.classList.replace('bg-white', 'bg-yellow-600/20')

            links.forEach((link, index) => {
                link.classList.replace('text-teal-600', 'text-white')
            })
        }
    })

    // ==== Active link =====

    const links_nav = document.querySelectorAll('.nav-link');
    links_nav.forEach((link, index) => {
        link.addEventListener('click', () => {
            links_nav.forEach((link_nav) => {
                link_nav.classList.remove('active')
            })
        })
        if (link.href === window.location.href) {
            link.classList.add('active');
        }
    })
    // ==== Display Settings profile
    const settingsBtn = document.getElementById('settingBtn');
    const settingWrapper = document.getElementById('settingWrapper');
    settingsBtn.addEventListener('click' ,() => {
        if (settingWrapper.classList.contains('opacity-0')){
            settingWrapper.classList.remove('opacity-0' , 'invisible' , 'scale-90')
        }else {
            settingWrapper.classList.add('opacity-0' , 'invisible' , 'scale-90')
        }
    })
    // hidden Setting profile
    window.addEventListener('click' , (e) => {
        if (!settingsBtn.contains(e.target) && !settingWrapper.contains(e.target)){
            settingWrapper.classList.add('opacity-0' , 'invisible' , 'scale-90')
        }
    })

</script>
