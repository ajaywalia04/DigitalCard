@extends('auth.layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/profileSetting.css') }}">
  @endpush
@section("content")

    <!-- Dashboard Main Content Area -->
    <div class="dashboard-main container">
        @include('auth.layouts.admin.includes.sidebar')


        <!-- Main Content Area - Profile Settings -->
        <main id="dashboardMainContent" class="main-content rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Profile Settings</h1>
            <p class="text-gray-700 mb-6">
                View your personal account details.
            </p>

            <div class="bg-white p-8 rounded-lg shadow-sm">
                <!-- Profile Picture Section -->
                <div class="flex items-center mb-8">
                    <div class="relative w-28 h-28 rounded-full overflow-hidden border-4 border-indigo-500 shadow-lg mr-6">
                    <?php
                        $initials = strtoupper(collect(explode(' ', trim($user->name)))
                        ->take(2)
                        ->map(fn($word) => $word[0])
                        ->implode(''));
                ?>
                        <img class="w-full h-full object-cover" src={{ "https://placehold.co/112x112/4f46e5/FFFFFF?text=".$initials }} alt="Profile Picture">
                    </div>
                    <div>
                        <p class="text-lg font-semibold text-gray-900 mb-2">{{ $user->name}}</p>
                        <p class="text-md text-gray-700">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

@endsection
