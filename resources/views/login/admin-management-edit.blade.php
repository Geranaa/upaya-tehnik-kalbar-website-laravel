<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="/javasricpt/jquery-3.3.1.min.js"></script>
    <script src="/javasricpt/bootstrap.min.js"></script>


    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .modal {
            display: flex;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            justify-content: center;
            align-items: center;
            align-content: center;
        }

        .modal-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            max-width: 90%;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .modalTitle {
            display: flex;
            align-items: center;
            justify-content: center;
            align-content: center
        }

        */ .modal h3 {
            margin-top: 0;

        }

        .modal label {
            display: block;
            margin: 10px 0 5px;
        }

        .modal input {
            width: calc(100% - 20px);
            padding: 8px 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .btn-submit {
            background-color: #007bff;
            color: white;
            padding: 11px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .btn-cancel {
            text-decoration: none;
            background-color: #6c757d;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            max-height: 100px;
        }

        .btn-cancel:hover {
            background-color: #5a6268;
        }

        select {
            padding: 8px 15px;
            font-size: 1em;
            border-radius: 5px;
            cursor: pointer;
        }

        .search-input {
            padding: 12px 20px;
            /* Memberikan padding lebih besar untuk kenyamanan */
            font-size: 1.1em;
            /* Ukuran font sedikit lebih besar */
            border-radius: 25px;
            /* Membuat sudut lebih melengkung */
            margin-left: 10px;
            /* Jarak kiri */
            width: 300px;
            /* Lebar lebih panjang */
            border: 1px solid #ccc;
            /* Border lebih lembut dengan warna abu-abu */
            transition: all 0.3s ease;
            /* Transisi halus untuk efek hover dan focus */
            outline: none;
            /* Menghilangkan outline default saat input difokuskan */
        }

        .search-input:hover {
            border-color: #007bff;
            /* Border berubah warna saat hover */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            /* Menambahkan bayangan */
        }

        .search-input:focus {
            border-color: #28a745;
            /* Border berubah saat fokus */
            box-shadow: 0 0 8px rgba(40, 167, 69, 0.5);
            /* Menambahkan bayangan hijau saat fokus */
            background-color: #f8f9fa;
            /* Latar belakang menjadi lebih terang saat fokus */
        }

        span.text {
            font-size: 12px;
            color: #007bff;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div id="entryModal" class="modal">
        <div class="modal-content">
            <h3 id="modalTitle">Edit Data Pejabat Struktural</h3>
            <form id="entryForm" action="{{ route('struktur.update', $struktur->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <label for="foto">Foto: <span class="text">{{ $struktur->foto }}</span></label>
                <input type="file" id="foto" name="foto" value="{{ $struktur->foto }}">


                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ $struktur->nama }}" required>

                <label for="jabatan">Jabatan:</label>
                <select id="jabatan" name="jabatan" required>
                    <option value="Site Manager"
                        {{ old('jabatan', $struktur->jabatan) == 'Site Manager' ? 'selected' : '' }}>Site Manager
                    </option>
                    <option value="Astman Project"
                        {{ old('jabatan', $struktur->jabatan) == 'Astman Project' ? 'selected' : '' }}>Astman Project
                    </option>
                    <option value="Astman Assurance"
                        {{ old('jabatan', $struktur->jabatan) == 'Astman Assurance' ? 'selected' : '' }}>Astman
                        Assurance
                    </option>
                    <option value="Astman Provisioning"
                        {{ old('jabatan', $struktur->jabatan) == 'Astman Provisioning' ? 'selected' : '' }}>Astman
                        Provisioning</option>
                    <option value="Astman Maintenance"
                        {{ old('jabatan', $struktur->jabatan) == 'Astman Maintenance' ? 'selected' : '' }}>Astman
                        Maintenance</option>
                    <option value="Astman Project"
                        {{ old('jabatan', $struktur->jabatan) == 'Astman Project' ? 'selected' : '' }}>Astman Project
                    </option>
                    <option value="Admin Assurance"
                        {{ old('jabatan', $struktur->jabatan) == 'Admin Assurance' ? 'selected' : '' }}>Admin Assurance
                    </option>
                    <option value="Admin Provisioning"
                        {{ old('jabatan', $struktur->jabatan) == 'Admin Provisioning' ? 'selected' : '' }}>Admin
                        Provisioning
                    </option>
                    <option value="Admin Project"
                        {{ old('jabatan', $struktur->jabatan) == 'Admin Project' ? 'selected' : '' }}>Admin Project
                    </option>
                    <option value="Admin Project 2"
                        {{ old('jabatan', $struktur->jabatan) == 'Admin Project 2' ? 'selected' : '' }}>Admin Project 2
                    </option>
                    <option value="Admin Maintenance"
                        {{ old('jabatan', $struktur->jabatan) == 'Admin Maintenance' ? 'selected' : '' }}>Admin
                        Maintenance
                    </option>
                    <option value="Admin Logistik"
                        {{ old('jabatan', $struktur->jabatan) == 'Admin Logistik' ? 'selected' : '' }}>Admin Logistik
                    </option>
                </select><br><br>

                <button type="submit" class="btn btn-submit">Submit</button>
                <a href="{{ route('showAM') }}" type="button" id="btn-cancel" class="btn btn-cancel">Cancel</a>
            </form>
        </div>
    </div>

</body>

</html>
