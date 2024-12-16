@extends('admin.sidebar')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Layanan</title>
</head>

<div class="container-fluid pt-1">
    <div class="d-flex justify-content-center align-items-center my-4">
        <h1>LAYANAN</h1>
    </div>

    <div class="row text-center my-4 justify-content-center">
        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $layanan->count() }}</h3>
                    <p>Total Layanan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <div class="container d-flex justify-content-center">
            <div class="border p-4 mb-4" style="border-radius: 15px; border: 2px solid #6f42c1; width: 80%;">
                <form id="layananForm" action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="layanan_id" id="layanan_id">
                    
                    <h3 class="text-center mb-4" id="formTitle">Tambah Layanan</h3>
                    
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
                        <label for="nama_layanan" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" placeholder="Nama Layanan" required>
                    </div>
                    <div class="mb-3">
                        <label for="jenis_layanan" class="form-label">Jenis</label>
                        <select class="form-select me-2" id="jenis_layanan" name="jenis_layanan" style="width: 100%;" required>
                            <option value="" selected disabled>Pilih Jenis Layanan</option>
                            <option value="laboratorium">Laboratorium</option>
                            <option value="poliklinik">Poliklinik</option>
                            <option value="radiologi">Radiologi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Layanan" required>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
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
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi Hapus Layanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus layanan <span id="deleteLayananName"></span>?
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
        <h3>Layanan</h3>
        <table class="table table-striped table-bordered" id="layananTable">
            <thead class="bg-danger text-white text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Layanan</th>
                    <th>Jenis</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($layanan as $index => $item)
                <tr data-layanan-id="{{ $item->id_layanan }}" 
                    data-nama-layanan="{{ $item->nama_layanan }}"
                    data-jenis-layanan="{{ $item->jenis_layanan }}"
                    data-deskripsi="{{ $item->deskripsi }}"
                    data-foto="{{ $item->foto }}">
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->nama_layanan }}</td>
                    <td>{{ $item->jenis_layanan }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td class="text-center">
                        <img src="{{ asset('storage/' . $item->foto) }}" class="img-fluid" style="width: 100px; height: auto;" alt="Layanan Image">
                    </td>
                    <td class="text-center">
                        <span class="d-flex justify-content-center align-items-center">
                            <a href="#" class="me-3" onclick="editLayanan(this)">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="#" class="text-danger" onclick="showDeleteConfirmation(this)">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                            <form action="{{ route('admin.layanan.destroy', $item->id_layanan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link text-danger p-0">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function editLayanan(element) {
        // Get the parent row
        const row = element.closest('tr');
        
        // Retrieve data from data attributes
        const id = row.getAttribute('data-layanan-id');
        const namaLayanan = row.getAttribute('data-nama-layanan');
        const jenisLayanan = row.getAttribute('data-jenis-layanan');
        const deskripsi = row.getAttribute('data-deskripsi');
        const foto = row.getAttribute('data-foto');

        // Populate form fields
        document.getElementById('layanan_id').value = id;
        document.getElementById('nama_layanan').value = namaLayanan;
        document.getElementById('jenis_layanan').value = jenisLayanan;
        document.getElementById('deskripsi').value = deskripsi;

        // Update form for edit
        document.getElementById('formMethod').value = 'PUT';
        document.getElementById('layananForm').action = `/admin/layanan/update/${id}`;
        document.getElementById('formTitle').innerHTML = 'Edit Layanan';

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
        // Reset form to default
        document.getElementById('layanan_id').value = '';
        document.getElementById('nama_layanan').value = '';
        document.getElementById('jenis_layanan').value = '';
        document.getElementById('deskripsi').value = '';
        document.getElementById('foto').value = ''; // Clear file input
        document.getElementById('currentPhotoInfo').innerHTML = '';
        document.getElementById('imagePreview').innerHTML = '';
        
        // Reset form method and action
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('layananForm').action = '{{ route('admin.layanan.store') }}';
        document.getElementById('formTitle').innerHTML = 'Tambah Layanan';
    }

    function showDeleteConfirmation(element) {
        const row = element.closest('tr');
        const id = row.getAttribute('data-layanan-id');
        const namaLayanan = row.getAttribute('data-nama-layanan');
        
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/admin/layanan/${id}`;
        
        // Update modal text with layanan name
        document.getElementById('deleteLayananName').textContent = namaLayanan;
        
        // Use Bootstrap's modal method to show the confirmation modal
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
        deleteModal.show();
    }

    // Image preview functionality
    document.getElementById('foto').addEventListener('change', function(event) {
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