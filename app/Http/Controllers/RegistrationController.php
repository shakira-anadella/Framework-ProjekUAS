<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Registration;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index(Request $request)
{
    $query = Registration::with('event', 'user');

    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->whereHas('user', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        })->orWhereHas('event', function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%");
        });
    }

    $registrations = $query->paginate(10);

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

        // Cek apakah pengguna sudah mendaftar untuk event ini
        if ($event->registrations()->where('user_id', auth()->id())->exists()) {
            return redirect()->route('events.show', $eventId)
                            ->with('error', 'You are already registered for this event.');
        }

        // Simpan pendaftaran
        $event->registrations()->create([
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('events.show', $eventId)
                        ->with('success', 'You have successfully registered for this event.');
    }


    public function create($eventId)
    {
        // Ambil event berdasarkan ID
        $event = Event::findOrFail($eventId);

        // Tampilkan halaman registrasi
        return view('registrations.create', compact('event'));
    }

    public function destroy($id)
{
    $registration = Registration::findOrFail($id);
    $registration->delete();

    return redirect()->route('admin.registrations.index')->with('success', 'Registration deleted successfully.');
}


}
