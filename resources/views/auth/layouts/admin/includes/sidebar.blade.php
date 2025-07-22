<!-- Sidebar -->
<aside class="sidebar rounded-lg md:mr-6 mb-6 md:mb-0">
    <h3 class="text-xl font-bold text-gray-900 mb-6">John Doe</h3>
    <ul class="sidebar-menu space-y-2">
        <li><a href="{{ route('dashboard.view') }}" class="{{ Request::is('dashboard.view') ? 'active' : '' }}">My Digital Card</a></li>
        @if (auth()->user()->myCard)
            <li><a href="{{ route('dashboard.card.edit',['myCard'=>auth()->user()->myCard->uuid]) }}" class="{{ Request::is('dashboard/card/edit*') ? 'active' : '' }}">My Card</a></li>
        @else
            <li><a href="{{ route('dashboard.card.create') }}" class="{{ Request::is('dashboard/card/create') ? 'active' : '' }}">My Card</a></li>
        @endif
        <li><a href="{{ route('dashboard.tag.view') }}" class="{{ Request::is('dashboard/tag/view') ? 'active' : '' }}">Manage Tags</a></li>
        <li><a href="{{ route('dashboard.category.view') }}" class="{{ Request::is('dashboard/category/view') ? 'active' : '' }}">Manage Categories</a></li>
        <li><a href="{{ route('dashboard.shared.card.view') }}" class="{{ Request::is('dashboard/shared-card') ? 'active' : '' }}">Shared Cards</a></li>
        <li><a href="{{ route('dashboard.social.create') }}" class="{{ Request::is('dashboard/social-media*') ? 'active' : '' }}">Social Media</a></li>
        @if(auth()->user()->landingPage)
            <li><a href="{{ route('dashboard.landing.edit',['landingPage'=>auth()->user()->landingPage->uuid]) }}" class="{{ Request::is('dashboard/landing-page*') ? 'active' : '' }}"> Landing Page</a></li>
        @else
            <li><a href="{{ route('dashboard.landing.create') }}" class="{{ Request::is('dashboard/landing-page*') ? 'active' : '' }}">Landing Page</a></li>
        @endif
        <li><a href="{{ route('dashboard.profile.view') }}" class="{{ Request::is('dashboard/profile') ? 'active' : '' }}">Profile Settings</a></li>
        <li><a href="{{ route('dashboard.help.view') }}" class="{{ Request::is('dashboard/help') ? 'active' : '' }}">Help & Support</a></li>
        <li><a href="{{ route('dashboard.logout') }}" class="text-red-600 hover:bg-red-100 hover:text-red-700">Logout</a></li>
    </ul>
</aside>
