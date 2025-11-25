@extends('layouts.app')

@section('title', 'Salary Slips')
@section('page-title', 'Salary Slips')

@section('content')
<div class="mb-6">
    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <option selected>November 2024</option>
        <option>October 2024</option>
        <option>September 2024</option>
    </select>
</div>

<div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-50 border-b border-gray-200">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Month</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Basic Salary</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Allowances</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Deductions</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Net Salary</th>
                <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Action</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-800">November 2024</td>
                <td class="px-6 py-4 text-sm text-gray-600">$5,000</td>
                <td class="px-6 py-4 text-sm text-gray-600">$500</td>
                <td class="px-6 py-4 text-sm text-gray-600">$800</td>
                <td class="px-6 py-4 text-sm font-semibold text-gray-800">$4,700</td>
                <td class="px-6 py-4 text-sm">
                    <a href="{{ route('employee.salary.show', 1) }}" class="text-blue-600 hover:text-blue-700">View Slip</a>
                </td>
            </tr>
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 text-sm text-gray-800">October 2024</td>
                <td class="px-6 py-4 text-sm text-gray-600">$5,000</td>
                <td class="px-6 py-4 text-sm text-gray-600">$500</td>
                <td class="px-6 py-4 text-sm text-gray-600">$800</td>
                <td class="px-6 py-4 text-sm font-semibold text-gray-800">$4,700</td>
                <td class="px-6 py-4 text-sm">
                    <a href="{{ route('employee.salary.show', 2) }}" class="text-blue-600 hover:text-blue-700">View Slip</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
