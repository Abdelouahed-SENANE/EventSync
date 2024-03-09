@include('layouts.public-layout')

<section class="relative min-h-screen pb-[5px] bg-gray-100">
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
    <div class="bg-teal-100 w-full z-10 h-[200px] mt-[80px]">
        <div class="mx-auto w-xl h-full container flex flex-col items-center justify-center">
            <h3 class="text-2xl uppercase font-medium my-2">Details Event</h3>
            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
    </div>
    <div class="container  mx-auto w-xl my-20">

        <div class="relative">
            <div class="bg-white shadow-gray-200/60 shadow-md rounded-md  max-w-[73%] mr-[380px] p-5">
                <!-- head Section -->
                <div class="flex gap-5 mb-6">
                    <div class="w-[100px] h-[100px] text-white bg-teal-400">
                        <div class="p-0.5 bg-teal-600  text-sm  text-center uppercase">THURSDAY</div>
                        <div class="flex flex-col w-full items-center mt-1">
                            <span class="text-2xl font-medium">20</span>
                            <span>MAR</span>
                        </div>
                    </div>
                    <div>
                        <h1 class="text-2xl font-medium">Falling through the Cracks - Social Work week</h1>
                        <ul class="mt-3 flex items-center gap-4">
                            <li class="pr-5 border-r border-gray-200">
                                <span class="mb-2 block text-sm font-medium text-teal-600">Location</span>
                                <div class="flex items-center gap-2 text-gray-600"><i
                                        class="fa-solid fa-location-dot"></i><span>Casablanca</span></div>
                            </li>
                            <li class="pr-5 border-r border-gray-200">
                                <span class="mb-2 block text-sm font-medium text-teal-600">Date</span>
                                <div class="flex items-center gap-2  text-gray-600"><span>Thursday, Mar 21</span></div>
                            </li>
                            <li class="mx-3">
                                <span class="mb-2 block text-sm font-medium text-teal-600">Time (GMT)</span>
                                <div class="flex items-center gap-2 text-gray-600"><span>11:00 AM - 12:00 PM (1h)</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- body section -->
                <div>
                    <div class="my-6">
                        <img src="{{ asset('assets/images/event.jpg') }}" alt="" class="w-full">
                    </div>
                    <div class="inline-flex items-center gap-3 border-b w-full border-gray-200 p-3 rounded-md">
                        <div>
                            <img src="{{ asset('storage/uploads/avatar.png') }}" alt="" class="h-16 w-16">
                        </div>
                        <div class="flex flex-col  items-justify">
                            <span class="text-base">Organised by</span>
                            <span>name Organizer</span>
                            <span class="block text-center h-1 mt-2 w-[50px] bg-teal-500"></span>
                        </div>
                    </div>
                    <div class="my-5">
                        <h2 class="text-xl font-bold">About This Event</h2>
                        <p class="leading-8	text-justify">Restitute are pleased to share a workshop for Social Work England on 21st May at 11am.
                            The workshop will be an acitvity-based session thinking about disclosure and the immediate
                            aftermath this can have on family relationships for generations and decades to come.
                            This workshop will contain challenging material that may not be suitable for everyone.
                            Expect to hear about self-harm, suidical thoughts, sexual abuse and sexual violence.</p>
                    </div>
                    <div>
                        <h3 class="text-2xl font-medium mb-3">About Organizer</h3>
                    </div>
                    <div class="inline-flex items-center gap-3 border border-gray-200 p-3 rounded-md">
                        <div>
                            <img src="{{ asset('storage/uploads/avatar.png') }}" alt="" class="h-16 w-16">
                        </div>
                        <div>
                            <h5 class="font-medium text-lg">name organizer</h5>
                            <span>hosted 2 event</span>
                            <p class="text-gray-600">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Reservation Event -->
            <div
                class="bg-white shadow-gray-200/60 shadow-md min-h-[200px] absolute top-0 right-0 rounded-md  w-[380px]  p-5">
                <div class="text-center">
                    <h6 class="text-md">Booking will be ended on Added Date</h6>
                    <span class="text-gray-400 block text-sm">Time left to book this event</span>
                </div>
                <div class="flex flex-col px-2 my-4">
                    <h3 class="text-lg font-medium">Date & Time</h3>
                    <span class="text-sm my-2">Start Time - xxx</span>
                    <span class="text-sm">End Time - yyy</span>
                </div>
                <div class="px-2">
                    <h3 class="my-2 font-medium">Refund Policy</h3>
                    <span class="text-gray-700">Orders are non-refundable</span>
                </div>
                <div class="border-t border-gray-200 mt-6 flex flex-col">
                    <span class="block text-lg font-medium my-6">Price</span>
                    <form action="" method="post">

                        <button type="submit" class="bg-teal-600 block w-full text-white py-3 rounded">Purchase Ticket</button>
                    </form>
                </div>
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
    settingsBtn.addEventListener('click', () => {
        if (settingWrapper.classList.contains('opacity-0')) {
            settingWrapper.classList.remove('opacity-0', 'invisible', 'scale-90')
        } else {
            settingWrapper.classList.add('opacity-0', 'invisible', 'scale-90')
        }
    })
    // hidden Setting profile
    window.addEventListener('click', (e) => {
        if (!settingsBtn.contains(e.target) && !settingWrapper.contains(e.target)) {
            settingWrapper.classList.add('opacity-0', 'invisible', 'scale-90')
        }
    })

</script>
