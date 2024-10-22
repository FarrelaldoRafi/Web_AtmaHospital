@include('includes.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
</head>

<main>
    <div class="container-fluid text-white text-left d-flex justify-content-center" 
        style="height: 40vh; position: relative; background-image: url('/img/backsc.png'); background-size: cover; background-position: center;">
        <div class="container d-flex align-items-center mt-5">
            <div class="text-container mt-4" style="max-width: 650px;">
                <h1 class="fw-bold">TENTANG KAMI</h1>
            </div>
        </div>
    </div>

    <section class="services-excellent section-md pb-2">
        <div class="container">
            <div class="row">
                <h2 class="mb-4"><strong>LATAR BELAKANG</strong></h2>
                <div class="col-md-6">
                    <img src="https://primayahospital.b-cdn.net/wp-content/uploads/2022/08/Primaya-Hospital-Depok.jpg.webp" alt="rs" style="width: 100%; height: 80%; border-radius:8px;">
                </div>
                <div class="col-md-6">
                    <p>Atma Hospital didirikan dengan komitmen untuk memberikan pelayanan kesehatan yang berkualitas dan holistik. Dalam menghadapi tantangan di bidang kesehatan, kami memahami bahwa setiap pasien memiliki kebutuhan unik yang memerlukan pendekatan personal. Dengan dukungan teknologi medis terkini dan tim medis yang berpengalaman, Atma Hospital berupaya menjadi rumah sakit pilihan yang terpercaya untuk masyarakat. Kami berkomitmen untuk memberikan pelayanan terbaik dan menciptakan lingkungan yang nyaman bagi pasien dan keluarga.</p>
                </div>
            </div>

            <div class="row">
                <h2 class="mb-3"><strong>VISI ATMA HOSPITAL</strong></h2>
                <div class="col">
                    <p>Menjadi rumah sakit terkemuka yang diakui secara nasional dalam penyediaan pelayanan kesehatan yang berkualitas, inovatif, dan berfokus pada pasien, dengan semangat untuk meningkatkan kualitas hidup masyarakat.</p>
                </div>
            </div>

            <div class="row">
                <h2 class="mb-3 mt-4"><strong>MISI ATMA HOSPITAL</strong></h2>
                <div class="col mb-4">
                    <p>Kami memiliki misi untuk memberikan pelayanan kesehatan yang berkualitas tinggi dan komprehensif kepada semua pasien, mengutamakan keselamatan dan kenyamanan pasien dalam setiap layanan yang kami berikan, serta mengedukasi masyarakat mengenai pentingnya kesehatan dan pencegahan penyakit. Selain itu, kami berkomitmen untuk membangun tim medis yang profesional, terlatih, dan berkomitmen untuk memberikan pelayanan terbaik, serta mengintegrasikan teknologi modern dalam pelayanan kesehatan untuk meningkatkan efisiensi dan efektivitas.</p>
                </div>
            </div>

            <div class="row">
                <h4 class="mt-3" style="color:grey;">Kenapa Memilih Kami?</h4>
                <h2 class="mb-3"><strong>Atma Hospital memiliki kenyamanan yang khas</strong></h2>
                <div class="col">
                    <p>Kami memiliki misi untuk memberikan pelayanan kesehatan yang berkualitas tinggi dan komprehensif kepada semua pasien, mengutamakan keselamatan dan kenyamanan pasien dalam setiap layanan yang kami berikan, serta mengedukasi masyarakat mengenai pentingnya kesehatan dan pencegahan penyakit. Selain itu, kami berkomitmen untuk membangun tim medis yang profesional, terlatih, dan berkomitmen untuk memberikan pelayanan terbaik, serta mengintegrasikan teknologi modern dalam pelayanan kesehatan untuk meningkatkan efisiensi dan efektivitas.</p>
                </div>
            </div>
        </div>
    </section>

    <div class="d-flex align-items-center mt-4">
        <div class="container">
            <h2 class="text-muted-small ms-3">GET IN TOUCH</h2>
            <h2 class="mb-3 ms-3">Lebih Dekat dengan Atma Hospital</h2>
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
