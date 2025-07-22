@extends('auth.layouts.admin.app')

@push('css')
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #fff7ed;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .header-gradient {
            background: linear-gradient(to right, #4f46e5, #7c3aed);
        }
        .dashboard-main {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            padding: 20px 0;
        }
        @media (min-width: 768px) {
            .dashboard-main {
                flex-direction: row;
            }
        }
        .sidebar {
            width: 100%;
            background-color: #ffffff;
            border-right: 1px solid #e2e8f0;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        @media (min-width: 768px) {
            .sidebar {
                min-width: 250px;
                max-width: 250px;
                height: auto;
            }
        }
        .main-content {
            flex-grow: 1;
            background-color: #f8fafc;
            padding: 20px;
        }
        .sidebar-menu li a {
            display: block;
            padding: 10px 15px;
            border-radius: 8px;
            color: #4b5563;
            font-weight: 500;
            transition: all 0.2s ease-in-out;
        }
        .sidebar-menu li a:hover {
            background-color: #e0e7ff;
            color: #4f46e5;
        }
        .sidebar-menu li a.active {
            background-color: #4f46e5;
            color: #ffffff;
        }
        .card-display-container {
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
        }
        .card-display-icon {
            display: inline-block;
            width: 20px;
            text-align: center;
            margin-right: 8px;
            color: #b91c1c;
        }
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #34d399;
        }
    </style>
@endpush
@section('content')

    <!-- Dashboard Main Content Area -->
    <div class="dashboard-main container">

        @include('auth.layouts.admin.includes.sidebar')

        <!-- Main Content Area - View My Card -->
        <main id="dashboardMainContent" class="main-content rounded-lg shadow-md">
             @if(session('success'))
                <div class="alert alert-success text-center mb-2">
                    {{ session('success') }}
                </div>
            @endif
            <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Your Digital Business Card</h1>
            <p class="text-gray-700 mb-8 text-center">
                This is how your digital business card appears to others.
            </p>

            <!-- Digital Business Card Display - Maroon Elegance -->
            <div class="card-display-container bg-white rounded-xl shadow-2xl overflow-hidden relative">
                <div class="relative bg-red-800 h-32 flex items-center justify-center">
                    <?php
                        $initials = strtoupper(collect(explode(' ', trim($myCard->full_name)))
                                ->take(2)
                                ->map(fn($word) => $word[0])
                                ->implode(''));
                        ?>
                    <img src={{ "https://placehold.co/100x100/7f1d1d/FFFFFF?text=".$initials}} alt="Profile Picture" class="w-24 h-24 rounded-full border-4 border-white shadow-lg -mb-12 relative z-10 object-cover">
                </div>

                <div class="text-center pt-16 pb-8 px-6">
                    <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $myCard->full_name}}</h1>
                    <p class="text-lg text-red-700 font-medium mb-2">{{ $myCard->job_title}}</p>
                    <p class="text-md text-gray-700 font-semibold mb-2">{{ $myCard->department }}</p>
                    <p class="text-md text-gray-800 font-semibold mb-4">{{ $myCard->company_name}}</p>
                    <p class="text-gray-600 text-sm leading-relaxed mb-6">
                        {{ $myCard->bio }}
                    </p>

                    <div class="space-y-3 text-left max-w-xs mx-auto">
                        <div class="flex items-center text-gray-700">
                            <span class="card-display-icon">&#9993;</span>
                            <span class="text-red-700">{{ $myCard->email }}</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <span class="card-display-icon">&#128222;</span>
                            <span class="text-red-700">+91 {{ $myCard->phone_no}}</span>
                        </div>
                        <div class="flex items-center text-gray-700">
                            <span class="card-display-icon">&#128205;</span>
                            <span class="text-gray-600">{{ $myCard->company_address}}</span>
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-4 right-4 text-gray-500 text-xs font-medium">
                    {{ config('app.name') }}
                </div>
            </div>

            <div class="flex flex-col sm:flex-row justify-center gap-4 mt-6">
                <a href="{{url('/').'/m/'.$myCard->slug}}"  target="_blank" class="bg-white text-indigo-700 px-8 py-4 rounded-full font-bold shadow-lg hover:bg-gray-100 transition-transform transform hover:scale-105 duration-300">
                    Share My Card
                </a>
                <a href="https://wa.me/?text={{ urlencode('Check out my digital card: ' . url('/').'/m/'.$myCard->slug) }}" target="_blank" class="bg-green-500 text-white px-8 py-4 rounded-full font-bold shadow-lg hover:bg-green-600 transition-transform transform hover:scale-105 duration-300 flex items-center justify-center">
                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.04 2C7.03 2 3 6.03 3 11.04c0 1.78.5 3.45 1.37 4.93L3.5 21.5l5.7-1.5c1.47.87 3.14 1.37 4.93 1.37C17.05 21.04 21 17.01 21 12.04 21 7.03 16.97 2 12.04 2zM16.5 14.5c-.2-.1-.8-.4-1.1-.5-.3-.1-.5-.1-.7.1s-.8.9-1 .9c-.2 0-.4-.1-.6-.2-.2-.1-.8-.3-1.5-.9-.6-.5-1-1.2-1.2-1.6-.1-.2 0-.3.1-.4.1-.1.2-.2.3-.3.1-.1.2-.2.3-.3.1-.1.1-.2 0-.3-.1-.1-.7-1.7-.9-2.3-.2-.6-.4-.5-.6-.5h-.4c-.2 0-.5.1-.7.2-.2.1-.8.8-.8 1.9s.8 2.2.9 2.4c.1.2 1.6 2.5 3.9 3.5 2.3 1 2.9.8 3.4.7.5-.1 1.2-.5 1.4-.8.2-.3.2-.5.1-.7z"/>
                    </svg>
                    Share on WhatsApp
                </a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-sm mt-8 text-center">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Scan to Share</h2>
                <img src="{{ asset('storage/qrcodes/card-' . $myCard->uuid . '.png') }}" alt="QR Code to share business card" class="mx-auto rounded-lg shadow-md" width="100" height="100">
                <p class="text-gray-600 text-sm mt-4">Scan this QR code to quickly share your digital business card.</p>
            </div>
        </main>
    </div>

@endsection

