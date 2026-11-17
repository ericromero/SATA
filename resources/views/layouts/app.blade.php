<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        <div class="min-h-screen flex">
            <!-- Sidebar Izquierdo Idéntico a la Muestra -->
            <aside class="w-64 bg-white border-r border-gray-200 flex flex-col justify-between shrink-0">
                <div>
                    <!-- Logo / Título Superior -->
                    <div class="h-16 flex items-center px-6 border-b border-gray-100">
                        <div class="flex items-center gap-2">
                            <span class="p-1.5 bg-black text-white rounded text-xs font-bold">LB</span>
                            <span class="font-semibold text-gray-800 text-sm tracking-tight">Laravel Starter Kit</span>
                        </div>
                    </div>

                    <!-- Enlaces de Navegación -->
                    <div class="px-4 py-4 space-y-1">
                        <p class="px-3 text-[11px] font-semibold text-gray-400 uppercase tracking-wider">Platform</p>
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50' }}">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            Dashboard
                        </a>
                        <a href="{{ route('buzon.crear-mensaje') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('buzon.crear-mensaje') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50' }}">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                            Nuevo Mensaje
                        </a>
                        <a href="{{ route('buzon.crear-aviso') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('buzon.crear-aviso') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50' }}">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            Nuevo Aviso
                        </a>
                        <a href="{{ route('buzon.grupos') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg text-sm font-medium {{ request()->routeIs('buzon.grupos*') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50' }}">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                            Grupos y Alumnos
                        </a>
                    </div>
                </div>

                <!-- Pie del Sidebar con el Usuario Autenticado -->
                <div class="p-4 border-t border-gray-100 space-y-3">
                    <div class="flex items-center justify-between text-gray-500 text-xs px-2">
                        <span>Repository</span>
                        <span>Documentation</span>
                    </div>

                    <div class="flex items-center justify-between pt-2">
                        <div class="flex items-center gap-2">
                            <span class="w-7 h-7 bg-gray-200 text-gray-700 font-bold rounded flex items-center justify-center text-xs">
                                {{ strtoupper(substr(Auth::user()->name ?? 'AS', 0, 2)) }}
                            </span>
                            <span class="text-xs font-medium text-gray-700 truncate max-w-[110px]">
                                {{ Auth::user()->name ?? 'Administrador SATA' }}
                            </span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-xs text-red-500 hover:underline">Salir</button>
                        </form>
                    </div>
                </div>
            </aside>

            <!-- Área Principal -->
            <main class="flex-1 bg-white min-h-screen p-10">
                {{ $slot }}
            </main>
        </div>

        @livewireScripts
    </body>
</html>