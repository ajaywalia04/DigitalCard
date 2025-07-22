<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #fff7ed; /* Light orange-gray background */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            color: #334155; /* Slate-700 for general text */
        }
        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .hero-section {
            background: linear-gradient(to right, #b91c1c, #991b1b); /* Red-700 to Red-800 */
            padding: 60px 0 80px;
            position: relative;
            overflow: hidden;
            color: white;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 600px;
        }

        @media (min-width: 768px) {
            .hero-content-wrapper {
                display: flex;
                justify-content: space-between;
                align-items: center;
                text-align: left;
                gap: 40px;
            }
            .hero-text-content {
                flex: 1;
                max-width: 50%;
            }
            .hero-image-content {
                flex: 1;
                max-width: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        }

        .hero-card-display-wrapper {
            position: relative;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            animation: pulse 2s infinite ease-in-out alternate;
        }
        @keyframes pulse {
            0% { box-shadow: 0 10px 30px rgba(0,0,0,0.3); transform: scale(1); }
            100% { box-shadow: 0 15px 40px rgba(0,0,0,0.4); transform: scale(1.02); }
        }

        .hero-card-display {
            width: 200px;
            height: 120px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            overflow: hidden;
            border: 3px solid #ffffff;
            transform: rotateY(10deg) rotateX(5deg);
            transition: transform 0.3s ease-in-out;
        }
        .hero-card-display:hover {
            transform: rotateY(0deg) rotateX(0deg) scale(1.05);
        }
        .hero-card-display img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 8px;
        }

        .floating-icon {
            position: absolute;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2rem;
            color: white;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            animation: float-around 10s infinite ease-in-out;
        }
        .floating-icon:nth-child(1) { top: 10%; left: 15%; animation-delay: 0s; }
        .floating-icon:nth-child(2) { bottom: 20%; right: 10%; animation-delay: 2s; }
        .floating-icon:nth-child(3) { top: 50%; left: -10%; animation-delay: 4s; }
        .floating-icon:nth-child(4) { top: -5%; right: 40%; animation-delay: 6s; }

        @keyframes float-around {
            0%, 100% { transform: translate(0, 0); }
            25% { transform: translate(10px, -10px); }
            50% { transform: translate(-10px, 10px); }
            75% { transform: translate(5px, -5px); }
        }

        .section-spacing {
            padding: 60px 0;
        }
        .social-icon-wrapper {
            display: inline-block;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            background-color: #1f2937;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: transform 0.2s ease-in-out, background-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .social-icon-wrapper:hover {
            transform: scale(1.1);
            background-color: #374151;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }
        .social-icon-wrapper img {
            width: 1.25rem;
            height: 1.25rem;
            object-fit: contain;
        }
        .btn-primary-hero {
            background: linear-gradient(to right, #ef4444, #dc2626); /* Red-500 to Red-600 */
            @apply text-white px-8 py-3 rounded-full font-semibold hover:opacity-90 transition-all duration-300 shadow-lg transform hover:-translate-y-1;
        }
        .btn-secondary-hero {
            @apply bg-transparent text-white border border-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-red-600 transition-all duration-300 transform hover:-translate-y-1;
        }

        .contact-form input[type="text"],
        .contact-form input[type="email"],
        .contact-form textarea {
            @apply mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm transition-all duration-200;
        }
        .contact-form label {
            @apply block text-sm font-medium text-gray-700 text-left mb-1;
        }

        .service-card {
            background-color: #ffffff;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        }
        .service-icon {
            font-size: 3rem;
            color: #b91c1c; /* Red-700 */
            margin-bottom: 1rem;
        }
        .service-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.75rem;
        }
        .service-card p {
            color: #4b5563;
            line-height: 1.6;
        }
        .alert-warning {
            background-color: #fffbeb;
            color: #92400e;
            border: 1px solid #fcd34d;
        }
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #34d399;
        }
    </style>
</head>
<body>

    <!-- User's Hero Section -->
    <section class="hero-section">
        <div class="container relative z-10 hero-content-wrapper">
            <!-- Left Column: Text Content -->
            <div class="hero-text-content">
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight mb-4 text-white">
                    {{ $landingPage->main_heading }}
                </h1>
                <p class="text-lg text-red-100 leading-relaxed mb-8">
                   {{ $landingPage->sub_heading }}
                </p>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 mb-12">
                    <a href="#contact" class="btn-primary-hero">Get in Touch</a>
                    <a href="#services" class="btn-secondary-hero">View My Work &rarr;</a>
                </div>
            </div>

            <!-- Right Column: Card Display with Floating Icons -->
            <div class="hero-image-content">
                <div class="hero-card-display-wrapper">
                    <!-- Placeholder for the user's main digital card design -->
                    <img src="https://placehold.co/200x120/b91c1c/FFFFFF?text=Hello" alt="Digital Business Card" class="hero-card-display">
                    <!-- Floating Icons (placeholders) -->
                    <div class="floating-icon" style="top: 10%; left: 15%;">✨</div>
                    <div class="floating-icon" style="bottom: 20%; right: 10%;">🔗</div>
                    <div class="floating-icon" style="top: 23%; left: 88%;">💡</div>
                    <div class="floating-icon" style="top: -5%; right: 40%;">🚀</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Area -->
    <main class="bg-white pt-12 pb-12 shadow-lg rounded-b-xl">
        <!-- About Section -->
        <section class="section-spacing bg-gray-50 rounded-xl mx-auto max-w-2xl px-6 py-12 shadow-inner">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">About Us</h2>
            <p class="text-lg text-gray-700 leading-relaxed text-center">
               {{ $landingPage->about_us }}
            </p>
        </section>

        <!-- Services / Projects Section -->
        <section class="section-spacing" id="services">
            <div class="container">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-10">{{ $landingPage->service_heading }}</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Service/Project Card 1 -->
                     @foreach ($services as $service )
                        <div class="service-card">
                            <span class="service-icon">
                                @switch($service->icon)
                                    @case('1')
                                        💡
                                        @break

                                    @case('2')
                                        🎨
                                        @break

                                    @case('3')
                                        📊
                                        @break

                                    @case('4')
                                        🛠️
                                        @break

                                    @case('5')
                                        🚀
                                        @break

                                    @case('6')
                                        🤝
                                        @break
                                    @default

                                @endswitch
                            </span> <!-- Lightbulb icon -->
                            <h3>{{ $service->heading }}</h3>
                            <p class="text-gray-600">
                                {{ $service->sub_heading }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Contact Form Section -->
        <section id="contact" class="section-spacing bg-gray-50 rounded-xl mx-auto max-w-2xl px-6 py-12 shadow-inner">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">Get in Touch</h2>
            <p class="text-lg text-gray-700 text-center mb-8">
                 {{ $landingPage->contact_sub_heading }}
            </p>
            <form action="{{ route('landing.contact.store',['landingPage'=> $landingPage->uuid])}}" method="POST" class="space-y-6 contact-form">
                @csrf
                <div>
                    <label for="contact_name">Your Name</label>
                    <input type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" id="contact_name" name="name" required placeholder="John Doe">
                </div>
                <div>
                    <label for="contact_email">Your Email</label>
                    <input type="email" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" id="contact_email" name="email" required placeholder="john.doe@example.com">
                </div>
                <div>
                    <label for="contact_message">Your Message</label>
                    <textarea id="contact_message" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm transition-all duration-200" name="message" rows="5" required placeholder="Tell me about your project or question..."></textarea>
                </div>
                <div>
                    <button type="submit" class="w-full bg-indigo-600 text-white py-3 px-4 rounded-md font-semibold hover:bg-indigo-700 transition-colors duration-200 shadow-md transform hover:scale-105">Send Message</button>
                </div>
            </form>
            @if($errors->any())
                <h6 class="alert alert-warning mt-2" role="alert">*{{$errors->first()}}</h6>
            @endif
            @if(session('success'))
                <div class="alert alert-success text-center mt-2 mb-2">
                    {{ session('success') }}
                </div>
            @endif
        </section>
        @if($socialMedias->count() > 0)
            <section  class="section-spacing">
                <h2 class="text-3xl font-bold text-center text-gray-900 mb-6">Connect with me:</h2>

                <div class="mt-8 pt-4">
                    <div class="flex justify-center flex-wrap gap-4">
                        <!-- LinkedIn -->
                        @foreach ($socialMedias as $social )
                        <a href="{{ $social->link }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $social->name }}">
                            <span class="social-icon-wrapper">
                                <img src={{ "https://placehold.co/40x40/ffffff/000000?text=". strtoupper(substr($social->name, 0, 2)) }} alt="{{ $social->name }} Icon">
                            </span>
                        </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-300 py-10">
        <div class="container text-center text-sm">
            <p>2025 DigitalCardPro. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
