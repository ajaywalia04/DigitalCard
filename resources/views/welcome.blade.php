@extends('layouts.web.app')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/welcome.css') }}">
@endpush
@section('content')

    <!-- Hero Section -->
    <section class="hero-gradient text-white py-20 md:py-24 text-center">
        <div class="container">
            @if (session('error'))
                <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif
            <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-6">
                Revolutionize Your Networking with Digital Business Cards
            </h1>
            <p class="text-xl md:text-2xl mb-10 max-w-3xl mx-auto">
                Create stunning, interactive, and eco-friendly digital business cards in minutes.
                Share your professional identity effortlessly.
            </p>
            <a href="{{ route('show.registration.page') }}" class="bg-white text-indigo-700 px-8 py-4 rounded-full text-lg font-bold shadow-lg hover:bg-gray-100 transition-transform transform hover:scale-105 duration-300">
                Create Your Free Card Now!
            </a>

            <!-- Digital Business Card Image Placeholder -->
            <div class="mt-16 flex justify-center">
                <img src="https://placehold.co/400x250/ffffff/1e3a8a?text=Your+Digital+Business+Card"
                     alt="Example Digital Business Card"
                     class="rounded-xl shadow-2xl border-4 border-white transform rotate-3 hover:rotate-0 transition-transform duration-500"
                     style="max-width: 80%; height: auto;">
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-16 md:py-20 bg-white">
        <div class="container text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-12">Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="p-8 rounded-lg shadow-md bg-gray-50 hover:shadow-xl transition-shadow duration-300">
                    <div class="text-4xl mb-4 text-blue-600">&#9889;</div>
                    <h3 class="text-xl font-semibold mb-3">Instant Sharing</h3>
                    <p class="text-gray-700">Share your card via link, whatsapp, QR with a tap. No more need for paper cards.</p>
                </div>
                <div class="p-8 rounded-lg shadow-md bg-gray-50 hover:shadow-xl transition-shadow duration-300">
                    <div class="text-4xl mb-4 text-green-600">&#127793;</div>
                    <h3 class="text-xl font-semibold mb-3">Eco-Friendly</h3>
                    <p class="text-gray-700">Reduce your carbon footprint. Digital cards are sustainable and always up-to-date.</p>
                </div>
                <div class="p-8 rounded-lg shadow-md bg-gray-50 hover:shadow-xl transition-shadow duration-300">
                    <div class="text-4xl mb-4 text-purple-600">&#128172;</div>
                    <h3 class="text-xl font-semibold mb-3">Always Current</h3>
                    <p class="text-gray-700">Update your details anytime, anywhere. Your contacts will always have your latest info.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 md:py-20 bg-gray-50">
        <div class="container text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-12">
                Design Your Professional Identity
            </h2>
            <div class="flex flex-col md:flex-row items-center justify-center gap-10">
                <div class="showcase-card bg-white rounded-xl shadow-2xl overflow-hidden relative">
                    <div class="relative bg-blue-800 h-24 flex items-center justify-center">
                        <img src="https://placehold.co/80x80/1e3a8a/FFFFFF?text=JD" alt="Profile Picture" class="profile-img rounded-full border-3 border-white shadow-lg -mb-10 relative z-10 object-cover">
                    </div>

                    <div class="text-center pt-12 pb-6 px-4">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">Jane Doe</h3>
                        <p class="text-md text-blue-700 font-medium mb-1">Lead Product Designer</p>
                        <p class="text-sm text-gray-800 font-semibold mb-3">Acme Innovations Inc.</p>

                        <div class="space-y-2 text-left text-sm max-w-[250px] mx-auto">
                            <div class="flex items-center text-gray-700">
                                <span class="icon">&#9993;</span>
                                <span class="text-blue-700">jane.doe@example.com</span>
                            </div>
                            <div class="flex items-center text-gray-700">
                                <span class="icon">&#128222;</span>
                                <span class="text-blue-700">+91 2345 6789</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-left md:w-1/2">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">
                        Craft a Card That Stands Out
                    </h3>
                    <p class="text-lg text-gray-700 mb-4">
                        Your digital business card is a reflection of your professional brand.
                        With {{ config('app.name') }}, you have complete control over its design.
                    </p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>Organize your card on the basis of tag and category.</li>
                        <li>Share your card and accept cards from others.</li>
                        <li>Add your company name, designation, and a compelling bio.</li>
                    </ul>
                    <p class="text-gray-700 mt-4">
                        Make a lasting impression with a card that's as unique as you are.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="py-16 md:py-20 bg-indigo-600 text-white text-center">
        <div class="container">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Make Your Mark?</h2>
            <p class="text-xl mb-10 max-w-2xl mx-auto">
                Join thousands of professionals who are transforming their networking experience.
            </p>
            <a href="{{ route('show.registration.page') }}" class="bg-white text-indigo-700 px-8 py-4 rounded-full text-lg font-bold shadow-lg hover:bg-gray-100 transition-transform transform hover:scale-105 duration-300">
                Get Started Today!
            </a>
        </div>
    </section>

@endsection
