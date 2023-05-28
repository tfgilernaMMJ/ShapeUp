@extends('admin.templates.general')

@section('aside')
<!-- Desktop sidebar -->
<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            {{ Auth::user()->name }}
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @yield('index-nav-lat')
                <button><a id="index" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('index-nav')" href="{{ route('admin') }}">
                <i class='bx bxs-home w-5 h-5' aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"></i>
                    <span class="ml-4">Inicio</span>
                </a></button>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                @yield('users-nav-lat')
                <div class="dropdown">
                    <button class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dropdown-toggle @yield('users-nav')" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='bx bxs-purchase-tag w-5 h-5' aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"></i>
                        <span class="ml-4">Usuarios</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('users-nav')" href="{{ route('admin.users') }}">
                            <span>
                                <i class='bx bxs-user' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Usuarios</span>
                        </a>
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('users-nav')" href="{{ route('admin.coaches') }}">
                            <span>
                                <i class='bx bx-dumbbell' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Entrenadores</span>
                        </a>
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('users-nav')" href="{{ route('admin.admins') }}">
                            <span>
                                <i class='bx bxs-crown' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Administradores</span>
                        </a>
                    </div>
                </div>
            </li>
        <li class="relative px-6 py-3">
            @yield('trainings-nav-lat')
                <div class="dropdown">
                    <button class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dropdown-toggle @yield('trainings-nav')" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='bx bx-dumbbell w-5 h-5' aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"></i>
                        <span class="ml-4">Entrenamientos</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('trainings-nav')" href="{{ route('admin.trainings') }}">
                            <span>
                                <i class='bx bx-dumbbell' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Entrenamientos</span>
                        </a>

                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('trainings-nav')" href="{{ route('admin.exercises') }}">
                            <span>
                                <i class='bx bx-dumbbell' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Ejercicios</span>
                        </a>
                    </div>
                </div>
            </li>

            <li class="relative px-6 py-3">
            @yield('diets-nav-lat')
                <div class="dropdown">
                    <button class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dropdown-toggle @yield('diets-nav')" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='bx bxs-food-menu w-5 h-5' aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"></i>
                        <span class="ml-4">Dietas</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('diets-nav')" href="{{ route('admin.diets') }}">
                            <span>
                                <i class='bx bx-bowl-rice' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Dietas</span>
                        </a>
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('diets-nav')" href="{{ route('admin.ingredients') }}">
                            <span>
                                <i class='bx bx-baguette' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            
                            <span class="ml-4">Ingredientes</span>
                        </a>
                    </div>
                </div>
            </li>

            <li class="relative px-6 py-3">
                @yield('brands-nav-lat')
                <div class="dropdown">
                    <button class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dropdown-toggle @yield('brands-nav')" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-braille w-5 h-5' aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"></i>
                        <span class="ml-4">Marcas</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('brands-nav')" href="{{ route('admin.gyms') }}">
                            <span>
                                <i class='bx bx-dumbbell' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Gimnasios</span>
                        </a>
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('brands-nav')" href="{{ route('admin.markets') }}">
                            <span>
                                <i class='bx bxs-store' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Supermercados</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="relative px-6 py-3">
                @yield('categories-nav-lat')
                <div class="dropdown">
                    <button class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dropdown-toggle @yield('categories-nav')" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-category w-5 h-5' aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"></i>
                        <span class="ml-4">Categorías</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('categories-nav')" href="{{ route('admin.trainings-categories') }}">
                            <span>
                                <i class='bx bx-dumbbell' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Entrenamientos</span>
                        </a>
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('categories-nav')" href="{{ route('admin.exercises-categories') }}">
                            <span>
                                <i class='bx bx-dumbbell' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Ejercicios</span>
                        </a>
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('categories-nav')" href="{{ route('admin.diets-categories') }}">
                            <span>
                                <i class='bx bx-bowl-rice' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Dietas</span>
                        </a>
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('categories-nav')" href="{{ route('admin.ingredients-categories') }}">
                            <span>
                                <i class='bx bx-baguette' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Ingredientes</span>
                        </a>
                    </div>
                </div>
            </li>
            {{-- <li class="relative px-6 py-3">
                    <button
                        class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        @click="togglePagesMenu" aria-haspopup="true">
                        <span class="inline-flex items-center">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                                </path>
                            </svg>
                            <span class="ml-4">Pages</span>
                        </span>
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <template x-if="isPagesMenuOpen">
                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                            seap-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                            aria-label="submenu">
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="pages/login.html">Login</a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="pages/create-account.html">
                                    Create account
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="pages/forgot-password.html">
                                    Forgot password
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="pages/404.html">404</a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="pages/blank.html">Blank</a>
                            </li>
                        </ul>
                    </template>
                </li> --}}
        </ul>
        <div class="px-6 my-6">
            <a type="button" href="{{route('account.index')}}" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Ir a ShapeUp
                <span class="ml-2" aria-hidden="true">>></span>
            </a>
        </div>
    </div>
