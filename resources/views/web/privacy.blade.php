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
        <h1 class="text-4xl font-bold mb-6 text-center">Privacy Policy</h1>
        <p class="text-sm text-gray-500 text-center mb-10">Last updated: July 8, 2025</p>

        <h2 class="text-2xl font-semibold mb-4">1. Introduction</h2>
        <p>
            Welcome to {{ config('app.name') }}. We are committed to protecting your privacy. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website and use our services.
        </p>

        <h2 class="text-2xl font-semibold mb-4">2. Information We Collect</h2>
        <h3 class="text-xl font-semibold mb-2">Personal Data:</h3>
        <p>
            When you register for an account, create a digital business card, or contact us, we may collect personally identifiable information, such as your:
        </p>
        <ul>
            <li>Name</li>
            <li>Email address</li>
            <li>Business name</li>
            <li>Job title</li>
            <li>Department</li>
            <li>Company address</li>
            <li>Phone number</li>
            <li>Any other information you choose to provide on your digital business card.</li>
        </ul>
        <h3 class="text-xl font-semibold mb-2">Usage Data:</h3>
        <p>
            We may also collect information about how the Service is accessed and used. This Usage Data may include information such as your computer's Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that you visit, the time and date of your visit, the time spent on those pages, unique device identifiers and other diagnostic data.
        </p>

        <h2 class="text-2xl font-semibold mb-4">3. How We Use Your Information</h2>
        <p>We use the collected data for various purposes:</p>
        <ul>
            <li>To provide and maintain our Service</li>
            <li>To notify you about changes to our Service</li>
            <li>To allow you to participate in interactive features of our Service when you choose to do so</li>
            <li>To provide customer support</li>
            <li>To gather analysis or valuable information so that we can improve our Service</li>
            <li>To monitor the usage of our Service</li>
            <li>To detect, prevent and address technical issues</li>
            <li>To create and manage your digital business card</li>
        </ul>

        <h2 class="text-2xl font-semibold mb-4">4. Disclosure Of Data</h2>
        <p>We may disclose your Personal Data in the good faith belief that such action is necessary to:</p>
        <ul>
            <li>To comply with a legal obligation</li>
            <li>To protect and defend the rights or property of {{ config('app.name') }}</li>
            <li>To prevent or investigate possible wrongdoing in connection with the Service</li>
            <li>To protect the personal safety of users of the Service or the public</li>
            <li>To protect against legal liability</li>
        </ul>

        <h2 class="text-2xl font-semibold mb-4">5. Security Of Data</h2>
        <p>
            The security of your data is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Data, we cannot guarantee its absolute security.
        </p>

        <h2 class="text-2xl font-semibold mb-4">6. Your Data Protection Rights</h2>
        <p>
            Depending on your location, you may have the following data protection rights:
        </p>
        <ul>
            <li>The right to access, update or to delete the information we have on you.</li>
            <li>The right of rectification.</li>
            <li>The right to object.</li>
            <li>The right of restriction.</li>
            <li>The right to data portability.</li>
            <li>The right to withdraw consent.</li>
        </ul>
        <p>
            Please note that we may ask you to verify your identity before responding to such requests.
        </p>

        <h2 class="text-2xl font-semibold mb-4">7. Changes To This Privacy Policy</h2>
        <p>
            We may update our Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page.
        </p>
        <p>
            We will let you know via email and/or a prominent notice on our Service, prior to the change becoming effective and update the "last updated" date at the top of this Privacy Policy.
        </p>
        <p>
            You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.
        </p>

        <h2 class="text-2xl font-semibold mb-4">8. Contact Us</h2>
        <p>
            If you have any questions about this Privacy Policy, please contact us:
        </p>
        <ul>
            <li>By email: support@{{ config('app.name') }}.com</li>
        </ul>
    </div>

@endsection
