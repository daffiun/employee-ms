@extends('layouts.app')

@section('title', 'Attendance History')
@section('page-title', 'Attendance History')

@section('content')
<div class="mb-6">
    <input type="month" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="2024-11">
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Date</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Check-in</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Check-out</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Total Hours</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Status</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-800">2024-11-25</td>
                <td class="px-6 py-4 text-sm text-gray-600">08:30 AM</td>
                <td class="px-6 py-4 text-sm text-gray-600">05:45 PM</td>
                <td class="px-6 py-4 text-sm text-gray-600">9h 15m</td>
                <td class="px-6 py-4 text-sm"><span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-medium">Present</span></td>
            </tr>
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-800">2024-11-24</td>
                <td class="px-6 py-4 text-sm text-gray-600">--:-- --</td>
                <td class="px-6 py-4 text-sm text-gray-600">--:-- --</td>
                <td class="px-6 py-4 text-sm text-gray-600">--</td>
                <td class="px-6 py-4 text-sm"><span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-xs font-medium">Absent</span></td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
