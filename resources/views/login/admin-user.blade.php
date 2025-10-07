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

        <div id="page-content-wrapper">
            <div class="user-table-section" data-aos="fade-down">
                <h3>👥 Admin Account</h3>
                <p>Manage the list of users and their roles in the system.</p>
                <div class="table-header">
                    <button class="btn btn-create">➕ Create User</button>
                    <!-- Filter Role Dropdown -->
                    <select id="roleFilter" class="btn btn-filter">
                        <option value="">All Roles</option>
                        <option value="Administrator">Administrator</option>
                        <option value="Divisi admin">Admin Layanan</option>
                        <option value="Admin">Admin</option>
                    </select>
                    <!-- Input Search -->
                    <input type="text" id="searchInput" class="search-input"
                        placeholder="Search by NIK, Username, or Name...">
                </div>
                @if ($user->isEmpty())
                    <h1 style="color: gray">Tidak ada data admin</h1>
                @else
                    <table class="user-table">
                        <thead>
                            <tr>
                                <th>NIK</th>
                                <th>Username (Email)</th>
                                <th>Nama</th>
                                <th>Divisi</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            @foreach ($user as $admin)
                                <!-- Example row -->
                                <tr data-role="Administrator">
                                    <td>{{ $admin->nik }}</td>
                                    <td>{{ $admin->email }}</td>
                                    <td>{{ $admin->nama }}</td>
                                    <td>{{ $admin->role }}</td>
                                    <td>
                                        <a href="{{ route('user.edit', $admin->id) }}" class="btn btn-edit">Edit</a>
                                        <button class="btn btn-delete" data-id="{{ $admin->id }}">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                            <!-- Rows from database will be injected here -->
                        </tbody>
                    </table>
            </div>
            @endif



        </div>

        <div id="userModal" class="modal">
            <div class="modal-content">
                <h3 id="userModalTitle">Add User</h3>
                <form id="userForm" action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <label for="nik">NIK:</label>
                    <input type="number" id="nik" name="nik" placeholder="Enter NIK" required>

                    <label for="telepon">Telepon:</label>
                    <input type="number" id="telepon" name="telepon" placeholder="Enter Phone Number" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="Enter Email" required>

                    <label for="nama">Name:</label>
                    <input type="text" id="nama" name="nama" placeholder="Enter Name" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Enter Password" required>

                    <label for="role">Role:</label>
                    <span style="font-size: 12px;color: #0056b3;">(Seluruh role dinyatakan sebagai Administrator,
                        membutuhkan
                        penanganan
                        lebih lanjut)</span><br>
                    <select id="role" name="role" required>
                        <option value="Administrator">Administrator</option>
                        <option value="Admin Layanan">Admin Layanan</option>
                        <option value="Admin">Admin</option>
                    </select>

                    <div class="modal-actions">
                        <button type="submit" class="btn btn-save">Save</button>
                        <button type="button" id="cancelUserForm" class="btn btn-cancel">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

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

        <script>
            const deleteModal = document.getElementById('deleteModal');
            const confirmDelete = document.getElementById('confirmDelete');
            const cancelDelete = document.getElementById('cancelDelete');
            const deleteForm = document.getElementById('deleteForm');
            let rowToDelete = null; // Store the row to delete temporarily

            // Event listener for delete buttons
            document.querySelectorAll('.btn-delete').forEach(button => {
                cancelDelete.addEventListener('click', () => {
                    deleteModal.style.display = 'none';
                });
                button.addEventListener('click', (event) => {
                    const id = event.target.dataset?.id;
                    if (id) {
                        event.preventDefault();
                        deleteForm.action = `/admin-user/${id}`;
                        deleteModal.style.display = 'block';
                    } else {

                    }
                });
            });
            // Event listener for canceling deletion
            cancelDelete.addEventListener('click', () => {
                rowToDelete = null; // Clear the reference
                deleteModal.style.display = 'none';
            });

            // Close the modal when clicking outside the content area
            window.addEventListener('click', (event) => {
                if (event.target === deleteModal) {
                    deleteModal.style.display = 'none';
                }
                5
            });
        </script>

        <script>
            // Referensi modal dan form
            const userModal = document.getElementById('userModal');
            const userModalTitle = document.getElementById('userModalTitle');
            const userForm = document.getElementById('userForm');

            // Tombol untuk membuka modal Create User
            document.querySelector('.btn-create').addEventListener('click', () => {
                // Reset form dan set modal ke mode Add
                userForm.reset();
                userModalTitle.textContent = 'Add User';
                userModal.style.display = 'flex';
            });


            // Tombol Cancel di modal
            document.getElementById('cancelUserForm').addEventListener('click', () => {
                userModal.style.display = 'none';
            });

            // Klik luar modal untuk menutupnya
            window.addEventListener('click', event => {
                if (event.target === userModal) {
                    userModal.style.display = 'none';
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
            const roleFilter = document.getElementById('roleFilter');
            const searchInput = document.getElementById('searchInput');
            const userTableBody = document.getElementById('userTableBody');

            // Filter function for Role and Search
            function filterTable() {
                const searchTerm = searchInput.value.toLowerCase();
                const selectedRole = roleFilter.value;
                const rows = userTableBody.getElementsByTagName('tr');

                Array.from(rows).forEach(row => {
                    const role = row.getAttribute('data-role');
                    const nik = row.cells[0].textContent.toLowerCase();
                    const username = row.cells[1].textContent.toLowerCase();
                    const nama = row.cells[2].textContent.toLowerCase();

                    const matchesRole = selectedRole === '' || role === selectedRole;
                    const matchesSearchTerm = nik.includes(searchTerm) || username.includes(searchTerm) || nama
                        .includes(searchTerm);

                    // Show or hide row based on filters
                    if (matchesRole && matchesSearchTerm) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // Event listeners for role filter and search input
            roleFilter.addEventListener('change', filterTable);
            searchInput.addEventListener('input', filterTable);
        </script>


</body>

</html>
