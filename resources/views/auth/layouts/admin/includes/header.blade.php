 <!-- Header -->
    <header class="header-gradient text-white py-4 shadow-lg">
        <div class="container flex justify-between items-center">
            <a href="{{ route('dashboard.view') }}" class="text-2xl font-bold tracking-tight">{{ config('app.name') }}</a>
            <nav>
                <ul class="flex space-x-6">
                    <li><a href="{{ route('dashboard.logout')}}" class="bg-white text-indigo-600 px-4 py-2 rounded-full font-semibold hover:bg-gray-100 transition-colors duration-200 shadow">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
