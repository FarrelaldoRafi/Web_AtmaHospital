@extends('admin.sidebar')

@section('content')
<div class="container-fluid pt-1">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>DASHBOARD</h1>
    </div>

    <div class="row text-center my-4">
        <div class="col">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>2</h3>
                    <p>Total Pengguna</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
            </div>
        </div>
        <div class="col">
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
        <div class="col">
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
        <div class="col">
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
        <div class="col">
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
        <div class="col">
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
        <h3>Pengguna</h3>
        <table class="table table-striped table-bordered">
            <thead class="text-white text-center bg-info">
                <tr>
                    <th class="align-middle">No</th>
                    <th class="align-middle">Nama</th>
                    <th class="align-middle">No Telepon</th>
                    <th class="align-middle">Tanggal Lahir</th>
                    <th class="align-middle">Alamat</th>
                    <th class="align-middle">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Rocky Geram</td>
                    <td>08562742281</td>
                    <td>10 Januari 2004</td>
                    <td>Jl. Bahagia no 77</td>
                    <td>rockyg@gmail.com</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Rocky Geram</td>
                    <td>08562742281</td>
                    <td>10 Januari 2004</td>
                    <td>Jl. Bahagia no 77</td>
                    <td>rockyg@gmail.com</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="table-responsive mt-3">
        <h3>Dokter</h3>
        <table class="table table-striped table-bordered">
            <thead class="bg-success text-white text-center">
                <tr>
                    <th class="align-middle">No</th>
                    <th class="align-middle">Nama</th>
                    <th class="align-middle">Gambar</th>
                    <th class="align-middle">Spesialis</th>
                    <th class="align-middle">No Telepon</th>
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
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td>dr. Surya Martono, Sp.JP</td>
                    <td class="text-center">
                        <img src="path/to/image2.jpg" class="img-fluid rounded-circle" style="width: 70px; height: 70px;" alt="Doctor Image">
                    </td>
                    <td>Jantung</td>
                    <td>085564721234</td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td>drg. Susi Surusi, Sp.KGA</td>
                    <td class="text-center">
                        <img src="path/to/image3.jpg" class="img-fluid rounded-circle" style="width: 70px; height: 70px;" alt="Doctor Image">
                    </td>
                    <td>Penyakit Dalam</td>
                    <td>081572899012</td>
                </tr>
                <tr>
                    <td class="text-center">4</td>
                    <td>dr. Faiz Farozi, Sp.OT</td>
                    <td class="text-center">
                        <img src="path/to/image4.jpg" class="img-fluid" style="width: 70px; height: 70px;" alt="Doctor Image">
                    </td>
                    <td>Jantung</td>
                    <td>085775620091</td>
                </tr>
            </tbody>
        </table>
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
