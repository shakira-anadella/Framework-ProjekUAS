<x-app-layout>
    <div class="container my-4">
        <h2 class="mb-4 text-center text-3xl font-semibold">{{ $event->title }} - Register</h2>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Tabel Detail Event dan Pendaftaran -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">{{ $event->title }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <th>Description:</th>
                                    <td>{{ $event->description }}</td>
                                </tr>
                                <tr>
                                    <th>Date:</th>
                                    <td>{{ $event->event_date }}</td>
                                </tr>
                                <tr>
                                    <th>Location:</th>
                                    <td>{{ $event->location ?? 'Online' }}</td>
                                </tr>
                                <tr>
                                    <th>Price:</th>
                                    <td>
                                        @if($event->price > 0)
                                            ${{ $event->price }}
                                        @else
                                            Free
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Form Pendaftaran -->
                        @auth
                            <div class="text-center mt-4">
                                <form action="{{ route('registrations.store', $event->id) }}" method="POST">
                                    @csrf
                                    <h5 class="card-title text-center mb-4">Ready to Join?</h5>
                                    <button type="submit" class="btn btn-success btn-sm">Register for this Event</button>
                                </form>
                            </div>
                        @else
                            <div class="alert alert-info mt-4 text-center">
                                <p>Please <a href="{{ route('login') }}" class="text-blue-500">login</a> to register for this event.</p>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
