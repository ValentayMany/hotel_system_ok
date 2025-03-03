<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</head>

<body class="bg-gray-100">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }"
            class="fixed inset-y-0 left-0 w-64 bg-gray-900 text-gray-200 transform transition-transform md:relative md:translate-x-0">
            <div class="p-5 text-center text-lg font-bold border-b border-gray-700">Admin Panel</div>
            <nav class="p-4">
                <a href="{{ route('adminpage/admin.dashboard') }}" class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-700">
                    <i class="bi bi-house-door"></i>
                    <span>Dashboard</span>
                </a>
                <div x-data="{ open: false }">
                    <button @click="open = !open"
                        class="flex items-center justify-between w-full p-2 rounded-md hover:bg-gray-700">
                        <span class="flex items-center space-x-2">
                            <i class="bi bi-bookmark-fill"></i>
                            <span>Bookings</span>
                        </span>
                        <i class="bi bi-chevron-down" x-show="!open"></i>
                        <i class="bi bi-chevron-up" x-show="open"></i>
                    </button>
                    <div x-show="open" class="pl-6 mt-2 space-y-2">
                        <a href="{{ route('Add_Room') }}" class="block p-2 rounded-md hover:bg-gray-700">Add Room</a>
                        <a href="{{ route('admin.roomadmin') }}" class="block p-2 rounded-md hover:bg-gray-700">DetailRoom</a>
                        <a href="{{ route('history') }}" class="block p-2 rounded-md hover:bg-gray-700">HistoryBookingRooms</a>
                    </div>
                </div>
                <a href="{{ route('ProfileAdmin') }}" class="flex items-center p-2 mt-2 space-x-2 rounded-md hover:bg-gray-700">
                    <i class="bi bi-person-circle"></i>
                    <span>Profile</span>
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Header -->
            <header class="flex items-center justify-between px-4 py-2 bg-white shadow md:px-6">
                <button @click="sidebarOpen = !sidebarOpen" class="p-2 rounded-md md:hidden">
                    <i class="bi bi-list text-2xl"></i>
                </button>
                <div class="flex items-center space-x-4">
                    <button class="p-2 rounded-md hover:bg-gray-200"><i class="bi bi-bell"></i></button>
                    <button class="p-2 rounded-md hover:bg-gray-200"><i class="bi bi-envelope"></i></button>
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex items-center space-x-2 p-2 rounded-md hover:bg-gray-200">
                            <img src="{{ URL('image/no-pic.png') }}" class="w-8 h-8 rounded-full" alt="User">
                            <span class="hidden md:inline">Admin</span>
                        </button>
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-md">
                            <a href="{{ route('ProfileAdmin') }}" class="block px-4 py-2 hover:bg-gray-200">Profile</a>
                            <a href="#" class="block px-4 py-2 hover:bg-gray-200">Settings</a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('account.logout') }}" method="GET" id="logout-form">
                    @csrf
                    <a href="javascript:void(0);" onclick="document.getElementById('logout-form').submit();" class="block px-4 py-2 hover:bg-red-200">Logout</a>
                </form>
                
            </header>

            <!-- Content -->
            <main class="flex-1 p-4 overflow-auto md:p-6">
                @yield('contents')
            </main>
        </div>
    </div>
</body>

</html>
