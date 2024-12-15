@extends('admin.sidebar')

@section('content')
<div class="container-fluid pt-1">
    <div class="d-flex justify-content-center align-items-center my-4">
        <h1>DOKTER</h1>
    </div>

    <div class="row text-center my-4 justify-content-center">
        <div class="col-md-3">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalDokter }}</h3>
                    <p>Total Dokter</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-md"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <div class="container d-flex justify-content-center">
            <div class="border p-4 mb-4" style="border-radius: 15px; border: 2px solid #6f42c1; width: 80%;">
                <form id="dokterForm" action="{{ route('admin.dokter.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="dokter_id" id="dokter_id">
                    <input type="hidden" name="admin_id" id="admin_id" value="{{ session('user.id', 'Admin') }}">
                    
                    <h3 class="text-center mb-4" id="formTitle">Tambah Dokter</h3>
                    
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="specialization" class="form-label">Spesialis</label>
                        <input type="text" class="form-control" id="specialization" name="specialization" placeholder="Spesialis" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="No Telepon" required>
                    </div>
                    <div class="mb-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Jam Mulai</th>
                                    <th>Jam Selesai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="time" class="form-control" id="startTime" name="startTime" required>
                                    </td>
                                    <td>
                                        <input type="time" class="form-control" id="endTime" name="endTime" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="Deskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                        <small id="currentPhotoInfo" class="form-text text-muted"></small>
                        <div id="imagePreview" class="mt-2"></div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-danger me-2" onclick="resetForm()">Batal</button>
                        <button type="submit" class="btn btn-success" id="submitButton">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi Hapus Dokter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus dokter <span id="deleteDokterName"></span>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <h3>Dokter</h3>
        <table class="table table-striped table-bordered" id="dokterTable">
            <thead class="bg-success text-white text-center">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Gambar</th>
                    <th>Spesialis</th>
                    <th>No Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokters as $index => $dokter)
                    <tr data-dokter-id="{{ $dokter->id_dokter }}" 
                        data-nama="{{ $dokter->nama_dokter }}"
                        data-spesialis="{{ $dokter->spesialis }}"
                        data-no-telp="{{ $dokter->no_telp }}"
                        data-jam-mulai="{{ $dokter->jam_mulai }}"
                        data-jam-selesai="{{ $dokter->jam_selesai }}"
                        data-deskripsi="{{ $dokter->deskripsi }}"
                        data-foto="{{ $dokter->foto }}">
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $dokter->nama_dokter }}</td>
                        <td class="text-center">
                            <img src="{{ asset('storage/' . $dokter->foto) }}" class="img-fluid rounded-circle" style="width: 100px; height: 100px;" alt="Doctor Image">
                        </td>
                        <td>{{ $dokter->spesialis }}</td>
                        <td>{{ $dokter->no_telp }}</td>
                        <td class="text-center">
                            <span class="d-flex justify-content-center align-items-center">
                                <a href="#" class="me-3" onclick="editDokter(this)">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="#" class="text-danger" onclick="showDeleteConfirmation(this)">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function editDokter(element) {
        // Get the parent row
        const row = element.closest('tr');
        
        // Retrieve data from data attributes
        const id = row.getAttribute('data-dokter-id');
        const nama = row.getAttribute('data-nama');
        const spesialis = row.getAttribute('data-spesialis');
        const noTelp = row.getAttribute('data-no-telp');
        const jamMulai = row.getAttribute('data-jam-mulai');
        const jamSelesai = row.getAttribute('data-jam-selesai');
        const deskripsi = row.getAttribute('data-deskripsi');
        const foto = row.getAttribute('data-foto');

        // Populate form fields
        document.getElementById('dokter_id').value = id;
        document.getElementById('name').value = nama;
        document.getElementById('specialization').value = spesialis;
        document.getElementById('phone').value = noTelp;
        document.getElementById('startTime').value = jamMulai;
        document.getElementById('endTime').value = jamSelesai;
        document.getElementById('desc').value = deskripsi;
        
        // Update form for edit
        document.getElementById('formMethod').value = 'PUT';
        document.getElementById('dokterForm').action = `/admin/dokter/update/${id}`;
        document.getElementById('formTitle').innerHTML = 'Edit Dokter';

        // Display current photo information if exists
        if (foto) {
            document.getElementById('currentPhotoInfo').innerHTML = 'Foto saat ini: ' + foto;
            document.getElementById('imagePreview').innerHTML = 
                `<img src="{{ asset('storage/') }}/${foto}" class="img-fluid" style="max-width: 200px;">`;
        } else {
            document.getElementById('currentPhotoInfo').innerHTML = '';
            document.getElementById('imagePreview').innerHTML = '';
        }
    }

    function resetForm() {
        // Reset form ke default
        document.getElementById('dokter_id').value = '';
        document.getElementById('name').value = '';
        document.getElementById('specialization').value = '';
        document.getElementById('phone').value = '';
        document.getElementById('startTime').value = '';
        document.getElementById('endTime').value = '';
        document.getElementById('desc').value = '';
        document.getElementById('photo').value = ''; // Clear file input
        document.getElementById('currentPhotoInfo').innerHTML = '';
        document.getElementById('imagePreview').innerHTML = '';
        
        // Reset form method and action
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('dokterForm').action = '{{ route('admin.dokter.store') }}';
        document.getElementById('formTitle').innerHTML = 'Tambah Dokter';
    }

    function showDeleteConfirmation(element) {
        const row = element.closest('tr');
        const id = row.getAttribute('data-dokter-id');
        const nama = row.getAttribute('data-nama');
        
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/admin/dokter/${id}`;
        
        // Update modal text with dokter name
        document.getElementById('deleteDokterName').textContent = nama;
        
        // Use Bootstrap's modal method to show the confirmation modal
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
        deleteModal.show();
    }

    // Image preview functionality
    document.getElementById('photo').addEventListener('change', function(event) {
        const file = event.target.files[0];
        const imagePreview = document.getElementById('imagePreview');
        
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imagePreview.innerHTML = `<img src="${e.target.result}" class="img-fluid" style="max-width: 200px;">`;
            }
            reader.readAsDataURL(file);
        } else {
            imagePreview.innerHTML = '';
        }
    });
</script>
@endsection