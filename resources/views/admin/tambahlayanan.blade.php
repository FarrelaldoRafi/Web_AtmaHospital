@extends('admin.sidebar')

@section('content')
<div class="container-fluid pt-1">
    <div class="d-flex justify-content-center align-items-center my-4">
        <h1>LAYANAN</h1>
    </div>

    <div class="row text-center my-4 justify-content-center">
        <div class="col-md-3">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>3</h3>
                    <p>Total Layanan</p>
                </div>
                <div class="icon">
                    <i class="fas fa-clipboard-list"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <div class="container d-flex justify-content-center"> <!-- Menambahkan class d-flex untuk membuat konten di tengah -->
            <div class="border p-4 mb-4" style="border-radius: 15px; border: 2px solid #6f42c1; width: 80%;"> <!-- Mengatur lebar form agar lebih pas di tengah -->
                <form>
                    <h3 class="text-center mb-4">Tambah Layanan</h3>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama Layanan">
                    </div>
                    <div class="mb-3">
                        <label for="jenis" class="form-label">Jenis</label>
                        <select class="form-select me-2" id="jenis" name="jenis" style="width: 100%;">
                            <option value="" selected disabled>Pilih Layanan</option>
                            <option value="laboratorium">Laboratorium</option>
                            <option value="poliklinik">Poliklinik</option>
                            <option value="radiologi">Radiologi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text-area" class="form-control" id="deskripsi" placeholder="Deskripsi Layanan">
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="photo">
                    </div>
                    <div class="d-flex justify-content-end">
                        <!-- Tombol Batal di sebelah kiri -->
                        <button type="cancel" class="btn btn-danger me-2">Batal</button>
                        <!-- Tombol Simpan di sebelah kanan -->
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <h3>Layanan</h3>
        <table class="table table-striped table-bordered">
            <thead class="bg-danger text-white text-center">
                <tr>
                    <th class="align-middle">No</th>
                    <th class="align-middle">Nama Layanan</th>
                    <th class="align-middle">Jenis</th>
                    <th class="align-middle">Deskripsi</th>
                    <th class="align-middle">Foto</th>
                    <th class="align-middle">Aksi</th>
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
                <tr>
                    <td class="text-center">1</td>
                    <td>Pemeriksaan Darah</td>
                    <td>Laboratorium</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum molestias perferendis esse laudantium alias optio sequi corrupti minus voluptas! Praesentium, porro. Ratione consectetur blanditiis quae qui pariatur odit laudantium quasi!</td>
                    <td class="text-center">
                        <img src="path/to/image1.jpg" class="img-fluid" style="width: 70px; height: 70px;" alt="Doctor Image">
                    </td>
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
                <tr>
                    <td class="text-center">1</td>
                    <td>Pemeriksaan Darah</td>
                    <td>Laboratorium</td>
                    <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum molestias perferendis esse laudantium alias optio sequi corrupti minus voluptas! Praesentium, porro. Ratione consectetur blanditiis quae qui pariatur odit laudantium quasi!</td>
                    <td class="text-center">
                        <img src="path/to/image1.jpg" class="img-fluid" style="width: 70px; height: 70px;" alt="Doctor Image">
                    </td>
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

</div>
@endsection
