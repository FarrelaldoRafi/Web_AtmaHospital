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
                <form action="{{ route('admin.medicalcheckup.store') }}" method="POST">
                    @csrf
                    <h3 class="text-center mb-4">Tambah Paket Medical Check Up</h3>
                    <div class="mb-3">
                        <label for="nama_paket" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" id="nama_paket" name="nama_paket" placeholder="Nama Paket" required>
                    </div>
                    <div class="mb-3">
                        <label for="layanan" class="form-label">Layanan</label>
                        <div class="d-flex">
                            <select class="form-select me-2" id="layanan" name="id_layanan[]" style="width: 100%;">
                                @foreach($layanan as $layanan)
                                    <option value="{{ $layanan->id_layanan }}">{{ $layanan->nama_layanan }}</option>
                                @endforeach
                            </select>
                            <button type="button" class="btn btn-primary" id="add-layanan">Add</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="list-layanan" class="form-label">List Layanan</label>
                        <textarea class="form-control" style="background-color: white;" id="list-layanan" rows="5" readonly></textarea>
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
                        <button type="button" class="btn btn-danger me-2" onclick="window.history.back();">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="table-responsive mt-5">
        <h3>Paket Medical Check Up</h3>
        <table class="table table-striped table-bordered">
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
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $paket->nama_paket }}</td>
                    <td>@foreach($paket->layanan as $layanan)
                            {{ $layanan->nama_layanan }}@if(!$loop->last), @endif
                        @endforeach</td>
                    <td>{{ $paket->deskripsi }}</td>
                    <td>Rp.{{ number_format($paket->harga, 0, ',', '.') }}</td>
                    <td class="text-center">
                        <span class="d-flex">
                            <a href="#" class="me-3">
                                <i class="fa-solid fa-pen-to-square me-3"></i>
                            </a>
                            <form action="{{ route('admin.medicalcheckup.destroy', $paket->id_paketMCU) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
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

    <div class="row text-center my-4 justify-content-center">
        <div class="col-md-3">
            <div class="small-box bg-secondary">
                <div class="inner">
                    <h3>1</h3>
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
                <tr>
                    <td class="text-center">1</td>
                    <td>Rocky Geram</td>
                    <td>10 Januari 2004</td>
                    <td>08562742281</td>
                    <td>Laki-laki</td>
                    <td>Jl. Bahagia No.77</td>
                    <td>Diabetes</td>
                    <td>Paket Basic</td>
                    <td>10 September 2024</td>
                    <td>Rp.200.000</td>
                    <td class="text-center">
                        <a href="#">
                            <i class="fa-solid fa-trash text-danger"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.getElementById('add-layanan');
        const layananSelect = document.getElementById('layanan');
        const listLayananTextarea = document.getElementById('list-layanan');
        let selectedLayananIds = []; // Array buat simpan ID layanan yang dipilih bos (Pakai array misal ada lebih dri 1 gitu maksudnya)

        addButton.addEventListener('click', function() {
            const selectedOption = layananSelect.options[layananSelect.selectedIndex];
            const selectedLayanan = selectedOption.text; 
            const selectedLayananId = selectedOption.value; 

            if (selectedLayananIds.includes(selectedLayananId)) {
                alert('Layanan sudah ada di daftar!');
                return;
            }

            selectedLayananIds.push(selectedLayananId);

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
    </script>
</div>
@endsection