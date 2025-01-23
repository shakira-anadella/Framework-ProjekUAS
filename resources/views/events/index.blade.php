<x-app-layout>
    <div class="container my-4">
        <h2 class="mb-4">Available Events</h2>

        @if($events->count() > 0)
            <div class="list-group">
                @foreach($events as $event)
                    <div class="list-group-item mb-4 p-3 border rounded shadow-sm">
                        <div class="row align-items-center">
                            <!-- Gambar Event -->
                            <div class="col-md-3">
                                <img src="{{ asset('storage/' . $event->image) }}" class="img-fluid rounded" alt="{{ $event->title }}">
                            </div>

                            <!-- Detail Event -->
                            <div class="col-md-9">
                                <h5 class="mb-2">{{ $event->title }}</h5>
                                <p class="text-muted mb-2">{{ Str::limit($event->description, 150) }}</p>
                                <p class="mb-1"><strong>Date:</strong> {{ $event->event_date }}</p>
                                <p class="mb-1"><strong>Location:</strong> {{ $event->location ?? 'Online' }}</p>
                                @if ($event->price > 0)
                                    <p class="mb-2"><strong>Price:</strong> ${{ $event->price }}</p>
                                @else
                                    <p class="mb-2"><strong>Price:</strong> Free</p>
                                @endif

                                <!-- Tombol View Details -->
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-warning btn-sm">View Details</a>
                                <a href="{{ route('registrations.create', $event->id) }}" class="btn btn-primary btn-sm">Daftar Event</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $events->links() }}
            </div>
        @else
            <p>No events available at the moment.</p>
        @endif
    </div>
</x-app-layout>
