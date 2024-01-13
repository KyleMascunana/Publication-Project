<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        @if (Session::has('message'))
        <div class="relative isolate flex items-center gap-x-6 overflow-hidden bg-gray-50 px-6 py-2.5 sm:px-3.5 sm:before:flex-1" x-data="{open: true}" x-show="open">
            <div class="absolute left-[max(-7rem,calc(50%-52rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
              <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
            </div>
            <div class="absolute left-[max(45rem,calc(50%+8rem))] top-1/2 -z-10 -translate-y-1/2 transform-gpu blur-2xl" aria-hidden="true">
              <div class="aspect-[577/310] w-[36.0625rem] bg-gradient-to-r from-[#ff80b5] to-[#9089fc] opacity-30" style="clip-path: polygon(74.8% 41.9%, 97.2% 73.2%, 100% 34.9%, 92.5% 0.4%, 87.5% 0%, 75% 28.6%, 58.5% 54.6%, 50.1% 56.8%, 46.9% 44%, 48.3% 17.4%, 24.7% 53.9%, 0% 27.9%, 11.9% 74.2%, 24.9% 54.1%, 68.6% 100%, 74.8% 41.9%)"></div>
            </div>
            <div class="flex flex-wrap items-center gap-x-4 gap-y-2">
              <p class="text-sm leading-6 text-gray-900">
                <strong class="font-semibold text-xl">
                    <i class="fa-solid fa-star text-yellow-500"></i>
                    {{ Session::get('message') }}
                    <i class="fa-solid fa-star text-yellow-500"></i></strong>
              </p>
            </div>
            <div class="flex flex-1 justify-end">
              <button @click="open = false" type="button" class="-m-3 p-3 focus-visible:outline-offset-[-4px]">
                <span class="sr-only">Dismiss</span>
                <svg class="h-5 w-5 text-gray-900" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                </svg>
              </button>
            </div>
          </div>

        @endif

        <div class="min-h-screen bg-gray-200">
            <div class="flex-col w-full md:flex md:flex-row md:min-h-screen">
                <div @click.away="open = false" class="flex flex-col flex-shrink-0 w-full text-gray-700 bg-gray-900 md:w-64 dark:text-gray-200 dark:bg-gray-800" x-data="{ open: false }">
                    <div class="flex flex-row items-center justify-between flex-shrink-0 px-8 py-4">
                        <a href="{{ route('dashboard') }}" class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg dark:text-white focus:outline-none focus:shadow-outline">
                            <x-application-logo-white class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                        </a>
                        <button class="rounded-lg md:hidden focus:outline-none focus:shadow-outline" @click="open = !open">
                            <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                        <nav :class="{'block': open, 'hidden': !open}" class="flex-grow px-4 pb-4 md:block md:pb-0 md:overflow-y-auto text-xl">
                            <x-admin-link :href="route('chief.index')" :active="request()->routeIs('chief.index')">
                                <i class="fa-solid fa-computer text-white pr-3"></i>     {{ __('Editor in Chief Dashboard') }}
                            </x-admin-link>

                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">

                                    <button class="inline-flex items-center px-3 py-2 border border-0 text-sm leading-4 font-medium rounded-md text-white bg-gray-900 hover:text-white-700 focus:outline-none transition ease-in-out duration-150">
                                        <div> <i class="fa-solid fa-scroll text-white pr-3"></i>   {{ __('Manuscripts') }}</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-admin-dropdown-link :href="route('chief.manuscripts.index')" :active="request()->routeIs('chief.manuscripts.index')">
                                        <i class="fa-solid fa-scroll text-blue-500 pr-3"></i>     {{ __('Submit Manuscript') }}
                                    </x-admin-dropdown-link>
                                    <hr class="pb-2 mt-2">
                                    <x-admin-dropdown-link  :href="route('chief.reviewedstatus.index')" :active="request()->routeIs('chief.reviewedstatus.index')">
                                        <i class="fa-solid fa-file text-blue-500 pr-3"></i>     {{ __('Manuscript Status') }}
                                    </x-admin-dropdown-link>
                                    <hr class="pb-2 mt-2">
                                    <x-admin-dropdown-link :href="route('chief.comments.index')" :active="request()->routeIs('chief.comments.index')">
                                        <i class="fa-solid fa-comment text-blue-500 pr-3"></i>    {{ __('Manuscript Comments') }}
                                    </x-admin-dropdown-link>
                                    <hr class="pb-2 mt-2">
                                    <x-admin-dropdown-link :href="route('chief.acceptedmanuscript.index')" :active="request()->routeIs('chief.acceptedmanuscript.index')">
                                        <i class="fa-solid fa-scroll text-blue-500 pr-3"></i>    {{ __('Final Status') }}
                                    </x-admin-dropdown-link>


                                </x-slot>
                            </x-dropdown>

                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">

                                    <button class="inline-flex items-center px-3 py-2 border border-0 text-sm leading-4 font-medium rounded-md text-white bg-gray-900 hover:text-white-700 focus:outline-none transition ease-in-out duration-150">
                                        <div> <i class="fa-solid fa-list text-white pr-3"></i>   {{ __('Reviewers') }}</div>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-admin-dropdown-link :href="route('chief.reviewers.index')" :active="request()->routeIs('chief.reviewers.index')">
                                        <i class="fa-solid fa-list text-green-500 pr-3"></i>     {{ __('Reviewer List') }}
                                    </x-admin-dropdown-link>
                                    <hr class="pb-2 mt-2">
                                    <x-admin-dropdown-link :href="route('chief.reviewerassigned.index')" :active="request()->routeIs('chief.reviewerassigned.index')">
                                        <i class="fa-solid fa-puzzle-piece text-green-500 pr-3"></i>    {{ __('Assigned Reviewer') }}
                                    </x-admin-dropdown-link>
                                    <hr class="pb-2 mt-2">
                                    <x-admin-dropdown-link :href="route('chief.employeeassigned.index')" :active="request()->routeIs('chief.employeeassigned.index')">
                                        <i class="fa-solid fa-user text-green-500 pr-3"></i>    {{ __('Employee Assigned') }}
                                    </x-admin-dropdown-link>


                                </x-slot>
                            </x-dropdown>
                        </nav>
                </div>
                <div class="relative w-full">
                    <div>
                        <nav class="bg-gray-900 py-2">
                            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                              <div class="relative flex h-16 items-center justify-end">


                                  <!-- Profile dropdown -->
                                  <div class="hidden sm:flex sm:items-center sm:ml-6">

                                    <x-dropdown align="right" width="48">
                                        <x-slot name="trigger">

                                            <button class="inline-flex items-center px-3 py-2 border border-0 text-sm leading-4 font-medium rounded-md text-white bg-gray-900 hover:text-white-700 focus:outline-none transition ease-in-out duration-150">
                                                <div>{{ Auth::user()->name }}</div>

                                                <div class="ml-1">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                    </svg>
                                                </div>
                                            </button>
                                        </x-slot>

                                        <x-slot name="content">
                                            <div class="px-4 py-2">
                                                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                                            </div><br><hr>
                                            <x-dropdown-link :href="route('profile.edit')">
                                                {{ __('Profile') }}
                                            </x-dropdown-link>

                                            <!-- Authentication -->
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf

                                                <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                    {{ __('Log Out') }}
                                                </x-dropdown-link>
                                            </form>
                                        </x-slot>
                                    </x-dropdown>
                                </div>
                                    </div>
                                </div>
                                </div>


                          </nav>
                          {{ $slot }}
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
