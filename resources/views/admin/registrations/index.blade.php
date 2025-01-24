<x-app-layout>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand text-indigo" href="{{ route('admin.dashboard') }}">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.events.*') ? 'active text-indigo' : '' }}" href="{{ route('admin.events.index') }}">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active text-indigo' : '' }}" href="{{ route('admin.categories.index') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.reviews.*') ? 'active text-indigo' : '' }}" href="{{ route('admin.reviews.index') }}">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.registrations.*') ? 'active text-indigo' : '' }}" href="{{ route('admin.registrations.index') }}">Registrations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.users.*') ? 'active text-indigo' : '' }}" href="{{ route('admin.users.index') }}">Users</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <!-- Judul dengan Form Search -->
                        <h3 class="text-xl font-semibold">Registrations</h3>
                        <form method="GET" action="{{ route('admin.registrations.index') }}" class="d-flex">
                            <input type="text" name="search" class="form-control me-2" placeholder="Search by user or event" value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>

                    @if($registrations->count() > 0)
                        <div class="overflow-x-auto">
                            <table class="table-auto w-full max-w-4xl mx-auto border-collapse border border-gray-300">
                                <thead>
                                    <tr style="background-color: #6f42c1; color: white;">
                                        <th class="border px-4 py-2" style="width: 5%;">No</th>
                                        <th class="border px-4 py-2" style="width: 20%;">User</th>
                                        <th class="border px-4 py-2" style="width: 25%;">Event</th>
                                        <th class="border px-4 py-2" style="width: 20%;">Registration Date</th>
                                        <th class="border px-4 py-2" style="width: 15%;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registrations as $registration)
                                        <tr>
                                            <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                {{ $registration->user->name }}<br>
                                                <small class="text-gray-600">{{ $registration->user->email }}</small>
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                {{ $registration->event->title }}<br>
                                                <small class="text-gray-600">{{ $registration->event->location ?? 'Online' }}</small>
                                            </td>
                                            <td class="border border-gray-300 px-4 py-2">{{ $registration->created_at->format('d-m-Y H:i') }}</td>
                                            <td class="border border-gray-300 px-4 py-2">
                                                <form action="{{ route('admin.registrations.destroy', $registration->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            {{ $registrations->appends(request()->query())->links('pagination::bootstrap-5') }}
                        </div>
                    @else
                        <p class="text-gray-600">No registrations found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
