@include('layouts.public-layout')


<section class="bg-white">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <div class="mb-2 text-center">
                    <x-application-logo class="text-teal-600 text-2xl"/>
                </div>
                <h1 class="text-xl font-bold text-center leading-tight tracking-tight text-gray-900 md:text-2xl ">
                    Create and account
                </h1>
                <div class="flex flex-row justify-center items-center space-x-3">
                        <a
                            href="{{ route('google') }}"
                            class="flex  items-center justify-center rounded-md p-2   text-white bg-red-500 hover:bg-opacity-90"
                        >
                            <i class="fa-brands fa-google  text-[30px] "></i>

                        </a>
                </div>
                <div class="flex items-center justify-center space-x-2">
                    <span class="h-px w-16 bg-gray-200"></span>
                    <span class="text-gray-300 font-normal">or continue with</span>
                    <span class="h-px w-16 bg-gray-200"></span>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <!-- Role  -->
                    <div class="mb-4 inline-flex justify-center w-full items-center gap-2">
                            <label for="client">
                                <input type="radio" checked name="role" value="client" id="client" class="hidden">
                                <span class="border border-teal-600 px-4 py-1.5 rounded-md selected hover:bg-teal-600 hover:text-white cursor-pointer">
                                    client
                                </span>
                            </label>
                            <label for="organizer">
                                <input type="radio"  name="role" value="organizer" id="organizer" class="hidden">
                                <span class="border border-teal-600 cursor-pointer px-4 py-1.5 rounded-md selected hover:bg-teal-600 hover:text-white">
                                    Organiser
                                </span>
                            </label>

                        </div>

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')"/>
                        <x-text-input id="name" class="block mt-1 w-full" placeholder="name" type="text" name="name"
                                      :value="old('name')" required autofocus autocomplete="name"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')"/>
                        <x-text-input id="email" class="block mt-1 w-full" placeholder="email" type="email" name="email"
                                      :value="old('email')" required autocomplete="username"/>
                        <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')"/>

                        <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password" placeholder="password"/>

                        <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')"/>

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                      type="password"
                                      name="password_confirmation" required autocomplete="new-password"
                                      placeholder="confirm password"/>

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2"/>
                    </div>
                    <div class="flex mt-3 items-start">
                        <div class="flex items-center h-5">
                            <input id="terms" aria-describedby="terms" type="checkbox"
                                   class="w-4 h-4 border border-gray-300 rounded bg-gray-50 text-teal-600 focus:ring-3 focus:ring-teal-500 "
                                   required="">
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="terms" class="font-light text-gray-500 ">I accept the <a
                                    class="font-medium text-primary-600 hover:underline  transition-all duration-300 hover:text-teal-600"
                                    href="#">Terms and Conditions</a></label>
                        </div>
                    </div>
                    <button type="submit"
                          id="registerBtn"  class="w-full text-white bg-teal-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 my-5 text-center">
                        Create an account
                    </button>
                    <p class="text-sm font-light text-gray-500">
                        Already have an account? <a href="/login"
                                                    class="font-medium text-primary-600 hover:underline transition-all duration-300 hover:text-teal-600">Login
                            here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>
