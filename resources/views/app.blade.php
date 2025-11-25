<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'EMS') }} - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white border-r border-gray-200 shadow-sm fixed h-full overflow-y-auto">
            <div class="p-6 border-b border-gray-200">
                <h1 class="text-2xl font-bold text-blue-600">EMS</h1>
            </div>

            <nav class="mt-6">
                @php
                    $isAdmin = auth()->user() && auth()->user()->role === 'admin';
                @endphp

                @if($isAdmin)
                    <!-- Admin Navigation -->
                    <div class="space-y-1">
                        <a href="{{ route('admin.dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-2m0 0l4 2m0 0V9m0 0l-7-4" />
                            </svg>
                            Dashboard
                        </a>

                        <a href="{{ route('employees.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 8.646 4 4 0 010-8.646M3 20.394V19a6 6 0 0112 0v1.394A2 2 0 0017 22H5a2 2 0 01-2-1.606z" />
                            </svg>
                            Employees
                        </a>

                        <a href="{{ route('departments.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                            </svg>
                            Departments
                        </a>

                        <a href="{{ route('positions.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                            Positions
                        </a>

                        <a href="{{ route('users.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                            </svg>
                            Users
                        </a>

                        <a href="{{ route('attendance.settings') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Attendance Settings
                        </a>

                        <a href="{{ route('admin.reports') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Reports
                        </a>
                    </div>
                @else
                    <!-- Employee Navigation -->
                    <div class="space-y-1">
                        <a href="{{ route('employee.dashboard') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-2m0 0l4 2m0 0V9m0 0l-7-4" />
                            </svg>
                            Dashboard
                        </a>

                        <a href="{{ route('employee.attendance.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                            Attendance
                        </a>

                        <a href="{{ route('employee.salary.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Salary
                        </a>

                        <a href="{{ route('employee.reports.index') }}" class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Reports
                        </a>
                    </div>
                @endif
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col ml-64">
            <!-- Top Bar -->
            <header class="bg-white border-b border-gray-200 shadow-sm">
                <div class="px-8 py-4 flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">@yield('page-title')</h2>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative group">
                            <button class="flex items-center space-x-2 text-gray-700 hover:text-blue-600">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>{{ auth()->user()->name }}</span>
                            </button>
                            <div class="hidden group-hover:block absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg py-2 z-10">
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
                                <form method="POST" action="{{ route('logout') }}" class="block">
                                    @csrf
                                    <button type="submit" class="w-full text-left px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <div class="flex-1 overflow-auto p-8">
                @yield('content')
            </div>
        </main>
    </div>
</body>
</html>
