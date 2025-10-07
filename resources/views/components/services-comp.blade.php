<style>
    .service-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        max-width: 1000px;
        margin: 0 auto;
    }

    .service-item {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .service-item i {
        font-size: 40px;
        color: #036F5E;
        margin-bottom: 10px;
    }

    .service-item:hover {
        outline: #017c33;
        /* Warna hijau lebih gelap */
        transform: scale(1.1);
        /* Tombol sedikit membesar */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        /* Bayangan lebih besar saat hover */
    }

    .service-item button {
        background-color: #01953f;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 20px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.3s ease, transform 0.3s ease;
        /* Transisi untuk efek hover */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        /* Bayangan untuk tombol */
    }

    .service-item button:hover {
        background-color: #017c33;
        /* Warna hijau lebih gelap */
        transform: scale(1.1);
        /* Tombol sedikit membesar */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        /* Bayangan lebih besar saat hover */
    }

    /* Efek saat tombol ditekan */
    .service-item button:active {
        transform: scale(0.95);
        /* Tombol sedikit mengecil */
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
        /* Bayangan lebih kecil */
    }
</style>


<div class="service-grid">
    <div class="service-item">
        <i class="fas fa-network-wired"></i>
        <h3>Assurance</h3>
        <button onclick="redirectToFile('{{ route('layanan_ioan') }}')">Lebih Selengkapnya</button>
    </div>
    <div class="service-item">
        <i class="fas fa-broadcast-tower"></i>
        <h3>Provisioning</h3>
        <button onclick="redirectToFile('{{ route('layanan_provi') }}')">Lebih Selengkapnya</button>
    </div>
    <div class="service-item">
        <i class="fas fa-tools"></i>
        <h3>Maintenance</h3>
        <button onclick="redirectToFile('{{ route('layanan_maintenance') }}')">Lebih Selengkapnya</button>
    </div>
    <div class="service-item">
        <i class="fas fa-project-diagram"></i>
        <h3>Project</h3>
        <button onclick="redirectToFile('{{ route('layanan_project') }}')">Lebih Selengkapnya</button>
    </div>
</div>


<script>
    function redirectToFile(fileName) {
        // Redirect ke file yang ditentukan
        window.location.href = fileName;
    }
</script>
