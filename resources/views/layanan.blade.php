@include('includes.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan</title>
</head>

<main>
    <div class="container-fluid text-white text-left d-flex justify-content-center" style="height: 60vh; position: relative; background-image: url('/img/backsc.png'); background-size: cover; background-position: center;">
        <div class="container d-flex align-items-center mt-5">
            <div class="text-container mt-4" style="max-width: 650px;">
                <h1 class="fw-bold">Layanan Rumah Sakit</h1>
                <p class="mt-3">Atma Hospital bertekad untuk menghadirkan pelayanan kesehatan yang unggul bagi setiap pasien. Dengan tim medis yang terdiri dari Dokter, Perawat, dan Paramedis yang ahli serta staf yang selalu siap melayani dengan penuh kepedulian, kami memberikan kenyamanan dan kepercayaan dalam setiap layanan. Dilengkapi dengan peralatan medis terkini, Atma Hospital memastikan perawatan yang akurat dan berkualitas. Kami percaya bahwa Atma Hospital adalah pilihan tepat bagi Anda dan keluarga untuk mendapatkan layanan kesehatan yang aman dan terpercaya.</p>
            </div>
        </div>
    </div>

    <section class="services-excellent section-md pb-5">
        <div class="container">
            <div class="row" id="load_category_service">
                <div class="col-6 col-md-4 mb-3">
                    <div class="flex-col service-item-area">
                        <a href="#service-0" data-bs-toggle="collapse" aria-expanded="false" class="card card-style card-excellent style-2">
                            <span class="pattern-1"></span>
                            <p class="text">Laboratorium</p>
                            <div class="next-desc">Cari tahu informasinya</div>
                        </a>
                        <div class="collapse" id="service-0">
                            <div class="service-body scrollablex">
                                @forelse($layananLaboratorium as $layanan)
                                    <div class="service-item">
                                        <a href="{{ route('layanan.detail', ['id' => $layanan->id_layanan]) }}" class="service-link">{{ $layanan->nama_layanan }}</a>
                                    </div>
                                @empty
                                    <div class="service-item">
                                        <span class="service-link text-muted">Tidak ada layanan laboratorium</span>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 mb-3">
                    <div class="flex-col service-item-area">
                        <a href="#service-1" data-bs-toggle="collapse" aria-expanded="false" class="card card-style card-excellent style-2">
                            <span class="pattern-1"></span>
                            <p class="text">Poliklinik</p>
                            <div class="next-desc">Cari tahu informasinya</div>
                        </a>
                        <div class="collapse" id="service-1">
                            <div class="service-body scrollablex">
                                @forelse($layananPoliklinik as $layanan)
                                    <div class="service-item">
                                        <a href="{{ route('layanan.detail', ['id' => $layanan->id_layanan]) }}" class="service-link">{{ $layanan->nama_layanan }}</a>
                                    </div>
                                @empty
                                    <div class="service-item">
                                        <span class="service-link text-muted">Tidak ada layanan poliklinik</span>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-md-4 mb-3">
                    <div class="flex-col service-item-area">
                        <a href="#service-2" data-bs-toggle="collapse" aria-expanded="false" class="card card-style card-excellent style-2">
                            <span class="pattern-1"></span>
                            <p class="text">Radiologi</p>
                            <div class="next-desc">Cari tahu informasinya</div>
                        </a>
                        <div class="collapse" id="service-2">
                            <div class="service-body scrollablex">
                                @forelse($layananRadiologi as $layanan)
                                    <div class="service-item">
                                        <a href="{{ route('layanan.detail', ['id' => $layanan->id_layanan]) }}" class="service-link">{{ $layanan->nama_layanan }}</a>
                                    </div>
                                @empty
                                    <div class="service-item">
                                        <span class="service-link text-muted">Tidak ada layanan radiologi</span>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
