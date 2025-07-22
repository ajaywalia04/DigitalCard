@extends('auth.layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/createCategory.css') }}">
@endpush
@section("content")
    <!-- Dashboard Main Content Area -->
    <div class="dashboard-main container">

        @include('auth.layouts.admin.includes.sidebar')


        <!-- Main Content Area - Shared Cards -->
        <main id="dashboardMainContent" class="main-content rounded-lg shadow-md">
            <div class="flex items-center justify-between mb-6">
               <h1 class="text-3xl font-bold text-gray-900 mb-6">Manage Your Categories</h1>
                <a href="{{ route("dashboard.category.view")}}" type="button" class="bg-indigo-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-indigo-700 shadow-sm">
                    Back
                </a>
            </div>
            <p class="text-gray-700 mb-6">
                Create, edit  your custom categories to organize your contacts.
            </p>

            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Create Category</h2>
                <form action="{{ route('dashboard.category.store') }}" method="POST" id="addCategoryForm" class="flex flex-col sm:flex-row gap-2 mt-4">
                    @csrf
                    <input type="text" id="newGlobalCategoryInput"  name="name" requierd placeholder="Add new category" class="flex-grow px-3 py-2 border border-gray-300 rounded-md shadow-sm">
                    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-indigo-700">Add Category</button>
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
