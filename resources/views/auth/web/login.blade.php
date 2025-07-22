@extends('layouts.web.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/login.css') }}">
@endpush

@section('content')

    <div class="login-card-wrapper">
        <div class="login-card bg-white rounded-xl shadow-2xl overflow-hidden">
            <div class="p-8">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">Welcome Back!</h2>
                <p class="text-gray-600 text-center mb-8">Sign in to manage your digital business cards.</p>
                <form action="{{ route('store.login.form') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 text-left mb-1">Email Address</label>
                        <input type="email" id="email" name="email" required autocomplete="email"
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 text-left mb-1">Password</label>
                        <input type="password" id="password" name="password" required
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember_me" name="remember_me" type="checkbox"
                                   class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="remember_me" class="ml-2 block text-sm text-gray-900">Remember me</label>
                        </div>
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors duration-200">Forgot your password?</a>
                        </div>
                    </div>
                    <div>
                        <button type="submit"
                                class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200 shadow-md transform hover:scale-105">
                            Sign In
                        </button>
                    </div>
                        @if($errors->any())
                            <h6 class="alert alert-warning" role="alert">*{{$errors->first()}}</h6>
                        @endif

                        @if(Session::has('error'))
                            <h6 class="alert alert-warning" role="alert">*{{Session::get('error')}}</h6>
                        @endif
                </form>
                <p class="mt-6 text-center text-sm text-gray-600">
                    Don't have an account?
                    <a href="{{ route('show.registration.page') }}" id="register-link" class="font-medium text-indigo-600 hover:text-indigo-500 transition-colors duration-200">Register here</a>
                </p>
            </div>
        </div>
    </div>

@endsection
