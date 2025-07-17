@extends('layouts.web.app')

@push('css')
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc; /* Light blue-gray background */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
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
            background: linear-gradient(to right, #4f46e5, #7c3aed); /* Indigo to Purple */
        }
        .content-section {
            flex-grow: 1;
            padding: 40px 20px;
        }
        h1, h2, h3 {
            color: #1f2937; /* Dark gray text */
            margin-bottom: 1rem;
        }
        p {
            color: #4b5563; /* Medium gray text */
            margin-bottom: 1rem;
        }
        ol {
            list-style-type: decimal;
            margin-left: 20px;
            margin-bottom: 1rem;
            color: #4b5563;
        }
        ul {
            list-style-type: disc;
            margin-left: 20px;
            margin-bottom: 1rem;
            color: #4b5563;
        }
        li {
            margin-bottom: 0.5rem;
        }
    </style>
@endpush

@section('content')

    <div class="content-section container">
        <h1 class="text-4xl font-bold mb-6 text-center">Terms of Service</h1>
        <p class="text-sm text-gray-500 text-center mb-10">Last updated: July 8, 2025</p>

        <h2 class="text-2xl font-semibold mb-4">1. Acceptance of Terms</h2>
        <p>
            By accessing or using the {{ config('app.name') }} website and services ("Service"), you agree to be bound by these Terms of Service ("Terms"). If you disagree with any part of the terms, then you may not access the Service.
        </p>

        <h2 class="text-2xl font-semibold mb-4">2. Your Account</h2>
        <p>
            When you create an account with us, you must provide us with information that is accurate, complete, and current at all times. Failure to do so constitutes a breach of the Terms, which may result in immediate termination of your account on our Service.
        </p>
        <p>
            You are responsible for safeguarding the password that you use to access the Service and for any activities or actions under your password, whether your password is with our Service or a third-party service.
        </p>
        <p>
            You agree not to disclose your password to any third party. You must notify us immediately upon becoming aware of any breach of security or unauthorized use of your account.
        </p>

        <h2 class="text-2xl font-semibold mb-4">3. Content</h2>
        <p>
            Our Service allows you to create, link, store, share and otherwise make available certain information, text, graphics, videos, or other material ("Content"). You are responsible for the Content that you post on or through the Service, including its legality, reliability, and appropriateness.
        </p>
        <p>By posting Content on or through the Service, You represent and warrant that:</p>
        <ol>
            <li>You own the Content, or you have the right to use it and grant us the rights and license as provided in these Terms.</li>
            <li>The posting of your Content on or through the Service does not violate the privacy rights, publicity rights, copyrights, contract rights or any other rights of any person.</li>
        </ol>

        <h2 class="text-2xl font-semibold mb-4">4. Intellectual Property</h2>
        <p>
            The Service and its original content (excluding Content provided by users), features and functionality are and will remain the exclusive property of {{ config('app.name') }} and its licensors. The Service is protected by copyright, trademark, and other laws of both the India and foreign countries. Our trademarks and trade dress may not be used in connection with any product or service without the prior written consent of {{ config('app.name') }}.
        </p>

        <h2 class="text-2xl font-semibold mb-4">5. Links To Other Web Sites</h2>
        <p>
            Our Service may contain links to third-party web sites or services that are not owned or controlled by {{ config('app.name') }}.
        </p>
        <p>
            {{ config('app.name') }} has no control over, and assumes no responsibility for, the content, privacy policies, or practices of any third party web sites or services. You further acknowledge and agree that {{ config('app.name') }} shall not be responsible or liable, directly or indirectly, for any damage or loss caused or alleged to be caused by or in connection with use of or reliance on any such content, goods or services available on or through any such web sites or services.
        </p>

        <h2 class="text-2xl font-semibold mb-4">6. Termination</h2>
        <p>
            We may terminate or suspend your account immediately, without prior notice or liability, for any reason whatsoever, including without limitation if you breach the Terms.
        </p>
        <p>
            Upon termination, your right to use the Service will immediately cease. If you wish to terminate your account, you may simply discontinue using the Service.
        </p>

        <h2 class="text-2xl font-semibold mb-4">7. Governing Law</h2>
        <p>
            These Terms shall be governed and construed in accordance with the laws of India, without regard to its conflict of law provisions.
        </p>

        <h2 class="text-2xl font-semibold mb-4">8. Changes To Terms</h2>
        <p>
            We reserve the right, at our sole discretion, to modify or replace these Terms at any time. If a revision is material, we will try to provide at least 30 days' notice prior to any new terms taking effect. What constitutes a material change will be determined at our sole discretion.
        </p>
    </div>
@endsection
