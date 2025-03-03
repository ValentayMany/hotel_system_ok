<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ບ້ານພັກ ຄອນສະຫວັນ - Hotel Booking</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100..900&display=swap" rel="stylesheet">
    <link href="{{ asset('css/details.css') }}" rel="stylesheet">

</head>

<body>
    <div class="navbar-container">
        <nav class="navbar">
            <a href="#" class="logo">
                <i class="fas fa-hotel"></i>
                || ບ້ານພັກ ຄອນສະຫວັນ
            </a>

            <button class="menu-toggle" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>

            <ul class="nav-links" id="navLinks">
                <li><a href="/" >ໜ້າຫຼັກ</a></li>
                <li><a href="/Room">ຫ້ອງພັກ</a></li>
                <li><a href="#">ຕິດຕໍ່</a></li>
                <li><a href="#">ກ່ຽວກັບ</a></li>
            </ul>

            <div class="search-container">
                <input type="text" placeholder="ຄົ້ນຫາ...">
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </nav>
    </div>

    <div class="main-content">
        <div class="left-section">
            <div class="carousel">
                <span class="carousel-arrow prev">←</span>
                <img src="/api/placeholder/800/400" alt="Hotel Room">
                <span class="carousel-arrow next">→</span>
            </div>
            <div class="thumbnails">
                <div class="thumbnail">Room 1</div>
                <div class="thumbnail">Room 2</div>
                <div class="thumbnail">Room 3</div>
                <div class="thumbnail">Room 4</div>
            </div>
        </div>
        <div class="sidebar">
            <form class="booking-form">
                <div class="form-group">
                    <label for="check-in">Check-in Date</label>
                    <input type="date" id="check-in" required>
                </div>
                <div class="form-group">
                    <label for="check-out">Check-out Date</label>
                    <input type="date" id="check-out" required>
                </div>
                <div class="form-group">
                    <label for="guests">Number of Guests</label>
                    <select id="guests" required>
                        <option value="1">1 Guest</option>
                        <option value="2">2 Guests</option>
                        <option value="3">3 Guests</option>
                        <option value="4">4 Guests</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="room-type">Room Type</label>
                    <select id="room-type" required>
                        <option value="standard">Standard Room</option>
                        <option value="deluxe">Deluxe Room</option>
                        <option value="suite">Suite</option>
                    </select>
                </div>
                <button type="submit" class="book-button">Book Now</button>
            </form>
        </div>
    </div>

    <div class="bottom-sections">
        <div class="bottom-section">
            <h3>Special Offers</h3>
            <p>Check our latest deals</p>
        </div>
        <div class="bottom-section">
            <h3>Amenities</h3>
            <p>Discover our facilities</p>
        </div>
    </div>

    <footer class="footer">
        &copy; <span>2025 ບ້ານພັກ ຄອນສະຫວັນ Hotel</span> | All Rights Reserved
    </footer>
</body>
<script>
    // Toggle the visibility of nav-links on smaller screens
    function toggleMenu() {
        const navLinks = document.getElementById('navLinks');
        navLinks.classList.toggle('show');
    }
</script>

</html>
