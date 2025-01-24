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
            <!-- Dashboard Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Pie Chart Section -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-center text-indigo-600 mb-4">Event Categories Distribution</h4>
                    <div class="flex justify-center">
                        <canvas id="pieChart" width="400" height="400"></canvas>
                    </div>
                </div>

                <!-- Review Chart Section -->
                <div class="mt-8 bg-white shadow rounded-lg p-6">
                    <h4 class="text-lg font-semibold text-center text-indigo-600 mb-4">Review Distribution per Event</h4>
                    <div class="flex justify-center">
                        <canvas id="reviewChart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>

            <!-- Event Table Section -->
            <div class="mt-8 bg-white shadow rounded-lg p-6">
                <h3 class="text-xl font-semibold text-center text-indigo-600 mb-4">Event List</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr style="background-color:#6f42c1; color: white;">
                                <th>No</th>
                                <th>Event Name</th>
                                <th>Description</th>
                                <th class="text-center">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $event->title }}</td>
                                    <td>{{ $event->description }}</td>
                                    <td class="text-center">{{ $event->event_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Pie Chart - Event Categories Distribution
            fetch('{{ route("admin.chart.data") }}')
                .then(response => response.json())
                .then(data => {
                    const ctx = document.getElementById('pieChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'pie',  // Pie chart type
                        data: data,   // Data from the server
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    position: 'top',
                                },
                            },
                        },
                    });
                })
                .catch(error => console.error('Error fetching pie chart data:', error));

            // Bar Chart - Review Distribution per Event
            fetch('{{ route("admin.reviews.chartData") }}')
                .then(response => response.json())
                .then(data => {
                    const ctx = document.getElementById('reviewChart').getContext('2d');
                    new Chart(ctx, {
                        type: 'bar',  // Bar chart type
                        data: data,   // Data for review chart
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching bar chart data:', error));
        });
    </script>
</x-app-layout>
