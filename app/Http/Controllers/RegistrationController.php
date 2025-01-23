<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index()
    {
        $registrations = Registration::with('event', 'user')->paginate(10); // Mengambil data terkait event dan user
        return view('admin.registrations.index', compact('registrations'));
    }

    public function show($id)
    {
        $event = Event::with('registrations.user')->findOrFail($id);
        return view('admin.registrations.show', compact('event')); // Menggunakan $event
    }

    public function store(Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        // Validasi data
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        // Cek apakah pengguna sudah mendaftar untuk event ini
        if ($event->registrations()->where('user_id', auth()->id())->exists()) {
            return redirect()->route('events.show', $eventId)->with('error', 'You are already registered for this event.');
        }

        // Simpan pendaftaran
        Registration::create([
            'user_id' => auth()->id(),
            'event_id' => $eventId,
        ]);

        return redirect()->route('events.show', $eventId)->with('success', 'You have successfully registered for this event.');
    }

    public function create($eventId)
    {
        // Ambil event berdasarkan ID
        $event = Event::findOrFail($eventId);

        // Tampilkan halaman registrasi
        return view('registrations.create', compact('event'));
    }

}
