<x-app-layout>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand text-indigo" href="{{ route('dashboard') }}">Admin Dashboard</a>
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
                        <h3 class="text-xl font-semibold">Daftar Event</h3>
                        <a href="{{ route('admin.events.create') }}" class="btn btn-primary">Add Event</a>
                    </div>

                    <!-- Table Content -->
                    <div class="table-responsive">
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                                <tr style="background-color: #6f42c1; color: white;">
                                    <th class="border px-4 py-2">No</th>
                                    <th class="border px-4 py-2">Event Name</th>
                                    <th class="border px-4 py-2">Date</th>
                                    <th class="border px-4 py-2">Price</th>
                                    <th class="border px-4 py-2">Location</th>
                                    <th class="border px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($events as $event)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $event->title }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $event->event_date }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $event->price }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $event->location }}</td>
                                        <td class="border border-gray-300 px-4 py-2">
                                            <!-- View Button -->
                                            <a href="{{ route('admin.events.show', $event->id) }}" class="btn btn-success btn-sm">View</a>
                                            
                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            
                                            <!-- Delete Button -->
                                            <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4">
                        {{ $events->links() }} <!-- Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