</aside>
<!-- Mobile sidebar -->
<!-- Backdrop -->
<div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"></div>
<aside class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden" x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150" x-transition:enter-start="opacity-0 transform -translate-x-20" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0 transform -translate-x-20" @click.away="closeSideMenu" @keydown.escape="closeSideMenu">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="#">
            {{ Auth::user()->name }}
        </a>
        <ul class="mt-6">
            <li class="relative px-6 py-3">
                @yield('index-nav-lat')
                <button><a id="index" class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('index-nav')" href="{{ route('admin') }}">
                <i class='bx bxs-home w-5 h-5' aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"></i>
                    <span class="ml-4">Inicio</span>
                </a></button>
            </li>
        </ul>
        <ul>
            <li class="relative px-6 py-3">
                @yield('users-nav-lat')
                <div class="dropdown">
                    <button class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dropdown-toggle @yield('users-nav')" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='bx bxs-purchase-tag w-5 h-5' aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"></i>
                        <span class="ml-4">Usuarios</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('users-nav')" href="{{ route('admin.users') }}">
                            <span>
                                <i class='bx bxs-user' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Usuarios</span>
                        </a>
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('users-nav')" href="{{ route('admin.coaches') }}">
                            <span>
                                <i class='bx bx-dumbbell' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Entrenadores</span>
                        </a>
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('users-nav')" href="{{ route('admin.admins') }}">
                            <span>
                                <i class='bx bxs-crown' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Administradores</span>
                        </a>
                    </div>
                </div>
            </li>
        <li class="relative px-6 py-3">
            @yield('trainings-nav-lat')
                <div class="dropdown">
                    <button class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dropdown-toggle @yield('trainings-nav')" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='bx bx-dumbbell w-5 h-5' aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"></i>
                        <span class="ml-4">Entrenamientos</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('trainings-nav')" href="{{ route('admin.trainings') }}">
                            <span>
                                <i class='bx bx-dumbbell' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Entrenamientos</span>
                        </a>

                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('trainings-nav')" href="{{ route('admin.exercises') }}">
                            <span>
                                <i class='bx bx-dumbbell' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Ejercicios</span>
                        </a>
                    </div>
                </div>
            </li>

            <li class="relative px-6 py-3">
            @yield('diets-nav-lat')
                <div class="dropdown">
                    <button class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dropdown-toggle @yield('diets-nav')" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class='bx bxs-food-menu w-5 h-5' aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"></i>
                        <span class="ml-4">Dietas</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('diets-nav')" href="{{ route('admin.diets') }}">
                            <span>
                                <i class='bx bx-bowl-rice' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Dietas</span>
                        </a>
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('diets-nav')" href="{{ route('admin.ingredients') }}">
                            <span>
                                <i class='bx bx-baguette' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            
                            <span class="ml-4">Ingredientes</span>
                        </a>
                    </div>
                </div>
            </li>

            <li class="relative px-6 py-3">
                @yield('brands-nav-lat')
                <div class="dropdown">
                    <button class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dropdown-toggle @yield('brands-nav')" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-braille w-5 h-5' aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"></i>
                        <span class="ml-4">Marcas</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('brands-nav')" href="{{ route('admin.gyms') }}">
                            <span>
                                <i class='bx bx-dumbbell' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Gimnasios</span>
                        </a>
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('brands-nav')" href="{{ route('admin.markets') }}">
                            <span>
                                <i class='bx bxs-store' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Supermercados</span>
                        </a>
                    </div>
                </div>
            </li>
            <li class="relative px-6 py-3">
                @yield('categories-nav-lat')
                <div class="dropdown">
                    <button class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dropdown-toggle @yield('categories-nav')" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class='bx bx-category w-5 h-5' aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor"></i>
                        <span class="ml-4">Categorías</span>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="triggerId">
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('categories-nav')" href="{{ route('admin.trainings-categories') }}">
                            <span>
                                <i class='bx bx-dumbbell' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Entrenamientos</span>
                        </a>
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('categories-nav')" href="{{ route('admin.exercises-categories') }}">
                            <span>
                                <i class='bx bx-dumbbell' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Ejercicios</span>
                        </a>
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('categories-nav')" href="{{ route('admin.diets-categories') }}">
                            <span>
                                <i class='bx bx-bowl-rice' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Dietas</span>
                        </a>
                        <a class="dropdown-item  inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 @yield('categories-nav')" href="{{ route('admin.ingredients-categories') }}">
                            <span>
                                <i class='bx bx-baguette' aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"></i>
                            </span>
                            <span class="ml-4">Ingredientes</span>
                        </a>
                    </div>
                </div>
            </li>
            {{-- <li class="relative px-6 py-3">
                    <button
                        class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        @click="togglePagesMenu" aria-haspopup="true">
                        <span class="inline-flex items-center">
                            <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                                </path>
                            </svg>
                            <span class="ml-4">Pages</span>
                        </span>
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <template x-if="isPagesMenuOpen">
                        <ul x-transition:enter="transition-all ease-in-out duration-300"
                            x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                            x-transition:leave="transition-all ease-in-out duration-300"
                            x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                            seap-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                            aria-label="submenu">
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="pages/login.html">Login</a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="pages/create-account.html">
                                    Create account
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="pages/forgot-password.html">
                                    Forgot password
                                </a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="pages/404.html">404</a>
                            </li>
                            <li
                                class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                                <a class="w-full" href="pages/blank.html">Blank</a>
                            </li>
                        </ul>
                    </template>
                </li> --}}
        </ul>
        <div class="px-6 my-6">
            <a type="button" href="{{route('account.index')}}" class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Ir a ShapeUp
                <span class="ml-2" aria-hidden="true">>></span>
            </a>
        </div>
    </div>
