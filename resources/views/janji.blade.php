@include('includes.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Janji</title>
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
                <h1 class="fw-bold">BUAT JANJI DOKTER</h1>
            </div>
        </div>
    </div>

    <section class="services-excellent section-md pb-5">
        <div class="container mx-auto">
            <div class="container justify-content-center fst-italic text-center p-0">
                <p>Pendaftaran antrian janji dokter dilakukan melalui website dengan mengisi formulir di bawah ini.</p>
                <p>Pendaftaran antrian janji dokter hanya untuk layanan pribadi</p>
                <p>Bila terdapat kendala, silakan menghubungi kontak rumah sakit atau sosial media yang tertera di bawah</p>
            </div>

            <div class="container d-flex my-5 align-items-center mx-auto flex-column" style="padding-top: 20px;">
                <h1><strong>ISI FORMULIR ANTRIAN</strong></h1>
                <div class="container p-5" style="max-width: 800px; width: 100%; border-radius: 10px;">
                    <form action="{{  route('pendaftaran-antrian.store') }}" method="POST">
                        <div class="mb-3">
                            <label for="spesialis" class="form-label fw-bold">Spesialis<span>*</span></label>
                            <select class="form-control" id="spesialis_dokter" required>
                                <option value="spesialis" selected hidden>Pilih Spesialis</option>
                                @if($dokter != null)
                                    @foreach($dokter as $d)
                                        <option value="{{$d->spesialis}}" nama="{{$d->nama_dokter}}" id="{{$d->id_dokter}}">{{$d->spesialis}}</option>
                                    @endforeach
                                @else
                                    <option value="" disabled>Belum ada Dokter Spesialis</option>
                                @endif
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="Dokter" class="form-label fw-bold">Dokter<span>*</span></label>
                            <input type="text" class="form-control" placeholder="Pilih Spesialis terlebih dahulu..." id="nama" required readonly>
                        </div>
    
                        <div class="mb-3">
                            <label for="tanggalantrian" class="form-label fw-bold">Tanggal Antrian<span>*</span></label>
                            <input type="date" class="form-control" name ="tanggal_antrian" id="tanggalantrian" placeholder="dd/mm/yyyy" required>
                        </div>
    
                        <div class="mb-3">
                            <label for="namalengkap" class="form-label fw-bold">Nama Lengkap<span>*</span></label>
                            <input type="text" class="form-control" name ="namaLengkap_pasien" id="namalengkap" placeholder="Masukkan Nama Lengkap anda" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="jeniskelamin" class="form-label fw-bold">Jenis Kelamin<span></span></label>
                            <div class="d-flex flex-row">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin_pasien" id="lakilaki" value="lakilaki">
                                    <label class="form-check-label" for="lakilaki">Laki-laki</label>
                                </div>
                                <div class="form-check mx-5">
                                    <input class="form-check-input" type="radio" name="jeniskelamin" id="perempuan" value="perempuan">
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>                    
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tanggallahir" class="form-label fw-bold">Tanggal Lahir<span>*</span></label>
                            <input type="date" class="form-control" name="tanggal_lahir_pasien" id="tanggallahir" placeholder="dd/mm/yyyy" required>
                        </div>                    

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email<span>*</span></label>
                            <input type="email" class="form-control" id="email" placeholder="Masukkan Email Anda" required>
                        </div>
    
                        <div class="mb-3">
                            <label for="telepon" class="form-label fw-bold">Nomor Telepon<span>*</span></label>
                            <input type="tel" class="form-control" id="telepon" placeholder="Masukkan Nomor Telepon Anda" required>
                        </div>
                        
                        <div class="form-check my-3">
                            <input class="form-check-input" type="checkbox" value="true" id="checksnk" required>
                            <label class="form-check-label" for="checksnk">Saya menyatakan bahwa data yang telah saya isi di atas adalah benar dan lengkap<span>*</span></label>
                        </div>

                        <div class="d-flex justify-content-center" style="padding-top: 5px;">
                            <button type="submit" class="btn btn-primary px-4 py-2" data-bs-dismiss="modal">Buat Janji Antrian</button>
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
    document.getElementById('spesialis_dokter').addEventListener('change', function() {
        var nama = this.options[this.selectedIndex].getAttribute('nama');
        
        document.getElementById('nama').value = 'Dr. ' + nama;
    });

    document.getElementById('formjanji').addEventListener('submit', function(event) {
        event.preventDefault();
        const form = event.target;

        if (form.checkValidity()) {
            var myModal = new bootstrap.Modal(document.getElementById('successjanji'));
            myModal.show();
            $('#successjanji').on('hidden.bs.modal', function() {
                form.submit();
            });
        } else {
            form.reportValidity();
        }
    });
</script>

<script>
    $('#formjanji').on('submit', function(e) {
        e.preventDefault();

        var formData = new FormData(this);

        axios.post('/submit-appointment', formData)
            .then(function(response) {
                // Handle success
                alert('Janji berhasil dibuat');
                console.log(response.data);
                $('#formjanji')[0].reset();
            })
            .catch(function(error) {
                alert('Terjadi kesalahan. Silakan coba lagi');
                console.error(error.response.data);
            });
    });
</script>

@include('includes.footer')
