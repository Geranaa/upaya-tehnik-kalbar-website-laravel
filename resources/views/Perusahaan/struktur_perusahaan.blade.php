<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Upaya Tehnik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style_struktur.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    @component('components.upa-navbar')
    @endcomponent

    <section class="hero" id="hero-section">
        <div class="hero-overlay">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Selamat Datang Di Keluarga Kami</h1>
                    <h1>PT. Upaya Tehnik</h1>
                    <p>Witel Kalimantan Barat, Pontianak Kota</p>
                    <p class="italic">"UT GO BEYOND"</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Pastikan script dijalankan setelah DOM selesai dimuat
        document.addEventListener('DOMContentLoaded', () => {
            const heroSection = document.querySelector('.hero');
            const images = [
                '/image/home/6192799901587453935.jpg',
                '/image/home/6192799901587453934.jpg'
            ];

            let currentIndex = 0;

            function changeBackground() {
                // Validasi indeks agar tidak keluar dari batas array
                if (images.length > 0) {
                    currentIndex = (currentIndex + 1) % images.length;
                    heroSection.style.backgroundImage = `url('${images[currentIndex]}')`;
                } else {
                    console.error('Array images kosong.');
                }
            }

            // Inisialisasi background pertama kali
            if (images.length > 0) {
                heroSection.style.backgroundImage = `url('${images[currentIndex]}')`;
            } else {
                console.error('Array images kosong.');
            }

            // Ganti gambar setiap 5 detik
            setInterval(changeBackground, 5000);
        });
    </script>
    <h2>Struktur Organisasi PT. Upaya Tehnik Witel KalBar</h2>
    <div class="organization-chart">
        <div class="level site-manager">
            @foreach ($siteManager as $staff)
                <div class="position">
                    <div class="photo">
                        <img src="{{ asset('storage/struktur_foto/' . $staff->foto) }}" alt="Foto Site Manager">
                    </div>
                    <div class="title">Site Manager</div>
                    <div class="name" data-full-name="Ingkamat"> {{ $staff->nama }}</div>
                </div>
        </div>
        @endforeach
        <div class="level department">
            @foreach ($astmanProject as $staff)
                <div class="position" title="Bertanggung jawab atas pengelolaan proyek">
                    <div class="photo">
                        <img src="{{ asset('storage/struktur_foto/' . $staff->foto) }}" alt="Foto Astman Project">
                    </div>
                    <div class="title">Astman Project</div>
                    <div class="name">{{ $staff->nama }}</div>
                </div>
            @endforeach
            @foreach ($astmanAssurance as $staff)
                <div class="position">
                    <div class="photo">
                        <img src="{{ asset('storage/struktur_foto/' . $staff->foto) }}" alt="Foto Astman Assurance">
                    </div>
                    <div class="title">Astman Assurance</div>
                    <div class="name" data-full-name="Mohammad Aditya Yudha Kusuma, S.E">{{ $staff->nama }}
                    </div>
                </div>
            @endforeach
            @foreach ($astmanProvisioning as $staff)
                <div class="position">
                    <div class="photo">
                        <img src="{{ asset('storage/struktur_foto/' . $staff->foto) }}" alt="Foto Astman Provisioning">
                    </div>
                    <div class="title">Astman Provisioning</div>
                    <div class="name"> {{ $staff->nama }} </div>
                </div>
            @endforeach
            @foreach ($astmanMaintenance as $staff)
                <div class="position">
                    <div class="photo">
                        <img src="{{ asset('storage/struktur_foto/' . $staff->foto) }}" alt="Foto Astman Maintenance">
                    </div>
                    <div class="title">Astman Maintenance</div>
                    <div class="name"> {{ $staff->nama }}</div>
                </div>
            @endforeach
        </div>

        <div class="level admin">
            @foreach ($adminProject as $admin)
                <div class="position">
                    <div class="photo">
                        <img src="{{ asset('storage/struktur_foto/' . $admin->foto) }}" alt="Foto Admin Project">
                    </div>
                    <div class="title">Admin Project</div>
                    <div class="name"> {{ $admin->nama }} </div>
                </div>
            @endforeach
            @foreach ($adminProject2 as $admin)
                <div class="position">
                    <div class="photo">
                        <img src="{{ asset('storage/struktur_foto/' . $admin->foto) }}" alt="Foto Admin Project2">
                    </div>
                    <div class="title">Admin Project</div>
                    <div class="name">{{ $admin->nama }} </div>
                </div>
            @endforeach
            @foreach ($adminAssurance as $admin)
                <div class="position">
                    <div class="photo">
                        <img src="{{ asset('storage/struktur_foto/' . $admin->foto) }}" alt="Foto Admin Ioan">
                    </div>
                    <div class="title">Admin IOAN</div>
                    <div class="name">{{ $admin->nama }}</div>
                </div>
            @endforeach
            @foreach ($adminProvisioning as $admin)
                <div class="position">
                    <div class="photo">
                        <img src="{{ asset('storage/struktur_foto/' . $admin->foto) }}" alt="Foto Admin Provisioning">
                    </div>
                    <div class="title">Admin Provisioning</div>
                    <div class="name"> {{ $admin->nama }}</div>
                </div>
            @endforeach
            @foreach ($adminMaintenance as $admin)
                <div class="position">
                    <div class="photo">
                        <img src="{{ asset('storage/struktur_foto/' . $admin->foto) }}" alt="Foto Admin Maintenance">
                    </div>
                    <div class="title">Admin Maintenance</div>
                    <div class="name">{{ $admin->nama }}</div>
                </div>
            @endforeach
            @foreach ($adminLogistik as $admin)
                <div class="position">
                    <div class="photo">
                        <img src="{{ asset('storage/struktur_foto/' . $admin->foto) }}" alt="Foto Admin Logistik">
                    </div>
                    <div class="title">Admin Logistik</div>
                    <div class="name">{{ $admin->nama }}</div>
                </div>
            @endforeach
        </div>
    </div>

    <br><br>

    @component('components.upa-footer')
    @endcomponent

    <script>
        function redirectToFile(fileName) {
            // Redirect ke file yang ditentukan
            window.location.href = fileName;
        }
    </script>

    <script>
        document.querySelectorAll('.name').forEach(element => {
            const fullName = element.getAttribute('data-full-name'); // Ambil nama lengkap
            const nameParts = fullName.split(' ');

            if (fullName.length > 20) {
                const firstName = nameParts[0];
                const middleName = nameParts.length > 2 ? nameParts[1] : '';
                const lastName = nameParts[nameParts.length - 1];

                const shortFirstName = firstName[0] + '.'; // Inisial nama depan
                const shortLastName = lastName[0]; // Inisial nama belakang

                // Nama tengah tetap ditampilkan jika ada
                const shortName = middleName ?
                    `${shortFirstName} ${middleName} ${shortLastName}` :
                    `${shortFirstName} ${shortLastName}`;

                element.textContent = shortName; // Set nama yang disingkat
            }

        });
    </script>

</body>

</html>