</aside>
<div class="flex flex-col flex-1 w-full">
    <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
        <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
            <!-- Mobile hamburger -->
            <button class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple" @click="toggleSideMenu" aria-label="Menu">
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                </svg>
            </button>
            <!-- Search input -->
            <div class="flex justify-center flex-1 lg:mr-32">
                <div class="relative w-full max-w-xl mr-6 focus-within:text-purple-500">
                    <div class="absolute inset-y-0 flex items-center pl-2">
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <form @if(request()->route()->getName() == 'admin')
                        action="{{ route('admin-search') }}"
                        @endif
                        >
                        <input class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200 focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input" type="text" placeholder="
                            @if(request()->route()->getName() == 'admin')
                                    Buscar
                            @endif" aria-label="Search" name="name" />
                    </form>
                </div>
            </div>
            <ul class="flex items-center flex-shrink-0 space-x-6">
                <!-- Notifications menu -->
                {{-- <li class="relative">
                        <button class="relative align-middle rounded-md focus:outline-none focus:shadow-outline-purple"
                            @click="toggleNotificationsMenu" @keydown.escape="closeNotificationsMenu"
                            aria-label="Notifications" aria-haspopup="true">
                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
                                </path>
                            </svg>
                            <!-- Notification badge -->
                            <span aria-hidden="true"
                                class="absolute top-0 right-0 inline-block w-3 h-3 transform translate-x-1 -translate-y-1 bg-red-600 border-2 border-white rounded-full dark:border-gray-800"></span>
                        </button>
                        <template x-if="isNotificationsMenuOpen">
                            <ul x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                @click.away="closeNotificationsMenu" @keydown.escape="closeNotificationsMenu"
                                class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:text-gray-300 dark:border-gray-700 dark:bg-gray-700">
                                <li class="flex">
                                    <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                        href="#">
                                        <span>Messages</span>
                                        <span
                                            class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                                            13
                                        </span>
                                    </a>
                                </li>
                                <li class="flex">
                                    <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                        href="#">
                                        <span>Sales</span>
                                        <span
                                            class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-600 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-600">
                                            2
                                        </span>
                                    </a>
                                </li>
                                <li class="flex">
                                    <a class="inline-flex items-center justify-between w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200"
                                        href="#">
                                        <span>Alerts</span>
                                    </a>
                                </li>
                            </ul>
                        </template>
                    </li> --}}
                <!-- Profile menu -->
                <li class="relative">
                    <button class="align-middle rounded-full focus:shadow-outline-purple focus:outline-none" @click="toggleProfileMenu" @keydown.escape="closeProfileMenu" aria-label="Account" aria-haspopup="true">
                        <img class="object-cover w-8 h-8 rounded-full" src="{{ asset('web/assets/img/logo/ShapeUpLogo.jpg') }}" alt="" aria-hidden="true" />
                    </button>
                    <template x-if="isProfileMenuOpen">
                        <ul x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click.away="closeProfileMenu" @keydown.escape="closeProfileMenu" class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md dark:border-gray-700 dark:text-gray-300 dark:bg-gray-700" aria-label="submenu">
                            <li class="flex">
                                <a class="inline-flex items-center w-full px-2 py-1 text-sm font-semibold transition-colors duration-150 rounded-md hover:bg-gray-100 hover:text-gray-800 dark:hover:bg-gray-800 dark:hover:text-gray-200" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <svg class="w-4 h-4 mr-3" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1">
                                        </path>
                                    </svg>
                                    <span>Cerrar sesión</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>  
                            </li>
                        </ul>
                    </template>
                </li>
            </ul>
        </div>
    </header>
@endsection