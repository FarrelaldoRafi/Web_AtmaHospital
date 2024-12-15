@include('includes.header')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Dokter</title>
</head>

<main>
    <div class="container-fluid text-white text-center d-flex justify-content-center align-items-center mt-5" style="height: 50vh; position: relative; background-image: url('/img/backsc.png'); background-size: cover; background-position: center;">
        <div class="container bg-white shadow p-4" style="max-width: 1000px; border-radius: 30px; z-index: 2;">
            <form>
                <div class="mb-2 rounded">
                    <input class="form-control" type="search" placeholder="Cari nama dokter Anda disini" aria-label="Search">
                </div>

                <div class="row">
                    <div class="col-9 col-md-8 pe-1">
                        <select class="form-select">
                            <option selected>Semua Spesialis</option>
                            @if($unikSpesialis != null)
                                @foreach($unikSpesialis as $spesialis)
                                <option value="{{$spesialis}}">{{$spesialis}}</option>
                                @endforeach
                            @else
                                <option value="">Belum ada Dokter dengan spesialis</option>
                            @endif
                        </select>
                    </div>
                    <div class="col-3 col-md-4 ps-1">
                        <button class="btn btn-warning w-100" type="submit"><strong>CARI</strong></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <section class="section-md">
        <div class="container mt-0">
            <h2 class="text-left mb-4"><strong>Daftar Dokter di Atma Hospital sesuai dengan kebutuhan Anda</strong></h2>
            <div class="row" id="jadwal-row">
                <div class="col-md-15 mb-2">
                    @if($dokter != null)
                        @foreach($dokter as $dokter)
                        <div class="card d-flex flex-row p-2 mt-2" style="background-color: #EFEFEF; border-radius: 20px;">
                            <img src="{{asset('storage/' . $dokter->foto) }}" class="card-img-left" alt="d1" style="object-fit:cover; width: 210px; height: 232px; margin: 10px;">
                            <div class="card-body">
                                <h5 class="card-title">{{$dokter->nama_dokter}}</h5>
                                <span class="badge badge-specialization">{{$dokter->spesialis}}</span>
                                <table class="table">
                                    <thead>
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
                                            <td>{{date('H:i', strtotime($dokter->jam_mulai))}} - {{date('H:i', strtotime($dokter->jam_selesai))}}</td>                                                                                        
                                            <td>{{date('H:i', strtotime($dokter->jam_mulai))}} - {{date('H:i', strtotime($dokter->jam_selesai))}}</td>                                                                                        
                                            <td>{{date('H:i', strtotime($dokter->jam_mulai))}} - {{date('H:i', strtotime($dokter->jam_selesai))}}</td>                                                                                        
                                            <td>{{date('H:i', strtotime($dokter->jam_mulai))}} - {{date('H:i', strtotime($dokter->jam_selesai))}}</td>                                                                                        
                                            <td>{{date('H:i', strtotime($dokter->jam_mulai))}} - {{date('H:i', strtotime($dokter->jam_selesai))}}</td>                                                                                        
                                            <td>{{date('H:i', strtotime($dokter->jam_mulai))}} - {{date('H:i', strtotime($dokter->jam_selesai))}}</td>                                                                                        
                                            <td>{{date('H:i', strtotime($dokter->jam_mulai))}} - {{date('H:i', strtotime($dokter->jam_selesai))}}</td>                                                                                        
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="/List-Dokter/profiledokter/{{$dokter->id_dokter}}" class="btn btn-custom">Lihat Profil</a>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <h2 class="text-center mb-4">BELUM ADA DAFTAR DOKTER</h2>     
                    @endif
                </div>
            </div>
        </div>
        <!-- <div class="d-flex justify-content-center mt-4">
            <button class="btn btn-warning px-5 py-2" id="load-more-btn">LOAD MORE</button>
        </div> -->
    </section>
</main>
@include('includes.footer')

<script>
    const loadMoreBtn = document.getElementById('load-more-btn');
    let isExpanded = false;

    loadMoreBtn.addEventListener('click', function () {
        if (!isExpanded) {
            const newCards = `
                <div class="card d-flex flex-row p-2 mt-2 additional-jadwal" style="background-color: #EFEFEF; border-radius: 20px;">
                    <img src="https://cdn.prod.website-files.com/62d4f06f9c1357a606c3b7ef/65ddf3cdf19abaf5688af2f8_shutterstock_1933145801%20(1).jpg" class="card-img-left" alt="d1" style="object-fit:cover; width: 210px; height: 232px; margin: 10px;">
                    <div class="card-body">
                        <h5 class="card-title">dr. Sandoro, Sp.PD.</h5>
                        <span class="badge badge-specialization">Penyakit Dalam</span>
                        <table class="table">
                            <thead>
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
                                    <td>10:00 - 14:00</td>
                                    <td>10:00 - 14:00</td>
                                    <td>10:00 - 14:00</td>
                                    <td>10:00 - 14:00</td>
                                    <td>10:00 - 14:00</td>
                                    <td>10:00 - 14:00</td>
                                    <td>10:00 - 14:00</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="/List-Dokter/Sandoro-Narji" class="btn btn-custom">Lihat Profil</a>
                    </div>
                </div>
            `;
            document.getElementById('jadwal-row').insertAdjacentHTML('beforeend', newCards);
        }
    });
</script>
