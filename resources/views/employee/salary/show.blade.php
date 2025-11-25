@extends('layouts.app')

@section('title', 'Salary Slip')
@section('page-title', 'Salary Slip - November 2024')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <!-- Header -->
        <div class="border-b border-gray-200 pb-6 mb-6">
            <h1 class="text-3xl font-bold text-blue-600">SALARY SLIP</h1>
            <p class="text-gray-600 mt-1">For the Month of November 2024</p>
        </div>

        <!-- Employee Info -->
        <div class="grid grid-cols-2 gap-6 mb-8">
            <div>
                <p class="text-sm text-gray-600">Employee Name</p>
                <p class="text-lg font-semibold text-gray-800">John Doe</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Employee ID</p>
                <p class="text-lg font-semibold text-gray-800">EMP-001</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Department</p>
                <p class="text-lg font-semibold text-gray-800">Information Technology</p>
            </div>
            <div>
                <p class="text-sm text-gray-600">Position</p>
                <p class="text-lg font-semibold text-gray-800">Senior Developer</p>
            </div>
        </div>

        <!-- Earnings & Deductions -->
        <div class="grid grid-cols-2 gap-6 mb-8">
            <!-- Earnings -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-300">Earnings</h3>
                <div class="space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Basic Salary</span>
                        <span class="font-semibold text-gray-800">$5,000</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">House Allowance</span>
                        <span class="font-semibold text-gray-800">$300</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Transportation</span>
                        <span class="font-semibold text-gray-800">$200</span>
                    </div>
                    <div class="border-t border-gray-300 pt-3 flex justify-between">
                        <span class="text-gray-600 font-medium">Total Earnings</span>
                        <span class="font-bold text-gray-800">$5,500</span>
                    </div>
                </div>
            </div>

            <!-- Deductions -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-4 pb-2 border-b border-gray-300">Deductions</h3>
                <div class="space-y-3">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Income Tax</span>
                        <span class="font-semibold text-gray-800">$500</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Social Security</span>
                        <span class="font-semibold text-gray-800">$200</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-600">Health Insurance</span>
                        <span class="font-semibold text-gray-800">$100</span>
                    </div>
                    <div class="border-t border-gray-300 pt-3 flex justify-between">
                        <span class="text-gray-600 font-medium">Total Deductions</span>
                        <span class="font-bold text-gray-800">$800</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Net Salary -->
        <div class="bg-blue-50 rounded-lg p-4 mb-8 border border-blue-200">
            <div class="flex justify-between items-center">
                <span class="text-lg font-semibold text-gray-800">Net Salary (In Hand)</span>
                <span class="text-3xl font-bold text-blue-600">$4,700</span>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center text-sm text-gray-500 mt-8 pt-6 border-t border-gray-200">
            <p>This is a computer-generated document. No signature is required.</p>
        </div>

        <div class="text-center mt-6">
            <button onclick="window.print()" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">Print</button>
        </div>
    </div>
</div>
@endsection
