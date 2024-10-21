
@include('includes.header')
<main>
    <div class="container-fluid text-white text-left d-flex justify-content-center" 
        style="height: 60vh; position: relative; background-image: url('/img/backsc.png'); background-size: cover; background-position: center;">
        <div class="container d-flex align-items-center mt-5">
            <div class="text-container mt-4" style="max-width: 650px;">
                <h1 class="fw-bold">INFO JANJI DOKTER</h1>
            </div>
        </div>
    </div>

    <section class="services-excellent section-md pb-5">

        <div class="container">
            <div class="container align-items-center justify-content-center fst-italic text-center">
                <p>Cari Dokter yang ingin dilihat jadwal antriannya</p>
            </div>
            <div class="container bg-body-secondary shadow p-4" style="max-width: 800px; border-radius: 30px; z-index: 2;">
                <form>
                    <div class="mb-2 rounded">
                        <input class="form-control" type="search" placeholder="Cari nama dokter Anda disini" aria-label="Search">
                    </div>

                    <div class="row">
                        <div class="col-9 col-md-8 pe-1">
                            <select class="form-select">
                                <option hidden selected>List Spesialis</option>
                                <option value="1">Spesialis 1</option>
                                <option value="2">Spesialis 2</option>
                            </select>
                        </div>
                        <div class="col-3 col-md-4 ps-1">
                            <button class="btn btn-warning w-100" type="submit"><strong>CARI</strong></button>
                        </div>
                    </div>
                </form>            
            </div>
            <div class="card-centered mx-auto d-flex flex-row p-2 my-5 col-md-10 col-sm-11" style="background-color: #EFEFEF; border-radius: 20px;">
                <div class="row card-centered mx-auto p-2 my-5 col-md-10 d-flex justify-content-center">
                    <div class="col-md-3 col-sm-12 mb-3">
                        <div class="card border border-black">
                            <img src="https://cdn.prod.website-files.com/62d4f06f9c1357a606c3b7ef/65ddf3cdf19abaf5688af2f8_shutterstock_1933145801%20(1).jpg" alt="d1" class="card-img-top" style="object-fit:cover; height: 300px;">
                            <div class="card-body bg-body-secondary border border-black text-center">
                                <h6 class="fw-bold">dr. Narji Sandoro, Sp.PD.</h6>
                            </div>
                            <div class="card-footer bg-body-secondary border border-black text-center">
                                <h6 class="fw-bold">Penyakit Dalam</h6>
                            </div>
                        </div>
                    </div>            

                    <div class="col-md-9 col-sm-12">
                        <div class="card-body d-flex align-items-start flex-column m-3">

                            <div class="card bg-body-secondary mx-auto p-5 col-md-12 d-flex flex-row">
                                <h5 class="fw-bold col-md-5 mt-2 text-center">ID Antrian Saya    :</h5>
                                <div class="container bg-white col-md-6 m-0 rounded"></div>
                            </div>

                            <div class="card bg-body-secondary mx-auto p-1 col-md-12 mt-4 d-flex flex-row p-2" style="height: 60%;">
                                <div class="col-md-10 d-flex flex-column">
                                    <h4 class="fw-bold text-center">List Antrian Janji Dokter</h4>
                                    <div class="d-flex flex-row">
                                        <div class="me-auto col-md-6 d-flex flex-column mt-4">
                                            <h5 class="fw-bold text-center">Antrian Saat Ini</h5>
                                            <div class="container bg-secondary col-md-10 m-0 align-self-center rounded" style="min-height: 40px;"></div>
                                        </div>

                                        <div class="col-md-6 d-flex flex-column mt-4">
                                            <h5 class="fw-bold text-center">Antrian Sekarang</h5>
                                            <div class="container bg-secondary col-md-10 m-0 align-self-center rounded" style="min-height: 40px;"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2 text-center">
                                    <div class="container bg-white col-md-6 mx-auto rounded border border-black">
                                        <h1 class="text-center"><strong>0</strong></h1>
                                    </div>
                                    <h6>Jumlah Pasien</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
@include('includes.footer')
