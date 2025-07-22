<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Business Card</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <meta property="og:title" content="{{ $myCard->full_name }} - Digital Business Card">
    <meta property="og:description" content="View {{ $myCard->full_name }}'s professional digital card.">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0fdfa;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }
        .card-container {
            max-width: 400px;
            width: 100%;
        }
        .icon {
            display: inline-block;
            width: 20px;
            text-align: center;
            margin-right: 8px;
            color: #0d9488;
        }
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #34d399;
        }
    </style>
</head>
<body>
    <div class="card-container bg-white rounded-xl shadow-2xl overflow-hidden transform transition-all duration-300 hover:scale-105 relative">
        @if(session('success'))
            <div class="alert alert-success text-center mb-2">
                {{ session('success') }}
            </div>
        @endif
        <div class="relative bg-teal-700 h-32 flex items-center justify-center">
            <?php
                $initials = strtoupper(collect(explode(' ', trim($myCard->full_name)))
                        ->take(2)
                        ->map(fn($word) => $word[0])
                        ->implode(''));
                ?>
            <img src={{ "https://placehold.co/100x100/0f766e/FFFFFF?text=".$initials }} alt="Profile Picture" class="w-24 h-24 rounded-full border-4 border-white shadow-lg -mb-12 relative z-10 object-cover">
        </div>

        <div class="text-center pt-16 pb-8 px-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">{{ $myCard->full_name}}</h1>
            <p class="text-lg text-teal-600 font-medium mb-2">{{ $myCard->job_title}}</p>
            <p class="text-md text-gray-700 font-semibold mb-2">{{ $myCard->department }}</p>
            <p class="text-md text-gray-800 font-semibold mb-4">{{ $myCard->company_name}}</p>
            <p class="text-gray-600 text-sm leading-relaxed mb-6"> {{ $myCard->bio }} </p>

            <div class="space-y-3 text-left max-w-xs mx-auto">
                <div class="flex items-center text-gray-700">
                    <span class="icon">&#9993;</span>
                    <a href="mailto:jane.doe@example.com" class="text-teal-600 hover:text-teal-800 transition-colors duration-200">{{ $myCard->email }}</a>
                </div>
                <div class="flex items-center text-gray-700">
                    <span class="icon">&#128222;</span>
                    <a href="tel:+1234567890" class="text-teal-600 hover:text-teal-800 transition-colors duration-200">+91 {{ $myCard->phone_no}}</a>
                </div>
                <div class="flex items-center text-gray-700">
                    <span class="icon">&#128205;</span>
                    <span class="text-gray-600">{{ $myCard->company_address}}</span>
                </div>
            </div>
        </div>
        <div class="px-6 pb-6 pt-4">
            <form method="Post" action="{{ route('my.card.accept',['myCard'=>$myCard->slug]) }}">
                @csrf
                <button type="submit" class="w-full bg-teal-600 text-white py-3 rounded-md font-semibold hover:bg-teal-700 transition-colors duration-200 shadow-md mb-2">
                    Accept Card
                </button>
            </form>
            <p class="text-gray-500 text-xs font-medium text-right">
                {{ config('app.name') }}
            </p>
        </div>
    </div>
</body>
</html>
