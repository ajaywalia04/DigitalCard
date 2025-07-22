@extends('auth.layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/socialMedia.css') }}">
@endpush
@section("content")

    <!-- Dashboard Main Content Area -->
    <div class="dashboard-main container">

        @include('auth.layouts.admin.includes.sidebar')

        <!-- Main Content Area - Social Media Settings Form -->
        <main id="dashboardMainContent" class="main-content rounded-lg shadow-md">
             @if(session('success'))
                <div class="alert alert-success text-center mb-2">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card-form-container bg-white rounded-xl shadow-2xl overflow-hidden p-8">
                <h1 class="text-3xl font-bold text-gray-900 text-center mb-8">Manage Social Media Links</h1>

                <form action="{{ route('dashboard.social.store')}}" method="POST" class="space-y-6">
                    @csrf
                    <p class="text-sm text-gray-600 mb-4">
                        Add links to your professional social media profiles.
                    </p>
                    <div>
                        <label for="linkedin_url">LinkedIn Profile URL</label>
                        <input type="text" id="linkedin_url" name="social[linkdin]"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200"
                            value="{{ $socialLinks['linkdin'] ?? '' }}" placeholder="https://linkedin.com/in/janedoe">
                    </div>
                    <div>
                        <label for="twitter_url">Twitter/X Profile URL</label>
                        <input type="text" id="twitter_url" name="social[twitter]"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200"
                            value="{{ $socialLinks['twitter'] ?? '' }}" placeholder="https://twitter.com/janedoe">
                    </div>
                    <div>
                        <label for="instagram_url">Instagram Profile URL</label>
                        <input type="text" id="instagram_url" name="social[instagram]"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200"
                            value="{{ $socialLinks['instagram'] ?? '' }}" placeholder="https://instagram.com/janedoe">
                    </div>
                    <div>
                        <label for="facebook_url">Facebook Profile URL</label>
                        <input type="text" id="facebook_url" name="social[facebook]"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200"
                            value="{{ $socialLinks['facebook'] ?? '' }}" placeholder="https://facebook.com/janedoe">
                    </div>
                    <div>
                        <label for="youtube_url">YouTube Channel URL</label>
                        <input type="text" id="youtube_url" name="social[youtube]"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200"
                            value="{{ $socialLinks['youtube'] ?? '' }}" placeholder="https://youtube.com/c/janedoe">
                    </div>
                    <div>
                        <label for="github_url">GitHub Profile URL</label>
                        <input type="text" id="github_url" name="social[github]"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200"
                            value="{{ $socialLinks['github'] ?? '' }}" placeholder="https://github.com/janedoe">
                    </div>
                    <div>
                        <label for="website_url">Personal Website/Portfolio URL</label>
                        <input type="text" id="website_url" name="social[webiste]"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200"
                            value="{{ $socialLinks['webiste'] ?? '' }}" placeholder="https://janedoe.com">
                    </div>

                    <div class="pt-6">
                        <button type="submit"
                                class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200 shadow-md transform hover:scale-105">
                            Save Changes
                        </button>
                    </div>
                </form>
            </div>
            @if ($errors->any())
                <div class="alert alert-warning">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>* {{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </main>
    </div>
@endsection
