<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/NavbarAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashbordAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profileAdmin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbarNav">
        <ul class="navbar-listNav">
            <div class="logoNav">
                <img src="{{ asset('images/logolib.jpeg') }}" alt="Logo" />
                <h1>Starlight Reads!</h1>
            </div>

            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>

            <!-- Books Dropdown -->
            <li class="dropdownNav">
                <span id="booksDropdown" class="dropdown-toggleNav">Books</span>
                <ul class="dropdown-menuNav" id="booksMenu">
                    <li><a href="{{ route('admin.books') }}">Books List</a></li>
                    <li><a href="{{ route('admin.books.create') }}">Add Books</a></li> 
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">Users</a>
            </li>
            <li><a href="">Loans</a></li>
        </ul>

        <div class="profile-sectionNav">
            <a href="{{ route('admin.profile') }}" class="profile-linkNav">
                <i class="profile-iconNav"></i>
                <span class="profile-textNav">{{ Auth::user()->name }}</span>
            </a>
        </div>
    </nav>

    <!-- Contenu de la page -->
    <div class="content">
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
        <div class="center-btn">
            <button onclick="window.location.href='{{ route('admin.generatePDF') }}'" class="btn-pdf">
                Télécharger le rapport PDF
            </button>
        </div>
    </div>

    <script>
        document.getElementById('booksDropdown').addEventListener('click', function() {
            var booksMenu = document.getElementById('booksMenu');
            if (booksMenu.style.display === 'block') {
                booksMenu.style.display = 'none';
            } else {
                booksMenu.style.display = 'block';
            }
        });

        const booksUsersChart = new Chart(document.getElementById('booksUsersChart'), {
            type: 'bar',
            data: {
                labels: ['Books', 'Users'],
                datasets: [{
                    label: 'Count',
                    data: [120, 50], 
                    backgroundColor: [ '#8326ae' , '#8326ae'],
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
                    data: [30, 15], 
                    backgroundColor: ['#283dc5', '#6dc4da'],
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    tooltip: {
                        enabled: true,
                    },
                    legend: {
                        position: 'top',
                    },
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
                    tooltip: {
                        enabled: true,
                    },
                    legend: {
                        position: 'top',
                    },
                },
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });
    </script>
</body>
</html>