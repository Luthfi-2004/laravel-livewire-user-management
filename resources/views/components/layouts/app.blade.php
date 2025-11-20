<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Livewire App' }}</title>
        
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        
        <!-- Styles & Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-900 antialiased text-white flex flex-col min-h-screen" style="font-family: 'Instrument Sans', sans-serif;">
        
        <!-- NAVBAR -->
        <nav class="fixed top-0 w-full z-50 bg-gray-900/80 backdrop-blur-md border-b border-white/10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    
                    <!-- 1. LOGO -->
                    <div class="flex-shrink-0 flex items-center gap-2 cursor-pointer">
                        <a href="/" wire:navigate class="flex items-center gap-2">
                            <div class="bg-indigo-600 p-1.5 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-white">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" />
                                </svg>
                            </div>
                            <span class="font-bold text-xl tracking-tight">LivewireApp</span>
                        </a>
                    </div>

                    <!-- 2. MENU TENGAH -->
                    <div class="hidden md:flex items-center space-x-8">
                        <a href="/" wire:navigate class="text-sm font-medium {{ request()->routeIs('home') ? 'text-indigo-400' : 'text-gray-300 hover:text-white' }} transition-colors">Home</a>
                        <a href="/users" wire:navigate class="text-sm font-medium {{ request()->routeIs('users') ? 'text-indigo-400' : 'text-gray-300 hover:text-white' }} transition-colors">Users</a>
                        <a href="/about" wire:navigate class="text-sm font-medium {{ request()->routeIs('about') ? 'text-indigo-400' : 'text-gray-300 hover:text-white' }} transition-colors">About</a>
                        <a href="/contact" wire:navigate class="text-sm font-medium {{ request()->routeIs('contact') ? 'text-indigo-400' : 'text-gray-300 hover:text-white' }} transition-colors">Contact</a>
                    </div>

                    <!-- 3. BAGIAN KANAN (LOGIKA AUTH FIX) -->
                    <div class="flex items-center gap-4">
                        
                        @auth
                            <!-- JIKA SUDAH LOGIN -->
                            <div class="hidden md:flex items-center gap-4">
                                <div class="text-right">
                                    <p class="text-xs text-gray-400">Welcome,</p>
                                    <p class="text-sm font-semibold text-white">{{ auth()->user()->name }}</p>
                                </div>

                                <!-- Tombol Logout -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white transition-all bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 focus:ring-offset-gray-900 shadow-lg shadow-red-500/20">
                                        Log Out
                                    </button>
                                </form>
                            </div>

                        @else
                            <!-- JIKA BELUM LOGIN -->
                            <div class="flex items-center gap-4">
                                <a href="{{ route('login') }}" wire:navigate class="text-sm font-medium text-gray-300 hover:text-white transition">
                                    Log in
                                </a>
                                <a href="{{ route('register') }}" wire:navigate class="inline-flex items-center justify-center px-5 py-2 text-sm font-semibold text-white transition-all bg-indigo-600 rounded-full hover:bg-indigo-500 shadow-lg shadow-indigo-500/30">
                                    Get Started
                                </a>
                            </div>
                        @endauth

                    </div>

                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->

        <!-- CONTENT -->
        <main class="pt-24 pb-10 flex-grow">
            {{ $slot }}
        </main>

        <!-- FOOTER -->
        <footer class="bg-gray-900 border-t border-white/10 pt-12 pb-8 mt-auto">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                    <div class="col-span-1 md:col-span-1">
                        <div class="flex items-center gap-2 mb-4">
                            <div class="bg-indigo-600 p-1 rounded-md">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-white"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z" /></svg>
                            </div>
                            <span class="font-bold text-lg">LivewireApp</span>
                        </div>
                        <p class="text-gray-400 text-sm leading-relaxed">Building modern web apps with TALL Stack.</p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white mb-4">Menu</h4>
                        <ul class="space-y-2 text-sm text-gray-400">
                            <li><a href="/" wire:navigate class="hover:text-indigo-400">Home</a></li>
                            <li><a href="/users" wire:navigate class="hover:text-indigo-400">Users</a></li>
                            <li><a href="/about" wire:navigate class="hover:text-indigo-400">About</a></li>
                        </ul>
                    </div>
                    <div>
                        <h4 class="font-semibold text-white mb-4">Connect</h4>
                        <ul class="space-y-2 text-sm text-gray-400">
                            <li><a href="#" class="hover:text-indigo-400">Twitter</a></li>
                            <li><a href="#" class="hover:text-indigo-400">GitHub</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-t border-white/10 pt-8 flex justify-between items-center">
                    <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} LivewireApp. All rights reserved.</p>
                </div>
            </div>
        </footer>
        <div 
            x-data="{ show: false, message: '', type: 'success' }" 
            x-on:notify.window="show = true; message = $event.detail.message; type = $event.detail.type || 'success'; setTimeout(() => show = false, 3000)"
            class="fixed bottom-5 right-5 z-50"
            style="display: none;" 
            x-show="show" 
            x-transition:enter="transform ease-out duration-300 transition"
            x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
            x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
            x-transition:leave="transition ease-in duration-100"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <div class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 border border-white/10" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20"><path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/></svg>
                    <span class="sr-only">Check icon</span>
                </div>
                <div class="ms-3 text-sm font-normal text-white" x-text="message"></div>
                <button type="button" @click="show = false" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/></svg>
                </button>
            </div>
        </div>
    </body>
</html>