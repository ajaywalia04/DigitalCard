@extends('auth.layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/editCard.css') }}">
    @endpush
@section("content")
    <!-- Dashboard Main Content Area -->
    <div class="dashboard-main container">

        @include('auth.layouts.admin.includes.sidebar')


        <!-- Main Content Area - Edit Card Form -->
        <main id="dashboardMainContent" class="main-content rounded-lg shadow-md">
            <div class="card-form-container bg-white rounded-xl shadow-2xl overflow-hidden p-8">
                <h1 class="text-3xl font-bold text-gray-900 text-center mb-8">Edit Your Digital Business Card</h1>

                <form action="{{ route('admin.dashboard.card.update',['mycard'=>$mycard->uuid]) }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Personal Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="fullname">Full Name</label>
                            <input type="text" id="fullname" name="fullname" value="{{ old('fullname', $mycard->fullname) }}"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" required autocomplete="name" placeholder="Jane Doe">
                        </div>
                        <div>
                            <label for="job_title">Job Title</label>
                            <input type="text" id="job_title" name="job_title" value="{{ old('job_title', $mycard->job_title) }}"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" required autocomplete="job-title" placeholder="Lead Product Designer">
                        </div>
                    </div>

                    <!-- Company Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="department">Department</label>
                            <input type="text" id="department" name="department" value="{{ old('department', $mycard->department) }}"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" autocomplete="organization-unit" placeholder="Product Development">
                        </div>
                        <div>
                            <label for="company_name">Company Name</label>
                            <input type="text" id="company_name" name="company_name" value="{{ old('company_name', $mycard->company_name) }}"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" required autocomplete="organization" placeholder="Acme Innovations Inc.">
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" value="{{ $mycard->email }}"  readonly
                             class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" autocomplete="email" placeholder="jane.doe@example.com">
                        </div>
                        <div>
                            <label for="phone_no">Phone Number</label>
                            <input type="tel" id="phone_no" name="phone_no"  value="{{ $mycard->phone_no }}" readonly
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" autocomplete="tel" placeholder="+91 9123445645">
                        </div>
                    </div>

                    <!-- Company Address -->
                    <div>
                        <label for="company_address">Company Address</label>
                        <textarea id="company_address" name="company_address" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" rows="3" autocomplete="street-address" placeholder="123 Business Rd, Suite 456, City, State 12345">{{ old('company_address', $mycard->company_address) }}</textarea>
                    </div>

                    <!-- Bio / Description -->
                    <div>
                        <label for="bio">Bio / Description</label>
                        <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" placeholder="Innovating user experiences with a passion for clean design and intuitive interfaces.">{{ old('bio', $mycard->bio) }}</textarea>
                    </div>

                    <!-- Card Design Options (Dropdown with 5 colors) -->
                    <div>
                        <label for="card_no">Choose Card Color</label>
                        <select id="card_no" name="card_no" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200">
                            <option value="blue" {{ old('card_no', $mycard->card_no) == 'blue' ? 'selected' : '' }}>Blue Professional</option>
                            <option value="green" {{ old('card_no', $mycard->card_no) == 'green' ? 'selected' : '' }}>Green Corporate</option>
                            <option value="maroon" {{ old('card_no', $mycard->card_no) == 'maroon' ? 'selected' : '' }}>Maroon Elegance</option>
                            <option value="gray" {{ old('card_no', $mycard->card_no) == 'gray' ? 'selected' : '' }}>Minimalist Gray</option>
                            <option value="teal" {{ old('card_no', $mycard->card_no) == 'teal' ? 'selected' : '' }}>Teal Modern</option>
                        </select>
                    </div>

                    <!-- Save Changes Button -->
                    <div class="pt-6 mb-2">
                        <button type="submit"
                                class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200 shadow-md transform hover:scale-105">
                            Update Changes
                        </button>
                    </div>
                </form>
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
            </div>
        </main>
    </div>

@endsection
