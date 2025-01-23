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
    public function store(Request $request, Event $event)
    {
        // Validasi input review
        $request->validate([
            'review' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Cek apakah user sudah memberi review untuk event ini
        $existingReview = $event->reviews()->where('user_id', auth()->id())->first();
        if ($existingReview) {
            return redirect()->route('events.show', $event->id)
                ->with('error', 'Anda sudah memberikan review untuk event ini.');
        }

        // Menambahkan review ke event
        $event->reviews()->create([
            'user_id' => auth()->id(),
            'review' => $request->review,
            'rating' => $request->rating,
        ]);

        // Redirect kembali ke halaman event setelah review ditambahkan
        return redirect()->route('events.show', $event->id)
            ->with('success', 'Review berhasil ditambahkan.');
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
    // Memuat reviews dengan relasi user
    $reviews = $event->reviews()->with('user')->latest()->get();
    
    // Cek apakah ada review yang ditemukan
    dd($reviews); // Cek data review

    // Kirim ke view
    return view('events.show', compact('event', 'reviews'));
}


}
