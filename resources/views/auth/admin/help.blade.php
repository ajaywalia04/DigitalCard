@extends('auth.layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="{{ asset('css/blade/help.css') }}">
@endpush
@section("content")

    <!-- Dashboard Main Content Area -->
    <div class="dashboard-main container">
        @include('auth.layouts.admin.includes.sidebar')


        <!-- Main Content Area - Help & Support -->
        <main id="dashboardMainContent" class="main-content rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-gray-900 mb-6">Help & Support</h1>
            <p class="text-gray-700 mb-8">
                Find answers to common questions or reach out to our support team.
            </p>

            <!-- FAQ Section -->
            <div class="bg-white p-6 rounded-lg shadow-sm mb-8">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Frequently Asked Questions</h2>
                <div class="space-y-4">
                    <div class="faq-item" onclick="toggleFaq(this)">
                        <div class="faq-question">
                            <span>How do I create my digital business card?</span>
                            <span class="faq-arrow">&#9660;</span>
                        </div>
                        <div class="faq-answer">
                            You can create your digital business card by navigating to the "Create My Card" section in the sidebar and filling out the required details.
                        </div>
                    </div>

                    <div class="faq-item" onclick="toggleFaq(this)">
                        <div class="faq-question">
                            <span>Can I share my card with anyone?</span>
                            <span class="faq-arrow">&#9660;</span>
                        </div>
                        <div class="faq-answer">
                            Yes, once your card is created, you can share it via a unique link with anyone, anywhere.
                        </div>
                    </div>

                    <div class="faq-item" onclick="toggleFaq(this)">
                        <div class="faq-question">
                            <span>How do I accept a shared card?</span>
                            <span class="faq-arrow">&#9660;</span>
                        </div>
                        <div class="faq-answer">
                            If someone shares a card link with you, simply click the Accept button on the card page. Once accepted, the card will appear in your Shared Cards section.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Support Form -->
            <div class="bg-white p-6 rounded-lg shadow-sm">
                <h2 class="text-2xl font-semibold text-gray-800 mb-4">Contact Support</h2>
                <p class="text-gray-700 mb-4">
                    Can't find what you're looking for? Send us a message directly.
                </p>
                <form action="{{ route('admin.dashboard.help.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label for="subject">Subject</label>
                        <input type="text" id="subject" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" name="subject" value="{{ old('subject') }}" required placeholder="Subject">
                    </div>
                    <div>
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" rows="5" required class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" placeholder="Describe your issue or question...">{{ old('message') }}</textarea>
                    </div>
                    <div>
                        <button type="submit"
                                class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200 shadow-md transform hover:scale-105">
                            Send Message
                        </button>
                    </div>
                </form>
                 @if ($errors->any())
                        <div class="alert alert-warning mt-6">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>* {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
            </div>
            @if(session('success'))
                <div class="alert alert-success text-center mb-2">
                    {{ session('success') }}
                </div>
            @endif
        </main>
    </div>

  @endsection

@push("scripts")
    <script>
        function toggleFaq(element) {
            const answer = element.querySelector('.faq-answer');
            const arrow = element.querySelector('.faq-arrow');
            answer.classList.toggle('show');
            arrow.classList.toggle('rotate');
        }
    </script>
@endpush
