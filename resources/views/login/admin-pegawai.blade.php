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
        <link rel="stylesheet" href="/css/dashboard.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
        <script src="/javasricpt/jquery-3.3.1.min.js"></script>
        <script src="/javasricpt/bootstrap.min.js"></script>

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
                    <a href="#" id="logoutTrigger"
                        class="list-group-item list-group-item-action bg-dark text-white">
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

            <!-- Create/Edit Modal -->
            <div id="employeeModal" class="modal">
                <div class="modal-content">
                    <h3 id="modalTitle">Add Employee</h3>
                    <form id="employeeForm" enctype="multipart/form-data" action="{{ route('pegawai.store') }}"
                        method="POST">
                        @csrf
                        <label for="nama">Name:</label>
                        <input type="text" id="nama" name="nama" placeholder="Enter employee name" required>
                        <label for="jabatan">Position:</label>
                        <select id="jabatan" name="jabatan" required>
                            <option value="Astman " jabatan=='Astman' ? 'selected' : ''>Astman
                            </option>
                            </option>
                            <option value="Admin" jabatan=='Admin' ? 'selected' : ''>Admin
                            <option value="Teknisi" jabatan=='Teknisi' ? 'selected' : ''>Teknisi
                            </option>
                        </select>
                        <label for="divisi">Division:</label>
                        <select id="divisi" name="divisi" required>
                            <option value="Assurance" divisi=='Assurance' ? 'selected' : ''>Assurance</option>
                            <option value="Project"divisi=='Project' ? 'selected' : ''>Project</option>
                            <option value="Maintenance" divisi=='Maintenance' ? 'selected' : ''>Maintenance</option>
                            <option value="Provisioning" divisi=='Provisioning' ? 'selected' : ''>Provisioning
                            </option>
                        </select>
                        <label for="foto">Photo:</label>
                        <input type="file" id="foto" name="foto">

                        <div class="modal-actions">
                            <button type="submit" class="btn btn-save" id="saveEmployeeBtn">Save</button>
                            <button type="button" id="btn-cancel" class="btn btn-cancel">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>

            <div id="page-content-wrapper">

                <div class="user-table-section" data-aos="fade-down">
                    <h3>👥 Employee Management</h3>
                    <p>Manage the list of employees and their details in the system.</p>
                    <div class="table-header">
                        <button class="btn btn-create" id="btn-create">➕Create Employee</button>
                        <!-- Filter Divisi Dropdown -->
                        <select id="divisiFilter" class="btn btn-filter">
                            <option value="">All Divisi</option>
                            <option value="Assurance">Assurance</option>
                            <option value="Project">Project</option>
                            <option value="Maintenance">Maintenance</option>
                            <option value="Provisioning">Provisioning</option>
                        </select>
                        <!-- Input Search -->
                        <input type="text" id="searchInput" class="search-input"
                            placeholder="Search by Name or Jabatan...">
                    </div>
                    @if ($karyawan->isEmpty())
                        <h1 style="color: gray">Tidak ada data pegawai</h1>
                    @else
                        <table class="user-table">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Divisi</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="employeeTableBody">
                                @foreach ($karyawan as $staff)
                                    <tr>
                                    <tr data-divisi="{{ strtolower($staff->divisi) }}">
                                        <td>
                                            @if ($staff->foto)
                                                <img src="{{ asset('storage/karyawan_foto/' . $staff->foto) }}"
                                                    alt="Employee Photo" style="width: 150px; height: 150px;">
                                            @else
                                                <img src="https://via.placeholder.com/50"
                                                    alt="Employee Photo (No Image Provided)">
                                            @endif
                                        </td>
                                        <td>{{ $staff->nama }}</td>
                                        <td>{{ $staff->jabatan }}</td>
                                        <td>{{ $staff->divisi }}</td>
                                        <td>
                                            <a href="{{ route('pegawai.edit', $staff->id) }}" class="btn btn-edit"
                                                id="btn-edit" class="btn btn-edit">Edit</a>
                                            <button class="btn btn-delete" id="btn-delete"
                                                data-id="{{ $staff->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                <!-- Rows from database will be injected here -->
                            </tbody>
                        </table>
                </div>
                @endif

                @if ($karyawan->isEmpty())
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

                <!-- JavaScript for toggling sidebar -->
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
                    // filter
                    function filterTable() {
                        const searchTerm = searchInput.value.toLowerCase();
                        const selectedDivisi = divisiFilter.value.toLowerCase();
                        const rows = employeeTableBody.getElementsByTagName('tr');

                        Array.from(rows).forEach(row => {
                            const rowDivisi = row.dataset.divisi ? row.dataset.divisi.toLowerCase() :
                                ''; // Handle missing data-divisi
                            let rowMatchesSearch = false;

                            if (searchTerm) { // Only search if there's a search term
                                const cells = row.querySelectorAll('td');
                                cells.forEach(cell => {
                                    if (cell.textContent.toLowerCase().includes(searchTerm)) {
                                        rowMatchesSearch = true;
                                        return; // Exit inner loop
                                    }
                                });
                            } else {
                                rowMatchesSearch = true; // Show all if search is empty
                            }

                            const matchesDivisi = selectedDivisi === "" || rowDivisi.includes(selectedDivisi);
                            // Show row only if it matches BOTH search AND filter
                            if (rowMatchesSearch && matchesDivisi) {
                                row.style.display = '';
                            } else {
                                row.style.display = 'none';
                            }
                        });
                    }

                    divisiFilter.addEventListener('change', filterTable);
                    searchInput.addEventListener('input', filterTable);
                </script>

                <script>
                    const modal = document.getElementById('employeeModal');
                    const form = document.getElementById('employeeForm');
                    const btnCreate = document.getElementById('btn-create');
                    const btnCancel = document.getElementById('btn-cancel');
                    const deleteModal = document.getElementById('deleteModal');
                    const cancelDelete = document.getElementById('cancelDelete');
                    const deleteForm = document.getElementById('deleteForm');

                    document.querySelectorAll('.btn-delete').forEach(button => {
                        cancelDelete.addEventListener('click', () => {
                            deleteModal.style.display = 'none';
                        });
                        button.addEventListener('click', (event) => {
                            const id = event.target.dataset?.id;
                            if (id) {
                                event.preventDefault();
                                deleteForm.action = `/admin-pegawai/${id}`;
                                deleteModal.style.display = 'block';


                            } else {

                            }
                        });
                    });

                    window.addEventListener('click', (event) => {
                        if (event.target === deleteModal) {
                            deleteModal.style.display = 'none';
                        }
                    });

                    btnCreate.addEventListener('click', () => {
                        modal.style.display = 'block';
                        form.reset();
                    })

                    btnCancel.addEventListener('click', () => {
                        modal.style.display = 'none';
                    })
                </script>

    </body>


    </html>
