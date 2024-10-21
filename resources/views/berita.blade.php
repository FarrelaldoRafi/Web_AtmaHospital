@include('includes.header')

<main>
    <div class="container-fluid text-white text-left d-flex justify-content-center"style="height: 60vh; position: relative; background-image: url('/img/backsc.png'); background-size: cover; background-position: center;">
        <div class="container d-flex align-items-center mt-5">
            <div class="text-container mt-4" style="max-width: 650px;">
                <h1 class="fw-bold">MEDIA INFORMASI</h1>
                <p class="mt-3">Berita-berita seputar dunia Kesehatan, baik dalam di dalam Rumah Sakit maupun secara umum.</p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="row" id="news-row">
            <div class="col-md-4 mb-4">
                <a href="/List-Berita/berita1" class="text-decoration-none text-dark">
                    <div class="card shadow-sm h-100">
                        <img src="https://www.bodrexin.com/public/content_images/Image_Artikel_2.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Atma Hospital mengadakan sesi Imunisasi Anak gratis</h5>
                            <p class="card-text">Atma Hospital mengadakan sesi Imunisasi Anak gratis dalam rangka ulang tahun Rumah Sakit yang ke 56</p>
                        </div>
                        <div class="card-footer text-muted">
                            <small>17, September 2022</small>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="/List-Berita/berita2" class="text-decoration-none text-dark">
                    <div class="card shadow-sm h-100">
                        <img src="https://www.keckmedicine.org/wp-content/uploads/2022/08/pancreatic-cancer-awareness-ribbon.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Atma Hospital Adakan Seminar Kanker Payudara Peringati Bulan Peduli Kanker</h5>
                            <p class="card-text">Atma Hospital menyelenggarakan seminar kesehatan tentang kanker payudara yang terbuka untuk umum</p>
                        </div>
                        <div class="card-footer text-muted">
                            <small>3, Oktober 2022</small>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-4 mb-4">
                <a href="/List-Berita/berita3" class="text-decoration-none text-dark">
                    <div class="card shadow-sm h-100">
                        <img src="https://smakstlouis1sby.sch.id/wp-content/uploads/2019/11/DSCF2873.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">Atma Hospital Gelar Bakti Sosial di Yogyakarta </h5>
                            <p class="card-text">Atma Hospital menyelenggarakan acara bakti sosial di Yogyakarta</p>
                        </div>
                        <div class="card-footer text-muted">
                            <small>14, Februari 2023</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button class="btn btn-warning px-5 py-2" id="load-more-btn">LOAD MORE</button>
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
							<h3 class="hospital-title section-description-md">INFO ANTRIAN</h3>
						</div>
					</a>
				</div>

				<div class="hospital-items">
					<a href="/janji" target="_blank" class="card card-style card-hospital">
						<div class="hospital-content">
							<div class="hospital-img">
								<img class="img-fluid img-contain lazyload" src="{{ asset('icon/antrian.svg') }}">
							</div>
							<h3 class="hospital-title section-description-md">TAMBAH ANTRIAN</h3>
						</div>
					</a>
				</div>

				<div class="hospital-items">
					<a href="/janji" class="card card-style card-hospital">
						<div class="hospital-content">
							<div class="hospital-img">
								<img class="img-fluid img-contain lazyload" src="{{ asset('icon/wa.svg') }}">
							</div>
							<h3 class="hospital-title section-description-md">MEDICAL CHECK UP</h3>
						</div>
					</a>
				</div>
				<div class="hospital-items">
					<a href="" class="card card-style card-hospital">
						<div class="hospital-content">
							<div class="hospital-img">
								<img class="img-fluid img-contain lazyload" src="{{ asset('icon/wa.svg') }}">
							</div>
							<h3 class="hospital-title section-description-md">INFO MEDICAL CHECK UP</h3>
						</div>
					</a>
				</div>
			</div>
		</div>
	</div>
</main>

@include('includes.footer')

<script>
    const loadMoreBtn = document.getElementById('load-more-btn');
    let isExpanded = false;

    loadMoreBtn.addEventListener('click', function () {
        if (!isExpanded) {
            const newCards = `
                <div class="col-md-4 mb-4 additional-news">
                    <a href="/List-Berita/berita4" class="text-decoration-none text-dark">
                        <div class="card shadow-sm h-100">
                            <img src="https://lan.go.id/wp-content/uploads/2022/04/5-3-1024x682.jpeg" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Atma Hospital Mengadakan Donor Darah Massal</h5>
                                <p class="card-text">Atma Hospital menggelar acara donor darah massal untuk meningkatkan kesadaran kesehatan.</p>
                            </div>
                            <div class="card-footer text-muted">
                                <small>1, November 2023</small>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 mb-4 additional-news">
                    <a href="/List-Berita/berita5" class="text-decoration-none text-dark">
                        <div class="card shadow-sm h-100">
                            <img src="https://foto.kontan.co.id/jBy9LwwPreqbidPwZTeyMteTuD0=/smart/filters:format(webp)/2023/11/09/1123125525p.jpg" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Atma Hospital Merayakan Hari Kesehatan Nasional</h5>
                                <p class="card-text">Berbagai kegiatan dan promosi kesehatan diselenggarakan untuk memperingati Hari Kesehatan Nasional di Atma Hospital.</p>
                            </div>
                            <div class="card-footer text-muted">
                                <small>12, November 2023</small>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 mb-4 additional-news">
                    <a href="/List-Berita/berita6" class="text-decoration-none text-dark">
                        <div class="card shadow-sm h-100">
                            <img src="https://surabayaorthopedi.com/wp-content/uploads/2023/05/telemedicine-1200x800.jpg" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title">Atma Hospital Meluncurkan Layanan Telemedicine</h5>
                                <p class="card-text">Layanan Telemedicine di Atma Hospital resmi diluncurkan untuk memberikan kemudahan akses kesehatan bagi pasien jarak jauh.</p>
                            </div>
                            <div class="card-footer text-muted">
                                <small>21, November 2023</small>
                            </div>
                        </div>
                    </a>
                </div>
            `;
            document.getElementById('news-row').insertAdjacentHTML('beforeend', newCards);

            loadMoreBtn.textContent = 'MINIMIZE';
            isExpanded = true;
        } else {
            const additionalNews = document.querySelectorAll('.additional-news');
            additionalNews.forEach(news => news.remove());

            loadMoreBtn.textContent = 'LOAD MORE';
            isExpanded = false;
        }
    });
</script>
