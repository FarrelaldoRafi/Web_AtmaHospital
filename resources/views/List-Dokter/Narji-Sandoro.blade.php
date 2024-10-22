@include('includes.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Narji Sandoro</title>
</head>

<body>
    <div class="container-fluid text-white text-left d-flex justify-content-center" 
        style="height: 60vh; position: relative; background-image: url('/img/backsc.png'); background-size: cover; background-position: center;">
        <div class="container d-flex align-items-center mt-5">
            <div class="text-container mt-4 mx-auto" style="max-width: 650px;">
                <h1 class="fw-bold">Profile Dokter</h1>
            </div>
        </div>
    </div>

    <div class="container my-5" style="padding-top: 50px;">
        <div class="card shadow-lg p-4 " style="border-radius: 15px;">
            <div class="row g-0">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <div class="profile-image-container">
                        <img src="https://cdn.prod.website-files.com/62d4f06f9c1357a606c3b7ef/65ddf3cdf19abaf5688af2f8_shutterstock_1933145801%20(1).jpg"
                             alt="Dr. Narji Sandoro, Sp.PD">
                        <div class="profile-caption">
                            <h5>dr. Narji Sandoro, Sp.PD</h5>
                            <p>Penyakit Dalam</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">dr. Narji Sandoro, Sp.PD</h2>
                        <span class="badge bg-primary mb-3">Penyakit Dalam</span>
                        <p class="card-text">
                            Dr. Narji Sandoro, Sp.PD, adalah dokter spesialis penyakit dalam di Atma Hospital, yang dikenal
                            karena ketelitiannya dalam melakukan pemeriksaan mendalam untuk menentukan diagnosis yang tepat
                            serta merancang perawatan terbaik bagi pasien. Kemampuannya dalam berkomunikasi secara efektif
                            membuat pasien merasa nyaman dan memahami kondisi kesehatan mereka dengan baik.
                        </p>
                        <p class="card-text">
                            Dr. Narji Sandoro, Sp.PD, memiliki keahlian dalam menangani berbagai penyakit kronis seperti
                            penyakit degeneratif, metabolik, dan gangguan hormon. Ia juga berpengalaman dalam mengatasi
                            masalah kesehatan terkait kadar kolesterol, asam urat, diabetes, gangguan tiroid, tekanan darah
                            tinggi, serta berbagai infeksi yang menyerang sistem pencernaan, saluran kemih, hati, dan
                            pernapasan. Selain itu, ia menangani berbagai kasus alergi yang sering terjadi pada pasien
                            dewasa dengan pendekatan yang hati-hati dan teliti.
                        </p>
                        <div class="contact">
                            <a href="tel:+6285115242432" class="btn btn-success">
                                <i class="bi bi-whatsapp"></i> 085115242432
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-4 shadow-lg p-3" style="border-radius: 15px;">
            <h3 class="text-center">Jadwal</h3>
            <table class="table table-bordered text-center mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                        <th>Kamis</th>
                        <th>Jumat</th>
                        <th>Sabtu</th>
                        <th>Minggu</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>10:00 - 15:00</td>
                        <td>11:00 - 16:00</td>
                        <td>10:00 - 14:00</td>
                        <td>10:00 - 14:00</td>
                        <td>10:00 - 13:00</td>
                        <td>10:00 - 15:00</td>
                        <td>09:00 - 12:00</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .profile-caption {
            background-color: #f8f9fa;
            border-top: 1px solid #ddd;
            border-radius: 0 0 15px 15px;
            padding: 10px;
            text-align: center;
        }

        .profile-caption h5 {
            margin: 0;
            font-size: 18px;
            font-weight: bold;
        }

        .profile-caption p {
            margin: 0;
            font-size: 14px;
            color: #333;
        }

        .profile-image-container {
            border: 1px solid #ddd;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-image-container img {
            width: 100%;
            height: auto;
        }

        .contact {
            text-align: right;
        }
    </style>
</body>

@include('includes.footer')