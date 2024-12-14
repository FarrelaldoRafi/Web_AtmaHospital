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
                @if(isset($selectedLayanan))
                    <form action="{{ route('admin.layanan.update', $selectedLayanan->id_layanan) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                @else
                    <form action="{{ route('admin.layanan.store') }}" method="POST" enctype="multipart/form-data">
                @endif
                @csrf
                    <h3 class="text-center mb-4">{{ isset($selectedLayanan) ? 'Edit Layanan' : 'Tambah Layanan' }}</h3>
                    <div class="mb-3">
                        <label for="nama_layanan" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" placeholder="Nama Layanan" value="{{ $selectedLayanan->nama_layanan ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_layanan" class="form-label">Jenis</label>
                        <select class="form-select me-2" id="jenis_layanan" name="jenis_layanan" style="width: 100%;">
                            <option value="" selected disabled>Pilih Layanan</option>
                            <option value="laboratorium" {{ (isset($selectedLayanan) && $selectedLayanan->jenis_layanan == 'laboratorium') ? 'selected' : '' }}>Laboratorium</option>
                            <option value="poliklinik" {{ (isset($selectedLayanan) && $selectedLayanan->jenis_layanan == 'poliklinik') ? 'selected' : '' }}>Poliklinik</option>
                            <option value="radiologi" {{ (isset($selectedLayanan) && $selectedLayanan->jenis_layanan == 'radiologi') ? 'selected' : '' }}>Radiologi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi Layanan" value="{{ $selectedLayanan->deskripsi ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" {{ isset($selectedLayanan) ? '' : 'required' }}>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-danger me-2" onclick="window.history.back();">Batal</button>
                        <button type="submit" class="btn btn-success">{{ isset($selectedLayanan) ? 'Update' : 'Simpan' }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="table-responsive mt">
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
                @foreach($layanan as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->nama_layanan }}</td>
                    <td>{{ $item->jenis_layanan }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td class="text-center">
                        <img src="{{ asset('images/' . $item->foto) }}" class="img-fluid" style="width: 100px; height: auto;" alt="Layanan Image">
                    </td>
                    <td class="text-center">
                        <span class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('admin.layanan.edit', $item->id_layanan) }}" class="me-3">
                                <i class="fa-solid fa-pen-to-square"></i>
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
@endsection