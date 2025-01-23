<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function __construct()
    {
        // Middleware untuk membatasi akses admin dan user
        $this->middleware('auth');
        $this->middleware('admin')->except(['publicIndex', 'publicShow']);
    }

    // ADMIN SECTION
    public function index()
    {
        $events = Event::paginate(10); // Paginate untuk admin
        return view('admin.events.index', compact('events'));
    }

    public function dashboard()
    {
        $events = Event::all(); // Semua event
        return view('admin.dashboard', compact('events'));
    }

    public function create()
    {
        $categories = Category::all(); // Data kategori untuk dropdown
        return view('admin.events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'category_id' => 'required|exists:categories,id',
            'is_online' => 'required|boolean',
            'price' => 'required|numeric',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        // Simpan gambar jika ada
        $posterPath = $request->file('image') ? $request->file('image')->store('images/events', 'public') : null;

        Event::create(array_merge($validated, ['image' => $posterPath]));

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dibuat.');
    }

    public function show(Event $event)
    {
        return view('admin.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $categories = Category::all(); // Ambil semua kategori
        return view('admin.events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, Event $event)
    {
        // Validasi input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'event_date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'category_id' => 'required|exists:categories,id',
            'is_online' => 'required|boolean',
            'price' => 'required|numeric',
            'location' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:2048',
        ]);

        // Update gambar jika ada file baru
        if ($request->hasFile('image')) {
            if ($event->image) {
                // Hapus gambar lama
                unlink(storage_path('app/public/' . $event->image));
            }
            $validated['image'] = $request->file('image')->store('images/events', 'public');
        }

        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            // Hapus gambar lama
            unlink(storage_path('app/public/' . $event->image));
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus.');
    }

    // USER SECTION
    public function publicIndex()
    {
        $events = Event::paginate(10); // Paginate untuk user
        return view('events.index', compact('events')); // View khusus user
    }

    public function publicShow(Event $event)
    {
        return view('events.show', compact('event')); // View detail event
    }

    
}
