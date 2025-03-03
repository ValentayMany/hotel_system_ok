@extends('Layout.app')
@section('content')
    <main>
        <section id="heroCarouselSection" class="carousel-section">
            <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ URL('image/image1.jpg') }}" class="d-block w-100" alt="Hotel View 1">
                        <div class="carousel-caption d-none d-md-block hero-text">
                            <h1 class="display-4 fw-bold">ຍິນດີຕ້ອນຮັບ</h1>
                            <p class="lead">ຜ່ອນຄາຍ ແລະ ເພີດເພີນກັບການພັກຂອງທ່ານ</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL('image/image2.jpg') }}" class="d-block w-100" alt="Hotel View 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL('image/image.jpg') }}" class="d-block w-100" alt="Hotel View 3">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL('image/image.jpg') }}" class="d-block w-100" alt="Hotel View 4">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ URL('image/image.jpg') }}" class="d-block w-100" alt="Hotel View 5">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                </button>
            </div>
        </section>
        <hr>
        <div class="main-content">
            <div class="left-section">
                <section id="aboutSection" class="mb-5">
                    <div class="container">
                        <h2 class="text-center mb-4">ຍິນດີຕ້ອນຮັບສູ່ ບ້ານພັກ ຄອນສະຫວັນ</h2>
                        <p class="lead">ບ້ານພັກ ຄອນສະຫວັນ ໃຫ້ບໍລິການຫ້ອງພັກທີ່ສະອາດ, ສະດວກສະບາຍ
                            ພ້ອມດ້ວຍສິ່ງອຳນວຍຄວາມສະດວກຄົບຄັນ. ຕັ້ງຢູ່ໃຈກາງເມືອງ, ໃກ້ກັບສະຖານທີ່ທ່ອງທ່ຽວ
                            ແລະຮ້ານອາຫານຕ່າງໆ ແລະ ພາຍໃນບ້ານພັກຈະມີ ຢູ່ 15 ຫ້ອງທີ່ພ້ອມໃຫ້ບໍລິການ.</p>
                    </div>
                </section>
                <div class="carousel">
                    {{--                     <span class="carousel-arrow prev" style="color: #2563eb;" aria-label="Previous slide">←</span> --}}
                    <img src="{{ URL('image/r5.jpg') }}" class="d-block w-100" alt="Main Room View">
                    {{--                     <span class="carousel-arrow next" style="color: #2563eb;" aria-label="Next slide">→</span> --}}
                </div>
                <div class="thumbnails">
                    <a href="#" class="thumbnail">
                        <img src="{{ URL('image/image.jpg') }}" alt="Room 1 Thumbnail">
                    </a>
                    <a href="#" class="thumbnail">
                        <img src="{{ URL('image/image.jpg') }}" alt="Room 2 Thumbnail">
                    </a>
                    <a href="#" class="thumbnail">
                        <img src="{{ URL('image/image.jpg') }}" alt="Room 3 Thumbnail">
                    </a>
                    <a href="#" class="thumbnail">
                        <img src="{{ URL('image/image.jpg') }}" alt="Room 4 Thumbnail">
                    </a>
                </div>
                <div class="mt-3 text-center">
                    <button class="btn btn-primary btn-lg ">ສາມາດກົດຈອງໄດ້ຕອນນີ້</button>
                </div>
            </div>

            <div class="sidebar">
                <section id="servicesSection">
                    <h2 class="text-center mb-4">ບໍລິການຂອງເຮົາ</h2>
                    <div class="services-card text-center mb-3">
                        <i class="fas fa-wifi services-icon"></i>
                        <h5>WiFi ຟຣີ</h5>
                        <p>ເຄືອຂ່າຍອິນເຕີເນັດຄວາມໄວສູງສໍາລັບທ່ານ</p>
                    </div>
                    <div class="services-card text-center mb-3">
                        <i class="fas fa-coffee services-icon"></i>
                        <h5>ອາຫານເຊົ້າຟຣີ</h5>
                        <p>ເລືອກອາຫານທີ່ທ່ານມັກທຸກເຊົ້າ</p>
                    </div>
                    <div class="services-card text-center mb-3">
                        <i class="fas fa-shuttle-van services-icon"></i>
                        <h5>ບ່ອນຈອດລົດ</h5>
                        <p>ການບໍລິການຂົນສົ່ງເພື່ອຄວາມສະດວກສູງສຸດ</p>
                    </div>
                </section>
                <section id="locationSection">
                    <h2 class="text-center mb-4">ສະຖານທີ່ທ່ອງທ່ຽວໃກ້ຄຽງ</h2>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i> ວັດຊຽງທອງ</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> ພູສີ</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> ຕະຫຼາດແລງ</li>
                        <li><i class="fas fa-map-marker-alt me-2"></i> ນໍ້າຕົກຕາດກວາງຊີ</li>
                    </ul>
                </section>
            </div>
        </div>
        <hr>

        <section id="roomDetails" class="mt-5">
            <div class="container">
                <h2 class="text-center mb-4">ລາຍລະອຽດຫ້ອງພັກ</h2>
                <p>ຫ້ອງພັກແຕ່ລະຫ້ອງມີອຸປະກອນຄົບຄັນ ເພື່ອຮັບປະກັນການພັກຜ່ອນທີ່ສະດວກສະບາຍ.</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-check-circle me-2"></i> ຕຽງນອນຂະໜາດໃຫຍ່</li>
                    <li><i class="fas fa-check-circle me-2"></i> ເຄື່ອງປັບອາກາດ</li>
                    <li><i class="fas fa-check-circle me-2"></i> ໂທລະທັດ LCD</li>
                    <li><i class="fas fa-check-circle me-2"></i> ອິນເຕີເນັດ WiFi ຟຣີ</li>
                    <li><i class="fas fa-check-circle me-2"></i> ຫ້ອງນໍ້າສ່ວນຕົວ</li>
                </ul>

                <div class="room-gallery">
                    <img src="{{ URL('image/image.jpg') }}" alt="Room 1" loading="lazy">
                    <img src="{{ URL('image/image.jpg') }}" alt="Room 2" loading="lazy">
                    <img src="{{ URL('image/image.jpg') }}" alt="Room 3" loading="lazy">
                    <img src="{{ URL('image/image.jpg') }}" alt="Room 4" loading="lazy">
                    <img src="{{ URL('image/image.jpg') }}" alt="Room 5" loading="lazy">

                </div>
            </div>
        </section>
        <hr>
        <section id="promoSection" class="promo-section my-5">
            <div class="container text-center">
                <h2 class="mb-4">ສ່ວນລົດລູກຄ້າພິເສດ</h2>
                <div class="row">
                    <div class="col-md-4">
                        <div class="promo-card">
                            <img src="{{ URL('image/r1.jpg') }}" class="d-block w-100" alt="Promo 1">
                            <div class="promo-content">
                                <h5>ສຸດຍອດກັບການຈອງຫ້ອງລົດ 20%</h5>
                                <p>ຈອງຫ້ອງທຸກຫ້ອງອອນລາຍ 20% ທີ່ມີກຳຫນົດເຫົາເກີນ!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="promo-card">
                            <img src="{{ URL('image/r3.jpg') }}" class="d-block w-100" alt="Promo 2">
                            <div class="promo-content">
                                <h5>ພິເສດສຳລັບລູກຄ້າໃໝ່</h5>
                                <p>ລົດຍອດ 10% ສຳລັບລູກຄ້າໃໝ່ທີ່ຈອງຫ້ອງຄັ້ງທຳອິດ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="promo-card">
                            <img src="{{ URL('image/rff.jpg') }}" class="d-block w-100" alt="Promo 3">
                            <div class="promo-content">
                                <h5>ກັບຄືນ 5% ທຸກຄັ້ງ</h5>
                                <p>ສົດຍອດກັບຄືນ 5% ສຳລັບທ່ານທີ່ຈອງຫ້ອງຢູ່ສະຫວັນ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section id="contactSection" class="mb-5">
            <div class="container">
                <h2 class="text-center mb-4">ຕິດຕໍ່ພວກເຮົາ</h2>
                <div class="row">
                    <div class="col-md-6">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.664584298554!2d102.13183207492533!3d19.88109888212545!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x312f712746297b57%3A0x15a153e4881c0a70!2z4LiB4LmA4LiB4LmA4Lij4LmE4LiU4LiH4LmA!5e0!3m2!1sla!2sla!4v1718474529906!5m2!1sla!2sla"
                            width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" aria-label="Google Map Location"></iframe>
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">ຊື່ຂອງທ່ານ:</label>
                                <input type="text" class="form-control" id="name" required
                                    aria-label="Your Name">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">ອີເມວ:</label>
                                <input type="email" class="form-control" id="email" required
                                    aria-label="Your Email">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">ຂໍ້ຄວາມ:</label>
                                <textarea class="form-control" id="message" rows="4" required aria-label="Your Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submit-button"
                                aria-label="Send Message">ສົ່ງຂໍ້ຄວາມ</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section id="reviewsSection" class="reviews-section">
            <div class="container">
                <h2 class="text-center mb-5">ຄໍາຄິດເຫັນຈາກລູກຄ້າ</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="review-card">
                            <img src="{{ URL('image/teng.jpg') }}" alt="Customer" loading="lazy">
                            <p class="review-text">"ບໍລິການສຸດຍອດ! ຫ້ອງພັກສະອາດແລະອາຫານອຫຼ້ອຍ."</p>
                            <h6 class="mb-0">ທ້າວ ບຸນຮຽງ ສົມພົງ</h6>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="review-card">
                            <img src="/api/placeholder/60/60" alt="Customer" loading="lazy">
                            <p class="review-text">"ທີ່ພັກຢູ່ໃຈກາງເມືອງ ຄວາມສະດວກສູງສຸດ!"</p>
                            <h6 class="mb-0">ທ່ານ ຄໍາແພງ</h6>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="back-to-top" onclick="scrollToTop()" aria-label="Back to Top">
            <i class="fas fa-arrow-up"></i>
        </div>
    </main>
    <script src="{{ asset('js/welcome.js') }}"></script>
@endsection
