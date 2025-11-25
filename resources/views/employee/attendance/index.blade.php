@extends('layouts.app')

@section('title', 'Attendance')
@section('page-title', 'Attendance')

@section('content')
<div class="mb-6">
    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 mb-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">Today's Attendance</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="p-4 bg-green-50 rounded-lg border border-green-200">
                <p class="text-sm text-gray-600">Check-in Time</p>
                <p class="text-2xl font-bold text-green-600 mt-1">08:30 AM</p>
            </div>
            <div class="p-4 bg-blue-50 rounded-lg border border-blue-200">
                <p class="text-sm text-gray-600">Check-out Time</p>
                <p class="text-2xl font-bold text-blue-600 mt-1">--:-- --</p>
            </div>
        </div>
    </div>

    <button class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-blue-700 transition disabled:opacity-50" disabled>Check Out</button>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Check-in</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Check-out</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Total Hours</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-800">2024-11-25</td>
                <td class="px-6 py-4 text-sm text-gray-600">08:30 AM</td>
                <td class="px-6 py-4 text-sm text-gray-600">05:45 PM</td>
                <td class="px-6 py-4 text-sm text-gray-600">9h 15m</td>
            </tr>
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-800">2024-11-24</td>
                <td class="px-6 py-4 text-sm text-gray-600">08:15 AM</td>
                <td class="px-6 py-4 text-sm text-gray-600">06:00 PM</td>
                <td class="px-6 py-4 text-sm text-gray-600">9h 45m</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
