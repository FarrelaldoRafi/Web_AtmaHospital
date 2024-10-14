@include('includes.header')
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
								<img class="img-fluid img-contain lazyload" src="{{ asset('icon/dokter.svg') }}">
							</div>
							<h3 class="hospital-title section-description-md">CARI DOKTER</h3>
						</div>
					</a>
				</div>

				<div class="hospital-items">
					<a href="" target="_blank" class="card card-style card-hospital">
						<div class="hospital-content">
							<div class="hospital-img">
								<img class="img-fluid img-contain lazyload" src="{{ asset('icon/antrian.svg') }}">
							</div>
							<h3 class="hospital-title section-description-md">INFO ANTRIAN</h3>
						</div>
					</a>
				</div>

				<div class="hospital-items">
					<a href="" class="card card-style card-hospital">
						<div class="hospital-content">
							<div class="hospital-img">
								<img class="img-fluid img-contain lazyload" src="{{ asset('icon/wa.svg') }}">
							</div>
							<h3 class="hospital-title section-description-md">WHATSAPP</h3>
						</div>
					</a>
				</div>
				<div class="hospital-items">
					<a href="" class="card card-style card-hospital">
						<div class="hospital-content">
							<div class="hospital-img">
								<img class="img-fluid img-contain lazyload" src="{{ asset('icon/wa.svg') }}">
							</div>
							<h3 class="hospital-title section-description-md">WHATSAPP</h3>
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
                    <a class="custom-btn" href='#'">
                        Temukan Layanan 
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
                <div class="col-lg-6 d-flex justify-content-lg-end mt-3 mt-lg-0 mb-2"> <!-- Menjaga gambar sejajar ke kanan pada layar besar -->
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
                        Sebagai salah satu rumah sakit besar di Yogyakarta, Atma Hospital membuka layanan Poliklinik Spesialis setiap saat, mulai pukul 08.00 WIB hingga 21.00 WIB.
                    </p>
                </div>
                <div class="col-md-3">
                    <div class="feature-icon">
                        <i class="fas fa-briefcase-medical"></i>
                    </div>
                    <h5 class="feature-title">Peralatan Medis Lengkap</h5>
                    <p class="feature-description">
                        Atma Hospital selalu berinovasi dalam meningkatkan layanan untuk pasien. Hampir setiap tahun, Atma Hospital menghadirkan peralatan medis baru, modern dan canggih.
                    </p>
                </div>
                <div class="col-md-3">
                    <div class="feature-icon">
                        <i class="fas fa-file-medical-alt"></i>
                    </div>
                    <h5 class="feature-title">Rekam Medis Elektronik</h5>
                    <p class="feature-description">
                        Atma Hospital telah menerapkan Rekam Medis Elektronik, ini dapat meminimalkan kesalahan manusia yang tidak diinginkan dalam proses layanan rumah sakit.
                    </p>
                </div>
                <div class="col-md-3">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5 class="feature-title">24 Jam Emergency</h5>
                    <p class="feature-description">
                        Atma Hospital didukung oleh 35 Dokter Sub Spesialis, 111 Dokter Spesialis, 24 Dokter Umum, 7 Dokter Gigi Umum, Ratusan Perawat dan Paramedis Profesional di bidangnya.
                    </p>
                </div>
            </div>
        </div>
    </div>

<div class="container mt-5">
    <h2 class="text-left mb-3">Atma Update</h2>
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card d-flex flex-row">
                <img src="https://img-cdn.pixlr.com/image-generator/history/65bb506dcb310754719cf81f/ede935de-1138-4f66-8ed7-44bd16efc709/medium.webp" class="card-img-left" alt="Berita Menarik" style="width: 150px; height: auto; margin: 10px;">
                <div class="card-body">
                    <h5 class="card-title">Atma Hospital mengadakan sesi Imunisasi Anak...</h5>
                    <p class="card-text"><small class="text-muted">17 September 2022</small></p>
                    <a href="/List-Berita/berita1" class="btn btn-primary">Lihat berita &rarr;</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card d-flex flex-row">
                <img src="https://img-cdn.pixlr.com/image-generator/history/65bb506dcb310754719cf81f/ede935de-1138-4f66-8ed7-44bd16efc709/medium.webp" class="card-img-left" alt="Berita Menarik" style="width: 150px; height: auto; margin: 10px;">
                <div class="card-body">
                    <h5 class="card-title">Atma Hospital Adakan Seminar Kanker Payudara...</h5>
                    <p class="card-text"><small class="text-muted">3 Oktober 2022</small></p>
                    <a href="/List-Berita/berita2" class="btn btn-primary">Lihat berita &rarr;</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card d-flex flex-row">
                <img src="https://img-cdn.pixlr.com/image-generator/history/65bb506dcb310754719cf81f/ede935de-1138-4f66-8ed7-44bd16efc709/medium.webp" class="card-img-left" alt="Tips Kesehatan" style="width: 150px; height: auto; margin: 10px;">
                <div class="card-body">
                    <h5 class="card-title">Atma Hospital Gelar Bakti Sosial di Yogyakarta</h5>
                    <p class="card-text"><small class="text-muted">14 Februari 2023</small></p>
                    <a href="/List-Berita/berita3" class="btn btn-primary">Lihat berita &rarr;</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="card d-flex flex-row">
                <img src="https://img-cdn.pixlr.com/image-generator/history/65bb506dcb310754719cf81f/ede935de-1138-4f66-8ed7-44bd16efc709/medium.webp" class="card-img-left" alt="Tips Kesehatan" style="width: 150px; height: auto; margin: 10px;">
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