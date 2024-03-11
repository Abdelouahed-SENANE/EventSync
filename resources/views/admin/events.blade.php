@extends('layouts.admin-layout')

@section('content')
    <section class="bg-gray-100 flex relative  overflow-hidden">
        @include('components.nav-admin')
        <aside>
            @include('components.sidebar')
        </aside>
        <main class="flex-grow min-h-screen w-full mt-20  ml-[260px]">


            <div class="bg-white p-5 m-5 rounded-lg">
                <div class=" text-teal-700 font-bold text-2xl">
                    <h1 class="uppercase">Management Events</h1>
                    <p class="text-lg font-medium text-gray-500">Section Validation Events</p>
                </div>


                <div class="grid mt-5 w-full sm:grid-cols-2 xl:grid-cols-5 gap-6">
                    <!-- Card -->
                    @foreach($events as $event)
                        <div
                            class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
                            <div
                                class="bg-teal-600  font-bold text-white text-xs h-12 w-12 rounded-full text-white absolute z-30 top-0 left-2 mt-2 mr-3 flex flex-col justify-center items-center">
                                    <span class="text-sm">
                                        {{ Carbon\Carbon::parse($event->date)->format('d')}}
                                    </span>
                                <span class="text-xs font-medium uppercase">{{ Carbon\Carbon::parse($event->date)->format('M')}}</span>
                            </div>
                            <div
                                class="hover:text-teal-600 text-white text-sm absolute z-30 top-0 right-0 mt-2 mr-3 gap-1 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="currentColor">
                                    <path
                                        d="M12 3c-3.148 0-6 2.553-6 5.702 0 3.148 2.602 6.907 6 12.298 3.398-5.391 6-9.15 6-12.298 0-3.149-2.851-5.702-6-5.702zm0 8c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm10.881-2.501c0-1.492-.739-2.83-1.902-3.748l.741-.752c1.395 1.101 2.28 2.706 2.28 4.5s-.885 3.4-2.28 4.501l-.741-.753c1.163-.917 1.902-2.256 1.902-3.748zm-3.381 2.249l.74.751c.931-.733 1.521-1.804 1.521-3 0-1.195-.59-2.267-1.521-3l-.74.751c.697.551 1.141 1.354 1.141 2.249s-.444 1.699-1.141 2.249zm-16.479 1.499l-.741.753c-1.395-1.101-2.28-2.707-2.28-4.501s.885-3.399 2.28-4.5l.741.752c-1.163.918-1.902 2.256-1.902 3.748s.739 2.831 1.902 3.748zm.338-3.748c0-.896.443-1.698 1.141-2.249l-.74-.751c-.931.733-1.521 1.805-1.521 3 0 1.196.59 2.267 1.521 3l.74-.751c-.697-.55-1.141-1.353-1.141-2.249z"/>
                                </svg>
                                <span class="font-semibold">
                                {{ $event->venue }}
                                </span>
                            </div>
                            <div class="h-auto overflow-hidden">
                                <div class="h-44 overflow-hidden relative">
                                    <img src="{{ asset('storage/') . '/' . $event->image }}" alt="">
                                </div>
                            </div>
                            <div class="bg-white py-4 px-3">
                                <div class="flex items-center justify-between gap-0.5">
                                    <h3 class="text-sm mb-2 font-medium">{{ $event->title }}</h3>
                                    <div class="flex items-center gap-1">
                                        <form action="{{ route('accepted.event') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="event" value="{{ $event->id }}">
                                            <button type="submit" class="py-0.5 px-1.5 block text-white rounded-md bg-green-500">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                        </form>
                                        <form action="{{  route('refused.event') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="event" value="{{ $event->id }}">
                                            <button type="submit" class="py-0.5 px-1.5 block text-white rounded-md bg-red-500">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center">
                                    <p class="text-m text-nowrap text-ellipsis	overflow-hidden mb-2 text-gray-400">
                                        {{ $event->description }}
                                    </p>
                                </div>
                                <div>
                                    <span class="text-lg font-medium mb-2 block">{{ $event->price }} $US</span>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="">{{ \Carbon\Carbon::parse($event->date)->format('D, d M, Y h:i A') }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>


        </main>


    </section>
@endsection
