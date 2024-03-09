@include('layouts.public-layout')

<div class="py-12 h-full w-full bg-gray-100">
    <div class="relative">
        <div class="max-w-[300px] p-4 sm:p-8 text-center shadow sm:rounded-lg bg-white p-5 fixed top-[48px] left-[100px]">
            <x-application-logo  class="text-teal-600"/>
            <div>
                <span class="text-green-600 hidden" id="success">Saved</span>
            </div>
            <div class="flex justify-center relative text-center cursor-pointer" onclick="openPopup()" >
                <img src="{{ asset('storage/'. $user->picture) }}" alt="" id="img_profile" class="h-[90px] w-[90px] rounded-full">
                <button
                    class="absolute flex items-center justify-center z-20 bg-white h-7 w-7 shadow rounded-full right-[75px] bottom-1">
                    <i class="fa-solid fa-camera bg-white text-[16px]"></i>
                </button>

            </div>

            <div class="text-center font-semibold my-4 text-xl">
                {{ $user->name }}
            </div>
            <div class="relative">
                <h4 class="uppercase text-md text-center">About
                </h4>
                <div
                    class="h-0.5 w-8 bg-teal-500 text-center absolute bottom-[-5px] left-[50%] translate-x-[-50%]"></div>
            </div>
            <p class="my-5 text-center">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
            </p>
        </div>
        <div class="max-w-7xl sm:px-6 lg:px-5 space-y-6 ml-[400px]">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
    <!-- Popup -->
    <div id="popup" class="fixed w-full min-h-screen transition-all opacity-0 invisible duration-300  inset-0">
        <div class="bg-gray-500 opacity-80 absolute inset-0  w-full h-full" onclick="closePopup()"></div>
        <div
            class="z-10 absolute top-[50%] left-[50%] translate-y-[-50%] translate-x-[-50%] w-[350px] scale-90 transition-all duration-300"
            id="formPicture">
            <div class="bg-white rounded-md py-2">
                <div class="w-full border-b border-gray-200 py-3 flex justify-between px-5 mb-2">
                    <p class="text-lg text-gray-700">Select profile picture</p>
                    <button onclick="closePopup()">
                        <i class="fa-solid fa-xmark text-[25px] text-gray-400  transition-all duration-300 hover:text-teal-700"></i>
                    </button>
                </div>
                <form action="{{ route('profile.update.picture') }} " id="formPic" method="post"
                      enctype="multipart/form-data"
                      class="bg-white  max-w-[400px]">
                    @csrf
                    @method('patch')

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

                    <input type="hidden" name="profileId" value="{{ auth()->user()->id }}">
                    <div class="flex items-center p-2 justify-center ">
                        <label
                            class=" flex flex-col items-center px-4 py-4 w-full  text-blue rounded-md group border cursor-pointer">
                            <i class="fa-solid fa-image text-[60px] text-gray-400 duration-300 group-hover:text-teal-700"></i>
                            <span class="mt-2 text-base leading-normal text-gray-400 group-hover:text-teal-700">Select a picture</span>
                            <input type='file' name="picture" class="hidden"/>
                        </label>
                    </div>
                    <div class="text-center pt-2">
                        <button type="submit" class="bg-teal-700  rounded-md text-white px-16 py-2 ">Upload</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
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

    $(document).ready(function () {
        $('#formPic').on('submit', function (e) {
            e.preventDefault()
            let formData = new FormData(this)
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                url: '{{ route('profile.update.picture') }}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                data: formData,
                dataType : 'json',
                processData: false,
                contentType: false,
                success: function (response) {
                    if (response.status == false) {
                        let errors = response.errors.picture
                        $('#alertDanger').removeClass('hidden');
                        $('#wrapperErrors').html('');
                        errors.forEach(error => {
                            $('#wrapperErrors').append(`
                                <li>${error}</li>
                            `);
                        })
                    }else {
                        $('#img_profile').attr('src', 'storage/' + `${response.picture}`);
                        $('#alertDanger').addClass('hidden');
                        $('#success').removeClass('hidden')
                        setTimeout(function () {
                            $('#success').addClass('hidden')
                        },5000)
                        closePopup();
                    }
                },

            })
        })
    })
</script>

