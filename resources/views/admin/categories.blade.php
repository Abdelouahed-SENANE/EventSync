@extends('layouts.admin-layout')

@section('content')

    <section class="bg-gray-100 flex  overflow-hidden">
        @include('components.nav-admin')
        <aside>
            @include('components.sidebar')
        </aside>
        <main class="flex-grow min-h-screen w-full mt-20 ml-[260px]">
            <div class="bg-white relative p-5 m-5 rounded-lg">
                <div class="uppercase text-teal-700 font-bold text-2xl">
                    Management Categories
                </div>
                <div class="absolute top-5 right-8">
                    <button onclick="openPopup()" class="px-4 text-sm py-2 bg-teal-600 rounded-md text-white">
                        Create Category
                    </button>
                </div>
                <div>


                    @if(session('success'))
                    <div id="alert-border-3" class="flex items-center p-4 my-4 text-green-800 border-t-4 border-green-300 bg-green-50" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <div class="ms-3 text-sm font-medium">

                                {{ session('success') }}
                        </div>

                    </div>
                    @endif


                </div>
                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border  md:rounded-lg">
                                <table class="min-w-full divide-y divide-teal-700">
                                    <thead class="bg-teal-700 ">
                                    <tr>
                                        <th scope="col"
                                            class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-white">
                                            <span>ID</span>
                                        </th>

                                        <th scope="col"
                                            class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-white">
                                            Title
                                        </th>

                                        <th scope="col"
                                            class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white">
                                            Description
                                        </th>

                                        <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-white">

                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 " id="users-container">
                                    @foreach($categories as $category)
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">{{ $category->id }}</td>
                                            <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">{{ $category->title }}</td>
                                            <td class="px-4 py-4 text-sm font-medium max-w-[150px] text-gray-700 whitespace-wrap">{{ $category->description }}</td>

                                            <td class="flex justify-center gap-2 px-4 py-4 text-sm whitespace-nowrap text-center">
                                                <form action="{{ route('admin.category.delete', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="px-2.5 py-2 bg-rose-500 text-white  w-fit transition-colors duration-200 rounded-lg block cursor-pointer hover:bg-red-500">
                                                        <i class="fa-solid fa-trash text-[14px]"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('admin.category.update', $category->id) }}" method="POST">
                                                    @csrf
                                                    @method('put')
                                                    <button type="submit" class="px-2.5 py-2 bg-green-500   transition-colors duration-200 rounded-lg block cursor-pointer hover:bg-green-500/80 text-white">
                                                        <i class="fa-solid fa-arrows-rotate text-[14px]"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </main>
        <!-- ======= Pop up ====== -->
        <div id="popup" class="fixed w-full min-h-screen  z-[1000] transition-all opacity-0 invisible duration-300  inset-0">
            <div class="bg-gray-500 opacity-80 absolute inset-0  w-full h-full" onclick="closePopup()"></div>
            <div
                class="z-10 absolute top-[50%] left-[50%] translate-y-[-50%] translate-x-[-50%] w-[350px] scale-90 transition-all duration-300"
                id="formPicture">
                <div class="bg-white w-fit rounded-md py-2">
                    <div class="w-full border-b border-gray-200 py-3 flex justify-between px-5 mb-2">
                        <p class="text-lg text-gray-700">Create new Category</p>
                        <button onclick="closePopup()">
                            <i class="fa-solid fa-xmark text-[25px] text-gray-400  transition-all duration-300 hover:text-teal-700"></i>
                        </button>
                    </div>
                    <form action="{{ route('profile.update.picture') }} "  method="post"
                          class="bg-white  w-[600px]">
                        @csrf

                        <div class="flex p-1 mb-4 text-sm text-red-800 rounded-lg bg-red-50 max-w-[90%] mx-auto hidden" role="alert" id="alertDanger">
                            <svg class="flex-shrink-0 inline w-4 h-4 me-3 mt-[2px]" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Danger</span>
                            <div>
                                <span class="font-medium">Ensure that these requirements are met:</span>
                                <ul class="mt-1.5 list-disc list-inside" id="wrapperErrors">

                                </ul>
                            </div>
                        </div>

                        <div class="flex items-center p-2 justify-center ">
                            <div class="w-[600px] mb-4 rounded-md border-2 border-gray-100 p-2 bg-white">
                                <!-- name Address -->
                                <div class="mb-6">
                                    <x-input-label class="text-lg my-3">
                                        Category title <span class="text-red-600">*</span>
                                    </x-input-label>
                                    <x-text-input id="name" class="block w-[600px] mt-1 w-full" type="text" name="title"
                                                  autofocus placeholder="Title"
                                    />
                                    <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                                </div>
                                <div class="">
                                    <x-input-label class="text-lg my-3">
                                        Description <span class="text-red-600">*</span>
                                    </x-input-label>
                                    <textarea id="message" rows="4" name="description"
                                              class="block p-2.5 resize-none w-full text-sm text-gray-900 text-base focus:border border-gray-200  bg-gray-50 rounded-sm outline-none   focus:ring focus:border-teal-400 focus:outline-none focus:ring-teal-500 focus:ring-opacity-20"
                                              placeholder="Write your thoughts here..."></textarea>

                                    <x-input-error  :messages="$errors->get('description')" class="mt-2"/>
                                </div>
                            </div>
                        </div>
                        <div class="text-center pt-2">
                            <button type="submit" class="bg-teal-700  rounded-md text-white px-16 py-2 ">Create</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </section>
    <script>
        const popup = document.getElementById('popup');
        const formPicture = document.getElementById('formPicture');

        function closePopup() {
            if (!popup.classList.contains('opacity-0')) {
                popup.classList.add('opacity-0', 'invisible');
                formPicture.classList.add('scale-90');
            }
        }

        function openPopup() {
            if (popup.classList.contains('opacity-0')) {
                popup.classList.remove('opacity-0', 'invisible');
                formPicture.classList.remove('scale-90');
            }
        }
        $(document).ready(function() {

        })
    </script>
@endsection
