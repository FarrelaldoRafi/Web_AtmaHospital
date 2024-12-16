@include('includes.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Check Up</title>
</head>

<style>
    p {
        margin: 0;
    }

    label span {
        color: red;
    }
</style>

<main>
    <div class="container-fluid text-white text-left d-flex justify-content-center"
        style="height: 60vh; position: relative; background-image: url('/img/backsc.png'); background-size: cover; background-position: center;">
        <div class="container d-flex align-items-center mt-5">
            <div class="text-container mt-4" style="max-width: 650px;">
                <h1 class="fw-bold">DAFTAR MEDICAL CHECK UP</h1>
            </div>
        </div>
    </div>

    <section class="services-excellent section-md pb-5">
        <div class="container mx-auto">
            <div class="container justify-content-center fst-italic text-center p-0">
                <p>Pendaftaran medical check up dilakukan melalui website dengan mengisi formulir di bawah ini.</p>
                <p>Bila terdapat kendala, silakan menghubungi kontak rumah sakit atau sosial media yang tertera di bawah</p>
            </div>

            <div class="container d-flex my-5 align-items-center mx-auto flex-column" style="padding-top: 20px;">
                <h1><strong>ISI FORMULIR PENDAFTARAN</strong></h1>
                <div class="container p-5" style="max-width: 800px; width: 100%; border-radius: 10px;">
                <form id="formMCU" action="{{ route('mcu.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_pengguna" value="{{ session('user.id') }}">

                    <!-- Nama Pasien -->
                    <div class="mb-3">
                        <label for="nama_pasien" class="form-label fw-bold">Nama Pasien<span>*</span></label>
                        <input type="text" class="form-control" id="nama_pasien" name="nama_pasien" placeholder="Masukkan Nama Pasien" required>
                    </div>

                    <!-- Tanggal Lahir Pasien -->
                    <div class="mb-3">
                        <label for="tanggal_lahir_pasien" class="form-label fw-bold">Tanggal Lahir Pasien<span>*</span></label>
                        <input type="date" class="form-control" id="tanggal_lahir_pasien" name="tanggal_lahir_pasien" required>
                    </div>

                    <!-- Nomor Telepon Pasien -->
                    <div class="mb-3">
                        <label for="no_telp_pasien" class="form-label fw-bold">Nomor Telepon Pasien<span>*</span></label>
                        <input type="text" class="form-control" id="no_telp_pasien" name="no_telp_pasien" placeholder="Masukkan Nomor Telepon" required>
                    </div>

                    <!-- Jenis Kelamin Pasien -->
                    <div class="mb-3">
                        <label for="jenis_kelamin_pasien" class="form-label fw-bold">Jenis Kelamin Pasien<span>*</span></label>
                        <select class="form-control" id="jenis_kelamin_pasien" name="jenis_kelamin_pasien" required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <!-- Alamat Pasien -->
                    <div class="mb-3">
                        <label for="alamat_pasien" class="form-label fw-bold">Alamat Pasien<span>*</span></label>
                        <textarea class="form-control" id="alamat_pasien" name="alamat_pasien" placeholder="Masukkan Alamat Pasien" required></textarea>
                    </div>

                    <!-- Riwayat Penyakit -->
                    <div class="mb-3">
                        <label for="riwayat_penyakit" class="form-label fw-bold">Riwayat Penyakit<span>*</span></label>
                        <textarea class="form-control" id="riwayat_penyakit" name="riwayat_penyakit" placeholder="Masukkan Riwayat Penyakit"></textarea>
                    </div>

                    <!-- Tanggal Pemeriksaan -->
                    <div class="mb-3">
                        <label for="tanggal_periksa" class="form-label fw-bold">Tanggal Pemeriksaan<span>*</span></label>
                        <input type="date" class="form-control" id="tanggal_periksa" name="tanggal_periksa" required>
                    </div>

                    <div class="mb-3">
                        <label for="id_paketMCU" class="form-label fw-bold">Paket Medical Check Up<span>*</span></label>
                        <select class="form-select" id="id_paketMCU" name="id_paketMCU" required>
                            <option value="" disabled selected>Pilih Paket</option>
                            @foreach($paketMCU as $paketMCU)
                                <option value="{{ $paketMCU->id_paketMCU }}" data-harga="{{ $paketMCU->harga }}" data-id="{{ $paketMCU->id_paketMCU }}">
                                    {{ $paketMCU->nama_paket }} - Rp {{ number_format($paketMCU->harga, 0, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Submit Button -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="modal fade" id="successjanji" tabindex="-1" aria-labelledby="suksesjanji" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info text-white p-2">
                <h1 class="modal-title fs-5" id="suksesjanji">Confirmation</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex flex-column align-items-center">
                <img src="{{ asset('img/success.png') }}" class="rounded mx-auto d-block">
                <h4 class="fw-bold mt-3">Berhasil Membuat Janji</h4>
                <h6 class="mb-3 fst-normal">Harap membawa fotokopi KTP pada saat janji pertemuan<span>*</span></h6>
                <button type="button" class="btn btn-primary w-100" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('formMCU').addEventListener('submit', function(event) {
        event.preventDefault();
        const form = event.target;

        if (form.checkValidity()) {
            // Kirim data formulir menggunakan fetch
            fetch('{{ route('mcu.store') }}', {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Tampilkan modal sukses
                    var myModal = new bootstrap.Modal(document.getElementById('successjanji'));
                    myModal.show();

                    $('#successjanji').on('hidden.bs.modal', function () {
                        window.location.href = '/infomcu';  // Ganti dengan URL tujuan yang sesuai
                    });
                } else {
                    // Menangani error jika ada
                    alert("Terjadi kesalahan: " + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan, coba lagi nanti.');
            });
        } else {
            form.reportValidity();
        }
    });

    document.getElementById('paketMCU').addEventListener('change', function() {
        // Ambil harga dari option yang dipilih
        var harga = this.options[this.selectedIndex].getAttribute('data-harga');
        
        // Update field harga dengan nilai yang didapat
        document.getElementById('harga').value = 'Rp ' + new Intl.NumberFormat().format(harga);
    });
</script>

@include('includes.footer')
