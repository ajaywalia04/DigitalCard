@extends('auth.layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/category.css') }}">
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
               <h1 class="text-3xl font-bold text-gray-900 mb-6">Manage Your Categories</h1>
                <a href="{{ route("dashboard.category.create")}}" type="button" class="bg-indigo-600 text-white px-4 py-2 rounded-md font-semibold hover:bg-indigo-700 shadow-sm">
                    Create
                </a>
            </div>
            <p class="text-gray-700 mb-6">
                Create and edit your custom categories to organize your contacts.
            </p>

            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Your Categories</h2>
                <div class="scrollable-table-container mb-4">
                    @if($categories->count() >0)
                    <table class="manage-table">
                        <thead>
                            <tr>
                                <th class="w-2/3">Category Name</th>
                                <th class="w-1/3 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="currentTagsTableBody">
                            <!-- Hardcoded tags for design demonstration -->

                            @foreach($categories as $category)
                            <tr>
                                <td><span class="item-display-text">{{ $category->name}}</span></td>
                                <td>
                                        <a href="{{ route('dashboard.category.edit',['category'=>$category->uuid]) }}" class="manage-item-button edit">Edit</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                        <div id="noCategoriesMessage" class="p-4 text-center text-gray-500">No custom Category yet.</div>
                    @endif
                </div>
            </div>
        </main>
    </div>
@endsection
