@extends('layouts.web.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/resetPassword.css') }}">
@endpush

@section('content')

    <div class="reset-password-card-wrapper">
        <div class="reset-password-card bg-white rounded-xl shadow-2xl overflow-hidden">
            <div class="p-8">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">Reset Your Password</h2>
                <p class="text-gray-600 text-center mb-8">Enter your new password below.</p>
                <form action="{{ route('password.update') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <input type="hidden" name="email" value="{{ $email }}">
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 text-left mb-1">New Password</label>
                         <input type="password" id="password" name="password" required autocomplete="password"
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200">
                    </div>
                    <div>
                        <button type="submit"
                                class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200 shadow-md transform hover:scale-105">
                            Reset Password
                        </button>
                    </div>
                </form>
                @if ($errors->any())
                    <div>
                        @foreach ($errors->all() as $error)
                            <p style="color: red;">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

 @endsection

