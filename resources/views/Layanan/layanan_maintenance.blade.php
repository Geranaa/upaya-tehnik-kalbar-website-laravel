<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Upaya Tehnik Group</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/staffcard.css">
    <link rel="stylesheet" href="/css/style_maintenance.css">
</head>

<body>
    @component('components.upa-navbar')
    @endcomponent

    <section class="hero-section">
        <div class="hero-content">
            <div class="container">
                <div class="section-header hero-text">
                    <div class="line"></div>
                    <h1>MAINTENANCE</h1>
                </div>

                <div class="content">
                    <p>
                        Maintenance Telkom adalah kegiatan pemeliharaan peralatan teknis yang dilakukan oleh karyawan
                        Telkom untuk menjaga kualitas peralatan.
                        Maintenance Telkom dilakukan untuk mengurangi kemungkinan kerusakan pada perangkat, kabel, dan
                        komponen lainnya. Peralatan teknis yang dipelihara oleh karyawan maintenance Telkom meliputi:
                        MSAN, OLT, DSLAM, ODC, ONU.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="staff-section">
        <div class="staff-title">
            <h1>Staff Divisi Layanan Maintenance</h1>
        </div>
        <br>
        <button class="nav-button left" id="prev">&#8249;</button>

        <div class="staff-container">
            @if ($karyawanMaintenance->isEmpty())
                <h1 style="color: gray">Tidak ada data Pegawai</h1>
            @else
                @foreach ($karyawanMaintenance as $staff)
                    <div class="staff-card" data-aos="fade-up">
                        <img src="{{ asset('storage/karyawan_foto/' . $staff->foto) }}" alt="Staff Photo"
                            class="staff-image">
                        <div class="staff-info">
                            <p class="staff-name">{{ $staff->nama }}</p>
                            <p class="staff-position">{{ $staff->jabatan }}</p>
                            <p class="staff-description"></p>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <button class="nav-button right" id="next">&#8250;</button>
    </section>

    <section class="gallery-section">
        <div class="gallery-title">
            <h1>Galeri Foto</h1>
        </div>
        <br>
        <div class="photo-display">
            <button class="arrow left-arrow" onclick="prevPhoto()">&#9664;</button>
            <img id="main-photo" src="../image/maintanance/6066564142673805514.jpg" alt="Foto Utama">
            <button class="arrow right-arrow" onclick="nextPhoto()">&#9654;</button>
        </div>

        <div class="photo-thumbnails">
            <img src="../image/maintanance/6075823357724574842.jpg" alt="Thumbnail 1" onclick="displayPhoto(this)">
            <img src="../image/maintanance/photo_6339101326801223852_y.jpg" alt="Thumbnail 2"
                onclick="displayPhoto(this)">
            <img src="../image/maintanance/6075823357724574844.jpg" alt="Thumbnail 2" onclick="displayPhoto(this)">
            <img src="../image/maintanance/6075823357724574845.jpg" alt="Thumbnail 2" onclick="displayPhoto(this)">
            <img src="../image/maintanance/6075823357724574846.jpg" alt="Thumbnail 2" onclick="displayPhoto(this)">
            <img src="../image/maintanance/6075823357724574847.jpg" alt="Thumbnail 2" onclick="displayPhoto(this)">
            <img src="../image/maintanance/photo_6339101326801223854_y.jpg" alt="Thumbnail 3"
                onclick="displayPhoto(this)">
            <img src="../image/maintanance/photo_6339101326801223855_y.jpg" alt="Thumbnail 4"
                onclick="displayPhoto(this)">
        </div>
        </div>
    </section>


    @component('components.upa-footer')
    @endcomponent

    <script>
        const thumbnails = document.querySelectorAll('.photo-thumbnails img');
        let currentIndex = 0;
        const autoSlideInterval = 5000;

        // Fungsi menampilkan foto dengan transisi
        function displayPhoto(thumbnail) {
            const mainPhoto = document.getElementById('main-photo');

            // Tambahkan efek fade-out
            mainPhoto.classList.add('fade-out');

            // Tunggu transisi selesai sebelum mengganti foto
            setTimeout(() => {
                mainPhoto.src = thumbnail.src;
                mainPhoto.alt = thumbnail.alt;
                mainPhoto.classList.remove('fade-out');
                mainPhoto.classList.add('fade-in'); // Tambahkan efek fade-in
            }, 500); // Sesuai dengan durasi transition di CSS

            currentIndex = Array.from(thumbnails).indexOf(thumbnail);
        }

        // Beralih ke foto berikutnya
        function nextPhoto() {
            currentIndex = (currentIndex + 1) % thumbnails.length;
            displayPhoto(thumbnails[currentIndex]);
        }

        // Beralih ke foto sebelumnya
        function prevPhoto() {
            currentIndex = (currentIndex - 1 + thumbnails.length) % thumbnails.length;
            displayPhoto(thumbnails[currentIndex]);
        }

        // Peralihan otomatis
        function startAutoSlide() {
            setInterval(nextPhoto, autoSlideInterval);
        }

        // Event listener untuk thumbnail
        thumbnails.forEach((thumbnail) => {
            thumbnail.addEventListener('click', () => displayPhoto(thumbnail));
        });

        // Jalankan peralihan otomatis
        startAutoSlide();
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init(); // Inisialisasi AOS
    </script>

    <script>
        const staffContainer = document.querySelector('.staff-container');
        const staffCards = document.querySelectorAll('.staff-card');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');

        const cardWidth = staffCards[0].offsetWidth + 10; // Lebar kartu + gap

        function updateCarousel() {
            const offset = -currentIndex * cardWidth;
            staffContainer.style.transform = `translateX(${offset}px)`;
        }

        // Tombol Next
        nextButton.addEventListener('click', () => {
            if (currentIndex < staffCards.length - 2) { // 5 kartu terlihat
                currentIndex++;
                updateCarousel();
            }
        });

        // Tombol Prev
        prevButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                updateCarousel();
            }
        });
    </script>

</body>

</html>
