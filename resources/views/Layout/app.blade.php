<!DOCTYPE html>
<html lang="lo">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ບ້ານພັກ ຄອນສະຫວັນ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/rooms.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Lao:wght@100..900&display=swap" rel="stylesheet">


</head>

<body>
    <div class="navbar-container">
        <nav class="navbar">
            <a href="/" class="logo">
                <i class="fas fa-hotel"></i>
                || ບ້ານພັກ ຄອນສະຫວັນ
            </a>
            <button class="menu-toggle" aria-label="Toggle Navigation" onclick="toggleMenu()">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-links" id="navLinks">
                <li><a href="/" class="{{ Request::is('/') ? 'active' : '' }}">ໜ້າຫຼັກ</a></li>
                <li><a href="/rooms" class="{{ Request::is('Room') ? 'active' : '' }}">ຫ້ອງພັກ</a></li>



                <!-- ลิงก์ล็อกอิน/ล็อกเอ้า -->
                @if (Auth::check())
                    <!-- แสดงลิงก์ออกจากระบบ -->
                    <li><a href="/BookDetails" class="{{ Request::is('BookDetails') ? 'active' : '' }}">ລາຍການຈອງ</a>
                    </li>
                    <li><a href="/ProfileUser" class="{{ Request::is('ProfileUser') ? 'active' : '' }}">ໂປຮຟາຍ</a></li>
                    <li id="logoutLink"><a href="account/logout">ອອກຈາກລະບົບ</a></li>
                @else
                    <!-- แสดงลิงก์ล็อกอินและลงทะเบียน -->

                    <li id="loginLink"><a href="{{ route('login') }}">ລັອກອິນ</a></li>
                    <li id="registerLink"><a href="{{ route('register') }}">ລົງທະບຽນ</a></li>
                @endif
            </ul>
        </nav>
    </div>
    @yield('content')
    <footer>
        <div class="footer-container">
            <div class="footer-section">
                <h4>ຂໍ້ມູນຕິດຕໍ່</h4>
                <p>123 ຖະໜົນ ຄອນສະຫວັນ, ເມືອງ ຫຼວງພະບາງ</p>
                <p>ອີເມວ: info@konsavanhhotel.com</p>
                <p>ເບີໂທ: +856 20 123 4567</p>
            </div>
            <div class="footer-section">
                <h4>ລິ້ງດ່ວນ</h4>
                <ul>
                    <li> <a href="/">ໜ້າຫຼັກ</a></li>
                    <li> <a href="/Room">ຫ້ອງພັກ</a></li>
                    <!-- ลิงก์ล็อกอิน/ล็อกเอ้า -->
                    @if (Auth::check())
                        <!-- แสดงลิงก์ออกจากระบบ -->
                        <li><a href="/BookDetails"
                                class="{{ Request::is('BookDetails') ? 'active' : '' }}">ລາຍການຈອງ</a></li>
                        <li><a href="/ProfileUser" class="{{ Request::is('ProfileUser') ? 'active' : '' }}">ໂປຮຟາຍ</a>
                        </li>
                        <li id="logoutLink"> <a href="{{ route('account.logout') }}">ອອກຈາກລະບົບ</a></li>
                    @else
                    @endif
                </ul>
            </div>
            <div class="footer-section">
                <h4>ຕິດຕາມພວກເຮົາ</h4>
                <p>ຕິດຕາມພວກເຮົາໃນສື່ສັງຄົມອອນລາຍ</p>
                <div class="social-links">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>© 2024 ບ້ານພັກ ຄອນສະຫວັນ. ພັດທະນາໂດຍ <a href="#">ນັກສຶກສາ CW3</a></p>
        </div>
    </footer>

    <script src="{{ asset('js/welcome.js') }}"></script>
    <script src="{{ asset('js/rooms.js') }}"></script>
</body>

</html>
