<footer class="footer">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-3 col-md-6 order-lg-0">
                            <div class="logo-container">
                                <a href="javascript:void(0)">
                                    <img class="logo img-contain lazyload" src="{{ asset('img/logo.png') }}">
                                </a>
                            </div>

                            <address class="text mb-4">Jl. Babarsari no. 160, Condongcatur, Sleman, Yogyakarta</address>
                            <div class="footer-column">
                                <ul class="footer-social">
                                    <li><a href="https://www.facebook.com/" target="_blank" class="icon"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a href="https://www.twitter.com/" target="_blank" class="icon"><i class="fa-brands fa-twitter"></i></a></li>
                                    <li><a href=" https://www.instagram.com/" target="_blank" class="icon"><i class="fab fa-instagram"></i></a></li>
                                    <li><a href="https://www.youtube.com/" target="_blank" class="icon"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 order-lg-1 pr-0">
                            <div class="footer-column">
                                <p class="footer-title">HUBUNGI KAMI</p>
                                
                                <ul class="footer-list icon-list">
                                    <li>
                                        <a href="tel:1-500-805" target="_blank">
                                            <div class="icon">
                                                <img src="{{ asset('icon/ambulance.svg') }}" alt="ambulance icon" width="24" height="16">
                                            </div>
                                            <div class="text">
                                                Ambulans &amp; Gawat Darurat 1-234-567
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="tel:(0274) 446 3535" target="_blank">
                                            <div class="icon">
                                            <img src="{{ asset('icon/call.svg') }}" alt="call icon" width="18" height="18">
                                            </div>
                                            <div class="text">
                                                Pusat Panggilan (0123) 456 7890
                                            </div>
                                        </a>
                                    </li>
                                    <li class="d-lg-block d-none">
                                        <a href="https://api.whatsapp.com/send?phone=628112683535" target="_blank">
                                            <div class="icon">
                                            <img src="{{ asset('icon/wabl.svg') }}" alt="call icon" width="19" height="19">
                                            </div>
                                            <div class="text">
                                                Whatsapp 6281234567890
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="mailto:info@atma-hos.co.id" target="_blank">
                                            <div class="icon">
                                            <img src="{{ asset('icon/mail.svg') }}" alt="call icon" width="19" height="16">
                                            </div>
                                            <div class="text">
                                                info@atma-hos.co.id
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6 order-lg-2">
                            <div class="footer-column">
                                <p class="footer-title">TENTANG KAMI</p>

                                <ul class="footer-list">
                                    <li><a href="/" target="_blank" class="text">Profil Rumah Sakit</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6 order-lg-3">
                            <div class="footer-column">
                                <p class="footer-title">LAINNYA</p>
                                <ul class="footer-list">
                                    <li><a href="" class="text">Berita</a></li>
                                    <li><a href="" class="text">Layanan</a></li>
                                    <li><a href="" class="text">Jadwal Dokter</a></li>
                                    <li><a href="" class="text">Kontak</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <div class="copyright">
                <div class="container">
                    <div class="text-center">
                        <p>© 2024<a href="javascript:void(0)" target="_blank"> Atma Hospital</a>. <span>All rights reserved.</span></p>
                    </div>
                </div>
            </div>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="script.js"></script>
  <script>
    let swiperCards = new Swiper(".cards", {
    loop: true,
    spaceBetween: 32,
    grabCursor: true,
  
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  
});
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>