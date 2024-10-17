@extends('admin.sidebar')

@section('content')
<div class="container-fluid pt-1">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>MEDICAL CHECK UP</h1>
    </div>

    <div class="row text-center my-4 justify-content-center">
        <div class="col-md-3">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>1</h3>
                    <p>Total Paket MCU</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <h3>Tambah Paket Medical Check Up</h3>
        <div class="container d-flex justify-content-center"> <!-- Menambahkan class d-flex untuk membuat konten di tengah -->
            <div class="border p-4 mb-4" style="border-radius: 15px; border: 2px solid #6f42c1; width: 80%;"> <!-- Mengatur lebar form agar lebih pas di tengah -->
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Paket</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama Paket">
                    </div>
                    <div class="mb-3">
                        <label for="layanan" class="form-label">Layanan</label>
                        <div class="d-flex"> <!-- Menambahkan d-flex -->
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
                        <label for="list layanan" class="form-label">List Layanan</label>
                        <input type="text" class="form-control" id="list layanan" placeholder="list Layanan">
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
                        <!-- Tombol Batal di sebelah kiri -->
                        <button type="delete" class="btn btn-danger me-2">Hapus</button>
                        <!-- Tombol Simpan di sebelah kanan -->
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="table-responsive mt-5">
        <h3>Layanan</h3>
        <table class="table table-striped table-bordered">
            <thead class="bg-primary text-white text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Layanan</th>
                    <th>Jenis</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td>Pemeriksaan Darah</td>
                    <td>Laboratorium</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum molestias perferendis esse laudantium alias optio sequi corrupti minus voluptas! Praesentium, porro. Ratione consectetur blanditiis quae qui pariatur odit laudantium quasi!</td>
                    <td class="text-center">
                        <img src="path/to/image1.jpg" class="img-fluid" style="width: 70px; height: 70px;" alt="Doctor Image">
                    </td>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td>Pemeriksaan Darah</td>
                    <td>Laboratorium</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum molestias perferendis esse laudantium alias optio sequi corrupti minus voluptas! Praesentium, porro. Ratione consectetur blanditiis quae qui pariatur odit laudantium quasi!</td>
                    <td class="text-center">
                        <img src="path/to/image1.jpg" class="img-fluid" style="width: 70px; height: 70px;" alt="Doctor Image">
                    </td>
                </tr>
                <tr>
                    <td class="text-center">1</td>
                    <td>Pemeriksaan Darah</td>
                    <td>Laboratorium</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum molestias perferendis esse laudantium alias optio sequi corrupti minus voluptas! Praesentium, porro. Ratione consectetur blanditiis quae qui pariatur odit laudantium quasi!</td>
                    <td class="text-center">
                        <img src="path/to/image1.jpg" class="img-fluid" style="width: 70px; height: 70px;" alt="Doctor Image">
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
@endsection
