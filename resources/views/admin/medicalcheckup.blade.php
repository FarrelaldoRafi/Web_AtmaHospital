@extends('admin.sidebar')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Medical Check Up</title>
</head>

<div class="container-fluid pt-1">
    <div class="d-flex justify-content-center align-items-center my-4">
        <h1>MEDICAL CHECK UP</h1>
    </div>

    <div class="row text-center my-4 justify-content-center">
        <div class="col-md-3">
            <div class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $paketMCU->count() }}</h3>
                    <p>Total Paket MCU</p>
                </div>
                <div class="icon">
                    <i class="fas fa-tasks"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <div class="container d-flex justify-content-center">
            <div class="border p-4 mb-4" style="border-radius: 15px; border: 2px solid #6f42c1; width: 80%;">
                <form id="paketMCUForm" action="{{ route('admin.medicalcheckup.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="paket_id" id="paket_id">
                    
                    <h3 class="text-center mb-4" id="formTitle">Tambah Paket Medical Check Up</h3>
                    
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
                        <label for="nama_paket" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Nama Paket" required>
                    </div>
                    <div class="mb-3">
                        <label for="layanan" class="form-label">Layanan</label>
                        <div class="d-flex">
                            <select class="form-select me-2" id="layanan" name="id_layanan[]" style="width: 100%;">
                                <option value="" disabled selected>Pilih Layanan</option>
                                @foreach($layanan as $lay)
                                    <option value="{{ $lay->id_layanan }}">{{ $lay->nama_layanan }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-primary" id="add-layanan">Add</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="list-layanan" class="form-label">List Layanan</label>
                        <textarea class="form-control" style="background-color: white;" id="list-layanan" name="list_layanan" rows="5" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Layanan">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" name="harga" placeholder="Harga Paket" required>
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
                    <h5 class="modal-title" id="deleteConfirmModalLabel">Konfirmasi Hapus Paket MCU</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus paket <span id="deletePaketName"></span>?
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

    <div class="table-responsive mt-5">
        <h3>Paket Medical Check Up</h3>
        <table class="table table-striped table-bordered" id="paketMCUTable">
            <thead class="bg-primary text-white text-center">
                <tr>
                    <th class="align-middle">No</th>
                    <th class="align-middle">Nama Paket</th>
                    <th class="align-middle">Layanan</th>
                    <th class="align-middle">Deskripsi</th>
                    <th class="align-middle">Harga</th>
                    <th class="align-middle">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($paketMCU as $index => $paket)
                <tr data-paket-id="{{ $paket->id_paketMCU }}" 
                    data-nama-paket="{{ $paket->nama_paket }}"
                    data-deskripsi="{{ $paket->deskripsi }}"
                    data-harga="{{ $paket->harga }}"
                    data-layanan="{{ json_encode($paket->layanan->pluck('id_layanan')->toArray()) }}">
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $paket->nama_paket }}</td>
                    <td>@foreach($paket->layanan as $layanan)
                            {{ $layanan->nama_layanan }}@if(!$loop->last), @endif
                        @endforeach</td>
                    <td>{{ $paket->deskripsi }}</td>
                    <td>Rp.{{ number_format($paket->harga, 0, ',', '.') }}</td>
                    <td class="text-center">
                        <span class="d-flex justify-content-center align-items-center">
                            <a href="#" class="me-3" onclick="editPaketMCU(this)">
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

    <div class="row text-center my-4 justify-content-center">
    <div class="col-md-3">
        <div class="small-box bg-secondary">
            <div class="inner">
                <h3>{{ $pendaftaranMCU->count() }}</h3>
                <p>Total Daftar MCU</p>
            </div>
            <div class="icon">
                <i class="fas fa-suitcase-medical"></i>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive mt-3">
    <h3>Pesanan Medical Check Up</h3>
    <table class="table table-striped table-bordered">
        <thead class="bg-secondary text-white text-center">
            <tr>
                <th class="align-middle">No</th>
                <th class="align-middle">Nama Pasien</th>
                <th class="align-middle">Tanggal Lahir</th>
                <th class="align-middle">No Telepon</th>
                <th class="align-middle">Jenis Kelamin</th>
                <th class="align-middle">Alamat</th>
                <th class="align-middle">Riwayat Penyakit</th>
                <th class="align-middle">Nama Paket</th>
                <th class="align-middle">Tanggal Periksa</th>
                <th class="align-middle">Harga</th>
                <th class="align-middle">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftaranMCU as $index => $daftar)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td>{{ $daftar->nama_pasien }}</td>
                <td>{{ \Carbon\Carbon::parse($daftar->tanggal_lahir_pasien)->format('d M Y') }}</td>
                <td>{{ $daftar->no_telp_pasien }}</td>
                <td>{{ $daftar->jenis_kelamin_pasien }}</td>
                <td>{{ $daftar->alamat_pasien }}</td>
                <td>{{ $daftar->riwayat_penyakit ?? 'Tidak ada' }}</td>
                <td>{{ $daftar->paketMCU->nama_paket }}</td>
                <td>{{ \Carbon\Carbon::parse($daftar->tanggal_periksa)->format('d M Y') }}</td>
                <td>Rp.{{ number_format($daftar->paketMCU->harga, 0, ',', '.') }}</td>
                <td class="text-center">
                    <form action="{{ route('admin.pendaftaran.destroy', $daftar->id_daftarMCU) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pendaftaran ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-link text-danger p-0">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.getElementById('add-layanan');
        const layananSelect = document.getElementById('layanan');
        const listLayananTextarea = document.getElementById('list-layanan');
        let selectedLayananIds = [];
        let selectedLayananNames = [];

        addButton.addEventListener('click', function() {
            const selectedOption = layananSelect.options[layananSelect.selectedIndex];
            const selectedLayanan = selectedOption.text; 
            const selectedLayananId = selectedOption.value; 

            if (selectedLayananIds.includes(selectedLayananId)) {
                alert('Layanan sudah ada di daftar!');
                return;
            }

            selectedLayananIds.push(selectedLayananId);
            selectedLayananNames.push(selectedLayanan);
            if (listLayananTextarea.value) {
                listLayananTextarea.value += '\n' + selectedLayanan; 
            } else {
                listLayananTextarea.value = selectedLayanan; 
            }

            layananSelect.selectedIndex = 0; 
        });

        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = 'selected_layanan'; 
        document.querySelector('form').appendChild(hiddenInput);

        document.querySelector('form').addEventListener('submit', function() {
            hiddenInput.value = selectedLayananIds.join(','); 
        });
    });

    function editPaketMCU(element) {
        const row = element.closest('tr');
        const id = row.getAttribute('data-paket-id');
        const namaPaket = row.getAttribute('data-nama-paket');
        const deskripsi = row.getAttribute('data-deskripsi');
        const harga = row.getAttribute('data-harga');
        const layanan = JSON.parse(row.getAttribute('data-layanan'));

        document.getElementById('paket_id').value = id;
        document.getElementById('nama_paket').value = namaPaket;
        document.getElementById('deskripsi').value = deskripsi;
        document.getElementById('harga').value = harga;

        // Populate selected layanan in the textarea
        const listLayananTextarea = document.getElementById('list-layanan');
        listLayananTextarea.value = layanan.map(layananId => {
            const option = Array.from(document.getElementById('layanan').options).find(opt => opt.value == layananId);
            return option ? option.text : '';
        }).join('\n');

        // Update form for edit
        document.getElementById('formMethod').value = 'PUT';
        document.getElementById('paketMCUForm').action = `/admin/medicalcheckup/update/${id}`;
        document.getElementById('formTitle').innerHTML = 'Edit Paket Medical Check Up';
    }

    function resetForm() {
        document.getElementById('paket_id').value = '';
        document.getElementById('nama_paket').value = '';
        document.getElementById('deskripsi').value = '';
        document.getElementById('harga').value = '';
        document.getElementById('list-layanan').value = '';
        selectedLayananIds = []; // Reset selected layanan IDs
        selectedLayananNames = []; // Reset selected layanan names

        document.getElementById('formMethod').value = 'POST';
        document.getElementById('paketMCUForm').action = '{{ route('admin.medicalcheckup.store') }}';
        document.getElementById('formTitle').innerHTML = 'Tambah Paket Medical Check Up';
    }

    function showDeleteConfirmation(element) {
        const row = element.closest('tr');
        const id = row.getAttribute('data-paket-id');
        const namaPaket = row.getAttribute('data-nama-paket');

        const deleteForm = document.getElementById('deleteForm');
        deleteForm.action = `/admin/medicalcheckup/${id}`;

        document.getElementById('deletePaketName').textContent = namaPaket;

        var deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
        deleteModal.show();
    }
</script>
</div>
@endsection