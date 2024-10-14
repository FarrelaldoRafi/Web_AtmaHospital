@include('includes.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<main>
    <div class="container-fluid text-white text-left d-flex justify-content-center"style="height: 60vh; position: relative; background-image: url('/img/backsc.png'); background-size: cover; background-position: center;">
        <div class="container d-flex align-items-center mt-5">
            <div class="text-container mt-4" style="max-width: 650px;">
                <h1 class="fw-bold">KONTAK KAMI</h1>
                <p class="mt-3">Atma Hospital selalu siap memberikan pelayanan kesehatan terbaik bagi Anda. Hubungi kami untuk pertanyaan, janji temu, atau informasi lebih lanjut. Tim kami yang ramah dan profesional siap membantu Anda setiap saat melalui layanan telepon, email, atau kunjungi langsung rumah sakit kami. Kami peduli dengan kesehatan Anda.</p>
            </div>
        </div>
     </div>

    <div class="container my-5 d-flex justify-content-center" style="padding-top: 50px;">
        <div class="card p-5 shadow-lg " style="max-width: 800px; width: 100%; background-color: #e1e1e1; border-radius: 10px;">
            <h2 class="mb-4 text-start fw-bold">Hubungi Kami</h2>
            <form>

                <div class="mb-3">
                    <label for="nama" class="form-label fw-bold">Nama*</label>
                    <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama Lengkap Anda" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email*</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukkan Email Anda" required>
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label fw-bold">Nomor Telepon*</label>
                    <input type="tel" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon Anda" required>
                </div>

                <div class="mb-3">
                    <label for="pesan" class="form-label fw-bold">Pesan*</label>
                    <textarea class="form-control" id="pesan" rows="4" placeholder="Masukkan Pesan Anda" required></textarea>
                </div>

                <div class="d-flex justify-content-center" style="padding-top: 5px;">
                    <button type="submit" class="btn btn-primary px-4 py-2">Kirim Pesan</button>
                </div>
            </form>
        </div>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.js"></script>

@include('includes.footer')
