@extends('auth.layouts.admin.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/dashboard.css') }}">
@endpush
@section('content')

    <!-- Dashboard Main Content Area -->
    <div class="dashboard-main container">

        @include('auth.layouts.admin.includes.sidebar')


        <!-- Main Content Area -->
        <main class="main-content rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Welcome to Your Dashboard!</h1>
            <p class="text-gray-700 mb-4">
                Here you can manage your digital business card, view cards shared with you, update your profile, and access various tools to enhance your networking.
            </p>
            <div class="bg-white p-6 rounded-lg shadow-sm mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">My Digital Card Overview</h2>
                <p class="text-gray-600">
                    Your digital presence is active!
                    @if($user->myCard)
                    <span> You currently have <strong> digital business card</strong>. </span>
                    You can easily update its details or share it with others.
                    @else
                    Create your digital business card to share with others.
                    @endif
                </p>
                <div class="mt-6 flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                    @if($user->myCard)
                        <a href="{{ route('dashboard.card.view') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200 shadow-md">
                            View My Card
                        </a>
                        <a href="{{ route('dashboard.card.edit',['myCard'=>$user->myCard->uuid]) }}" class="bg-green-500 text-white px-6 py-3 rounded-md font-semibold hover:bg-green-600 transition-colors duration-200 shadow-md">
                            Edit My Card
                        </a>
                    @else
                        <a href="{{ route('dashboard.card.create') }}" id="createMyCardBtn" class="bg-indigo-600 text-white px-6 py-3 rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200 shadow-md">
                            Create My Card
                        </a>
                    @endif
                    @if($user->landingPage)
                        <a href="{{ route('my.landing.view',['slug' => $user->landingPage->slug]) }}" target="_blank" class="bg-indigo-600 text-white px-6 py-3 rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200 shadow-md">
                            View Landing Page
                        </a>
                    @endif
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm mb-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Your Card Activity</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="p-4 bg-gray-50 rounded-md border border-gray-200">
                        <p class="text-gray-600 text-sm">Cards You Accepted</p>
                        <p class="text-3xl font-bold text-blue-600">{{ $cardsAcceptedCount }}</p>
                    </div>
                    <div class="p-4 bg-gray-50 rounded-md border border-gray-200">
                        <p class="text-gray-600 text-sm">Your Card Accepted by Others</p>
                        <p class="text-3xl font-bold text-green-600">{{ $cardsAcceptedByOthersCount }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Shared Cards</h2>
                <p class="text-gray-600 mb-4">
                    This section displays digital business cards that others have shared with you.
                    You can accept them to add them to your contacts.
                </p>
                @if($sharedCards->count()> 0)
                @foreach ($sharedCards as $shared)
                    <div class="mt-4 border border-gray-200 rounded-md p-4 flex items-center justify-between">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $shared->myCard->full_name }} - {{ $shared->myCard->job_title }}</p>
                            <p class="text-sm text-gray-600">{{ $shared->myCard->email }}</p>
                        </div>
                        <a href="{{url('/').'/m/'.$shared->myCard->slug}}" target="_blank" class="bg-blue-500 text-white px-4 py-2 rounded-md text-sm hover:bg-blue-600 transition-colors duration-200">
                            View Card
                        </a>
                    </div>
                @endforeach
                @else
                <div class="border border-gray-200 rounded-md p-4 text-center text-gray-500">
                    No new shared cards at the moment.
                </div>
                @endif


            </div>
        </main>
    </div>
@endsection
