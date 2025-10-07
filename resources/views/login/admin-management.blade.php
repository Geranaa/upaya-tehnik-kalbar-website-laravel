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
    @component('components.upa-navbar')
    @endcomponent

    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark" id="sidebar-wrapper">
            <div class="sidebar-heading text-white font-weight-bold py-3">Admin Dashboard </div>
            <div class="list-group list-group-flush">
                <a href="{{ route('showAD') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-home mr-2"></i>Home</a>
                <a href="{{ route('showAM') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-user mr-2"></i>Struktur Organisasi</a>
                <a href="{{ route('showAP') }}" class="list-group-item list-group-item-action bg-dark text-white">
                    <i class="fas fa-user mr-2"></i>Data Pegawai</a>
                <a href="{{ route('showAU') }}" class="list-group-item list-group-item-action bg-dark text-white">
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

            // Klik tombol Log Out di modal
            confirmLogout.addEventListener('click', () => {
                // Tambahkan logika untuk log-out (misalnya redirect ke halaman login)
                window.location.href = 'index.html'; // Contoh redirect
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

        <div id="entryModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h3 id="modalTitle">Add New Entry</h3>
                <form id="entryForm" action="{{ route('struktur.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <label for="foto">Foto:</label>
                    <input type="file" id="foto" name="foto">

                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" required>

                    <label for="jabatan">Jabatan:</label>
                    <select id="jabatan" name="jabatan" required>
                        <option value="Site Manager" jabatan=='Site Manager' ? 'selected' : ''>Site Manager</option>
                        <option value="Astman Project"jabatan=='Astman Project' ? 'selected' : ''>Astman Project
                        </option>
                        <option value="Astman Assurance" jabatan=='Astman Assurance' ? 'selected' : ''>Astman Assurance
                        </option>
                        <option value="Astman Provisioning" jabatan=='Astman Provisioning' ? 'selected' : ''>Astman
                            Provisioning</option>
                        <option value="Astman Maintenance" jabatan=='Astman Maintenance' ? 'selected' : ''>Astman
                            Maintenance</option>
                        <option value="Astman Project" jabatan=='Astman Project' ? 'selected' : ''>Astman Project
                        </option>
                        <option value="Admin Assurance" jabatan=='Admin Assurance' ? 'selected' : ''>Admin Assurance
                        </option>
                        <option value="Admin Provisioning" jabatan=='Admin Provisioning' ? 'selected' : ''>Admin
                            Provisioning
                        </option>
                        <option value="Admin Project" jabatan=='Admin Project' ? 'selected' : ''>Admin Project
                        </option>
                        <option value="Admin Project 2" jabatan=='Admin Project 2' ? 'selected' : ''>Admin Project 2
                        </option>
                        <option value="Admin Maintenance" jabatan=='Admin Maintenance' ? 'selected' : ''>Admin
                            Maintenance
                        </option>
                        <option value="Admin Logistik" jabatan=='Admin Logistik' ? 'selected' : ''>Admin Logistik
                        </option>
                    </select><br><br>

                    <button type="submit" class="btn btn-submit">Submit</button>
                </form>
            </div>
        </div>

        <div id="page-content-wrapper">


            <div class="structural-table-section" data-aos="fade-down">
                <h3>👥 Structural Management</h3>
                <p>Manage the structural management team and their positions in the system.</p>
                <div class="table-header">
                    <!-- Button for Creating New Employee -->
                    <button class="btn btn-create">➕ Create Employee</button>
                    <!-- Input Search -->
                    <input type="text" id="searchInput" class="search-input"
                        placeholder="Search by Name or Jabatan...">
                </div>
                @if ($struktur->isEmpty())
                    <h1>Tidak ada data pada Struktur Organisasi</h1>
                @else
                    <table class="user-table">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="structuralTableBody">
                            @foreach ($struktur as $staff)
                                <!-- Example Rows -->
                                <tr data-jabatan="Manager">
                                    <td>
                                        @if ($staff->foto)
                                            <img src="{{ asset('storage/struktur_foto/' . $staff->foto) }}"
                                                alt="Employee Photo" style="width: 150px; height: 150px;">
                                        @else
                                            <img src="https://via.placeholder.com/50"
                                                alt="Employee Photo (No Image Provided)">
                                        @endif
                                    </td>
                                    <td>{{ $staff->nama }}</td>
                                    <td>{{ $staff->jabatan }}</td>

                                    <td>
                                        <a href="{{ route('struktur.edit', $staff->id) }}"
                                            class="btn btn-edit">Edit</a>
                                        <button class="btn btn-delete" data-id="{{ $staff->id }}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Rows from database will be dynamically inserted here -->
                        </tbody>
                    </table>
            </div>
            @endif

            <!-- Modal -->

            <!-- Delete Confirmation Modal -->
            @if ($struktur->isEmpty())
            @else
                <!-- Delete ConfirmationModal -->
                <div id="deleteModal" class="modal">
                    <div class="modal-content">
                        <h3>Are you sure?</h3>
                        <p>Do you really want to delete this employee? This process cannot be undone.</p>
                        <div class="modal-actions">
                            <form id="deleteForm" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" id="confirmDelete" class="btn btn-delete">Yes,
                                    Delete</button>
                            </form>
                            <button id="cancelDelete" class="btn btn-cancel">Cancel</button>
                        </div>
                    </div>
                </div>
            @endif

            <script>
                const deleteModal = document.getElementById('deleteModal');
                const confirmDelete = document.getElementById('confirmDelete');
                const cancelDelete = document.getElementById('cancelDelete');
                const deleteForm = document.getElementById('deleteForm');

                // Event listener for delete buttons
                document.querySelectorAll('.btn-delete').forEach(button => {
                    cancelDelete.addEventListener('click', () => {
                        deleteModal.style.display = 'none';
                    });
                    button.addEventListener('click', (event) => {
                        const id = event.target.dataset?.id;
                        if (id) {
                            event.preventDefault();
                            deleteForm.action = `/admin-management/${id}`;
                            deleteModal.style.display = 'block';
                        } else {

                        }
                    });
                });

                // Close the modal when clicking outside the content area
                window.addEventListener('click', (event) => {
                    if (event.target === deleteModal) {
                        deleteModal.style.display = 'none';
                    }
                });
            </script>
            <!-- JavaScript for toggling sidebar -->
            <script src="/javasricpt/jquery-3.3.1.min.js"></script>
            <script src="/javasricpt/bootstrap.min.js"></script>
            <script>
                $("#menu-toggle").click(function(e) {
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


            <script>
                const searchInput = document.getElementById('searchInput');
                const structuralTableBody = document.getElementById('structuralTableBody');

                function filterTable() {
                    const searchTerm = searchInput.value.toLowerCase();
                    const rows = structuralTableBody.getElementsByTagName('tr');

                    Array.from(rows).forEach(row => {
                        const nama = row.cells[1].textContent.toLowerCase();
                        const jabatan = row.cells[2].textContent.toLowerCase();

                        if (nama.includes(searchTerm) || jabatan.includes(searchTerm)) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    });
                }

                searchInput.addEventListener('input', filterTable);
            </script>

            <script>
                const modal = document.getElementById('entryModal');
                const closeModal = document.querySelector('.close');
                const form = document.getElementById('entryForm');
                const modalTitle = document.getElementById('modalTitle');

                // Event listener to open the modal for creating new entries
                document.querySelector('.btn-create').addEventListener('click', () => {
                    modalTitle.textContent = 'Add New Entry';
                    form.reset();
                    modal.style.display = 'flex';
                });


                // Event listener for closing the modal
                closeModal.addEventListener('click', () => {
                    modal.style.display = 'none';
                });


                // Close the modal when clicking outside the content area
                window.addEventListener('click', (event) => {
                    if (event.target === modal) {
                        modal.style.display = 'none';
                    }
                });
            </script>

</body>

</html>
