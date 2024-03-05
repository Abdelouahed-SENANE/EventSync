@include('layouts.public-layout')

<!-- section landing page -->
<section class="h-[100vh] bg-center bg-cover w-full relative" style="background-image: url('/assets/images/bg.jpg')">
    <div class="bg-gray-900 opacity-60 z-0 absolute inset-0"></div>
    @include('layouts.nav-bar')
    <div class="pt-[350px] flex-col max-h-[200px] w-full flex items-center relative text-white">
        <h1 class="text-5xl md:text-[80px] leading-tight">All Together Now</h1>
        <p class="text-2xl md:text-3xl mb-2">
            August Bank Holiday Weekend 1-4, 2024
        </p>
        <span>
            Curraghmore Estate, Co Waterford
        </span>
    </div>
</section>

<!-- Section About us -->

<section class="my-10">
    <div>
        <h1 class="text-center relative text-5xl text-gray-900">About us <span class="bg-teal-700 h-[4px] w-[100px] left-[50%] translate-x-[-50%] absolute bottom-[-20px]"></span>
        </h1>
    </div>
</section>
