@include('layouts.public-layout')

<section class="relative bg-gray-100 py-1 min-h-screen">
    <header class="fixed top-0 z-[1000] left-0 right-0  bg-white transition-all shadow duration-300  ease-in-out"
            id="header">
        <div class="mx-auto flex h-20  w-[95%] items-center gap-8 px-4 sm:px-6 lg:px-8">
            <!-- Logo -->
            <x-application-logo class="text-teal-600 text-xl"/>

            <div class="flex flex-1 items-center justify-end md:justify-between">
                <nav aria-label="Global" class="hidden md:block">
                    <ul class="flex items-center gap-6 text-base">
                        <li>
                            <a class="text-teal-600 transition hover:text-teal-600 link  px-3 py-2 rounded-md nav-link"
                               href="#about"> About </a>
                        </li>
                        <li>
                            <a class="text-teal-600 transition hover:text-teal-600 link  px-3 py-2 rounded-md nav-link"
                               href="#services"> Services </a>
                        </li>
                        <li>
                            <a class="text-teal-600 transition hover:text-teal-600 link px-3 py-2 rounded-md nav-link"
                               href="{{ route('pages.explore-events') }}"> Explore Events </a>
                        </li>
                        <li>
                            <a class="text-teal-600 transition hover:text-teal-600 link px-3 py-2 rounded-md nav-link"
                               href="#blog"> Blog </a>
                        </li>
                    </ul>
                </nav>

                <div class="flex items-center gap-4">
                    <div class="sm:flex sm:gap-4">

                        @auth
                            <div class="relative">
                                <button id="settingBtn">
                                    <img src="{{ asset('storage/'. auth()->user()->picture) }}" alt="profile"
                                         class="h-10 w-10  rounded-full">
                                </button>
                                <div
                                    class="absolute top-[95%] z-50 scale-90 opacity-0 invisible transition-all duration-300  right-[5px] min-w-[180px] bg-white rounded-md shadow"
                                    id="settingWrapper">
                                    <ul class="py-1 text-sm">
                                        @if(auth()->user()->hasRole('organizer'))
                                            <li>
                                                <a
                                                    class="block py-2 px-4 hover:bg-gray-100 "
                                                    href="{{ route('organizer') }}"
                                                >
                                                    dashboard
                                                </a>
                                            </li>
                                        @endif
                                        @if(auth()->user()->hasRole('client'))
                                            <li>
                                                <a
                                                    class="block py-2 px-4 hover:bg-gray-100 "
                                                    href="{{ route('client') }}"
                                                >
                                                    dashboard
                                                </a>
                                            </li>
                                        @endif
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
                                <a class="text-teal-600 transition hover:text-teal-600 link" href="#"> About </a>
                            </li>
                            <li>
                                <a class="text-teal-600 transition hover:text-teal-600 link" href="#"> Services </a>
                            </li>

                            <li>
                                <a class="text-teal-600 transition hover:text-teal-600 link" href="#"> Explorer
                                    Events </a>
                            </li>

                            <li>
                                <a class="text-teal-600 transition hover:text-teal-600 link" href="#"> Blog </a>
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
    {{--  Head page --}}
    <div class=" text-gray-800 w-full relative z-10 h-[300px] bg-center bg-cover mt-[80px]" style="background-image: url('{{ asset('assets/images/event-bg.jpg') }}')">
        <div class="absolute top-0 left-0 w-full h-full bg-teal-700/40"></div>
        <div class="mx-auto w-xl h-full container flex items-end justify-end">
            <div class="relative w-full">
                <div class="absolute bottom-[-16px] left-0 ">
                    <img src="{{ asset('storage/') . '/' . auth()->user()->picture}}" alt=""
                         class="w-[160px] h-[160px] border-8 rounded-full border-white">
                </div>
                <div class="ml-[180px]">
                    <div class="mb-4 text-white">
                        <h5 class="text-2xl font-light mb-2">Member Since 2024</h5>
                        <h2 class="text-3xl font-semibold">Abdelouahed SENANE</h2>
                    </div>
                    <div>
                        <ul class="flex items-center text-black bg-slate-200 rounded-tr-lg rounded-tl-md    w-fit overflow-hidden">
                            <li class="text-base py-2 px-5 cursor-pointer relative active  tab_link">Home</li>
                            <li class="text-base py-2 px-5 cursor-pointer  relative tab_link">My Reservation</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container w-[75%] mx-auto w-xl my-20">

        <div class="flex w-full">
            <!-- statistics -->

            <!-- Contents Page -->
            <div class="flex-1 mt-[35px]">
                <!-- Contents create event -->
                <div class="content ">
                    <div class="bg-white p-20">
                        <div class="flex items-start justify-between">
                            <div>
                                <h2 class="text-4xl font-semibold">Welcome to Your Dashboard!</h2>
                                <p class="text-gray-500">Dear {{ auth()->user()->name }}</p>
                                <p class="my-5 text-gray-600 max-w-2xl">
                                    We are thrilled to welcome you to your personalized dashboard, your hub for managing
                                    all aspects of your experience with us. Here, you'll find a suite of tools designed
                                    to enhance your journey and streamline your interactions with our services.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Content create event -->

                <div class="content hidden">
                    <div class="bg-white min-h-[100px] p-5">
                        <div class="">
                            <div>
                                <h2 class="text-4xl font-semibold">Your Reservation in platform</h2>
                                <p class="text-gray-500">we take pride in bringing your ideas to life. </p>
                            </div>
                            <!-- Container Reservation  -->
                            <div class="grid my-5 grid-cols-2 xl:grid-cols-3 items-center gap-4 ">

                                <!-- Card Reservation  -->
                                @foreach($reservations as $reservation)
                                    @if($reservation->status === 'approved')
                                        <div class=" w-full rounded-lg overflow-hidden shadow-lg shadow-gray-100">
                                            <div class="bg-white  relative h-[190px] bg-center bg-cover w-full"
                                                 style="background-image: url('{{ asset('storage/') . '/'. $reservation->event->image}}');">
                                            <div class="absolute z-50 bg-white w-[40px] h-[40px] flex items-center justify-center rounded-md top-2 right-2">
                                                    <form action="{{ route('download.ticket') }}">
                                                        <button type="submit" class="w-full h-full  ">
                                                            <i class="fa-solid fa-download text-[20px]"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                                <div class="absolute top-0 left-0 bg-amber-700/30 w-full h-full"></div>
                                                <div class="text-white relative px-3 py-[100px]">
                                                    <h4 class="text-2xl font-medium">EventSync</h4>
                                                    <p class="text-sm">
                                                        You're invited to reserve your spot at our highly anticipated event,
                                                        {{ $reservation->event->title }}.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="p-5 border-b relative border-gray-200">
                                                <div class="flex justify-between">
                                                    <h2 class="text-2xl">
                                                        {{ $reservation->event->title }}
                                                    </h2>
                                                    <div class="px-2 bg-green-500 rounded-md text-sm text-white py-2">
                                                        <i class="fa-regular fa-circle-check text-[20px]"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <ul class="p-3 inline-flex w-full gap-2 ">
                                                    <li class="p flex-1">
                                                        <span class="mb-2  text-sm font-medium text-teal-600">Location</span>
                                                        <div class="flex text-sm items-center gap-2 text-gray-600"><i
                                                                class="fa-solid fa-location-dot"></i><span>{{ $reservation->event->venue }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="p flex-1">
                                                        <span class="mb-2  text-sm font-medium text-teal-600">Date</span>
                                                        <div class="flex items-center gap-2  text-gray-600"><span>{{ \Carbon\Carbon::parse($reservation->event->date)->format('d M Y') }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="p flex-1">
                                                        <span class="mb-2  text-sm font-medium text-teal-600">Time (GMT)</span>
                                                        <div class="flex items-center gap-2  text-gray-600">
                                                            <span>{{ \Carbon\Carbon::parse($reservation->event->date)->format('h:i A') }}</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @elseif($reservation->status === 'pending')
                                        <div class=" w-full rounded-lg overflow-hidden shadow-lg shadow-gray-100">
                                            <div class="bg-white  relative h-[190px] bg-center bg-cover w-full"
                                                 style="background-image: url('{{ asset('storage/') . '/'. $reservation->event->image}}');">
                                                <div class="absolute top-0 left-0 bg-amber-700/30 w-full h-full"></div>
                                                <div class="text-white relative px-3 py-[100px]">
                                                    <h4 class="text-2xl font-medium">EventSync</h4>
                                                    <p class="text-sm">
                                                        You're invited to reserve your spot at our highly anticipated event,
                                                        {{ $reservation->event->title }}.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="p-5 border-b relative border-gray-200">
                                                <div class="flex justify-between">
                                                    <h2 class="text-2xl">
                                                        {{ $reservation->event->title }}
                                                    </h2>
                                                    <div class="px-2 bg-yellow-400 rounded-md text-sm text-white py-2">
                                                        <i class="fa-solid fa-spinner text-[20px]" ></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <ul class="p-3 inline-flex w-full gap-2 ">
                                                    <li class="p flex-1">
                                                        <span class="mb-2  text-sm font-medium text-teal-600">Location</span>
                                                        <div class="flex text-sm items-center gap-2 text-gray-600"><i
                                                                class="fa-solid fa-location-dot"></i><span>{{ $reservation->event->venue }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="p flex-1">
                                                        <span class="mb-2  text-sm font-medium text-teal-600">Date</span>
                                                        <div class="flex items-center gap-2  text-gray-600"><span>{{ \Carbon\Carbon::parse($reservation->event->date)->format('d M Y') }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="p flex-1">
                                                        <span class="mb-2  text-sm font-medium text-teal-600">Time (GMT)</span>
                                                        <div class="flex items-center gap-2  text-gray-600">
                                                            <span>{{ \Carbon\Carbon::parse($reservation->event->date)->format('h:i A') }}</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <div class=" w-full rounded-lg overflow-hidden shadow-lg shadow-gray-100">
                                            <div class="bg-white  relative h-[190px] bg-center bg-cover w-full"
                                                 style="background-image: url('{{ asset('storage/') . '/'. $reservation->event->image}}');">
                                                <div class="absolute top-0 left-0 bg-amber-700/30 w-full h-full"></div>
                                                <div class="text-white relative px-3 py-[100px]">
                                                    <h4 class="text-2xl font-medium">EventSync</h4>
                                                    <p class="text-sm">
                                                        You're invited to reserve your spot at our highly anticipated event,
                                                        {{ $reservation->event->title }}.
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="p-5 border-b relative border-gray-200">
                                                <div class="flex justify-between">
                                                    <h2 class="text-2xl">
                                                        {{ $reservation->event->title }}
                                                    </h2>
                                                    <div class="px-2 bg-rose-500 rounded-md text-sm text-white py-2">
                                                        <i class="fa-solid fa-xmark text-[20px]"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="">
                                                <ul class="p-3 inline-flex w-full gap-2 ">
                                                    <li class="flex-1">
                                                        <span class="mb-2  text-sm font-medium text-teal-600">Location</span>
                                                        <div class="flex text-xs items-center gap-2 text-gray-600"><i
                                                                class="fa-solid fa-location-dot"></i><span>{{ $reservation->event->venue }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="p flex-1">
                                                        <span class="mb-2  text-sm font-medium text-teal-600">Date</span>
                                                        <div class="flex items-center gap-2  text-gray-600"><span>{{ \Carbon\Carbon::parse($reservation->event->date)->format('d M Y') }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="p flex-1">
                                                        <span class="mb-2  text-sm font-medium text-teal-600">Time (GMT)</span>
                                                        <div class="flex items-center gap-2  text-gray-600">
                                                            <span>{{ \Carbon\Carbon::parse($reservation->event->date)->format('h:i A') }}</span>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif




                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Content create event -->

            </div>
        </div>

    </div>
</section>

<script>
    {{-- Manipulation navigation --}}


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
    if (settingsBtn) {
        settingsBtn.addEventListener('click', () => {
            if (settingWrapper.classList.contains('opacity-0')) {
                settingWrapper.classList.remove('opacity-0', 'invisible', 'scale-90')
            } else {
                settingWrapper.classList.add('opacity-0', 'invisible', 'scale-90')
            }
        })
    }
    // hidden Setting profile
    window.addEventListener('click', (e) => {
        if (settingsBtn) {
            if (!settingsBtn.contains(e.target) && !settingWrapper.contains(e.target)) {
                settingWrapper.classList.add('opacity-0', 'invisible', 'scale-90')
            }
        }

    })
    // tabulation implementation
    const tabsLink = document.querySelectorAll('.tab_link');
    const contents = document.querySelectorAll('.content');
    console.log(contents)
    tabsLink.forEach((tabLink, index) => {
        tabLink.addEventListener('click', () => {
            tabsLink.forEach(tab => {
                tab.classList.remove('active')
            })
            tabLink.classList.add('active')
            contents.forEach(content => {
                content.classList.add('hidden', 'active')
            })
            contents[index].classList.remove('hidden')
        })
    })
</script>
