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
                    <form id="formjanji" action="{{ route('antrian.store') }}" method="POST">    
                        @csrf
                        <input type="hidden" name="id_pengguna" value="{{ session('user.id') }}">

                        <div class="mb-3">
                            <label for="spesialis" class="form-label fw-bold">Spesialis<span>*</span></label>
                            <select class="form-control" id="spesialis" name="spesialis" required>
                                <option value="" selected hidden>Pilih Spesialis</option>
                                @foreach($spesialis as $sp)
                                    <option value="{{ $sp }}">{{ $sp }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="dokter" class="form-label fw-bold">Dokter<span>*</span></label>
                            <select class="form-control" id="dokter" name="id_dokter" required>
                                <option value="" selected hidden>Pilih Dokter</option>
                            </select>
                        </div>
    
                        <div class="mb-3">
                            <label for="tanggalantrian" class="form-label fw-bold">Tanggal Antrian<span>*</span></label>
                            <input type="date" class="form-control" id="tanggalantrian" name="tanggal_antrian" placeholder="dd/mm/yyyy" required>
                        </div>
    
                        <div class="mb-3">
                            <label for="namalengkap" class="form-label fw-bold">Nama Lengkap<span>*</span></label>
                            <input type="text" class="form-control" id="namalengkap" name="namaLengkap_pasien" value="{{ session('user.name') }}" placeholder="Masukkan Nama Lengkap anda" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="jeniskelamin" class="form-label fw-bold">Jenis Kelamin<span>*</span></label>
                            <div class="d-flex flex-row">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin_pasien" id="lakilaki" value="Laki-laki" required>
                                    <label class="form-check-label" for="lakilaki">Laki-laki</label>
                                </div>
                                <div class="form-check mx-5">
                                    <input class="form-check-input" type="radio" name="jenis_kelamin_pasien" id="perempuan" value="Perempuan" required>
                                    <label class="form-check-label" for="perempuan">Perempuan</label>
                                </div>                    
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tanggallahir" class="form-label fw-bold">Tanggal Lahir<span>*</span></label>
                            <input type="date" class="form-control" id="tanggallahir" name="tanggal_lahir_pasien" placeholder="dd/mm/yyyy" required>
                        </div>                    

                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email<span>*</span></label>
                            <input type="email" class="form-control" id="email" name="email_pasien" value="{{ session('user.email') }}" placeholder="Masukkan Email Anda" required>
                        </div>
    
                        <div class="mb-3">
                            <label for="telepon" class="form-label fw-bold">Nomor Telepon<span>*</span></label>
                            <input type="tel" class="form-control" id="telepon" name="no_telp_pasien" placeholder="Masukkan Nomor Telepon Anda" required>
                        </div>
                        
                        <div class="form-check my-3">
                            <input class="form-check-input" type="checkbox" value="true" id="checksnk" required>
                            <label class="form-check-label" for="checksnk">Saya menyatakan bahwa data yang telah saya isi di atas adalah benar dan lengkap<span>*</span></label>
                        </div>

                        <div class="d-flex justify-content-center" style="padding-top: 5px;">
                            <button type="submit" class="btn btn-primary px-4 py-2">Buat Janji Antrian</button>
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
    document.getElementById('formjanji').addEventListener('submit', function(event) {
        event.preventDefault();
        const form = event.target;

        if (form.checkValidity()) {
            fetch('{{ route('antrian.store') }}', {
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
                        window.location.href = '/infojanji';
                    });
                } else {
                    alert("Terjadi kesalahan: " + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
            });
        } else {
            form.reportValidity();
        }
    });

    document.getElementById('spesialis').addEventListener('change', function() {
        const spesialis = this.value;
        const dokterSelect = document.getElementById('dokter');
        
        dokterSelect.innerHTML = '<option value="" selected hidden>Pilih Dokter</option>';
        
        if (spesialis) {
            fetch(`/get-dokter-by-spesialis?spesialis=${spesialis}`)
                .then(response => response.json())
                .then(dokters => {
                    dokters.forEach(dokter => {
                        const option = document.createElement('option');
                        option.value = dokter.id_dokter;
                        option.textContent = dokter.nama_dokter;
                        dokterSelect.appendChild(option);
                    });
                });
        }
    });
</script>
@include('includes.footer')