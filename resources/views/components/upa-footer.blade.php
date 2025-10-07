<style>
    .footer {
        background-color: #01953f;
        color: white;
        padding: 40px 20px;
        text-align: center;
    }

    .footer-content {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        max-width: 1200px;
        margin: 0 auto;
        text-align: left;
    }

    .footer-section h3,
    .footer-section h4 {
        margin: 0 0px 10px;
        font-size: 1.2rem;
        color: #FFD700;
        /* Highlight judul */
    }

    .footer-section p {
        margin: 5px 0;
        font-size: 0.9rem;
    }

    .footer-section p:hover {
        text-decoration: underline;
        /* Efek interaktif */
        cursor: pointer;
    }

    .footer-section a {
        color: white;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .footer-section a:hover {
        color: #FFD700;
    }



    .footer-logo {
        display: flex;
        justify-content: start;
        /* Pusatkan logo secara horizontal */
        gap: 20px;
        /* Berikan jarak antar logo */
        align-items: start;
        margin: 0 0 0 auto;
    }

    .footer-logo img {
        height: 50px;
        width: auto;
        margin: 0;
        /* Beri jarak antar logo */
        transition: transform 0.3s ease;
        /* Efek hover opsional */

    }

    .footer-logo img:hover {
        transform: scale(1.1);
        /* Perbesar logo saat hover */
    }


    .copyright {
        background-color: #007330;
        color: white;
        text-align: center;
        padding: 10px 0;
        font-size: 0.9rem;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
    }
</style>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <h3>PT. Upaya Tehnik</h3>
            <p>Area Kalimantan Barat - Pontianak Kota
            <p>
            <p>JL. Silat No. P.61 RT.05/RW.010 </p>
            <p>Pontianak Tenggara,Kota pontianak,Kalimantan Barat</p>
        </div>
        <div class="footer-section">
            <h4>Kontak</h4>
            <p>Telepon: (0561) 123-456</p>
            <p>Email: upayatehnikkalbar@gmail.com</p>
        </div>
        <div class="footer-section">
            <h4>Mitra Kami</h4>
            <div class="footer-logo">
                <img src="/image/Telkom_Akses.webp" alt="Mitra Logo 1">
                <img src="/image/logo.png" alt="Mitra Logo 2">
            </div>
        </div>
</footer>
<section class="copyright">
    <p>Copyright © 2025 PT Upaya Tehnik. All Rights Reserved.</p>
</section>
