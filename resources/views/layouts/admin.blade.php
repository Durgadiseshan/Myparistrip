<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
        {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet"> --}}

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        <link href="{{ asset('css/index.css') }}" rel="stylesheet">
</head>
<body class="font-sans antialiased">
    <x-banner />

    <div class="min-h-screen bg-gray-100 flex">
        <!-- Include the Livewire Sidebar component -->
        @livewire('sidebar')

    
        <div class="flex-1">
            @livewire('navigation-menu')
            <!-- Custom Header with Sign In and Notification Icon -->
            {{-- <header class="bg-white shadow py-4">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                    <div class="flex items-center">
                        <!-- Logo or Brand Name Here -->
                        <h1 class="text-xl font-bold text-gray-800">
                            My Paris Trip
                        </h1>
                    </div>
                    <div class="flex items-center">
                        <!-- Notification Icon -->
                        <div class="relative mr-4">
                            <svg class="h-6 w-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.5 1.5M9 11V9a5 5 0 015-5 5 5 0 015 5v2l-2 2v5l-3 3v-3H6v-5l-2-2z"/>
                            </svg>
                            <!-- Notification bubble -->
                            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-red-400"></span>
                        </div>
                        <!-- Sign In Link -->
                        <a href="/login" class="text-gray-600 hover:text-gray-900 text-sm font-medium">
                            Sign In
                        </a>
                    </div>
                </div>
            </header> --}}

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
       
       
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>