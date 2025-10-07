<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. Upaya Tehnik Group</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/contact.css">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    @component('components.upa-navbar')
    @endcomponent

    <section class="contact-section">
        <h2>Hubungi Kami</h2>
        <p>Kami siap membantu Anda! Kirimkan pesan, pertanyaan, atau saran Anda, dan kami akan segera menghubungi Anda
            kembali.</p>

        <div class="contact-info">
            <div class="office-details">
                <h3>Kantor Pusat & Logistik</h3>
                <p><i class="fas fa-map-marker-alt"></i> JL. Silat No. P.61 RT.05/RW.010 Pontianak Tenggara,Kota
                    pontianak,Kalimantan Barat</p>
                <p><i class="fas fa-phone-alt"></i> 6221-566-5262</p>
                <p><i class="fas fa-envelope"></i> upayatehnikkalbar@gmail.com</p>
            </div>
            <div class="contact-image">
                <img src="/image/logo.png" alt="Company Logo">
            </div>
        </div>

        <div class="contact-details">
            <a href="https://wa.me/6281234567890" target="_blank" class="whatsapp-link">
                <i class="fab fa-whatsapp"></i> Chat via WhatsApp
            </a>

            <!-- Email Link -->
            <a href="upayatehnikkalbar@gmail.com" class="email-link">
                <i class="fas fa-envelope"></i> Kirim Email
            </a>
        </div>

        <p class="form-note">Kami menghargai setiap pesan Anda. Respon akan kami kirim dalam waktu kurang dari 24 jam.
        </p>

    </section>


    @component('components.upa-footer')
    @endcomponent



</body>

</html>
