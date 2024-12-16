@include('includes.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $layanan->nama_layanan }}</title>
</head>

<main>
    <div class="container-fluid text-white text-left d-flex justify-content-center" 
        style="height: 60vh; position: relative; background-image: url('/img/backsc.png'); background-size: cover; background-position: center;">
        <div class="container d-flex align-items-center mt-5">
            <div class="text-container mt-4" style="max-width: 650px;">
                <h1 class="fw-bold">{{ strtoupper($layanan->jenis_layanan) }}</h1>
                <h3>{{ $layanan->nama_layanan }}</h3>
            </div>
        </div>
    </div>

    <section class="services-excellent section-md pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>{!! $layanan->deskripsi !!}</p>
                </div>
                <div class="col-md-6">
                    @php
                        $fotoPath = $layanan->foto ? 'storage/' . $layanan->foto : 'img/default-service.png';
                    @endphp
                    <img src="{{ asset($fotoPath) }}" 
                         alt="{{ $layanan->nama_layanan }}" 
                         style="width: 100%; height: 80%; object-fit: cover;"
                         onerror="this.onerror=null; this.src='{{ asset('img/default-service.png') }}';">
                </div>
            </div>
        </div>
    </section>

    <!-- Quick link section tetap sama seperti sebelumnya -->
    <div class="d-flex align-items-center mt-4">
        <div class="container">
            <h2 class="text-muted-small ms-3 hide-on-mobile">GET IN TOUCH</h2>
            <h2 class="mb-3 ms-3 hide-on-mobile">Lebih Dekat dengan Atma Hospital</h2>
            <div class="quick-link-hospital desktop">
                <div class="container">
                    <div class="wrap-all-hospital">
                        <div class="hospital-items">
                            <a href="/infojanji" class="card card-style card-hospital">
                                <div class="hospital-content">
                                    <div class="hospital-img">
                                        <img class="img-fluid img-contain lazyload" src="{{ asset('icon/infoant.svg') }}">
                                    </div>
                                    <h3 class="hospital-title section-description-md">INFO ANTRIAN JANJI</h3>
                                </div>
                            </a>
                        </div>

                        <div class="hospital-items">
                            <a href="/janji" class="card card-style card-hospital">
                                <div class="hospital-content">
                                    <div class="hospital-img">
                                        <img class="img-fluid img-contain lazyload" src="{{ asset('icon/antrian.svg') }}">
                                    </div>
                                    <h3 class="hospital-title section-description-md">TAMBAH ANTRIAN JANJI</h3>
                                </div>
                            </a>
                        </div>

                        <div class="hospital-items">
                            <a href="/medicalcheckup" class="card card-style card-hospital">
                                <div class="hospital-content">
                                    <div class="hospital-img">
                                        <img class="img-fluid img-contain lazyload" src="{{ asset('icon/steto.svg') }}">
                                    </div>
                                    <h3 class="hospital-title section-description-md">MEDICAL CHECK UP</h3>
                                </div>
                            </a>
                        </div>
                        <div class="hospital-items">
                            <a href="/infomcu" class="card card-style card-hospital">
                                <div class="hospital-content">
                                    <div class="hospital-img">
                                        <img class="img-fluid img-contain lazyload" src="{{ asset('icon/infomcu.svg') }}">
                                    </div>
                                    <h3 class="hospital-title section-description-md">INFO MEDICAL CHECK UP</h3>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@include('includes.footer')