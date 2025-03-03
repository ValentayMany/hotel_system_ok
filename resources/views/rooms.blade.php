@extends('Layout.app')
@section('content')
    <main>
        <header class="room-header py-5 bg-light text-center">
            <div class="container">
                <h1 class="display-4">ຫ້ອງພັກທີ່ພັກສຸດສະດວກສະບາຍ</h1>
                <p class="lead">ສຳຫຼວດຫ້ອງພັກທີ່ຫຼາກຫຼາຍຂອງພວກເຮົາ ທີ່ພ້ອມຕ້ອນຮັບທ່ານດ້ວຍສິ່ງອຳນວຍຄວາມສະດວກຄົບຄັນ
                    ແລະລາຄາທີ່ໜ້າສົນໃຈ.</p>
                <a href="#room-list" class="btn btn-light btn-lg">ເບິ່ງຫ້ອງພັກ</a>
            </div>
        </header>
        <section id="room-filter" class="my-4">
            <div class="container">
                <div class="card p-4">
                    <h2 class="mb-3">ຄົ້ນຫາຫ້ອງພັກ</h2>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="room-type" class="form-label">ປະເພດຫ້ອງ:</label>
                            <select id="room-type" class="form-select">
                                <option value="all">ທັງໝົດ</option>
                                <option value="standard">ຫ້ອງດ່ຽວ</option>
                                <option value="deluxe">ຫ້ອງຄູ່</option>
                                <option value="suite">ຫ້ອງຄອບຄົວ</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="price-range" class="form-label">ລາຄາ:</label>
                            <select id="price-range" class="form-select">
                                <option value="all">ທັງໝົດ</option>
                                <option value="low">ລາຄາຕໍ່າສຸດ</option>
                                <option value="high">ລາຄາສູງสุด</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <button class="btn btn-primary w-100">ຄົ້ນຫາ</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section id="hotel-features" class="py-5 bg-light">
            <div class="container">
                <h2 class="text-center mb-4">ສິ່ງອຳນວຍຄວາມສະດວກ</h2>
                <div class="row justify-content-center">
                    <div class="col-md-4 mb-4">
                        <div class="card feature-card text-center">
                            <div class="card-body">
                                <div class="feature-icon mb-3">
                                    <i class="fas fa-bed fa-3x"></i>
                                </div>
                                <h3 class="card-title">ຫ້ອງພັກສະອາດ</h3>
                                <p class="card-text">ຫ້ອງພັກສະອາດ ພ້ອມໃຫ້ບໍລິການ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card feature-card text-center">
                            <div class="card-body">
                                <div class="feature-icon mb-3">
                                    <i class="fas fa-calendar-alt fa-3x"></i>
                                </div>
                                <h3 class="card-title">ຈອງງ່າຍ</h3>
                                <p class="card-text">ລະບົບຈອງອອນລາຍ ສະດວກ ວ່ອງໄວ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card feature-card text-center">
                            <div class="card-body">
                                <div class="feature-icon mb-3">
                                    <i class="fas fa-wallet fa-3x"></i>
                                </div>
                                <h3 class="card-title">ລາຄາກັນເອງ</h3>
                                <p class="card-text">ລາຄາເລີ່ມຕົ้นພຽງ 100.000 ກີບ/ຄືນ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <hr>
        <section id="room-list" class="py-5">
            <div class="container">
                <div class="room-type-container standard-rooms mb-5">
                    <h3 class="room-type-heading mb-3" data-room-type="standard">ຫ້ອງດ່ຽວ</h3>
                    <div class="room-list-row" data-room-type="standard">
                        @foreach ($rooms as $data)
                            @if ($data->room_type_id == 1)
                                <form action="{{ route('bookingform', $data->room_id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf <!-- CSRF Token is required for POST requests -->

                                    <div class="room-item">
                                        <img src="{{ asset('storage/' . $data->image) }}" alt="">
                                        <div class="room-item-details">
                                            <h3>{{ $data->room_number }}</h3>
                                            <p>{{ $data->description }}</p>

                                            <div class="room-item-price-btn">
                                                <span class="room-item-price">{{ $data->price }} ກີບ/ຄືນ</span>

                                                @if (Auth::check())
                                                    <button type="submit" class="room-item-btn book-room-btn"
                                                        data-room-id="{{ $data->room_id }}">
                                                        ຈອງຫ້ອງ
                                                    </button>
                                                @else
                                                    <button class="dd" id="loginLink">
                                                        <a href="{{ route('login') }}">ເຂົ້າສູ່ລະບົບ</a>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endforeach
                        <h3 class="room-type-heading mb-3" data-room-type="standard">ຫ້ອງຄູ່</h3>
                        @foreach ($rooms as $data)
                            @if ($data->room_type_id == 2)
                                <form action="{{ route('bookingform', $data->room_id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="room-item">
                                        <img src="{{ asset('storage/' . $data->image) }}" alt="">
                                        <div class="room-item-details">
                                            <h3>{{ $data->room_number }}</h3>
                                            <p>{{ $data->description }}</p>
                                            <ul class="room-item-features">
                                                {{-- @foreach ($room['features'] as $feature)
                                        <li><i class="fas fa-check"></i> {{ $feature }}</li>
                                    @endforeach --}}
                                            </ul>
                                            <div class="room-item-price-btn">
                                                <span class="room-item-price">{{ $data->price }} ກີບ/ຄືນ</span>

                                                @if (Auth::check())
                                                    <button class="room-item-btn book-room-btn"
                                                        data-room-id="{{ $data->room_number }}"
                                                        data-room-name="{{ $data->room_number }}">ຈອງຫ້ອງ</button>
                                                @else
                                                    <button class="dd" id="loginLink">
                                                        <a href="{{ route('login') }}">ເຂົ້າສູ່ລະບົບ</a></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endforeach
                        <h3 class="room-type-heading mb-3" data-room-type="standard">ຫ້ອງຄອບຄົວ</h3>
                        @foreach ($rooms as $data)
                            @if ($data->room_type_id == 3)
                                <form action="{{ route('bookingform', $data->room_id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="room-item">
                                        <img src="{{ asset('storage/' . $data->image) }}" alt="">
                                        <div class="room-item-details">
                                            <h3>{{ $data->room_number }}</h3>
                                            <p>{{ $data->description }}</p>
                                            <ul class="room-item-features">
                                                {{--  @foreach ($room['features'] as $feature)
                                        <li><i class="fas fa-check"></i> {{ $feature }}</li>
                                    @endforeach --}}
                                            </ul>
                                            <div class="room-item-price-btn">
                                                <span class="room-item-price">{{ $data->price }} ກີບ/ຄືນ</span>

                                                @if (Auth::check())
                                                    <button class="room-item-btn book-room-btn"
                                                        data-room-id="{{ $data->room_number }}"
                                                        data-room-name="{{ $data->room_number }}">ຈອງຫ້ອງ</button>
                                                @else
                                                    <button class="dd" id="loginLink">
                                                        <a href="{{ route('login') }}">ເຂົ້າສູ່ລະບົບ</a></button>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        @endforeach
                    </div>
                </div>
        </section>

        <!-- Testimonials Section -->
        <section id="testimonials" class="py-5 bg-light">
            <div class="container">
                <h2 class="mb-4 text-center">ສຽງຈາກລູກຄ້າ</h2>
                <div class="card p-4">
                    <div class="review-list">
                        <div class="review-item mb-3">
                            <p>"ສະຖານທີ່ພັກດີເລີດ, ຫ້ອງພັກສະອາດ และສິ່ງອຳนวยความสะดวกຄົບครัน."</p>
                            <p class="reviewer text-muted">- ທ้าว ບຸນฮຽງ</p>
                        </div>
                        <div class="review-item">
                            <p>"ที่พักສະຫงົບ, ເຫມາະແກ່การพักผ่อน."</p>
                            <p class="reviewer text-muted">- นาง คําแพง</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Section -->
        <section id="contact" class="py-5">
            <div class="container">
                <h2 class="mb-4 text-center">ຕິດຕໍ່ພວກເຮົາ</h2>
                <div class="card p-4">
                    <p>ທ່ານສາມາດຕິດຕໍ່ພວກເຮົາໄດ້ຜ່ານຊ່ອງທາງຕໍ່ໄປນີ້:</p>
                    <ul>
                        <li>ອີເມວ: <a href="mailto:info@example.com">info@example.com</a></li>
                        <li>ເບີໂທ: <a href="tel:+1234567890">+123 456 7890</a></li>
                        <li>ທີ່ຢູ່: ເມືອງ, ແຂວງ, ປະເທດ</li>
                    </ul>
                </div>
            </div>
        </section>
        <section id="faq" class="py-5">
            <div class="container">
                <h2 class="mb-4">ຄຳຖາມທີ່ພົບເລື້ອຍ</h2>
                <div class="card p-4">
                    <div class="faq-list">
                        <div class="faq-item mb-3">
                            <h3>ວິທີການຈອງຫ້ອງພັກ?</h3>
                            <p>ທ່ານສາມາດຈອງຫ້ອງພັກຜ່ານເວັບໄຊທ໌, ໂທລະສັບ ຫຼື ສື່ສັງຄົມອອນລາຍ.</p>
                        </div>
                        <div class="faq-item">
                            <h3>ມີອາຫານເຊົ້າໃຫ້ບໍ?</h3>
                            <p>ແມ່ນແລ້ວ, ພວກເຮົາສະໜອງອາຫານເຊົ້າຟຣີສຳລັບຜູ້ເຂົ້າພັກທຸກທ່ານ.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Booking Modal -->




    <div class="back-to-top" onclick="scrollToTop()" aria-label="Back to Top">
        <i class="fas fa-arrow-up"></i>
    </div>

    <script src="{{ asset('js/rooms.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Back to top button functionality
            const backToTopButton = document.querySelector('.back-to-top');

            window.addEventListener('scroll', () => {
                if (window.pageYOffset > 300) {
                    backToTopButton.style.display = 'block';
                } else {
                    backToTopButton.style.display = 'none';
                }
            });

            window.scrollToTop = function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            };

            // Room Booking Functionality
            const bookRoomButtons = document.querySelectorAll('.book-room-btn');

            bookRoomButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const roomId = this.getAttribute('data-room-id');
                    /*   const roomName = this.getAttribute('data-room-name'); */

                    // Set room ID in the modal form
                    document.getElementById('roomId').value = roomId;

                    // Show the modal
                    var bookingModal = new bootstrap.Modal(document.getElementById('bookingModal'));
                    bookingModal.show();
                });
            });

            // Reset form when modal is hidden
            $('#bookingModal').on('hidden.bs.modal', function() {
                document.getElementById('bookingForm').reset();
                document.getElementById('validationMessage').textContent = '';
            });

            // Confirm Booking Functionality
            const confirmBookingButton = document.getElementById('confirmBooking');

            confirmBookingButton.addEventListener('click', function() {
                // Get form values
                const roomId = document.getElementById('roomId').value;
                const checkInDate = document.getElementById('checkInDate').value;
                const checkOutDate = document.getElementById('checkOutDate').value;
                const guestName = document.getElementById('guestName').value;
                const guestPhone = document.getElementById('guestPhone').value;
                const guestEmail = document.getElementById('guestEmail').value;

                // Validation
                if (!roomId || !checkInDate || !checkOutDate || !guestName || !guestPhone || !guestEmail) {
                    document.getElementById('validationMessage').textContent = 'ກະລຸນາໃສ່ຂໍ້ມູນໃຫ້ຄົບຖ້ວນ.';
                    return; // Stop the function if validation fails
                } else {
                    document.getElementById('validationMessage').textContent =
                        ''; // Clear any previous message
                }

                // Close the modal after submission
                const bookingModal = bootstrap.Modal.getInstance(document.getElementById('bookingModal'));
                bookingModal.hide();
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            let checkInDate = document.getElementById("checkInDate");
            let checkOutDate = document.getElementById("checkOutDate");

            // กำหนดให้วันที่เช็คอินต้องไม่เป็นอดีต
            let today = new Date().toISOString().split("T")[0];
            checkInDate.setAttribute("min", today);

            // เมื่อผู้ใช้เลือกวันที่เช็คอิน ให้กำหนด min ของวันที่เช็คเอาต์
            checkInDate.addEventListener("change", function() {
                checkOutDate.setAttribute("min", checkInDate.value);
            });


            // จัดการการส่งฟอร์ม
            const bookingForm = document.getElementById('bookingForm');
            bookingForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // ตรวจสอบความถูกต้องของฟอร์ม
                const validationMessage = document.getElementById('validationMessage');
                if (!this.checkValidity()) {
                    validationMessage.textContent = 'ກະລຸນາໃສ່ຂໍ້ມູນໃຫ້ຄົບຖ້ວນ';
                    return;
                }

                // ส่งฟอร์ม
                this.submit();
            });

            // อัปเดต room_id เมื่อเปิดโมดัล
            const bookingModal = document.getElementById('bookingModal');
            bookingModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const roomId = button.getAttribute('data-room-id');
                document.getElementById('roomId').value = roomId;
            });
        });
        document.getElementById("checkInDate").addEventListener("change", calculatePrice);
        document.getElementById("checkOutDate").addEventListener("change", calculatePrice);

        /* function calculatePrice() {
            const checkInDate = new Date(document.getElementById("checkInDate").value);
            const checkOutDate = new Date(document.getElementById("checkOutDate").value);

            // ตรวจสอบว่าเช็คอินและเช็คเอาท์ถูกกรอก
            if (checkInDate && checkOutDate && checkOutDate > checkInDate) {
                // คำนวณจำนวนวัน
                const timeDifference = checkOutDate - checkInDate;
                const dayDifference = timeDifference / (1000 * 3600 * 24);

                // สมมติราคาห้องคือ 1000 บาท/คืน
                const pricePerNight = 1000;
                const totalPrice = dayDifference * pricePerNight;

                // แสดงราคาในช่อง
                document.getElementById("totalPrice").value = totalPrice;
            } else {
                // ถ้าค่าของวันที่ไม่ถูกต้อง ให้ทำให้ช่องราคาว่าง
                document.getElementById("totalPrice").value = '';
            }
        } */
    </script>
@endsection
