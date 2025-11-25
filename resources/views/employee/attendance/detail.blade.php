@extends('layouts.app')

@section('title', 'Attendance Detail')
@section('page-title', 'Attendance Detail - 2024-11-25')

@section('content')
<div class="max-w-2xl">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
        <h3 class="text-lg font-semibold text-gray-800 mb-6">Daily Attendance Record</h3>

        <div class="space-y-4">
            <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                <span class="text-gray-600">Date</span>
                <span class="font-semibold text-gray-800">November 25, 2024</span>
            </div>

            <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                <span class="text-gray-600">Check-in Time</span>
                <span class="font-semibold text-green-600">08:30 AM</span>
            </div>

            <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                <span class="text-gray-600">Check-out Time</span>
                <span class="font-semibold text-red-600">05:45 PM</span>
            </div>

            <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                <span class="text-gray-600">Total Working Hours</span>
                <span class="font-semibold text-gray-800">9h 15m</span>
            </div>

            <div class="flex justify-between items-center p-4 bg-gray-50 rounded-lg">
                <span class="text-gray-600">Status</span>
                <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">Present</span>
            </div>
        </div>

        <a href="{{ route('employee.attendance.index') }}" class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Back to Attendance</a>
    </div>
</div>
@endsection
