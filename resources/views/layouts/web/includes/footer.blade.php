 <!-- Footer -->
<footer class="bg-gray-900 text-gray-400 py-10">
    <div class="container text-center text-sm">
        <p>&copy; 2025 {{ config('app.name') }}. All rights reserved.</p>
        <div class="mt-4 space-x-4">
            <a href="{{ route('privacy.page') }}" class="hover:text-white transition-colors duration-200">Privacy Policy</a>
            <a href="{{ route('terms.page') }}" class="hover:text-white transition-colors duration-200">Terms of Service</a>
        </div>
    </div>
</footer>
