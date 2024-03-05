@include('layouts.public-layout')

<header class="w-full h-[440px]" style="background-image: url('{{ asset('assets/images/explore-ev-bg.png') }}')">
    @include('layouts.nav-bar')
    <div class="pt-[150px] w-[85%]  mx-auto ">
        <p class="text-5xl text-white max-w-[800px] font-semibold">
            Discover Events For All The Things You Love
        </p>
        <form>
            <div class="bg-white my-3 w-[fit-content] flex items-center ">
                <label for=""></label>
                <input type="text" name="search"
                       class="w-[600px] p-3 focus:outline-none outline-none transition-all duration-300  focus:ring-2 focus:ring-teal-700/80  border-0"
                       placeholder="Search everything's ...">
                <button type="submit"
                        class="border-0 outline-none  bg-teal-600 text-white px-12 py-3 block font-medium text-xl">Find
                    Events
                </button>
            </div>
        </form>

    </div>
</header>

<!-- Section About us -->

<section class="my-10">
    <div>
        <h1 class="text-center relative text-5xl text-gray-900">Events <span
                class="bg-teal-700 h-[4px] w-[100px] left-[50%] translate-x-[-50%] absolute bottom-[-20px]"></span>
        </h1>
    </div>
    <!-- Filter By Categories -->
    <div class="mx-auto text-3xl max-w-screen-xl px-4 w-full">
        <h4>By Catgories</h4>
        <ul class="text-base mt-4 inline-flex items-center gap-5">
            <li>
                <a href="#" data-cat="all" class="category-link active">All</a>
            </li>
            <li>
                <a href="#" data-cat="Business" class="category-link">Business</a>
            </li>
            <li>
                <a href="#" data-cat="Coaching" class="category-link">Coaching</a>
            </li>
            <li>
                <a href="#" data-cat="Free" class="category-link">Free</a>
            </li>
        </ul>
    </div>
    <div class="relative flex  flex-col justify-center overflow-hidden bg-gray- py-2 sm:py-12">
        <!-- Evnets Cards -->

        <div class="mx-auto max-w-screen-xl px-4 w-full">
            <div class="grid w-full sm:grid-cols-2 xl:grid-cols-4 gap-6">
                <!-- event card  -->
                <div
                    class="relative flex flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
                    <a href="/event/id" class="block">

                        <div
                            class="bg-teal-600  font-bold text-white text-xs h-12 w-12 rounded-full text-white absolute z-30 top-0 left-2 mt-2 mr-3 flex flex-col justify-center items-center">
                            <span class="text-sm">
                                04
                            </span>
                            <span class="text-xs font-medium">MAR</span>
                        </div>
                        <div
                             class="hover:text-teal-600 text-white text-sm absolute z-30 top-0 right-0 mt-2 mr-3 gap-1 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M12 3c-3.148 0-6 2.553-6 5.702 0 3.148 2.602 6.907 6 12.298 3.398-5.391 6-9.15 6-12.298 0-3.149-2.851-5.702-6-5.702zm0 8c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm10.881-2.501c0-1.492-.739-2.83-1.902-3.748l.741-.752c1.395 1.101 2.28 2.706 2.28 4.5s-.885 3.4-2.28 4.501l-.741-.753c1.163-.917 1.902-2.256 1.902-3.748zm-3.381 2.249l.74.751c.931-.733 1.521-1.804 1.521-3 0-1.195-.59-2.267-1.521-3l-.74.751c.697.551 1.141 1.354 1.141 2.249s-.444 1.699-1.141 2.249zm-16.479 1.499l-.741.753c-1.395-1.101-2.28-2.707-2.28-4.501s.885-3.399 2.28-4.5l.741.752c-1.163.918-1.902 2.256-1.902 3.748s.739 2.831 1.902 3.748zm.338-3.748c0-.896.443-1.698 1.141-2.249l-.74-.751c-.931.733-1.521 1.805-1.521 3 0 1.196.59 2.267 1.521 3l.74-.751c-.697-.55-1.141-1.353-1.141-2.249z"/>
                            </svg>
                            <span class="font-semibold">
                                Casablanca
                            </span>
                        </div>
                        <div class="h-auto overflow-hidden">
                            <div class="h-44 overflow-hidden relative">
                                <img src="{{ asset('assets/images/test.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="bg-white py-4 px-3">
                            <h3 class="text-sm mb-2 font-medium">Title Event</h3>
                            <div class="flex justify-between items-center">
                                <p class="text-m text-gray-400">
                                    Excrpt
                                    Lorem, ipsum dolor sit amet
                                </p>
                            </div>
                            <div>
                                <span>60 $US</span>
                            </div>
                            <div>
                                <span>Date and Time Event</span>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>
<script>
    // Filter By categories
    const categries = document.querySelectorAll('.category-link')
    categries.forEach((category) => {
        category.addEventListener('click', (e) => {
            e.preventDefault();
            categries.forEach((el) => {
                el.classList.remove('active')
            })
            category.classList.add('active');

        })
    })
</script>
