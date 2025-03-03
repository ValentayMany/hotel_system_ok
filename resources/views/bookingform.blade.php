@extends('Layout.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg p-4">
                <h2 class="text-center mb-4 text-white bg-primary p-3 rounded">ການຈອງຫ້ອງ</h2>

                <form method="POST" action="{{ route('account.store') }}" id="bookingForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">ເລກຫ້ອງ:</label>
                            <input type="text" readonly class="form-control" value="{{ $data->room_number }}" name="room_number">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">ໄອດີຫ້ອງ:</label>
                            <input type="text" readonly class="form-control" name="room_id" value="{{ $data->room_id }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">ວັນທີ່ເຂົ້າພັກ:</label>
                            <input type="date" class="form-control" name="check_in_date" required min="{{ \Carbon\Carbon::today()->toDateString() }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">ວັນທີ່ອອກພັກ:</label>
                            <input type="date" class="form-control" name="check_out_date" required min="{{ \Carbon\Carbon::today()->toDateString() }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ຊື່ຜູ້ຈອງ:</label>
                        <input type="text" class="form-control" name="guest_name" required>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">ເບີໂທ:</label>
                            <input type="tel" class="form-control" name="guest_phone" readonly required value="{{ auth()->user()->phone ?? '' }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">ອີເມວ:</label>
                            <input type="email" class="form-control" name="guest_email" readonly required value="{{ auth()->user()->email ?? '' }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">ລາຄາ:</label>
                        <input type="text" class="form-control" name="total_price" readonly required value="{{ $data->price }}">
                    </div>

                    <div class="text-center">
                        <button type="button" class="btn btn-outline-secondary px-4">ຍົກເລີກ</button>
                        <button type="submit" class="btn btn-primary px-4">ຢືນຢັນການຈອງ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/rooms.js') }}">
    document.addEventListener('DOMContentLoaded', function() {
        const checkInDate = document.getElementById('checkInDate');
        const checkOutDate = document.getElementById('checkOutDate');
        const totalPrice = document.getElementById('totalPrice');
        const pricePerNight = 1000; // Adjust this to your dynamic pricing logic

        // Handle check-in date change
        checkInDate.addEventListener('change', function() {
            console.log('Check-in date changed:', checkInDate.value);
            checkOutDate.setAttribute('min', checkInDate.value);
            if (checkOutDate.value && checkOutDate.value <= checkInDate.value) {
                checkOutDate.value = ''; // Reset check-out date if it's not valid
            }
            calculatePrice();
        });

        // Handle check-out date change
        checkOutDate.addEventListener('change', function() {
            console.log('Check-out date changed:', checkOutDate.value);
            calculatePrice();
        });

        // Function to calculate the total price based on the dates
        function calculatePrice() {
            const checkIn = new Date(checkInDate.value);
            const checkOut = new Date(checkOutDate.value);
            console.log('Calculating price with:', checkIn, checkOut);

            if (checkInDate.value && checkOutDate.value && checkOut > checkIn) {
                const timeDifference = checkOut - checkIn;
                const dayDifference = timeDifference / (1000 * 3600 * 24); // Convert time difference to days
                totalPrice.value = dayDifference * pricePerNight; // Calculate price
            } else {
                totalPrice.value = ''; // Reset price if dates are invalid
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0]; // ดึงวันที่ปัจจุบัน
            const checkInDate = document.getElementById('checkInDate');
            const checkOutDate = document.getElementById('checkOutDate');

            checkInDate.setAttribute('min', today);
            checkOutDate.setAttribute('min', today);

            checkInDate.addEventListener('change', function() {
                checkOutDate.setAttribute('min', checkInDate.value);
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const checkInDate = document.getElementById('checkInDate');
            const checkOutDate = document.getElementById('checkOutDate');
            const totalPrice = document.getElementById('totalPrice');
            const pricePerNight = 1000; // ปรับตามราคาของคุณ

            if (checkInDate && checkOutDate) {
                checkInDate.addEventListener('change', function() {
                    checkOutDate.setAttribute('min', checkInDate.value);
                    if (checkOutDate.value && checkOutDate.value <= checkInDate.value) {
                        checkOutDate.value = '';
                    }
                    calculatePrice();
                });

                checkOutDate.addEventListener('change', calculatePrice);

                function calculatePrice() {
                    const checkIn = new Date(checkInDate.value);
                    const checkOut = new Date(checkOutDate.value);

                    if (checkInDate.value && checkOutDate.value && checkOut > checkIn) {
                        const dayDifference = (checkOut - checkIn) / (1000 * 3600 * 24);
                        totalPrice.value = dayDifference * pricePerNight;
                    } else {
                        totalPrice.value = '';
                    }
                }
            }

            const bookingForm = document.getElementById('bookingForm');

            if (bookingForm) {
                bookingForm.addEventListener('submit', function(e) {
                    e.preventDefault();

                    if (!this.checkValidity()) {
                        document.getElementById('validationMessage').textContent =
                            'ກະລຸນາໃສ່ຂໍ້ມູນໃຫ້ຄົບຖ້ວນ';
                        return;
                    }

                    this.submit();
                });
            }
        });


    });
</script>
@endsection
