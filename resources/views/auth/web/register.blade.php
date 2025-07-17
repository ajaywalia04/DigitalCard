@extends('layouts.web.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/register.css') }}">
@endpush

@section('content')

    <div class="register-card-wrapper">
        <div class="register-card bg-white rounded-xl shadow-2xl overflow-hidden">
            <div class="p-8">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">Join {{ config('app.name') }}!</h2>
                <p class="text-gray-600 text-center mb-8">Create your account and start building your digital presence.</p>
                <form action="{{ route('store.registration.page.data') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 text-left mb-1">Full Name</label>
                        <input type="text" id="name" name="name" required autocomplete="name"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200">
                        @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 text-left mb-1">Email Address</label>
                        <input type="email" id="email" name="email" required autocomplete="email"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200">
                        @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 text-left mb-1">Password</label>
                        <input type="password" id="password" name="password" required autocomplete="new-password"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200">
                        @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div>
                        <button type="submit"
                                class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200 shadow-md transform hover:scale-105">
                            Register
                        </button>
                    </div>
                </form>
                <p class="mt-6 text-center text-sm text-gray-600">
                    Already have an account?
                    <a href="{{ route('show.login.form') }}" id="login-link" class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors duration-200">Sign in here</a>
                </p>
            </div>
        </div>
    </div>
@endsection
