@extends('auth.layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/landingPage.css') }}">
@endpush
@section("content")

    <!-- Dashboard Main Content Area -->
    <div class="dashboard-main container">

        @include('auth.layouts.admin.includes.sidebar')

        <!-- Main Content Area - Landing Page Form -->
        <main id="dashboardMainContent" class="main-content rounded-lg shadow-md">
            @if(session('success'))
                <div class="alert alert-success text-center mb-2">
                    {{ session('success') }}
                </div>
            @endif
            <div class="landing-page-form-container bg-white rounded-xl shadow-2xl overflow-hidden p-8">
                <h1 class="text-3xl font-bold text-gray-900 text-center mb-8">Create Your Landing Page Content</h1>
                <form action="{{ route('dashboard.landing.store') }}" method="POST" class="space-y-8">
                    @csrf
                    <!-- Hero Section Details -->
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Hero Section</h2>
                    <div>
                        <label for="main_heading">Main Heading</label>
                        <input type="text" id="main_heading" name="main_heading"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200"
                            required placeholder="Make Connections That Engage, Delight, and Grow">
                    </div>
                    <div>
                        <label for="sub_heading">Sub Heading</label>
                        <input type="text" id="sub_heading" name="sub_heading" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200"
                            placeholder="Hi, I'm Jane! With more than 10 years of experience, I'm ready to help you craft your perfect digital presence.">
                    </div>
                    <!-- About Section Details -->
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 mt-8">About Section</h2>
                    <div>
                        <label for="about_us">About Text</label>
                        <textarea id="about_us" name="about_us" rows="6"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200"
                            placeholder="Jane is a passionate Lead Product Designer..."></textarea>
                    </div>

                    <h2 class="text-xl font-semibold text-gray-800 mb-4 mt-8">Service Section</h2>
                    <div>
                        <label for="service_heading">Service Text</label>
                        <input type="text" id="service_heading" name="service_heading" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200"
                            placeholder="My Services & Key Projects">
                    </div>

                    <!-- Contact Section Details -->
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 mt-8">Contact Section</h2>
                    <div>
                        <label for="contact_sub_heading">Contact Form Description</label>
                        <input type="text" id="contact_sub_heading" name="contact_sub_heading" required
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200"
                            placeholder="Have a project in mind or just want to say hello? Send me a message!">
                    </div>

                    <div>
                        <label for="color_no">Choose Color</label>
                        <select id="color_no" name="color_no" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200">
                            <option value="blue" {{ old('color_no') == 'blue' ? 'selected' : '' }}>Blue Professional</option>
                            <option value="green" {{ old('color_no') == 'green' ? 'selected' : '' }} >Green Corporate</option>
                            <option value="maroon" {{ old('color_no') == 'maroon' ? 'selected' : '' }} >Maroon Elegance</option>
                            <option value="gray" {{ old('color_no') == 'gray' ? 'selected' : '' }}>Minimalist Gray</option>
                            <option value="teal" {{ old('color_no') == 'teal' ? 'selected' : '' }}>Teal Modern</option>
                        </select>
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200 shadow-md transform hover:scale-105">
                            Save Content
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
