<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Upaya Tehnik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    @component('components.upa-navbar')
    @endcomponent

    <section class="hero" id="hero-section`">
        <div class="hero-overlay">
            <div class="hero-content">
                <img src="/image/logo.png" alt="Logo" class="hero-logo">
                <div class="hero-text">
                    <h1>PT. Upaya Tehnik</h1>
                    <p>Area Kalimantan Barat, Pontianak Kota</p>
                    <p class="italic">"UT GO BEYOND"</p>
                </div>
            </div>
        </div>
    </section>
    <script>
        const heroSection = document.querySelector('.hero');
        const images = [
            '/image/home/6124965063560380340.jpg',
            '/image/home/6332084071794065575.jpg',
            '/image/home/6332084071794065572.jpg',
            '/image/home/6332084071794065576.jpg'
        ];
        let currentIndex = 0;

        function changeBackground() {
            currentIndex = (currentIndex + 1) % images.length;
            heroSection.style.backgroundImage = `url('${images[currentIndex]}')`;
        }

        setInterval(changeBackground, 5000); // Ganti gambar setiap 5 detik
    </script>


    <section class="about">
        <h2>Tentang Kami</h2>
    </section>

    <section class="content">
        <p>
            PT. Upaya Tehnik merupakan perusahaan yang bergerak di bidang Telekomunikasi Jaringan. PT. Upaya Tehnik
            memiliki proyek jangka panjang atau kerja sama dengan PT. Telkom & PT. Telkom Akses untuk memelihara
            jaringan fiber optik
            di berbagai area Kalimantan Barat dan mulai memperluas layanan outsourcing kami yang tidak hanya pada
            jaringan Telkom dan Telkom Akses
            tapi juga di industri lain melalui perusahaan afiliasi.
        </p>
        <button onclick="redirectToFile('{{ route('profilPerusahaan') }}')">Lebih Selengkapnya</button>
    </section>

    <section class="services">
        <h2>Layanan Kami</h2>
        @component('components.services-comp')
        @endcomponent
    </section>

    @component('components.upa-footer')
    @endcomponent

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200, // Animation duration
        });
    </script>

</body>

</html>
