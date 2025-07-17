<!-- Header -->
<header class="header-gradient text-white py-4 shadow-lg">
    <div class="container flex justify-between items-center">
        <a href="{{ route('home.page') }}" class="text-2xl font-bold tracking-tight">{{ config('app.name') }}</a>
        <nav>
            <ul class="flex space-x-6">
                @if(auth()->check())
                    <li><a href="{{ route('admin.dashboard') }}"  class="bg-white text-indigo-600 px-4 py-2 rounded-full font-semibold hover:bg-gray-100 transition-colors duration-200 shadow">Dashboard</a></li>
                @else
                    <li><a href="{{ route('show.login.form') }}"  class="bg-white text-indigo-600 px-4 py-2 rounded-full font-semibold hover:bg-gray-100 transition-colors duration-200 shadow">Sign In</a></li>
                    <li><a href="{{ route('show.registration.page') }}"  class="bg-blue-600 text-white px-4 py-2 rounded-full font-semibold hover:bg-blue-700 transition-colors duration-200 shadow">Register</a></li>
                @endif
            </ul>
        </nav>
    </div>
</header>
