<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h3 class="mb-0">View Event</h3>
                        <a href="{{ route('admin.events.index') }}" class="btn btn-primary">Back to Menu</a>
                    </div>
                    <div class="mb-4">
                        <h3 class="text-2xl font-semibold">{{ $event->title }}</h3>
                        <p class="text-sm text-gray-600">{{ $event->category->name }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="text-gray-800">Deskripsi:</strong>
                        <p>{{ $event->description ?? 'Tidak ada deskripsi.' }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="text-gray-800">Tanggal dan Waktu:</strong>
                        <p>{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }} | 
                            {{ \Carbon\Carbon::parse($event->start_time)->format('H:i') }} - 
                            {{ \Carbon\Carbon::parse($event->end_time)->format('H:i') }}
                        </p>
                    </div>

                    <div class="mb-4">
                        <strong class="text-gray-800">Harga:</strong>
                        <p>Rp {{ number_format($event->price, 0, ',', '.') }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="text-gray-800">Lokasi:</strong>
                        <p>{{ $event->location ?? 'Tidak ada lokasi yang ditentukan.' }}</p>
                    </div>

                    <div class="mb-4">
                        <strong class="text-gray-800">Online:</strong>
                        <p>{{ $event->is_online ? 'Ya' : 'Tidak' }}</p>
                    </div>

                    @if($event->image)
                        <div class="mb-4">
                            <strong class="text-gray-800">Gambar:</strong>
                            <img src="{{ asset($event->image) }}" alt="Event Image" class="w-1/12 h-auto rounded-lg shadow-md">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
