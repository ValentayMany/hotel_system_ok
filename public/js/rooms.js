
// ฟังก์ชั่นในการเปิดและปิดเมนูเมื่อคลิกปุ่ม hamburger menu
document.querySelector('.menu-toggle').addEventListener('click', () => {
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('show');
  });

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
};
document.addEventListener('DOMContentLoaded', function () {
    const bookingModal = document.getElementById('bookingModal');
    const modalRoomName = document.getElementById('modal-room-name');
    const closeModalButton = document.querySelector('.close-button');
    const modalRoomId = document.getElementById('room-id');
    const bookingForm = document.getElementById('bookingForm');

    // Get all book room buttons
/*     const bookButtons = document.querySelectorAll('.book-room-btn');
    bookButtons.forEach(button => {
        button.addEventListener('click', function () {
            const roomId = this.getAttribute('data-room-id');
            const roomName = this.getAttribute('data-room-name');
            // set modal values
            modalRoomName.textContent = roomName;
            modalRoomId.value = roomId;
            // Show modal
            bookingModal.style.display = "block";
        });
    }); */
    // Event Listener on close
    closeModalButton.addEventListener('click', function () {
        bookingModal.style.display = "none";
    });
    // Event Listener on outside click
    window.addEventListener('click', function (event) {
        if (event.target === bookingModal) {
            bookingModal.style.display = 'none';
        }
    });
    // Submit form event
    bookingForm.addEventListener('submit', function (event) {
        event.preventDefault(); // prevent default submit

        // collect data
        const formData = new FormData(bookingForm);
        // log data, but would send to server via fetch or axios
        console.log('Form Data:', Object.fromEntries(formData));
        // Hide modal
        bookingModal.style.display = 'none';
        // clear form
        bookingForm.reset();
        alert('Booking successful! Confirmation email will be sent soon');
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.querySelector('.navbar-container');
    let lastScrollTop = 0;

    window.addEventListener('scroll', function () {
        let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
            // เลื่อนลง
            navbar.classList.add('hide-nav');
        } else {
            // เลื่อนขึ้น
            navbar.classList.remove('hide-nav');
        }
        lastScrollTop = scrollTop;
    });
});

document.addEventListener("DOMContentLoaded", function () {
    let currentPath = window.location.pathname.toLowerCase();
    let navLinks = document.querySelectorAll(".nav-links li a");

    navLinks.forEach(link => {
        if (link.getAttribute("href").toLowerCase() === currentPath) {
            setTimeout(() => {
                link.classList.add("active");
            }, 100); // ดีเลย์เล็กน้อยให้ smooth
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const bookingFormModal = new bootstrap.Modal(document.getElementById('booking-form-modal'));
    const bookRoomButtons = document.querySelectorAll('.book-room-btn');
    const bookingForm = document.getElementById('booking-form');
    const roomNameInput = document.getElementById('room_name');
    const submitBookingButton = document.getElementById('submit-booking');

    bookRoomButtons.forEach(button => {
        button.addEventListener('click', function () {
            const roomId = this.dataset.roomId;
            const roomName = this.dataset.roomName;
            roomNameInput.value = roomName;
            bookingForm.reset();
            bookingFormModal.show();
        });
    });

    submitBookingButton.addEventListener('click', function () {
        if (bookingForm.checkValidity()) {
            // ทำการส่งข้อมูลฟอร์มไปยังเซิร์ฟเวอร์ (ยังไม่ได้กำหนดในที่นี้)
            let formData = new FormData(bookingForm);
            console.log('Form data submitted:', formData);
            // ปิด Modal
            bookingFormModal.hide();
        } else {
            bookingForm.reportValidity();
        }
    });
});

const bookingModal = document.getElementById('booking-form-modal');
const modalInstance = new bootstrap.Modal(bookingModal);

const submitButton = document.getElementById('submit-booking');
submitButton.addEventListener('click', function (event) {
    event.preventDefault();
    // กระบวนการส่งข้อมูลฟอร์ม...

    // ปิด Modal เมื่อส่งฟอร์มสำเร็จ (ตัวอย่าง)
    modalInstance.hide();
});

// เมื่อ Modal ถูกปิด (ตัวอย่างการจัดการ event)
bookingModal.addEventListener('hidden.bs.modal', function () {
    // ล้างข้อมูลฟอร์ม (ตัวอย่าง)
    const form = document.getElementById('booking-form');
    form.reset();
});

$(document).ready(function () {
    $('.book-room-btn').click(function () {
        var roomId = $(this).data('room_number');
        var roomName = $(this).data('room-name');
        $('#room_name').val(roomName);
        $('#booking-form-modal').modal('show');
    });

    $('#submit-booking').click(function () {
        // Get form data
        var formData = $('#booking-form').serialize();
        console.log(formData);
        // Send form data using AJAX or submit the form
        $('#booking-form-modal').modal('hide');
        alert('ການຈອງສຳເລັດແລ້ວ!');
        // Reset the form
        $('#booking-form')[0].reset();
    });
});

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

/*     // Room Booking Functionality
    const bookRoomButtons = document.querySelectorAll('.book-room-btn');

    bookRoomButtons.forEach(button => {
        button.addEventListener('click', function() {
            const roomId = this.getAttribute('data-room-id');
            const roomName = this.getAttribute('data-room-name');

            // Set room ID in the modal form
            document.getElementById('roomId').value = roomId;

            // Show the modal
            var bookingModal = new bootstrap.Modal(document.getElementById('bookingModal'));
            bookingModal.show();
        });
    }); */

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