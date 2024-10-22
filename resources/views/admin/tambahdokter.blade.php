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
                    <h3>4</h3>
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
            <div class="border p-4 mb-4" style="border-radius: 15px; border: 2px solid #6f42c1; width: 80%;"> <!-- Mengatur lebar form agar lebih pas di tengah -->
                <form>
                    <h3 class="text-center mb-4">Tambah Dokter</h3>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" placeholder="Nama">
                    </div>
                    <div class="mb-3">
                        <label for="specialization" class="form-label">Spesialis</label>
                        <input type="text" class="form-control" id="specialization" placeholder="Spesialis">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="phone" placeholder="No Telepon">
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
                                        <input type="time" class="form-control" id="startTime">
                                    </td>
                                    <td>
                                        <input type="time" class="form-control" id="endTime">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="photo">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="cancel" class="btn btn-danger me-2">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <h3>Dokter</h3>
        <table class="table table-striped table-bordered">
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
                <tr>
                    <td class="text-center">1</td>
                    <td>dr. Narji Sandoro, Sp.PD</td>
                    <td class="text-center">
                        <img src="path/to/image1.jpg" class="img-fluid rounded-circle" style="width: 70px; height: 70px;" alt="Doctor Image">
                    </td>
                    <td>Penyakit Dalam</td>
                    <td>085115242432</td>
                    <td class="text-center">
                        <span class="d-flex justify-content-center align-items-center">
                            <a href="#" class="me-3">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </a>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td>dr. Surya Martono, Sp.JP</td>
                    <td class="text-center">
                        <img src="path/to/image2.jpg" class="img-fluid rounded-circle" style="width: 70px; height: 70px;" alt="Doctor Image">
                    </td>
                    <td>Jantung</td>
                    <td>085564721234</td>
                    <td class="text-center">
                        <span class="d-flex justify-content-center align-items-center">
                            <a href="#" class="me-3">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </a>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td>drg. Susi Surusi, Sp.KGA</td>
                    <td class="text-center">
                        <img src="path/to/image3.jpg" class="img-fluid rounded-circle" style="width: 70px; height: 70px;" alt="Doctor Image">
                    </td>
                    <td>Penyakit Dalam</td>
                    <td>081572899012</td>
                    <td class="text-center">
                        <span class="d-flex justify-content-center align-items-center">
                            <a href="#" class="me-3">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="#">
                                <i class="fa-solid fa-trash text-danger"></i>
                            </a>
                        </span>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">4</td>
                    <td>dr. Faiz Farozi, Sp.OT</td>
                    <td class="text-center">
                        <img src="path/to/image4.jpg" class="img-fluid" style="width: 70px; height: 70px;" alt="Doctor Image">
                    </td>
                    <td>Jantung</td>
                    <td>085775620091</td>
                    <td class="text-center">
                        <span class="d-flex justify-content-center align-items-center">
                            <a href="#" class="me-3">
                                <i class="fa-solid fa-pen-to-square"></i>
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
            <div class="small-box bg-dark">
                <div class="inner">
                    <h3>1</h3>
                    <p>Total Antrian</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-group"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <h3>Daftar Total Antrian</h3>
        <table class="table table-striped table-bordered">
            <thead class="bg-dark text-white text-center">
                <tr>
                    <th class="align-middle">No Antrian</th>
                    <th class="align-middle">Nama Dokter</th>
                    <th class="align-middle">Spesialis</th>
                    <th class="align-middle">Nama Pasien</th>
                    <th class="align-middle">Jenis Kelamin</th>
                    <th class="align-middle">Tanggal Lahir</th>
                    <th class="align-middle">Tanggal Antrian</th>
                    <th class="align-middle">Email</th>
                    <th class="align-middle">No Telepon Pasien</th>
                    <th class="align-middle">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">1</td>
                    <td>dr. Narji Sandoro, Sp.PD</td>
                    <td>Penyakit Dalam</td>
                    <td>Rocky Geram</td>
                    <td>Laki-laki</td>
                    <td>10 Januari 2004</td>
                    <td>10 September 2024</td>
                    <td>rockyg@gmail.com</td>
                    <td>08562742281</td>
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
