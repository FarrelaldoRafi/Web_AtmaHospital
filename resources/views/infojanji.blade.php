@include('includes.header')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Janji Dokter</title>

    <style>
    .custom-select {
        border: none; /* Menghilangkan border */
        outline: none; /* Menghilangkan outline */
        box-shadow: none; /* Menghilangkan shadow */
    }

    .custom-select:focus {
        box-shadow: none; /* Menghilangkan shadow saat fokus */
    }

    .custom-select::after {
        content: '\f107'; /* Unicode untuk icon angle (Font Awesome) */
        font-family: 'Font Awesome 5 Free'; /* Pastikan Anda menggunakan Font Awesome */
        font-weight: 900; /* Mengatur berat font untuk icon */
        position: absolute;
        right: 10px; /* Posisi icon */
        top: 50%; /* Vertikal center */
        transform: translateY(-50%); /* Vertikal center */
        pointer-events: none; /* Agar icon tidak mengganggu interaksi */
    }
    </style>

</head>

<main>
    <div class="container-fluid text-white text-left d-flex justify-content-center" 
        style="height: 60vh; position: relative; background-image: url('/img/backsc.png'); background-size: cover; background-position: center;">
        <div class="container align-items-center mt-5">
            <div class="text-container mt-4" style="max-width: 650px;">
                <h1 class="fw-bold">INFO JANJI DOKTER</h1>
            </div>
        </div>
    </div>

    <section class="services-excellent section-md pb-5">
        <div class="container">
            @if(count($dokterAntrian) > 0 )
            <div class="container align-items-center justify-content-center fst-italic text-center">
                        <p>Cari Dokter yang ingin dilihat jadwal antriannya</p>
                    </div>
                    <div class="container bg-body-secondary shadow p-4" style="max-width: 800px; border-radius: 30px; z-index: 2;">
                        <form method="GET" action="{{ route('infoantrian') }}">
                            <div class="mb-2 rounded">
                                <input class="form-control" type="search" name="search" placeholder="Cari nama dokter atau spesialis" aria-label="Search" value="{{ request('search') }}">
                            </div>
                            
                            <div class="row">
                                <div class="col-9 col-md-8 pe-1">
                                    <select class="form-select" name="spesialis">
                                    @if(request('spesialis') == null)
                                        <option hidden selected value="">List Spesialis</option>
                                    @else
                                        <option hidden value="">List Spesialis</option>
                                    @endif
                                        @foreach($spesialisList as $spesialis)
                                            <option value="{{ $spesialis }}">{{ $spesialis }}</option>
                                            if($spesialis == request('spesialis'))
                                        @endforeach                                    

                                    </select>
                                </div>
                                <div class="col-3 col-md-4 ps-1">
                                    <button class="btn btn-warning w-100" type="submit"><strong>CARI</strong></button>
                                </div>
                            </div>
                        </form>            
                    </div>
                    @foreach($dokterAntrian as $dokterInfo)
                    <div class="card-centered mx-auto d-flex flex-row p-2 my-5 col-md-10 col-sm-11" style="background-color: #EFEFEF; border-radius: 20px;">
                        <div class="row card-centered mx-auto p-2 my-5 col-md-10 d-flex justify-content-center">
                            <div class="col-md-3 col-sm-11 mb-3">
                                <div class="card border border-black mt-3">
                                    <img src="{{ asset('storage/' . $dokterInfo['dokter']->foto) }}" 
                                        alt="{{ $dokterInfo['dokter']->nama_dokter }}" 
                                        class="card-img-top" 
                                        style="object-fit:cover; height: 185px;">
                                    <div class="card-body bg-body-secondary border border-black text-center">
                                        <h6 class="fw-bold">{{ $dokterInfo['dokter']->nama_dokter }}</h6>
                                    </div>
                                    <div class="card-footer bg-body-secondary border border-black text-center">
                                        <h6 class="fw-bold">{{ $dokterInfo['dokter']->spesialis }}</h6>
                                    </div>
                                </div>
                            </div>            

                            <div class="col-md-9 col-sm-12">
                            <div class="card bg-body-secondary mx-auto p-5 col-md-12 d-flex flex-row">
                                <h5 class="fw-bold col-md-5 mt-2 text-center">Antrian Saya :</h5>
                                <div class="container bg-white col-md-6 m-0 rounded">
                                    <select class="form-select mt-1 custom-select">
                                        @foreach($dokterInfo['antrian_detail'] as $antrian)
                                            @if($antrian->id_pengguna == session('user.id'))
                                                <option value="{{ $antrian->id }}">
                                                    {{ $antrian->namaLengkap_pasien ?? 'Nama Pasien Tidak Tersedia' }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                                <div class=" ganteng card bg-body-secondary mx-auto p-1 col-md-12 mt-4 d-flex flex-row p-2" style="height: 60%;">
                                    <div class="col-md-10 d-flex flex-column">
                                        <h4 class="fw-bold text-center">List Antrian Janji Dokter</h4>
                                        <div class="d-flex flex-row">
                                            <div class="me-auto col-md-6 d-flex flex-column mt-4">
                                                <h5 class="fw-bold text-center">Antrian Saat Ini</h5>
                                                <div class="container bg-secondary col-md-10 m-0 align-self-center rounded" style="min-height: 40px;">
                                                    <p class="text-center text-white pt-2">
                                                        {{ $dokterInfo['antrian_saat_ini'] ?? 'Tidak ada antrian' }}
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-6 d-flex flex-column mt-4">
                                                <h5 class="fw-bold text-center">Antrian Selanjutnya</h5>
                                                <div class="container bg-secondary col-md-10 m-0 align-self-center rounded" style="min-height: 40px;">
                                                    <p class="text-center text-white pt-2">
                                                        {{ $dokterInfo['antrian_selanjutnya'] ?? 'Tidak ada antrian' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2 text-center">
                                        <div class="container bg-white mx-auto rounded border border-black" style="height: 50px;width: 50px;">
                                            <h1 class="text-center"><strong>{{ $dokterInfo['total_pasien'] }}</strong></h1>
                                        </div>
                                        <h6>Jumlah Pasien</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-info text-center" role="alert">
                    Anda belum melakukan pendaftaran Antrian Janji
                </div>
            @endif
        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@include('includes.footer')
