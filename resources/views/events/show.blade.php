<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Informasi Event dengan 2 Kolom, Sejajar dengan Judul -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-3xl font-semibold text-blue-600">Informasi Event</h3>
                            <a href="{{ route('events.index') }}" class="btn btn-primary py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Kembali ke Menu</a>
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                            <!-- Kolom Kiri -->
                            <div>
                                <div class="mb-4">
                                    <strong class="text-gray-700">Judul:</strong>
                                    <span class="font-semibold text-gray-800">{{ $event->title }}</span>
                                </div>
                                <div class="mb-4">
                                    <strong class="text-gray-700">Kategori:</strong>
                                    <span class="text-gray-800">{{ $event->category->name }}</span>
                                </div>
                                <div class="mb-4">
                                    <strong class="text-gray-700">Lokasi:</strong>
                                    <span class="text-gray-800">{{ $event->location }}</span>
                                </div>
                            </div>
                            <!-- Kolom Kanan -->
                            <div>
                                <div class="mb-4">
                                    <strong class="text-gray-700">Deskripsi:</strong>
                                    <p class="text-gray-800 text-sm">{!! nl2br(e($event->description)) !!}</p>
                                </div>
                                <div class="mb-4">
                                    <strong class="text-gray-700">Harga:</strong>
                                    <span class="text-gray-600">Rp {{ number_format($event->price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Review -->
                    <div class="mt-8">
                        <h3 class="text-3xl font-semibold text-green-600">Review Event</h3>

                        <!-- Daftar Review -->
                        <div class="mt-6 flex space-x-6 overflow-x-auto pb-4">
                            @foreach($reviews as $review)
                                <div class="flex-none w-72 border p-4 bg-gray-100 rounded-lg shadow-md">
                                    <p><strong>{{ $review->user->name }}</strong></p>
                                    <p>{{ $review->review }}</p>
                                    <p><strong>Rating:</strong> {{ $review->rating }}/5</p>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-4">
                            {{ $reviews->links() }} <!-- Menampilkan pagination -->
                        </div>

                        <!-- Form untuk menambahkan review -->
                        @auth
                            <div class="mt-8 p-6 border bg-gray-50 rounded-lg shadow-sm">
                                <h4 class="font-semibold text-lg text-blue-600">Tulis Review Anda</h4>
                                <form action="{{ route('reviews.store', $event->id) }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="review" class="block text-gray-700">Review Anda:</label>
                                        <textarea name="review" id="review" rows="4" class="form-control border-gray-300 rounded-md shadow-sm w-full" required></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="rating" class="block text-gray-700">Rating:</label>
                                        <select name="rating" id="rating" class="form-control border-gray-300 rounded-md shadow-sm w-full" required>
                                            <option value="5">5 - Sangat Baik</option>
                                            <option value="4">4 - Baik</option>
                                            <option value="3">3 - Cukup</option>
                                            <option value="2">2 - Kurang</option>
                                            <option value="1">1 - Sangat Buruk</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-full py-2 px-4 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Kirim Review</button>
                                </form>
                            </div>
                        @else
                            <p class="text-gray-600 mt-4">Silakan <a href="{{ route('login') }}" class="text-blue-500">login</a> untuk memberikan review.</p>
                        @endauth
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
