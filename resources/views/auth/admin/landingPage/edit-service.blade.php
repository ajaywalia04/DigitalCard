@extends('auth.layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/createService.css') }}">
@endpush
@section("content")

    <!-- Dashboard Main Content Area -->
    <div class="dashboard-main container">

        @include('auth.layouts.admin.includes.sidebar')

        <!-- Main Content Area - Edit Card Form -->
        <main id="dashboardMainContent" class="main-content rounded-lg shadow-md">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Your Service</h1>
                <a href="{{ route("dashboard.landing.service.view")}}" type="button" class="bg-indigo-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-indigo-700 shadow-sm">
                    Back
                </a>
            </div>
            <div class="card-form-container bg-white rounded-xl shadow-2xl overflow-hidden p-8">

                <form action="{{ route('dashboard.landing.service.update',['landingService'=>$landingService->uuid]) }}" method="POST" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="heading">Heading</label>
                            <input type="text" id="heading" name="heading" value="{{ $landingService->heading }}"
                                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" required placeholder="Product Strategy & Vision">
                        </div>
                    </div>

                    <div>
                        <label for="sub_heading">Sub heading</label>
                        <textarea id="sub_heading" name="sub_heading"
                                class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" rows="3" placeholder="Defining clear product roadmaps and strategic initiatives to align with business goals and market needs.">{{ $landingService->sub_heading }}</textarea>
                    </div>

                    <div>
                        <label for="icon">Choose icon</label>
                        <select id="icon" name="icon" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200">
                            <option value="1" {{ $landingService->icon  == '1' ? 'selected' : '' }}>💡</option>
                            <option value="2" {{ $landingService->icon  == '2' ? 'selected' : '' }} >🎨</option>
                            <option value="3" {{ $landingService->icon  == '3' ? 'selected' : '' }} >📊</option>
                            <option value="4" {{ $landingService->icon  == '4' ? 'selected' : '' }}>🛠️</option>
                            <option value="5" {{ $landingService->icon  == '5' ? 'selected' : '' }}>🚀</option>
                            <option value="6" {{ $landingService->icon  == '6' ? 'selected' : '' }}>🤝</option>
                        </select>
                    </div>

                    <!-- Save Changes Button -->
                    <div class="pt-6">
                        <button type="submit"
                                class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200 shadow-md transform hover:scale-105">
                            Update Changes
                        </button>
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

                    @if(Session::has('error'))
                        <h6 class="alert alert-warning" role="alert">*{{Session::get('error')}}</h6>
                    @endif
                </form>
            </div>
        </main>
    </div>

@endsection
