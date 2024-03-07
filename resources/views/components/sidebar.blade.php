<aside class="flex flex-col z-50 w-[260px] h-screen fixed top-0 left-0 px-5 py-8 shadow-md shadow-slate-300/20 bg-slate-200 border-r
        rtl:border-r-0
        rtl:border-l  ">
    <a href="#">
        <img class="w-auto h-10" src="{{ asset('assets/images/logo.png') }}" alt="">
    </a>

    <div class="flex flex-col justify-between flex-1 mt-14">
        <nav class="-mx-3 space-y-6 ">
            <div class="space-y-3 ">
                <label class="px-3 text-xs text-black uppercase ">analytics</label>

                <a class="flex items-center px-3 py-2 text-teal-600 transition-colors duration-300 transform

                        rounded-lg  hover:bg-teal-600/90 hover:text-white sidebar-link" href="/admin-panel">

                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M3.75 3v11.25A2.25 2.25 0 006 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0118 16.5h-2.25m-7.5 0h7.5m-7.5 0l-1 3m8.5-3l1 3m0 0l.5 1.5m-.5-1.5h-9.5m0 0l-.5 1.5m.75-9l3-3 2.148 2.148A12.061 12.061 0 0116.5 7.605"/>
                    </svg>

                    <span class="mx-2 text-sm font-medium">Dashboard</span>
                </a>

            </div>

            <div class="space-y-3 ">
                <label class="px-3 text-xs text-black uppercase">Management</label>

                <a class="flex items-center px-3 py-2 text-teal-600 transition-colors duration-300 transform

                        rounded-lg  hover:bg-teal-600/90 hover:text-white sidebar-link" href="#">

                    <svg class="w-6 h-6 " aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                              d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.3-2a6 6 0 0 0 0-6A4 4 0 0 1 20 8a4 4 0 0 1-6.7 3Zm2.2 9a4 4 0 0 0 .5-2v-1a6 6 0 0 0-1.5-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.5Z"
                              clip-rule="evenodd"/>
                    </svg>


                    <span class="mx-2 text-sm font-medium">Users</span>
                </a>

                <a class="flex items-center px-3 py-2 text-teal-600 transition-colors duration-300 transform

                        rounded-lg  hover:bg-teal-600/90 hover:text-white sidebar-link" href="#">
                    <i class="fa-solid fa-calendar text-[20px]"></i>
                    <span class="mx-2 text-sm font-medium">Events</span>
                </a>



            </div>
            <div class="absolute bottom-0 left-0 text-white text-sm right-0 h-[70px] bg-teal-700/80">
                <div class="w-full h-full p-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-1">
                            <img src="{{asset('storage/userPics/' . Auth::user()->picture)}}" alt="" class="h-10 w-10
                        rounded-full">
                            <div class="">
                                <h4 class="text-[15px]">name</h4>
                                <span class="text-teal-600text-[13px]">email</span>
                            </div>
                        </div>
                        <div class="text-gray-500 relative">
                            <button class="block" id="edit_admin">
                                <i class="fa-solid fa-ellipsis-vertical text-[20px] transition-all duration-300
                                ease-in-out
                            hover:text-gray-800 text-white cursor-pointer"></i>
                            </button>
                            <div class="p-2 bg-white shadow-md rounded-md w-[150px] hidden absolute bottom-[140%]
                            left-[0px]"
                                 id="dropdown">
                                <a class="flex items-center px-3 py-2 text-gray-700 transition-colors duration-300 transform
                                    rounded-lg   hover:bg-teal-600 hover:text-white" href="/admin/profile">
                                    <i class="fa-solid fa-user text-[16px]"></i>
                                    <span class="mx-2 text-sm font-medium">Profile</span>
                                </a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                      <button role="menuitem"
                                              class="flex items-center px-3 py-2 text-gray-700 transition-colors duration-300 transform
                                                rounded-lg w-full hover:bg-teal-600 hover:text-white">
                                          <i class="fa-solid fa-right-from-bracket text-[16px]"></i>
                                          <span class="mx-2 text-sm font-medium">Logout</span>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
    </div>
</aside>
