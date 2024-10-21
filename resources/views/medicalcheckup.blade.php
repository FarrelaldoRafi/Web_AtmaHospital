
@include('includes.header')
<style>
    p{
        margin: 0;
    }
    label span{
        color: red;
    }
</style>
<main>
    <div class="container-fluid text-white text-left d-flex justify-content-center" 
        style="height: 60vh; position: relative; background-image: url('/img/backsc.png'); background-size: cover; background-position: center;">
        <div class="container d-flex align-items-center mt-5">
            <div class="text-container mt-4 mx-auto" style="max-width: 650px;">
                <h1 class="fw-bold">DAFTAR MEDICAL CHECK UP</h1>
            </div>
        </div>
    </div>

    <section class="services-excellent section-md pb-5">
    <div class="container mx-auto">
        <div class="container justify-content-center fst-italic text-center p-0">
            <p>Pendaftaran antrian janji dokter dilakukan melalui website dengan mengisi formulir di bawah ini. 
            <p>Bila terdapat kendala, silakan menghubungi kontak rumah sakit atau sosial media yang tertera di bawah</p>
        </div>

        <div class="container d-flex my-5 align-items-center mx-auto flex-column" style="padding-top: 20px;">
            <h1><strong>ISI FORMULIR ANTRIAN</strong></h1>
            <div class="container p-5" style="max-width: 800px; width: 100%;border-radius: 10px;">
                <form id="formjanji">    
                    <div class="mb-3">
                        <label for="namalengkap" class="form-label fw-bold">Nama Pasien<span>*</span></label>
                        <input type="text" class="form-control" id="namalengkap" placeholder="Masukkan Pasien" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="tanggallahir" class="form-label fw-bold">Tanggal Lahir<span>*</span></label>
                        <input type="date" class="form-control" id="tanggallahir" placeholder="dd/mm/yyyy" required>
                    </div>
    
                    <div class="mb-3">
                        <label for="namalengkap" class="form-label fw-bold">No. Telepon<span>*</span></label>
                        <input type="text" class="form-control" id="namalengkap" placeholder="Masukkan Nomor Telepon Anda" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="jeniskelamin" class="form-label fw-bold">Jenis Kelamin<span></span></label>
                        <div class="d-flex flex-row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="lakilaki" value="lakilaki">
                                <label class="form-check-label" for="lakilaki">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check mx-5">
                                <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" value="perempuan">
                                <label class="form-check-label" for="perempuan">
                                    Perempuan
                                </label>
                            </div>                    
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label fw-bold">Alamat<span>*</span></label>
                        <input type="alamat" class="form-control" id="alamat" placeholder="Masukkan Alamat Anda" required>
                    </div>                  

                    <div class="mb-3">
                        <label for="riwayatPenyakit" class="form-label fw-bold">Riwayat Penyakit<span>*</span></label>
                        <textarea id="riwayatPenyakit" class="form-control" placeholder="Masukkan Riwayat Penyakit Anda" required></textarea>
                    </div>
    
                    <div class="mb-3">
                        <label for="tanggalantrian" class="form-label fw-bold">Tanggal Periksa<span>*</span></label>
                        <input type="date" class="form-control" id="tanggalantrian" placeholder="dd/mm/yyyy" required>
                    </div>   

                    <div class="mb-3">
                        <label for="spesialis" class="form-label fw-bold">Pilih Paket<span>*</span></label>
                        <select class="form-control" id="spesialis" required>
                            <option value="" selected hidden>Pilih Paket</option>
                            <option value="spesialis1">Paket Basic</option>
                            <option value="spesialis2">Paket Premium</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label fw-bold">Harga<span>*</span></label>
                        <input type="harga" class="form-control" placeholder="Rp..." id="harga" required readonly>
                    </div>  
                    
                    <div class="form-check my-3">
                        <input class="form-check-input" type="checkbox" value="true" id="checksnk" required>
                        <label class="form-check-label" for="checksnk">
                            Saya menyatakan bahwa data yang telah saya isi di atas adalah benar dan lengkap<span>*</span>
                        </label>
                    </div>

                    <div class="d-flex justify-content-center" style="padding-top: 5px;">
                        <button type="submit" class="btn btn-primary px-4 py-2" data-bs-dismiss="modal">Buat Pendaftaran</button>
                    </div>                                             
                </form>
            </div>
        </div>
        
    </div>
    </section>    
</main>
<div class="modal fade" id="successjanji" tabindex="-1" aria-labelledby="suksesjanji" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header bg-info text-white p-2">
          <h1 class="modal-title fs-5" id="suksesjanji">Confirmation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column align-items-center">
            <img src="{{asset('img/success.png')}}" class="rounded mx-auto d-block">
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
    // JavaScript untuk menangani pengiriman formulir
    document.getElementById('formjanji').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah form untuk langsung dikirim
        const form = event.target;

        if (form.checkValidity()) { // Memeriksa validitas form
            // Tampilkan modal
            var myModal = new bootstrap.Modal(document.getElementById('successjanji'));
            myModal.show();
            $('#successjanji').on('hidden.bs.modal', function () {
            form.submit(); // Kirim formulir setelah modal ditutup
        });
        } else {
            form.reportValidity(); // Menampilkan pesan validasi
        }
    });
</script>
@include('includes.footer')