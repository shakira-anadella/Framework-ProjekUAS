<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function __construct()
    {
        // Middleware untuk membatasi akses admin dan user
        $this->middleware('auth')->only(['store']); // Hanya user yang sudah login bisa memberi review
        $this->middleware('can:admin-access')->only(['destroy']); // Hanya admin yang bisa menghapus review
    }

    // USER SECTION
    /**
     * Menampilkan daftar review untuk event (untuk pengguna biasa)
     */
    public function index()
    {
        $reviews = Review::with(['event', 'user'])->paginate(10); // Tampilkan semua review
        return view('admin.reviews.index', compact('reviews')); // Bisa disesuaikan dengan view yang ada
    }

    /**
     * Menambahkan review baru untuk event (user hanya bisa menambah review)
     */
    public function store(Request $request, $eventId)
    {
        $validated = $request->validate([
            'review' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'event_id' => $eventId,
            'review' => $validated['review'],
            'rating' => $validated['rating'],
        ]);

        return redirect()->route('events.show', $eventId)->with('success', 'Review berhasil ditambahkan!');
    }

    // ADMIN SECTION
    /**
     * Menghapus review (hanya untuk admin)
     */
    public function destroy(Review $review)
    {
        // Periksa apakah user yang mengakses adalah admin atau pemilik review
        $this->authorize('delete', $review); // Pastikan hanya admin atau pemilik review yang bisa menghapus

        // Hapus review
        $review->delete();

        // Redirect setelah review dihapus
        return redirect()->back()->with('success', 'Review berhasil dihapus.');
    }

    /**
     * Menampilkan detail event beserta review yang ada.
     */
    public function show(Event $event)
    {
        // Ambil semua review untuk event tertentu dengan pagination
        $reviews = $event->reviews()->with('user')->latest()->paginate(5);

        // Kirim data event dan review ke view
        return view('events.show', compact('event', 'reviews'));
    }

    
}
