<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/dashboard.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    @component('components.upa-navbar')@endcomponent

       <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark" id="sidebar-wrapper">
            <div class="sidebar-heading text-white font-weight-bold py-3">Admin Dashboard </div>
            <div class="list-group list-group-flush">
                <a href="{{route('showAD')}}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-home mr-2"></i>Home</a>
                <a href="{{route ('showAM')}}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-user mr-2"></i>Struktur Organisasi</a>
                <a href="{{route ('showAP')}}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-user mr-2"></i>Data Pegawai</a>
                <a href="{{route ('showAU')}}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-user mr-2"></i>Account</a>
                <a href="#" id="logoutTrigger" class="list-group-item list-group-item-action bg-dark text-white">
                        <i class="fas fa-sign-out-alt mr-2"></i>Log-out
                    </a>

            </div>


        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Modal Log-out -->
        <div id="logoutModal" class="modal">
            <div class="modal-content">
                <h3>Confirm Log-out</h3>
                <p>Are you sure you want to log out?</p>
                <div class="modal-actions">
                    <form id="logout-form" method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" id="confirmLogout" class="btn btn-logout">Log Out</button>
                    </form>
                    <button id="cancelLogout" class="btn btn-cancel">Cancel</button>
                </div>
            </div>
        </div>

<script>
    // Referensi modal dan tombol
const logoutModal = document.getElementById('logoutModal');
const logoutTrigger = document.getElementById('logoutTrigger');
const confirmLogout = document.getElementById('confirmLogout');
const cancelLogout = document.getElementById('cancelLogout');

// Klik tombol Log-out di sidebar untuk menampilkan modal
logoutTrigger.addEventListener('click', event => {
    event.preventDefault(); // Mencegah navigasi default
    logoutModal.style.display = 'flex'; // Tampilkan modal
});

// Klik tombol Cancel di modal untuk menutup modal
cancelLogout.addEventListener('click', () => {
    logoutModal.style.display = 'none'; // Sembunyikan modal
});

// Klik di luar modal untuk menutup modal
window.addEventListener('click', event => {
    if (event.target === logoutModal) {
        logoutModal.style.display = 'none'; // Sembunyikan modal
    }
});

</script>
        <!-- /#sidebar-wrapper -->

        <div id="page-content-wrapper">


            <div class="welcome-section" data-aos="fade-down">
                <h2>Welcome, Admin! 👋</h2>
                <p>Take control of your dashboard and manage your operations effortlessly.</p>
                <div class="features-grid">
                    <div class="feature-card" data-aos="fade-right" data-aos-delay="100">
                        <h3>👥 User Management</h3>
                        <p>Effortlessly manage user roles, permissions, and account details.</p>
                    </div>
                    <div class="feature-card" data-aos="zoom-in" data-aos-delay="200">
                        <h3>💼 Employee Management</h3>
                        <p>Track employee records, attendance, and performance effectively.</p>
                    </div>
                    <div class="feature-card" data-aos="fade-left" data-aos-delay="300">
                        <h3>⚙ System Settings</h3>
                        <p>Customize dashboard preferences and maintain system configurations.</p>
                    </div>
                    <div class="feature-card" data-aos="flip-up" data-aos-delay="400">
                        <h3>📄 Reports</h3>
                        <p>Generate detailed reports to monitor and analyze key metrics.</p>
                    </div>
                </div>
            </div>

    <!-- JavaScript for toggling sidebar -->
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({
        duration: 1200, // Animation duration
    });
</script>

</body>

</html>
