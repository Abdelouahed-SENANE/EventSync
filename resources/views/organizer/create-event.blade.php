@include('layouts.public-layout')

<section class="w-full  min-h-screen bg-gray-100">
    <div class=" fixed top-0 left-0 w-full py-4 shadow-md shadow-gray-200/20 z-50 bg-white">
        <a href="{{ route('organizer') }}"
           class="ml-5 ">
            <i class="fa-solid fa-arrow-left text-xl text-teal-600"></i>
        </a>
        <span class="pl-1 text-lg">Create new event</span>

    </div>
    <div class=" relative min-h-screen flex justify-center">

        <div class="my-16">
            <form action="{{ route('create.event') }}" method="post" enctype="multipart/form-data">
                @csrf
                <!-- section 1-->
                <!-- Organizer ID -->
                <input type="hidden" value="{{ auth()->user()->id   }}" name="user">
                <div class="w-[600px] mb-4 rounded-md border-2 border-gray-100 p-2 bg-white">
                    <!-- name Address -->
                    <div class="mb-6">
                        <x-input-label class="text-lg my-3">
                            Event title <span class="text-red-600">*</span>
                        </x-input-label>
                        <x-text-input id="name" class="block w-[600px] mt-1 w-full" type="text" name="title"
                                       autofocus placeholder="Title"
                        />
                        <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                    </div>
                    <div class="flex  flex-col justify-center ">

                        <label
                            class=" flex flex-col items-center px-4 py-4 w-full  text-blue rounded-md group border cursor-pointer">
                            <i class="fa-solid fa-image text-[60px] text-gray-400 duration-300 group-hover:text-teal-700"></i>
                            <span class="mt-2 text-base leading-normal text-gray-400 group-hover:text-teal-700">Select a event image</span>
                            <input type='file' name="image" class="hidden"/>
                        </label>
                        <x-input-error :messages="$errors->get('image')" class="mt-2"/>

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
                <div class="w-[600px] mb-4 rounded-md border-2 border-gray-100 p-2 bg-white">
                    <!-- date and venue Address -->
                    <div class="">
                        <x-input-label class="text-lg my-3">
                            Date event <span class="text-red-600">*</span>
                        </x-input-label>
                        <input type="datetime-local" id="date" name="date" value="{{ now()->format('Y-m-d\TH:i') }}" min="{{ now()->format('Y-m-d\TH:i') }}" max="{{ now()->addYears(2)->format('Y-m-d\TH:i') }}"
                                  class="block p-2.5 text-lg resize-none w-full text-sm text-gray-900 text-base focus:border border-gray-200  bg-gray-50 rounded-sm outline-none   focus:ring focus:border-teal-400 focus:outline-none focus:ring-teal-500 focus:ring-opacity-20"
                                  placeholder="Write your thoughts here..."/>

                        <x-input-error :messages="$errors->get('date')" class="mt-2"/>
                    </div>
                    <!-- Venue Event -->
                    <div class="mb-6">
                        <x-input-label class="text-lg my-3">
                            Event venue <span class="text-red-600">*</span>
                        </x-input-label>
                        <x-text-input id="name" class="block w-[600px] mt-1 w-full" type="text" name="venue"
                                        autofocus placeholder="Location ..."
                        />
                        <x-input-error :messages="$errors->get('venue')" class="mt-2"/>
                    </div>
                </div>
                <div class="w-[600px] mb-6 rounded-md border-2 border-gray-100 p-2 bg-white">
                    <!-- Price Event -->
                    <div class="mb-4">
                        <x-input-label class="text-lg my-3">
                            Event price <span class="text-red-600">*</span>
                        </x-input-label>
                        <x-text-input id="name"  step="0.01" class="block w-[600px] mt-1 w-full" type="number" min="0" id="price" name="price"
                                        autofocus placeholder="Price"
                        />
                        <span class="text-red-500 text-sm " id="errorPrice"></span>
                        <x-input-error :messages="$errors->get('price')" class="mt-2"/>
                    </div>
                    <!-- Seats -->
                    <div class="mb-4">
                        <x-input-label class="text-lg my-3">
                            Event seats <span class="text-red-600">*</span>
                        </x-input-label>
                        <x-text-input id="name" step="1" class="block w-[600px] mt-1 w-full" type="number" min="0" id="seats" name="seats"
                                        autofocus placeholder="Number seats" oninput="removeAfterComma(event)"
                        />
                        <span class="text-red-500 text-sm " id="errorPrice"></span>
                        <x-input-error :messages="$errors->get('seats')" class="mt-2"/>
                    </div>
                    <!-- Categories -->
                    <div class="">
                        <x-input-label class="text-lg my-3">
                            Event Category <span class="text-red-600">*</span>
                        </x-input-label>
                        <select id="countries" name="category" class="block p-2.5 text-lg  w-full text-sm text-gray-900 text-base focus:border border-gray-200  bg-gray-50 rounded-sm outline-none   focus:ring focus:border-teal-400 focus:outline-none focus:ring-teal-500 focus:ring-opacity-20"
                        >
                            <option selected value="">Choose a category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category')" class="mt-2"/>

                    </div>
                    <div class="">
                        <x-input-label class="text-lg my-3">
                            Validation reservation <span class="text-red-600">*</span>
                        </x-input-label>
                        <select  name="validation" id="validation" class="block p-2.5 text-lg  w-full text-sm text-gray-900 text-base focus:border border-gray-200  bg-gray-50 rounded-sm outline-none   focus:ring focus:border-teal-400 focus:outline-none focus:ring-teal-500 focus:ring-opacity-20"
                        >
                            <option selected value="">Choose a validation</option>
                            <option value="1">Automatic</option>
                            <option value="0">Manuel</option>
                        </select>
                        <div>
                            <x-input-error :messages="$errors->get('validation')" class="mt-2"/>

                        </div>
                    </div>
                    <div class="absolute flex items-center justify-between left-0 bottom-0 bg-white w-full shadow shadow-gray-200/60 py-1.5">
                        <div class="mx-6">
                            <a href="{{ route('organizer') }}" class="text-gray-900 bg-slate-100 px-4 rounded-md py-1.5">Cancel</a>
                        </div>
                        <div class="mx-6">
                            <button type="submit" class="text-white bg-teal-600 px-4 rounded-md py-1.5">Create</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


</section>
<script>
    const priceInput = document.getElementById('price');

        function removeAfterComma(e) {
            var input = e.target;
            var value = input.value;
            var commaIndex = value.indexOf('.');

            if (commaIndex !== -1){
                value = value.substring(0 , commaIndex)
                input.value = value;
            }
        }
    const errPrice = document.getElementById('errorPrice');

    priceInput.addEventListener('keyup' , () => {

        var regex = /^\d*\.?\d+$/;
        if (!regex.test(priceInput.value)){
            errPrice.innerText = "please enter positive number";
        }else{
            errPrice.innerText = "";
        }

        if (priceInput.value.length === 0) {
            errPrice.innerText = "";
        }

    })
</script>
