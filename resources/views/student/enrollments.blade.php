@extends('layouts.student')

@section('content')
<!-- Header -->
<div class="bg-gradient-to-r from-indigo-600 to-purple-600 shadow-md">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h1 class="text-2xl font-semibold text-white">My Enrollments</h1>
        <p class="text-sm text-indigo-100 mt-1">View your enrolled subjects by academic period</p>
    </div>
</div>

<div class="bg-gray-100 min-h-screen">
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 py-8">

        @if($enrollments->count() > 0)
            @foreach($enrollments as $period => $periodEnrollments)
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4">
                        <h3 class="text-lg font-semibold text-white">{{ $period }}</h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead>
                                <tr class="bg-gradient-to-r from-indigo-600 to-purple-600">
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Code</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Course Name</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Units</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-white uppercase tracking-wider">Grade</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($periodEnrollments as $enrollment)
                                <tr class="hover:bg-gray-50 transition-colors duration-150">
                                    <td class="px-6 py-4 text-sm font-semibold text-gray-900">{{ $enrollment->subject->code }}</td>
                                    <td class="px-6 py-4 text-sm text-gray-900">{{ $enrollment->subject->name }}</td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-900">{{ $enrollment->subject->units }}</td>
                                    <td class="px-6 py-4 text-center text-sm">
                                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                                            @if($enrollment->status === 'Enrolled') bg-indigo-100 text-indigo-800
                                            @elseif($enrollment->status === 'Completed') bg-green-100 text-green-800
                                            @elseif($enrollment->status === 'Dropped') bg-gray-100 text-gray-800
                                            @elseif($enrollment->status === 'Failed') bg-red-100 text-red-800
                                            @endif">
                                            {{ $enrollment->status }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-center text-sm font-medium {{ $enrollment->grade ? 'text-gray-900' : 'text-gray-500' }}">
                                        {{ $enrollment->grade ?? '-' }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        @else
            <div class="bg-white rounded-lg shadow-md p-12 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <p class="mt-4 text-gray-500 text-lg">No enrollments found</p>
            </div>
        @endif

        <div class="mt-8">
            <a href="{{ route('student.dashboard') }}" class="inline-flex items-center text-indigo-600 hover:text-indigo-700 font-medium">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Dashboard
            </a>
        </div>
    </div>
</div>
@endsection
