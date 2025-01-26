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
                        <h3 class="text-xl font-semibold">Daftar Reviews</h3>
                    </div>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($reviews->count() > 0)
                        <table class="table-auto w-full border-collapse border border-gray-300">
                            <thead>
                            <tr style="background-color:#6f42c1; color: white;">
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">Event</th>
                                <th class="border px-4 py-2">User</th>
                                <th class="border px-4 py-2">Review</th>
                                <th class="border px-4 py-2">Rating</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($reviews as $review)
                                    <tr>
                                        <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $review->event->title }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $review->user->name }}</td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $review->review }}</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">{{ $review->rating }}/5</td>
                                        <td class="border border-gray-300 px-4 py-2 text-center">
                                            <form action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{ $reviews->links() }} <!-- Pagination -->
                        </div>
                    @else
                        <p class="text-gray-600">Belum ada review yang tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>