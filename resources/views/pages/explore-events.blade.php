@include('layouts.public-layout')

<header class="w-full h-[440px]" style="background-image: url('{{ asset('assets/images/explore-ev-bg.png') }}')">
    @include('layouts.nav-bar')
    <div class="pt-[150px] w-[85%]  mx-auto ">
        <p class="text-5xl text-white max-w-[800px] font-semibold">
            Discover Events For All The Things You Love
        </p>
        <div>
            <div class="bg-white my-3 w-[fit-content] flex items-center ">
                <label for=""></label>
                <input type="text" name="search" id="searchValue"
                       class="w-[600px] p-3 focus:outline-none outline-none transition-all duration-300  focus:ring-2 focus:ring-teal-700/80  border-0"
                       placeholder="Search everything's ...">
                <button id="btnSearch"
                        class="border-0 outline-none  bg-teal-600 text-white px-12 py-3 block font-medium text-xl">Find
                    Events
                </button>
            </div>
        </div>

    </div>
</header>


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
                <a href="#" data-cat="" class="category-link active">All</a>
            </li>

            @foreach($categories as $category)
                <li>
                    <a href="#" data-cat="{{ $category->title }}" class="category-link">{{ $category->title }}</a>
                </li>
            @endforeach


        </ul>
    </div>
    <div class="relative flex  flex-col justify-center overflow-hidden bg-gray- py-2 sm:py-12">
        <!-- Evnets Cards -->

        <div class="mx-auto max-w-screen-xl px-4 w-full">
            <div class="grid w-full sm:grid-cols-2 xl:grid-cols-4 gap-6 relative" id="wrapper_events">
                <!-- event card  -->


            </div>
            <div class="my-5 " id="wrapper">


                <nav aria-label="Page navigation example">
                    <ul class="flex items-center justify-center -space-x-px h-10 text-base" id="pagination">


                    </ul>
                </nav>

            </div>
        </div>
    </div>
