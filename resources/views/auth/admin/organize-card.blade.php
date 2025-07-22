@extends('auth.layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/organizeCard.css') }}">
@endpush
@section("content")
    <!-- Dashboard Main Content Area -->
    <div class="dashboard-main container">

        @include('auth.layouts.admin.includes.sidebar')


        <!-- Main Content Area - Shared Cards -->
        <main id="dashboardMainContent" class="main-content rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-gray-900 mb-6" id="pageTitle">Edit Notes & Tags for {{ $user->name}}</h1>
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <form action="{{ route('dashboard.orgainze.card.store',['myCard'=>$myCard->uuid]) }}" method="POST" id="notesTagsEditForm" class="space-y-6">
                    @csrf
                    <div>
                        <label for="contactNotes" class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                        <textarea id="contactNotes" name="notes" rows="6" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Add your notes about this contact...">{{ $myCard->cardNotes->first() ? $myCard->cardNotes->first()->note:'' }}</textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tags</label>

                        <div class="scrollable-selection-container mb-4">
                            @if($user->tags->count() > 0)
                                <div id="tagsSelection" class="flex flex-wrap gap-2 p-2 border border-gray-300 rounded-md bg-gray-50">
                                    @foreach($user->tags as $tag)
                                        <div>
                                            <input type="checkbox" id="{{ $tag->uuid}}" name="tags[]" value="{{ optional($tag)->id }}"
                                             {{ in_array(optional($tag)->id, $tagIds) ? 'checked' : '' }} class="select-item-checkbox">
                                            <label for="{{ $tag->uuid }}"  class="select-item-label">{{$tag->name}}</label>
                                        </div>
                                    @endforeach

                                </div>

                            @else
                                <div class="border border-gray-200 rounded-md p-6 text-center text-gray-500 bg-white">
                                    <p class="mb-2">No tags have been created yet.</p>
                                </div>
                            @endif
                        </div>

                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Categories</label>
                        <div class="scrollable-selection-container mb-4">
                             @if($user->categories->count() > 0)
                            <div id="categoriesSelection" class="flex flex-wrap gap-2 p-2 border border-gray-300 rounded-md bg-gray-50">
                                @foreach($user->categories as $category)
                                    <div>
                                        <input id="{{ $category->uuid }}" type="radio" value="{{ optional($category)->id }}"
                                        {{ $categoryId == optional($category)->id ? 'checked' : '' }}  name="category" class="select-item-radio">
                                        <label for="{{ $category->uuid }}" class="select-item-label">{{ $category->name}}</label>
                                    </div>
                                @endforeach

                            </div>
                            @else
                                <div class="border border-gray-200 rounded-md p-6 text-center text-gray-500 bg-white">
                                    <p class="mb-2">No category have been created yet.</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="flex justify-end space-x-3 mt-6">
                        <a href="{{ route('dashboard.shared.card.view') }}" type="button" id="cancelNotesTagsEdit" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md font-semibold hover:bg-gray-300 transition-colors duration-200">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200">Save Changes</button>
                    </div>
                </form>
                @if($errors->any())
                    <h6 class="alert alert-warning mt-6" role="alert">*{{$errors->first()}}</h6>
                @endif
            </div>
        </main>
    </div>
@endsection
