@extends('admin.sidebar')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
</head>

<div class="position-fixed top-0 end-0 p-3" style="z-index: 1050;">
    @if(session('success'))
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="2000">
            <div class="toast-header bg-success text-white">
                <strong class="me-auto">Sukses</strong>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-success text-white">
                {{ session('success') }}
            </div>
        </div>
    @endif
</div>

<div class="container-fluid pt-1">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1>DASHBOARD</h1>
    </div>

    <div class="row text-center my-4">
        <div class="col">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalPengguna }}</h3>
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
                    <h3>{{ $totalDokter }}</h3>
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
                    <h3>{{ $totalLayanan }}</h3>
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
                    <h3>{{ $totalPaketMCU }}</h3>
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
                    <h3>{{ $totalAntrian }}</h3>
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
                    <h3>{{ $totalDaftarMCU }}</h3>
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
                @foreach($pengguna as $index => $p)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $p->nama_lengkap }}</td>
                    <td>{{ $p->no_telp }}</td>
                    <td>{{ $p->tanggal_lahir }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>{{ $p->email }}</td>
                </tr>
                @endforeach
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
                @foreach($dokter as $index => $d)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $d->nama_dokter }}</td>
                    <td>{{ $d->foto }}</td>
                    <td>{{ $d->spesialis }}</td>
                    <td>{{ $d->no_telp }}</td>
                </tr>
                @endforeach
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
                @foreach($layanan as $index => $l)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $l->nama_layanan }}</td>
                    <td>{{ $l->jenis_layanan }}</td>
                    <td>{{ $l->deskripsi }}</td>
                    <td>{{ $l->foto }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var toastElList = [].slice.call(document.querySelectorAll('.toast'));
        var toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl);
        });

        toastList.forEach(toast => toast.show());
    });
</script>
@endsection
