@extends('layouts.web.app')

@push('css')
  <link rel="stylesheet" href="{{ asset('css/blade/forgotPassword.css') }}">
@endpush

@section('content')

    <div class="forgot-password-card-wrapper">
        <div class="forgot-password-card bg-white rounded-xl shadow-2xl overflow-hidden">
            <div class="p-8">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">Forgot Your Password?</h2>
                <p class="text-gray-600 text-center mb-8">Enter your email address below and we'll send you a link to reset your password.</p>
                <form action="{{ route('password.email') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 text-left mb-1">Email Address</label>
                        <input type="email" id="email" name="email" required
                               class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200">
                    </div>
                    <div>
                        <button type="submit"
                                class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200 shadow-md transform hover:scale-105">
                            Send Reset Link
                        </button>
                    </div>
                </form>
                @if (session('status'))
                    <div>{{ session('status') }}</div>
                @endif
            </div>
        </div>
    </div>
@endsection
