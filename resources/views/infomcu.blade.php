@include('includes.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Medical Check Up</title>
</head>

<main>
    <div class="container-fluid text-white text-left d-flex justify-content-center" style="height: 60vh; position: relative; background-image: url('/img/backsc.png'); background-size: cover; background-position: center;">
        <div class="container d-flex align-items-center mt-5">
            <div class="text-container mt-4" style="max-width: 650px;">
                <h1 class="fw-bold">INFO MEDICAL CHECK UP</h1>
            </div>
        </div>
    </div>

    <section class="services-excellent section-md pb-5">
        <div class="container">
            <div class="card-centered mx-auto d-flex flex-row p-3 my-3 col-md-10" style="background-color: #EFEFEF; border-radius: 20px; border: 2px solid #004aad;">
                <div class="card col-md-5 m-2" style="background-color: white; border: 2px solid #004aad; border-radius: 8px;">
                    <div class="container">
                        <div class="mt-4 mb-4 text-center">
                            <div style="background-color: #ffcc00; font-weight: bold; padding: 10px; border-radius: 20px; font-size: 20px;">
                                Nama
                            </div>
                            <p class="mt-2 fw-bold">Rocky Geram</p>
                        </div>
                        <div class="mb-4 text-center">
                            <div style="background-color: #ffcc00; font-weight: bold; padding: 10px; border-radius: 20px; font-size: 20px;">
                                Tanggal Periksa
                            </div>
                            <p class="mt-2 fw-bold">10 September 2024</p>
                        </div>
                        <div class="text-center">
                            <div style="background-color: #ffcc00; font-weight: bold; padding: 10px; border-radius: 20px; font-size: 20px;">
                                Harga
                            </div>
                            <p class="mt-2 fw-bold">Rp. 200.000</p>
                        </div>
                    </div>
                </div>
                <div class="card-body d-flex flex-column m-2 col-md-8">
                    <div class="mb-4 text-center">
                        <div style="background-color: #ffcc00; font-weight: bold; padding: 10px; border-radius: 8px; font-size: 20px;">
                            Paket Basic
                        </div>
                    </div>
                    <div class="mb-3 p-3" style="background-color: white; border: 2px solid #004aad; border-radius: 8px; height: 125px;">
                        <strong style="font-style: italic;">List Layanan</strong>
                        <ul>
                            <li>Pemeriksaan Darah</li>
                        </ul>
                    </div>
                    <div class="p-3" style="background-color: white; border: 2px solid #004aad; border-radius: 8px; height: 125px;">
                        <strong style="font-style: italic;">Riwayat Penyakit</strong>
                        <ul>
                            <li>Diabetes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@include('includes.footer')
