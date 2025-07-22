@extends('auth.layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/message.css') }}">
@endpush
@section("content")
    <!-- Dashboard Main Content Area -->
    <div class="dashboard-main container">

        @include('auth.layouts.admin.includes.sidebar')


        <!-- Main Content Area - Shared Cards -->
        <main id="dashboardMainContent" class="main-content rounded-lg shadow-md">
            @if(session('success'))
                <div class="alert alert-success text-center mb-2">
                    {{ session('success') }}
                </div>
            @endif
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-6">Message</h1>
                <a href="{{ route("dashboard.landing.message.view")}}" type="button" class="bg-indigo-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-indigo-700 shadow-sm">
                    Back
                </a>
            </div>
            <p class="text-gray-700 mb-6">
                Here you can view message that shared with you.
            </p>

            <div class="space-y-4">
                <div class="shared-card-item">
                    <div>
                        <p class="font-semibold text-gray-900 text-lg">{{ $landingContactUs->name }}</p>
                        <p class="text-gray-700">{{ $landingContactUs->email }}</p>
                        <p class="text-gray-700">{{ $landingContactUs->message }}</p>
                    </div>
                </div>


            </div>
        </main>
    </div>
@endsection
