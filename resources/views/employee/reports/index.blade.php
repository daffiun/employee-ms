@extends('layouts.app')

@section('title', 'Employee Reports')
@section('page-title', 'Reports')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <!-- Monthly Attendance Report -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 cursor-pointer hover:shadow-md transition">
        <div class="flex items-center">
            <div class="bg-blue-100 rounded-full p-3 mr-4">
                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Monthly Attendance</h3>
                <p class="text-sm text-gray-600 mt-1">View your attendance records by month</p>
            </div>
        </div>
    </div>

    <!-- Yearly Salary Report -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 cursor-pointer hover:shadow-md transition">
        <div class="flex items-center">
            <div class="bg-green-100 rounded-full p-3 mr-4">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-800">Yearly Salary</h3>
                <p class="text-sm text-gray-600 mt-1">View your salary information for the year</p>
            </div>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Report Summary</h3>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="p-4 bg-gray-50 rounded-lg">
            <p class="text-sm text-gray-600">Total Present Days</p>
            <p class="text-2xl font-bold text-gray-800 mt-2">22</p>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg">
            <p class="text-sm text-gray-600">Total Absent Days</p>
            <p class="text-2xl font-bold text-gray-800 mt-2">2</p>
        </div>
        <div class="p-4 bg-gray-50 rounded-lg">
            <p class="text-sm text-gray-600">Year-to-Date Earnings</p>
            <p class="text-2xl font-bold text-gray-800 mt-2">$56,400</p>
        </div>
    </div>
</div>
@endsection