</section>
<script>
    // Filter By categories

    $(document).ready(function () {
        const categories = document.querySelectorAll('.category-link');

        categories.forEach((category) => {
            category.addEventListener('click', (e) => {
                e.preventDefault();
                categories.forEach((el) => {
                    el.classList.remove('active');
                });
                category.classList.add('active');
                let eventsByCategory = category.getAttribute('data-cat')

                $.ajax({
                    url: '/explore-events',
                    method: 'GET',
                    data: {searchByCategory: eventsByCategory},
                    dataType: 'json',
                    beforeSend: function () {
                        $('#wrapper_events').empty()
                        $('#wrapper_events').append(`
                        <div class="block col-span-4 top-0 left-0  w-full   h-[500px] flex justify-center items-center overflow-hidden  hover:-translate-y-1 transition-all duration-300 ">
                            <div class="loader"></div>
                        </div>
                      `)
                    },
                    success: function (response) {
                        setTimeout(function () {
                            getEvents(response.events.data);
                        }, 1000)
                    },
                    error: function (error) {
                        console.log(error)
                    }
                })
            });
        });

        function getEvents(data) {
            $('#wrapper_events').html('');
            if (data.length > 0) {
                data.forEach(event => {
                    const formatDate = moment(event.date);
                    $('#wrapper_events').append(`
                        <div class="relative flex overflow-hidden flex-col shadow-md rounded-xl overflow-hidden hover:shadow-lg hover:-translate-y-1 transition-all duration-300 max-w-sm">
                            <a href="/event/${event.id}" class="block">
                                <div class="bg-teal-600 font-bold text-white text-xs h-12 w-12 rounded-full text-white absolute z-30 top-0 left-2 mt-2 mr-3 flex flex-col justify-center items-center">
                                    <span class="text-sm">${formatDate.format("DD").toUpperCase()}</span>
                                    <span class="text-xs font-medium">${formatDate.format("MMM").toUpperCase()}</span>
                                </div>
                                <div class="hover:text-teal-600 text-white text-sm absolute z-30 top-0 right-0 mt-2 mr-3 gap-1 flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 3c-3.148 0-6 2.553-6 5.702 0 3.148 2.602 6.907 6 12.298 3.398-5.391 6-9.15 6-12.298 0-3.149-2.851-5.702-6-5.702zm0 8c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm10.881-2.501c0-1.492-.739-2.83-1.902-3.748l.741-.752c1.395 1.101 2.28 2.706 2.28 4.5s-.885 3.4-2.28 4.501l-.741-.753c1.163-.917 1.902-2.256 1.902-3.748zm-3.381 2.249l.74.751c.931-.733 1.521-1.804 1.521-3 0-1.195-.59-2.267-1.521-3l-.74.751c.697.551 1.141 1.354 1.141 2.249s-.444 1.699-1.141 2.249zm-16.479 1.499l-.741.753c-1.395-1.101-2.28-2.707-2.28-4.501s.885-3.399 2.28-4.5l.741.752c-1.163.918-1.902 2.256-1.902 3.748s.739 2.831 1.902 3.748zm.338-3.748c0-.896.443-1.698 1.141-2.249l-.74-.751c-.931.733-1.521 1.805-1.521 3 0 1.196.59 2.267 1.521 3l.74-.751c-.697-.55-1.141-1.353-1.141-2.249z"/>
                                    </svg>
                                    <span class="font-semibold block max-w-[100px] text-nowrap">${event.venue}</span>
                                </div>
                                <div class="h-auto overflow-hidden">
                                    <div class="h-44 overflow-hidden relative">
                                        <img src="{{ asset('storage/') }}/${event.image}" alt="">
                                    </div>
                                </div>
                                <div class="bg-white py-4 px-3">
                                    <h3 class="text-sm mb-2 font-medium">${event.title}</h3>
                                    <div class="flex justify-between items-center">
                                        <p class="text-md text-gray-400 text-nowrap overflow-hidden text-ellipsis">${event.description}</p>
                                    </div>
                                    <div class="font-semibold text-md my-1">
                                        <span>${event.price} Dhs</span>
                                    </div>
                                    <div>
                                        <span>${formatDate.format('dddd, MMM DD hh:mm A')}</span>
                                    </div>
                                </div>
                            </a>
                        </div>
                     `);
                });
            } else {
                $('#wrapper_events').empty()
                $('#wrapper_events').append(`
                        <div class="block col-span-4 top-0 left-0  w-full   h-[500px] flex justify-center items-center overflow-hidden  hover:-translate-y-1 transition-all duration-300 ">
                            <div class="flex flex-col items-center">
                                <img src="{{ asset('assets/images/cloud.png') }}" alt="" class="w-[35%]">
                                <p class="text-2xl my-5 font-semibold text-rose-500">Sorry! No events found</p>
                            </div>
                        </div>
                `)
            }
        }

        function updatePagination(events) {
            $('#pagination').empty();

            if (events.current_page > 1) {
                $('#pagination').append(`
                <li>
                    <a href="${events.path}?page=${events.current_page - 1}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 ">Previous</a>
                </li>
            `);
            } else {
                $('#pagination').append(`
            <li>
                <div  class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 ">Previous</div>
            </li>
             `);
            }

            for (let i = 1; i <= events.last_page; i++) {
                if (events.current_page == i) {
                    $('#pagination').append(`
                        <li>
                            <a href="${events.path}?page=${i}" class="flex items-center justify-center px-3 h-8 ms-0 bg-teal-700 text-white leading-tight border  border-gray-300  hover:bg-gray-100 hover:text-gray-700 ">${i}</a>
                        </li>
                    `);
                } else {
                    $('#pagination').append(`
                        <li>
                            <a href="${events.path}?page=${i}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border  border-gray-300  hover:bg-gray-100 hover:text-gray-700 ">${i}</a>
                        </li>
                    `);
                }
            }

            if (events.current_page < events.last_page) {
                $('#pagination').append(`
                <li>
                    <a href="${events.path}?page=${events.current_page + 1}" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border rounded-e-lg  border-gray-300  hover:bg-gray-100 hover:text-gray-700 ">Next</a>
                </li>
            `);
            } else {
                $('#pagination').append(`
            <li>
                <div  class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border rounded-e-lg  border-gray-300  hover:bg-gray-100 hover:text-gray-700 ">Next</div>
            </li>
             `);
            }

            // Bind click event handler for pagination links
            $(document).one('click', '#pagination a', function (e) {
                e.preventDefault();

                var page = $(this).attr('href').split('page=')[1];
                fetchEvents(page);
            });
        }

        function fetchEvents(page) {

            $.ajax({
                url: '/explore-events?page=' + page,
                method: 'get',
                beforeSend: function () {
                    $('#wrapper_events').empty()
                    $('#wrapper_events').append(`
                        <div class="block col-span-4 top-0 left-0  w-full   h-[500px] flex justify-center items-center overflow-hidden  hover:-translate-y-1 transition-all duration-300 ">
                            <div class="loader"></div>
                        </div>
                `)
                },
                success: function (response) {
                    updatePagination(response.events);
                    setTimeout(function () {
                        getEvents(response.events.data);
                    }, 1000)
                },
                error: function (error) {
                    console.log(error);
                },

            });
        }

        // Search Event with his title
        $('#btnSearch').on('click', function () {
            let searchValue = $('#searchValue').val();
            $.ajax({
                url: '/explore-events',
                method: 'GET',
                data: {search: searchValue},
                dataType: 'json',
                beforeSend: function () {
                    $('#wrapper_events').empty()
                    $('#wrapper_events').append(`
                        <div class="block col-span-4 top-0 left-0  w-full   h-[500px] flex justify-center items-center overflow-hidden  hover:-translate-y-1 transition-all duration-300 ">
                            <div class="loader"></div>
                        </div>
                `)
                },
                success: function (response) {
                    setTimeout(function () {
                        getEvents(response.events.data);
                    }, 1000)
                },
                error: function (error) {
                    console.log(error)
                }
            })
        })

        // fetch data when load document
        fetchEvents(1)
    });

</script>
