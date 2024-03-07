@include('layouts.public-layout')

<!-- ====== Forms Section Start -->
<section class="bg-gray-100 min-h-screen py-20 lg:py-[150px]">
    <div class="container mx-auto">
        <div class="flex flex-wrap -mx-4">
            <div class="w-full px-4">
                <div
                    class="relative mx-auto max-w-[525px] overflow-hidden rounded-lg bg-white py-16 px-10 sm:px-12 md:px-[60px] "
                >
                    <div class="mb-10 text-center md:mb-8">
                        <x-application-logo class="text-teal-600 text-2xl"/>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <!-- Email Address -->
                        <div class="mb-6">
                            <x-text-input id="email" class="block  mt-1 w-full" type="email" name="email"
                                          :value="old('email')" required autofocus placeholder="Email"
                                          autocomplete="username"/>
                            <x-input-error :messages="$errors->get('email')" class="mt-2"/>
                        </div>

                        <!-- Password -->
                        <div class="mb-2">

                            <x-text-input id="password" class="block mt-1 w-full"
                                          type="password"
                                          name="password"
                                          required autocomplete="current-password" placeholder="Password"/>

                            <x-input-error :messages="$errors->get('password')" class="mt-2"/>
                        </div>
                        <!-- Remember Me -->
                        <div class="block mb-6">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                       class="rounded border-gray-300 text-teal-600 shadow-sm focus:ring-teal-500" name="remember">
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="mb-10">
                            <input
                                type="submit"
                                value="Sign In"
                                class="w-full px-5 py-3 text-base font-medium text-white transition border rounded-md cursor-pointer  bg-teal-600 hover:bg-opacity-90"
                            />
                        </div>
                    </form>
                    <p class="mb-2 text-base text-secondary-color text-center dark:text-dark-7">
                        Connect With
                    </p>
                    <!--- Socialite Links --->
                    <ul class="flex items-center justify-center mb-6 -mx-2">
                        <li class="px-1">
                            <a
                                href="auth/google/"
                                class="flex w-full items-center justify-center rounded-md p-2   text-white bg-red-500 hover:bg-opacity-90"
                            >
                                <i class="fa-brands fa-google  text-[30px] "></i>

                            </a>
                        </li>
                    </ul>
                    <a
                        href="{{ route('password.request') }}"
                        class=" mb-2 text-base text-dark text-center block hover:text-primary hover:underline"
                    >
                        Forget Password?
                    </a>
                    <p class="text-base text-body-color dark:text-dark-6 text-center">
                        <span class="pr-1">Not a member yet?</span>
                        <a
                            class=" rounded-md bg-teal-600 px-5 py-2.5 text-sm font-medium text-white "
                            href="/register"
                        >
                            Sign up
                        </a>
                    </p>
                    <div>
                         <span class="absolute top-1 right-1">
                     <svg
                         width="40"
                         height="40"
                         viewBox="0 0 40 40"
                         fill="none"
                         xmlns="http://www.w3.org/2000/svg"
                     >
                        <circle
                            cx="1.39737"
                            cy="38.6026"
                            r="1.39737"
                            transform="rotate(-90 1.39737 38.6026)"
                            fill="#059669"

                        />
                        <circle
                            cx="1.39737"
                            cy="1.99122"
                            r="1.39737"
                            transform="rotate(-90 1.39737 1.99122)"
                            fill="#059669"

                        />
                        <circle
                            cx="13.6943"
                            cy="38.6026"
                            r="1.39737"
                            transform="rotate(-90 13.6943 38.6026)"
                            fill="#059669"

                        />
                        <circle
                            cx="13.6943"
                            cy="1.99122"
                            r="1.39737"
                            transform="rotate(-90 13.6943 1.99122)"
                            fill="#059669"

                        />
                        <circle
                            cx="25.9911"
                            cy="38.6026"
                            r="1.39737"
                            transform="rotate(-90 25.9911 38.6026)"
                            fill="#059669"

                        />
                        <circle
                            cx="25.9911"
                            cy="1.99122"
                            r="1.39737"
                            transform="rotate(-90 25.9911 1.99122)"
                            fill="#059669"

                        />
                        <circle
                            cx="38.288"
                            cy="38.6026"
                            r="1.39737"
                            transform="rotate(-90 38.288 38.6026)"
                            fill="#059669"

                        />
                        <circle
                            cx="38.288"
                            cy="1.99122"
                            r="1.39737"
                            transform="rotate(-90 38.288 1.99122)"
                            fill="#059669"

                        />
                        <circle
                            cx="1.39737"
                            cy="26.3057"
                            r="1.39737"
                            transform="rotate(-90 1.39737 26.3057)"
                            fill="#059669"

                        />
                        <circle
                            cx="13.6943"
                            cy="26.3057"
                            r="1.39737"
                            transform="rotate(-90 13.6943 26.3057)"
                            fill="#059669"

                        />
                        <circle
                            cx="25.9911"
                            cy="26.3057"
                            r="1.39737"
                            transform="rotate(-90 25.9911 26.3057)"
                            fill="#059669"

                        />
                        <circle
                            cx="38.288"
                            cy="26.3057"
                            r="1.39737"
                            transform="rotate(-90 38.288 26.3057)"
                            fill="#059669"

                        />
                        <circle
                            cx="1.39737"
                            cy="14.0086"
                            r="1.39737"
                            transform="rotate(-90 1.39737 14.0086)"
                            fill="#059669"

                        />
                        <circle
                            cx="13.6943"
                            cy="14.0086"
                            r="1.39737"
                            transform="rotate(-90 13.6943 14.0086)"
                            fill="#059669"

                        />
                        <circle
                            cx="25.9911"
                            cy="14.0086"
                            r="1.39737"
                            transform="rotate(-90 25.9911 14.0086)"
                            fill="#059669"

                        />
                        <circle
                            cx="38.288"
                            cy="14.0086"
                            r="1.39737"
                            transform="rotate(-90 38.288 14.0086)"
                            fill="#059669"

                        />
                     </svg>
                  </span>
                        <span class="absolute left-1 bottom-1">
                     <svg
                         width="29"
                         height="40"
                         viewBox="0 0 29 40"
                         fill="none"
                         xmlns="http://www.w3.org/2000/svg"
                     >
                        <circle
                            cx="2.288"
                            cy="25.9912"
                            r="1.39737"
                            transform="rotate(-90 2.288 25.9912)"
                            fill="#059669"
                        />
                        <circle
                            cx="14.5849"
                            cy="25.9911"
                            r="1.39737"
                            transform="rotate(-90 14.5849 25.9911)"
                            fill="#059669"
                        />
                        <circle
                            cx="26.7216"
                            cy="25.9911"
                            r="1.39737"
                            transform="rotate(-90 26.7216 25.9911)"
                            fill="#059669"

                        />
                        <circle
                            cx="2.288"
                            cy="13.6944"
                            r="1.39737"
                            transform="rotate(-90 2.288 13.6944)"
                            fill="#059669"

                        />
                        <circle
                            cx="14.5849"
                            cy="13.6943"
                            r="1.39737"
                            transform="rotate(-90 14.5849 13.6943)"
                            fill="#059669"

                        />
                        <circle
                            cx="26.7216"
                            cy="13.6943"
                            r="1.39737"
                            transform="rotate(-90 26.7216 13.6943)"
                            fill="#059669"

                        />
                        <circle
                            cx="2.288"
                            cy="38.0087"
                            r="1.39737"
                            transform="rotate(-90 2.288 38.0087)"
                            fill="#059669"

                        />
                        <circle
                            cx="2.288"
                            cy="1.39739"
                            r="1.39737"
                            transform="rotate(-90 2.288 1.39739)"
                            fill="#059669"

                        />
                        <circle
                            cx="14.5849"
                            cy="38.0089"
                            r="1.39737"
                            transform="rotate(-90 14.5849 38.0089)"
                            fill="#059669"

                        />
                        <circle
                            cx="26.7216"
                            cy="38.0089"
                            r="1.39737"
                            transform="rotate(-90 26.7216 38.0089)"
                            fill="#059669"

                        />
                        <circle
                            cx="14.5849"
                            cy="1.39761"
                            r="1.39737"
                            transform="rotate(-90 14.5849 1.39761)"
                            fill="#059669"

                        />
                        <circle
                            cx="26.7216"
                            cy="1.39761"
                            r="1.39737"
                            transform="rotate(-90 26.7216 1.39761)"
                            fill="#059669"

                        />
                     </svg>
                  </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====== Forms Section End -->

