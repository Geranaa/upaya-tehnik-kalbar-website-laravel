<style>
    .header {
        background-color: #01953f;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 20px;
        flex-wrap: wrap;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .logo {
        height: 50px;
        max-width: 100%;
    }

    .header-left h1 {
        margin: 0;
        font-size: 1.2rem;
        /* Ukuran lebih kecil di layar kecil */
    }

    .header-left p {
        margin: 5px 0 0;
        font-size: 0.8rem;
    }

    .nav {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .nav a,
    .dropdown-menu a {
        text-decoration: none;
        color: white;
        gap: 10px;
    }

    .dropdown-menu a {
        color: #333;
    }

    .nav a:hover,
    .dropdown-menu a:hover {
        background-color: rgba(255, 255, 255, 0.2);
        color: #FFD700;
        text-decoration: none;
    }

    .dropdown {
        position: relative;
    }

    .dropdown-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: white;
        border: 1px solid #ddd;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        z-index: 1000;
        min-width: 150px;
        border-radius: 5px;
    }

    .dropdown-menu a {
        display: block;
        padding: 10px;
        color: #333;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .dropdown:hover .dropdown-menu {
        display: block;
    }

    @media (max-width: 768px) {
        .header {

            padding: 10px;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .logo {
            display: flex;
        }

        .header-left h1 {
            display: flex !important;
            justify-content: center;
            align-items: center;
            align-content: center !important;
        }
    }
</style>
<header class="header">
    <div class="header-left">
        <a href="{{ route('index') }}"><img src="/image/logo.png" alt="Company Logo" class="logo"></a>
        <div>
            <h1>PT. Upaya Tehnik</h1>
            <p>Area Kalimantan Barat, Pontianak Kota</p>
        </div>
    </div>
    <nav class="nav">
        <a href="{{ route('index') }}">Home</a>
        <div class="dropdown">
            <a href="#">Layanan/Jasa</a>
            <div class="dropdown-menu">
                <a href="{{ route('layanan_ioan') }}">Assurance</a>
                <a href="{{ route('layanan_provi') }}">Provisioning</a>
                <a href="{{ route('layanan_maintenance') }}">Maintenance</a>
                <a href="{{ route('layanan_project') }}">Project</a>
            </div>
        </div>
        <div class="dropdown">
            <a href="#">About Us</a>
            <div class="dropdown-menu">
                <a href="{{ route('profilPerusahaan') }}">Profil Perusahaan</a>
                <a href="{{ route('showStruktur') }}">Struktural Perusahaan</a>
            </div>
        </div>
        <a href="{{ route('contactUs') }}">Contact Us</a>
        @auth
            <a href="{{ route('showAD') }}">
                {{ auth()->user()->nama }}
            </a>
        @else
        @endauth
    </nav>
</header>
