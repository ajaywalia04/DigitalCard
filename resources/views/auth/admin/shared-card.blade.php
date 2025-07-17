@extends('auth.layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/sharedCard.css') }}">
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
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Shared Cards</h1>
            <p class="text-gray-700 mb-6">
                Here you can view digital business cards that others have shared with you.
            </p>
            @if ($sharedCards->count() > 0 || $search)
                <form action="{{ route('admin.dashboard.shared.card.view') }}" method="GET" class="mb-6 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                    <input type="text" name="search" value="{{ $search ?? '' }}" placeholder="Search shared cards by name or company..." class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200">
                    <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200 shadow-sm">
                        Search
                    </button>
                </form>
            @endif

            <div class="space-y-4">
                @if ($sharedCards->count() > 0)
                    @foreach ($sharedCards as $shared)
                        <div class="shared-card-item">
                            <div>
                                <p class="font-semibold text-gray-900 text-lg">{{ $shared->mycard->fullname }}</p>
                                <p class="text-gray-700">{{ $shared->mycard->job_title }} at {{ $shared->mycard->company_name }}</p>
                                @if($shared->mycard && $shared->mycard->cardNotes->isNotEmpty() && !is_null($shared->mycard->cardNotes->first()->note))
                                    <div class="notes-display text-sm text-gray-600 mt-2 mb-6">
                                        <strong>Notes:</strong> <span id="notes-contact3">{{ $shared->mycard->cardNotes->first()->note}} </span>
                                    </div>
                                @endif
                                <div class="tags-display mt-1">
                                    @if($shared->mycard && $shared->mycard->category->isNotEmpty())
                                        <span class="category-tag">{{ $shared->mycard->category->first()->name }}</span>
                                    @endif
                                    @foreach($shared->mycard->tag as $tag)
                                        <span class="tag">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-2 mt-4 sm:mt-0">
                                <a href="{{ route('admin.dashboard.orgainze.card.create',['mycard'=>$shared->mycard->uuid] )}}" class="mt-4 sm:mt-0 bg-gray-700 text-white px-5 py-2 rounded-md font-semibold hover:bg-gray-700 transition-colors duration-200 shadow-sm">
                                    Organize
                                </a>
                                <a href="{{url('/').'/m/'.$shared->mycard->slug }}" target="_blank" class="mt-4 sm:mt-0 bg-blue-600 text-white px-5 py-2 rounded-md font-semibold hover:bg-blue-700 transition-colors duration-200 shadow-sm">
                                    View
                                </a>
                            </div>
                        </div>
                    @endforeach
                    {{-- Pagination links --}}
                     {{ $sharedCards->links() }}
                @elseif($search)
                       <div class="border border-gray-200 rounded-md p-6 text-center text-gray-500 bg-white">
                        <p class="mb-2">No digital business cards have been found.</p>
                    </div>
                @else
                    <!-- No Shared Cards Placeholder (if no cards are present) -->
                    <div class="border border-gray-200 rounded-md p-6 text-center text-gray-500 bg-white">
                        <p class="mb-2">No new digital business cards have been shared with you yet.</p>
                        <p class="text-sm">Check back later or share your card to encourage others to share theirs!</p>
                    </div>
                @endif

            </div>
        </main>
    </div>
@endsection
