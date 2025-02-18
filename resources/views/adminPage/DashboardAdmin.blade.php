@extends('layouts.admin')

@section('content')
    <div class="dashboard">
        
        <div class="stats-container">
            <!-- Books and Users Chart -->
            <div class="chart-card">
                <h3>Books and Users</h3>
                <canvas id="booksUsersChart" width="400" height="300"></canvas>
            </div>

            <!-- Borrowed vs Returns Chart -->
            <div class="chart-card">
                <h3>Borrowed vs Returns</h3>
                <canvas id="borrowedReturnsChart" width="400" height="300"></canvas>
            </div>

            <!-- User Growth Over Time Chart -->
            <div class="chart-card">
                <h3>User Growth Over Time</h3>
                <canvas id="userGrowthChart" width="400" height="300"></canvas>
            </div>
        </div>

        <!-- Centered PDF Button -->
        <div class="btn-pdf-container">
            <button class="btn-pdf">Download PDF</button>
        </div>
    </div>

    @push('scripts')
        <script>
            // Chart.js example code (unchanged)
            const booksUsersChart = new Chart(document.getElementById('booksUsersChart'), {
                type: 'bar',
                data: {
                    labels: ['Books', 'Users'],
                    datasets: [{
                        label: 'Count',
                        data: [120, 50], // Example data
                        backgroundColor: ['#0088FE', '#00C49F'],
                    }],
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });

            const borrowedReturnsChart = new Chart(document.getElementById('borrowedReturnsChart'), {
                type: 'pie',
                data: {
                    labels: ['Borrowed', 'Returns'],
                    datasets: [{
                        label: 'Count',
                        data: [30, 15], // Example data
                        backgroundColor: ['#FFBB28', '#FF8042'],
                    }],
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: { enabled: true },
                        legend: { position: 'top' },
                    },
                },
            });

            const userGrowthChart = new Chart(document.getElementById('userGrowthChart'), {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May'],
                    datasets: [{
                        label: 'Users',
                        data: [30, 35, 40, 45, 50], // Example data
                        borderColor: '#8884d8',
                        fill: false,
                    }],
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: { enabled: true },
                        legend: { position: 'top' },
                    },
                    scales: {
                        y: { beginAtZero: true },
                    },
                },
            });
        </script>
    @endpush
@endsection
