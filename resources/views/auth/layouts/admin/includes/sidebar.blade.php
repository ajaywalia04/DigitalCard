<!-- Sidebar -->
<aside class="sidebar rounded-lg md:mr-6 mb-6 md:mb-0">
    <h3 class="text-xl font-bold text-gray-900 mb-6">John Doe</h3>
    <ul class="sidebar-menu space-y-2">
        <li><a href="{{ route('admin.dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">My Digital Card</a></li>
        @if (auth()->user()->mycard)
            <li><a href="{{ route('admin.dashboard.card.edit',['mycard'=>auth()->user()->mycard->uuid]) }}" class="{{ Request::is('dashboard/card/edit') ? 'active' : '' }}">Edit My Card</a></li>

        @else
            <li><a href="{{ route('admin.dashboard.card.create') }}" class="{{ Request::is('dashboard/card/create') ? 'active' : '' }}">Create My Card</a></li>
        @endif
        <li><a href="{{ route('admin.dashboard.tag.view') }}" class="{{ Request::is('dashboard/tag/view') ? 'active' : '' }}">Manage Tags</a></li>
        <li><a href="{{ route('admin.dashboard.category.view') }}" class="{{ Request::is('dashboard/category/view') ? 'active' : '' }}">Manage Categories</a></li>
        <li><a href="{{ route('admin.dashboard.shared.card.view') }}" class="{{ Request::is('dashboard/shared-card') ? 'active' : '' }}">Shared Cards</a></li>
        <li><a href="{{ route('admin.dashboard.profile.view') }}" class="{{ Request::is('dashboard/profile') ? 'active' : '' }}">Profile Settings</a></li>
        <li><a href="{{ route('admin.dashboard.help.view') }}" class="{{ Request::is('dashboard/help') ? 'active' : '' }}">Help & Support</a></li>
        <li><a href="{{ route('logout') }}" class="text-red-600 hover:bg-red-100 hover:text-red-700">Logout</a></li>
    </ul>
</aside>
