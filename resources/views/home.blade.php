@include('includes.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atma Hospital</title>
</head>

<main>
    <div class="boxslider">
        <div class="intro-section">
            <div class="cards_box swiper">
                <div class="cards">
                    <div class="swiper-wrapper">
                        <section class="card_details swiper-slide">
                            <div class="img-wrapper">
                                <img src="https://img.freepik.com/free-vector/flat-hospital-landing-page-template_23-2149613064.jpg" class="card_img">
                            </div>
                        </section>
                        <section class="card_details swiper-slide">
                            <div class="img-wrapper">
                                <img src="https://previews.123rf.com/images/teravector/teravector1912/teravector191200706/135594305-webpage-presents-information-about-high-quality-healthcare-at-new-modern-clinic-cartoon-professional.jpg" class="card_img">
                            </div>
                        </section>
                        <section class="card_details swiper-slide">
                            <div class="img-wrapper">
                                <img src="https://img.freepik.com/free-vector/flat-hospital-landing-page-template_23-2149613064.jpg" class="card_img">
                            </div>
                        </section>
                        <section class="card_details swiper-slide">
                            <div class="img-wrapper">
                                <img src="https://previews.123rf.com/images/teravector/teravector1912/teravector191200706/135594305-webpage-presents-information-about-high-quality-healthcare-at-new-modern-clinic-cartoon-professional.jpg" class="card_img">
                            </div>
                        </section>
                    </div>
                </div>
            </div>        
        </div>

        <div class="swiper-button-next">
            <i class="fa-solid fa-angle-right"></i>
        </div>     
        <div class="swiper-button-prev">
            <i class="fa-solid fa-angle-left"></i>
        </div>
    </div>

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

    <div class="d-flex align-items-center mt-4">
        <div class="container my-2">
        <h2 class="text-muted-small">KENAPA MEMILIH KAMI</h2>
            <div class="row align-items-start">
                <div class="col-lg-6">
                    <h3 class="text-custom">Atma Hospital memiliki kenyamanan yang khas</h3>
                    <p>Dimulai dengan senyum ramah dari staf, empati dari perawat, dan dokter yang selalu siap untuk mendengarkan dan memberikan penjelasan tentang penyakit yang diderita pasien.</p>
                    <a class="custom-btn" href='/tentangkami'">
                        Selengkapnya 
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
                <div class="col-lg-6 d-flex justify-content-lg-end mt-3 mt-lg-0 mb-2">
                    <img src="https://primayahospital.b-cdn.net/wp-content/uploads/2022/08/Primaya-Hospital-Depok.jpg.webp" alt="Gambar Rumah Sakit" class="img-fluid rounded img-responsive">
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light-custom d-flex align-items-center mt-4">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3">
                    <div class="feature-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h5 class="feature-title">Tenaga Medis Profesional</h5>
                    <p class="feature-description">
                        Rumah sakit kami memiliki beragam layanan dengan dokter-dokter terbaik dari berbagai lulusan sekolah berkualitas
                    </p>
                </div>
                <div class="col-md-3">
                    <div class="feature-icon">
                        <i class="fas fa-briefcase-medical"></i>
                    </div>
                    <h5 class="feature-title">Peralatan Medis Lengkap</h5>
                    <p class="feature-description">
                        Atma Hospital terus berinovasi menghadirkan layanan terbaik bagi pasien. Setiap tahun, kami memperbarui peralatan medis dengan teknologi modern dan canggih demi kualitas perawatan yang lebih optimal.
                    </p>
                </div>
                <div class="col-md-3">
                    <div class="feature-icon">
                        <i class="fas fa-file-medical-alt"></i>
                    </div>
                    <h5 class="feature-title">Fasilitas Nyaman</h5>
                    <p class="feature-description">
                    Atma Hospital menyediakan fasilitas ruang perawatan yang nyaman dan ramah pasien, dirancang untuk mendukung proses pemulihan secara optimal dengan lingkungan yang tenang dan berkualitas.
                    </p>
                </div>
                <div class="col-md-3">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5 class="feature-title">Layanan 24 Jam</h5>
                    <p class="feature-description">
                        Atma Hospital, rumah sakit dengan layanan kesehatan profesional 24 jam, siap melayani kebutuhan medis Anda dengan cepat dan terpercaya, setiap hari tanpa henti.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="text-left mb-3">Layanan Kami</h2>
    </div>
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
                            <div class="service-item">
                                <a href="/List-Layanan/pemeriksaanDarah" class="service-link">Pemeriksaan Darah</a>
                            </div>
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
                            <div class="service-item">
                                <a href="/List-Layanan/pemeriksaanPsikologi" class="service-link">Pemeriksaan Psikologi</a>
                            </div>
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
                            <div class="service-item">
                                <a href="/List-Layanan/ct-scan" class="service-link">CT-Scan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <h2 class="text-left mb-3">Atma Hospital News</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card d-flex flex-row">
                    <img src="https://www.bodrexin.com/public/content_images/Image_Artikel_2.jpg" class="card-img-left" alt="Berita Menarik" style="width: 150px; height: auto; min-height: 150px; margin: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">Atma Hospital mengadakan sesi Imunisasi Anak...</h5>
                        <p class="card-text"><small class="text-muted">17 September 2022</small></p>
                        <a href="/List-Berita/berita1" class="btn btn-primary">Lihat berita &rarr;</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card d-flex flex-row">
                    <img src="https://www.keckmedicine.org/wp-content/uploads/2022/08/pancreatic-cancer-awareness-ribbon.jpg" class="card-img-left" alt="Berita Menarik" style="width: 150px; height: auto; min-height: 150px; margin: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">Atma Hospital Adakan Seminar Kanker Payudara...</h5>
                        <p class="card-text"><small class="text-muted">3 Oktober 2022</small></p>
                        <a href="/List-Berita/berita2" class="btn btn-primary">Lihat berita &rarr;</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card d-flex flex-row">
                    <img src="https://smakstlouis1sby.sch.id/wp-content/uploads/2019/11/DSCF2873.jpg" class="card-img-left" alt="Tips Kesehatan" style="width: 150px; height: auto; min-height: 150px; margin: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">Atma Hospital Gelar Bakti Sosial di Yogyakarta</h5>
                        <p class="card-text"><small class="text-muted">14 Februari 2023</small></p>
                        <a href="/List-Berita/berita3" class="btn btn-primary">Lihat berita &rarr;</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card d-flex flex-row">
                    <img src="https://lan.go.id/wp-content/uploads/2022/04/5-3-1024x682.jpeg" class="card-img-left" alt="Tips Kesehatan" style="width: 150px; height: auto; min-height: 150px;margin: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">Atma Hospital Mengadakan Donor Darah Massal</h5>
                        <p class="card-text"><small class="text-muted">1 November 2023</small></p>
                        <a href="/List-Berita/berita4" class="btn btn-primary">Lihat berita &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="container mt-5">
    <h2 class="text-left mb-3">Atma Hospital News</h2>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card d-flex flex-row">
                <img src="https://www.bodrexin.com/public/content_images/Image_Artikel_2.jpg" class="card-img-left" alt="Berita Menarik" style="width: 150px; height: auto; min-height: 150px; margin: 10px;object-fit: cover;">

                <div class="card-body">
                    <h5 class="card-title">Atma Hospital mengadakan sesi Imunisasi Anak...</h5>
                    <p class="card-text"><small class="text-muted">17 September 2022</small></p>
                    <a href="/List-Berita/berita1" class="btn btn-primary">Lihat berita &rarr;</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card d-flex flex-row">
                <img src="https://www.keckmedicine.org/wp-content/uploads/2022/08/pancreatic-cancer-awareness-ribbon.jpg" class="card-img-left" alt="Berita Menarik" style="width: 150px; height: auto; min-height: 150px; margin: 10px;object-fit: cover;">

                <div class="card-body">
                    <h5 class="card-title">Atma Hospital Adakan Seminar Kanker Payudara...</h5>
                    <p class="card-text"><small class="text-muted">3 Oktober 2022</small></p>
                    <a href="/List-Berita/berita2" class="btn btn-primary">Lihat berita &rarr;</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card d-flex flex-row">
                <img src="https://smakstlouis1sby.sch.id/wp-content/uploads/2019/11/DSCF2873.jpg" class="card-img-left" alt="Tips Kesehatan" style="width: 150px; height: auto; min-height: 150px; margin: 10px;object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Atma Hospital Gelar Bakti Sosial di Yogyakarta</h5>
                    <p class="card-text"><small class="text-muted">14 Februari 2023</small></p>
                    <a href="/List-Berita/berita3" class="btn btn-primary">Lihat berita &rarr;</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card d-flex flex-row">
                <img src="https://lan.go.id/wp-content/uploads/2022/04/5-3-1024x682.jpeg" class="card-img-left" alt="Tips Kesehatan" style="width: 150px; height: auto; min-height: 150px;margin: 10px;object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Atma Hospital Mengadakan Donor Darah Massal</h5>
                    <p class="card-text"><small class="text-muted">1 November 2023</small></p>
                    <a href="/List-Berita/berita4" class="btn btn-primary">Lihat berita &rarr;</a>
                </div>
            </div>
        </div>
    </div>
</div>
</main>

@include('includes.footer')