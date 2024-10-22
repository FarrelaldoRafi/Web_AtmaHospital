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
                    <h3>1</h3>
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
                <form>
                    <h3 class="text-center mb-4">Tambah Paket Medical Check Up</h3>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama Paket">
                    </div>
                    <div class="mb-3">
                        <label for="layanan" class="form-label">Layanan</label>
                        <div class="d-flex">
                            <select class="form-select me-2" id="layanan" name="layanan" style="width: 100%;">
                                <option value="" selected disabled>Pilih Layanan</option>
                                <option value="pemeriksaan darah">Pemeriksaan Darah</option>
                                <option value="rontgen">Rontgen (X-ray)</option>
                                <option value="pemeriksaan fisik">Pemeriksaan Fisik</option>
                            </select>
                            <button type="button" class="btn btn-primary">Add</button>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="list-layanan" class="form-label">List Layanan</label>
                        <textarea class="form-control" style="background-color: white;" id="list-layanan" rows="5" readonly></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text-area" class="form-control" id="deskripsi" placeholder="Deskripsi Layanan">
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" class="form-control" id="harga" placeholder="Harga Paket">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="cancel" class="btn btn-danger me-2">Batal</button>
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
                <tr>
                    <td class="text-center">1</td>
                    <td>Paket Basic</td>
                    <td>Pemeriksaan Darah</td>
                    <td>Meliputi pemeriksaan Tes Gula Darah dan Tes Koagulasi</td>
                    <td>Rp.200.000</td>
                    <td class="text-center">
                        <span class="d-flex">
                            <a href="#">
                                <i class="fa-solid fa-pen-to-square me-3"></i>
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </a>
                        </span>
                    </td>
                </tr>
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
</div>
@endsection