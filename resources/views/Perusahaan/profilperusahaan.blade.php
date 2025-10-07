<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Upaya Tehnik </title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/profil.css">
    <link rel="stylesheet" href="/css/staffcard.css">
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
                '/image/home/6192799901587453934.jpg',
                '/image/home/6332084071794065575.jpg',
                '/image/home/6332084071794065580.jpg'
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

    <section class="sejarah-perusahaan">
        <div class="hr-short"></div>
        <h2>Apa Sejarah Perusahaan Kami?</h2>
        <div class="timeline-item" data-aos="fade-down">
            <h3>PT. Upaya Tehnik</h3>
            <p>
                Upaya Tehnik awalnya didirikan pada tahun 1989 sebagai perusahaan yang bergerak di bidang
                konstruksi dan perdagangan.
                Pada tahun 1996, perusahaan melakukan restrukturisasi untuk fokus secara eksklusif pada proyek
                konstruksi dan implementasi
                guna memenuhi kebutuhan pengembangan industri telekomunikasi. Dengan tujuan untuk mengoptimalkan
                pemanfaatan tenaga kerja nasional
                yang memiliki keterampilan tinggi, CV. Upaya Tehnik kini memiliki kompetensi inti dalam
                menangani gangguan telekomunikasi
                serta menyediakan layanan pemeliharaan.
            </p>
        </div>
        </div>
        <section class="visi-misi-section">
            <div class="visi-misi-header">
                <h2>Apa Visi dan Misi Kami?</h2>
                <div class="hr-long"></div>
            </div>
            <div class="visi-misi-container" data-aos="fade-down">
                <div class="visi">
                    <h3>Visi</h3>
                    <p>
                        Menjadi perusahaan yang andal dan terpercaya dalam bidang teknik, penyedia layanan,
                        outsourcing, integrator sistem, serta kontraktor di industri telekomunikasi.
                    </p>
                </div>
                <div class="misi">
                    <h3>Misi</h3>
                    <p>
                        Memahami secara menyeluruh kebutuhan pelanggan di bidang telekomunikasi dan menjadi mitra
                        mereka dalam menyelesaikan proyek dengan menyediakan layanan dan material terbaik melalui
                        tenaga kerja yang terampil hingga serah terima kepada pelanggan.
                    </p>
                </div>
            </div>
        </section>
    </section>


    <section class="kenapa-pilih-kami">
        <div class="hr-short"></div>
        <h2>Kenapa Anda Harus Memilih Kami?</h2>
        <div class="keunggulan-container">
            <div class="keunggulan-item" data-aos="fade-down">
                <i class="fas fa-network-wired"></i>
                <h3>Kecepatan Adaptasi Teknologi</h3>
                <p>Kami selalu mengikuti perkembangan teknologi untuk memberikan layanan terbaik kepada pelanggan.</p>
            </div>
            <div class="keunggulan-item" data-aos="fade-down">
                <i class="fas fa-tools"></i>
                <h3>Teknisi Yang Kompeten</h3>
                <p>Kami memiliki teknisi yang bersertifikasi dan kompeten di bidang fiber optik </p>
            </div>
            <div class="keunggulan-item" data-aos="fade-down">
                <i class="fas fa-headset"></i>
                <h3>Layanan Pelanggan Terbaik</h3>
                <p>Komitmen kami adalah memberikan layanan cepat, responsif, dan ramah untuk setiap kebutuhan Anda.</p>
            </div>
        </div>
    </section>

    <div class="map-container">
        <div class="hr-short"></div>
        <h2>Dimana Saja Kah Kami beroperasi?</h2>
        <img src="/image/peta_kalbar.jpg" alt="Peta Kalimantan Barat">
        <div class="hotspot hotspot1" onclick="openModal('modal1')"> <span>Sambas</span> </div>
        <div class="hotspot hotspot2" onclick="openModal('modal2')"> <span>Singkawang</span> </div>
        <div class="hotspot hotspot3" onclick="openModal('modal3')"> <span>Mempawah</span> </div>
        <div class="hotspot hotspot4" onclick="openModal('modal4')"> <span>Pontianak</span> </div>
        <div class="hotspot hotspot5" onclick="openModal('modal5')"> <span>Kubu Raya</span> </div>
        <div class="hotspot hotspot6" onclick="openModal('modal7')"> <span>Sintang</span> </div>
        <div class="hotspot hotspot7" onclick="openModal('modal6')"> <span>Ketapang</span> </div>
        <div class="hotspot hotspot8" onclick="openModal('modal8')"> <span>siantan</span> </div>

    </div>

    <!-- Modal 1 -->
    <div class="modal" id="modal1">
        <h2>Sambas</h2>
        <div class="carousel">
            <div class="slides">
                <img src="/image/cabang/sambas.jpg" alt="Sambas area">
                <img src="/image/cabang/snw.jpg" alt="Sambas dokumentasi">
            </div>
        </div>
        <div class="nav arrow left" onclick="prevSlide()">&larr;</div>
        <div class="nav arrow right" onclick="nextSlide()">&rarr;</div>
        <p class="description">
        </p>
        <div class="map-link">
            <a href="https://maps.app.goo.gl/DhUzYv6oUJ8VxB2C8?g_st=atm" target="_blank">Lihat di Google Maps</a>
        </div>
        <button class="close" onclick="closeModal()">Tutup</button>
    </div>

    <!-- Modal 2 -->
    <div class="modal" id="modal2">
        <h2>Singkawang</h2>
        <div class="carousel">
            <div class="slides">
                <img src="/image/cabang/singkawang.jpg" alt="Singkawang area">
                <img src="/image/cabang/snw.jpg" alt="Singkawang dokumentasi">

            </div>
        </div>
        <div class="nav arrow left" onclick="prevSlide()">&larr;</div>
        <div class="nav arrow right" onclick="nextSlide()">&rarr;</div>
        <p class="description"></p>
        <div class="map-link">
            <a href="https://maps.app.goo.gl/TSvRYm5487uymRVr6" target="_blank">Lihat di Google Maps</a>
        </div>
        <button class="close" onclick="closeModal()">Tutup</button>
    </div>

    <!-- Modal 3 -->
    <div class="modal" id="modal3">
        <h2>Mempawah</h2>
        <div class="carousel">
            <div class="slides">
                <img src="/image/cabang/mempawah.jpg" alt="Mempawah area">
                <img src="/image/cabang/sta.jpg" alt="Mempawah dokumentasi">

            </div>
        </div>
        <div class="nav arrow left" onclick="prevSlide()">&larr;</div>
        <div class="nav arrow right" onclick="nextSlide()">&rarr;</div>
        <p class="description"></p>
        <div class="map-link">
            <a href="https://maps.app.goo.gl/KSS3Gd6Rsf5gbmLQ6" target="_blank">Lihat di Google Maps</a>
        </div>
        <button class="close" onclick="closeModal()">Tutup</button>
    </div>

    <!-- Modal 4 -->
    <div class="modal" id="modal4">
        <h2>Pontianak</h2>
        <div class="carousel">
            <div class="slides">
                <img src="/image/cabang/pontianak.jpg" alt="Pontianak area">
                <img src="/image/cabang/pontianak_dok.jpg" alt="Pontianak dokumentasi">
            </div>
            <div class="nav arrow left" onclick="prevSlide()">&larr;</div>
            <div class="nav arrow right" onclick="nextSlide()">&rarr;</div>
        </div>
        <p class="description">Keterangan foto Pontianak 1</p>
        <div class="map-link">
            <a href="https://maps.app.goo.gl/6hrcT1BwVQendQAe6" target="_blank">Lihat di Google Maps</a>
        </div>
        <button class="close" onclick="closeModal()">Tutup</button>
    </div>

    <!-- Modal 5 -->
    <div class="modal" id="modal5">
        <h2>Kubu Raya</h2>
        <div class="carousel">
            <div class="slides">
                <img src="/image/cabang/sungai raya.jpg" alt="Kubu Raya 1">
                <img src="/image/cabang/sry.jpg" alt="sungai raya dalam dok">

            </div>
        </div>
        <div class="nav arrow left" onclick="prevSlide()">&larr;</div>
        <div class="nav arrow right" onclick="nextSlide()">&rarr;</div>
        <p class="description">Keterangan foto Kubu Raya 1</p>
        <div class="map-link">
            <a href="https://maps.app.goo.gl/goBfV9H5SYCKFZgv8" target="_blank">Lihat di Google Maps</a>
        </div>
        <button class="close" onclick="closeModal()">Tutup</button>
    </div>

    <!-- Modal 6 -->
    <div class="modal" id="modal6">
        <h2>Wilayah Ketapang</h2>
        <div class="carousel">
            <div class="slides">
                <img src="/image/cabang/IMG-20240725-WA0027.jpg" alt="ketapang">
                <img src="/image/cabang/ktp.jpg" alt="ktp dokumentasi">
            </div>
        </div>
        <div class="nav arrow left" onclick="prevSlide()">&larr;</div>
        <div class="nav arrow right" onclick="nextSlide()">&rarr;</div>
        <p class="description">Keterangan foto Ketapang 1</p>
        <div class="map-link">
            <a href="https://maps.app.goo.gl/whmHGHrXN9aP1YbYA" target="_blank">Lihat di Google Maps</a>
        </div>
        <button class="close" onclick="closeModal()">Tutup</button>
    </div>

    <!-- Modal 7 -->
    <div class="modal" id="modal7">
        <h2>Sintang</h2>
        <div class="carousel">
            <div class="slides">
                <img src="/image/cabang/ketapang.jpg" alt="Sintang area">
                <img src="/image/cabang/stg.jpg" alt="sintang area">
            </div>
        </div>
        <div class="nav arrow left" onclick="prevSlide()">&larr;</div>
        <div class="nav arrow right" onclick="nextSlide()">&rarr;</div>
        <p class="description">Keterangan foto Sintang 1</p>
        <div class="map-link">
            <a href="https://maps.app.goo.gl/KwD6whjeREtZS6k8A" target="_blank">Lihat di Google Maps</a>
        </div>
        <button class="close" onclick="closeModal()">Tutup</button>
    </div>

    <!-- Modal 8 -->
    <div class="modal" id="modal8">
        <h2>Siatan</h2>
        <div class="carousel">
            <div class="slides">
                <img src="/image/cabang/siantan.jpg" alt="Sintang 1">
                <img src="/image/cabang/sta.jpg" alt="Sintang 1">

            </div>
        </div>
        <div class="nav arrow left" onclick="prevSlide()">&larr;</div>
        <div class="nav arrow right" onclick="nextSlide()">&rarr;</div>
        <p class="description">Keterangan foto siatan</p>
        <div class="map-link">
            <a href="https://maps.app.goo.gl/KwD6whjeREtZS6k8A" target="_blank">Lihat di Google Maps</a>
        </div>
        <button class="close" onclick="closeModal()">Tutup</button>
    </div>


    <div class="overlay" id="overlay" onclick="closeModal()"></div>


    </section>

    <section class="gallery-section">
        <div class="photo-gallery">
            <div class="hr-short"></div>
            <h2>Apa Saja Prestasi Kami?</h2>
            <br>
            <div class="photo-display">
                <button class="arrow left-arrow" onclick="prevPhoto()">&#9664;</button>
                <img id="main-photo" src="../image/prestasi/6334345299060966145 (1).jpg" alt="Foto Utama">
                <button class="arrow right-arrow" onclick="nextPhoto()">&#9654;</button>
            </div>

            <div class="photo-thumbnails">
                <img src="../image/prestasi/6334345299060966145 (1).jpg" alt="Thumbnail 1"
                    onclick="displayPhoto(this)">
                <img src="../image/prestasi/6334449013931228526.jpg" alt="Thumbnail 2" onclick="displayPhoto(this)">
                <img src="../image/ioan/6075483947934008252.jpg" alt="Thumbnail 1" onclick="displayPhoto(this)">
                <img src="../image/prestasi/6332084071794065583.jpg" alt="Thumbnail 3" onclick="displayPhoto(this)">
                <img src="../image/prestasi/6334449013931228476.jpg" alt="Thumbnail 5" onclick="displayPhoto(this)">
                <img src="../image/prestasi/6334449013931228633.jpg" alt="Thumbnail 5" onclick="displayPhoto(this)">
                <img src="../image/prestasi/6334345299060966143.jpg" alt="Thumbnail 6" onclick="displayPhoto(this)">
            </div>
        </div>
    </section>
    </div>
    </section>


    <section class="services">
        <h2>Layanan Kami</h2>
        @component('components.services-comp')
        @endcomponent
    </section>

    @component('components.upa-footer')
    @endcomponent


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        AOS.init(); // Inisialisasi AOS
    </script>

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

    <script>
        let currentSlide = 0;

        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            const overlay = document.getElementById('overlay');
            modal.style.display = 'block';
            overlay.style.display = 'block';
            modal.style.animation = 'slideIn 0.5s ease-out'; // Animasi modal masuk dari kiri

            // Menambahkan fokus hanya pada modal
            document.body.style.overflow = 'hidden';
            Array.from(document.body.children).forEach(child => {
                if (child !== modal && child !== overlay) {
                    child.setAttribute('aria-hidden', 'true');
                }
            });

            updateDescription(modalId, 0); // Set deskripsi slide pertama
        }

        function closeModal() {
            const modals = document.querySelectorAll('.modal');
            const overlay = document.getElementById('overlay');
            modals.forEach(modal => {
                modal.style.display = 'none';
                modal.style.animation = ''; // Reset animasi
            });
            overlay.style.display = 'none';

            // Mengembalikan fokus pada semua elemen
            document.body.style.overflow = '';
            Array.from(document.body.children).forEach(child => {
                if (child.hasAttribute('aria-hidden')) {
                    child.removeAttribute('aria-hidden');
                }
            });
        }

        function nextSlide() {
            const activeModal = document.querySelector('.modal[style*="block"]');
            const slides = activeModal.querySelector('.slides');
            const slideCount = slides.children.length;
            currentSlide = (currentSlide + 1) % slideCount;
            slides.style.transform = `translateX(-${currentSlide * 100}%)`;
            updateDescription(activeModal.id, currentSlide);
        }

        function prevSlide() {
            const activeModal = document.querySelector('.modal[style*="block"]');
            const slides = activeModal.querySelector('.slides');
            const slideCount = slides.children.length;
            currentSlide = (currentSlide - 1 + slideCount) % slideCount;
            slides.style.transform = `translateX(-${currentSlide * 100}%)`;
            updateDescription(activeModal.id, currentSlide);
        }

        function updateDescription(modalId, slideIndex) {
            const descriptions = {
                modal1: [
                    "Sambas merupakan area Singkawang 02 yang terdiri dari sektor Sambas, Wilsus Tebas dan Wilsus Pemangkat",
                    " dengan jumlah teknisi 16 orang untuk layanan IOAN, Provisioning dan Maintenance"
                ],
                modal2: [
                    "Singkawang merupakan area Singkawang 01 yang terdiri dari sektor Singkawang, Wilsus Karimunting, Wilsus Bengkayang, dan Wilsus Sanggau Ledo",
                    " dengan jumlah teknisi 34 orang untuk layanan IOAN, Provisioning, dan Maintenance"
                ],
                modal3: ["Mempawah terdiri dari Area Sungai Pinyuh, Anjungan, Sungai Duri, dan Wilsus Mandor",
                    " dengan jumlah teknisi 27 orang untuk layanan IOAN, Provisioning, dan Maintenance"
                ],
                modal4: [
                    "Pontianak terdiri dari beberapa sektor, yaitu Sektor Pontianak 03, Sektor Pontianak 04, dan Sektor Sungai Jawi",
                    " dengan jumlah teknisi 89 orang untuk layanan IOAN, Provisioning, Maintenance dan Project"
                ],
                modal5: [
                    "Kubu Raya terdiri dari beberapa sektor, yaitu Sektor Sungai Raya Dalam, Sektor Sungai Raya, dan Wilsus Rasau dengan",
                    " jumlah teknisi 37 orang untuk layanan IOAN, dan Provisioning"
                ],
                modal6: [
                    "Sektor Sintang terdiri dari Area Sintang, Wilsus Melawi, Wilsus Putussibau, dan Wilsus Semangut",
                    " dengan jumlah teknisi 37 orang untuk layanan IOAN, Provisioning, dan Maintenance"
                ],
                modal7: [
                    "Sektor Ketapang terdiri dari Area Ketapang, Wilsus Kayong Utara, Wilsus Kendawangan, Wilsus Pesagoan, dan Wilsus Tayap",
                    " dengan jumlah teknisi 47 orang untuk layanan IOAN, Provisioning, dan Maintenance"
                ],
                modal8: ["Sektor Siantan terdiri dari Area Siatan dan Wilsus Junkat",
                    " dengan jumlah teknisi 19 orang untuk layanan IOAN, dan Provisioning"
                ]
            };

            const modal = document.getElementById(modalId);
            const description = modal.querySelector('.description');
            description.textContent = descriptions[modalId][slideIndex];
        }


        // Animasi modal dari kiri ke tengah
        const styles = document.createElement('style');
        styles.textContent = `
      @keyframes slideIn {
        from {
          transform: translateX(-100%);
          opacity: 0;
        }
        to {
          transform: translate(-50%, -50%);
          opacity: 1;
        }
      }
    `;
        document.head.appendChild(styles);
    </script>


</body>


</html>
