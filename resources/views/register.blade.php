<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ລົງທະບຽນ ໂຮງແຮມ ຄອນສະຫວັນ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('/api/placeholder/1920/1080');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            font-family: 'phetsarath ot', sans-serif;
            color: #333;
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 40px 0;
        }

        .register-container {
            max-width: 550px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .hotel-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .hotel-logo img {
            width: 120px;
            height: auto;
            transition: transform 0.3s ease;
        }

        .hotel-logo img:hover {
            transform: scale(1.05);
        }

        h2 {
            font-weight: 600;
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
            font-size: 2.2rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .form-label {
            font-weight: 500;
            color: #2c3e50;
            margin-bottom: 8px;
        }

        .form-control {
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #8e44ad;
            box-shadow: 0 0 0 0.2rem rgba(142, 68, 173, 0.25);
        }

        .input-group-text {
            background-color: transparent;
            border-left: none;
            cursor: pointer;
        }

        .btn-primary {
            background-color: #8e44ad;
            border: none;
            padding: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background-color: #732d91;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(142, 68, 173, 0.4);
        }

        .form-text {
            text-align: center;
            margin-top: 20px;
            font-size: 0.95rem;
        }

        .form-text a {
            color: #8e44ad;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .form-text a:hover {
            color: #732d91;
            text-decoration: underline;
        }

        .password-requirements {
            font-size: 0.85rem;
            color: #666;
            margin-top: 5px;
        }

        .requirements-list {
            list-style: none;
            padding-left: 0;
            margin-top: 5px;
        }

        .requirements-list li {
            margin-bottom: 3px;
            display: flex;
            align-items: center;
        }

        .requirements-list li i {
            margin-right: 5px;
            font-size: 0.8rem;
        }

        .requirement-met {
            color: #27ae60;
        }

        .requirement-unmet {
            color: #95a5a6;
        }

        .social-register {
            text-align: center;
            margin-top: 25px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }

        .social-register p {
            color: #666;
            margin-bottom: 15px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-icons a {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s ease;
        }

        .social-icons .facebook {
            background-color: #3b5998;
        }

        .social-icons .google {
            background-color: #584544;
        }

        .social-icons .apple {
            background-color: #000;
        }

        .social-icons a:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .form-check {
            margin-top: 15px;
        }

        .form-check-label {
            font-size: 0.9rem;
            color: #666;
        }

        .form-check-label a {
            color: #8e44ad;
            text-decoration: none;
        }

        .form-check-label a:hover {
            text-decoration: underline;
        }

        .requirement-met {
            color: #27ae60;

        }

        .requirement-unmet {
            color: #e74c3c;

        }
    </style>
</head>

<body>
    <div class="register-container">
        {{--  <div class="hotel-logo">
            <img src="/api/placeholder/120/120" alt="Luxury Hotel Logo">
        </div> --}}
        <h2>ໂຮງແຮມ ຄອນສະຫວັນ</h2>
        <form method="POST" action="{{ route('account.registerSave') }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName" class="form-label">ຊື່</label>
                    <input type="text" name="firstName" class="form-control" placeholder="ປ້ອນຊື່" required>
                    @error('fristName')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="lastName" class="form-label">ນາມສະກຸນ</label>
                    <input type="text" name="lastName" class="form-control" placeholder="ປ້ອນນາມສະກຸນ" required>
                    @error('lastName')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">ອີເມວ</label>
                <input type="email" name="email" class="form-control" placeholder="ປ້ອນອີເມວ" required>
                @error('email')
                    <span class="text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">ເບີໂທ</label>
                <input type="text" name="phone" class="form-control" placeholder="ປ້ອນເບີໂທ" required>
                @error('phone')
                    <span class="text text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">ລະຫັດຜ່ານ</label>
                <div class="input-group">
                    <input type="password" name="password" id="Password" class="form-control" placeholder="Password"
                        required>
                    <span class="input-group-text">
                        <i class="fas fa-eye-slash" id="togglePassword"></i>
                    </span>
                </div>
                @error('password')
                    <span class="text text-danger">{{ $message }}</span>
                @enderror
                <div class="password-requirements">
                    <ul class="requirements-list">
                        <li><i id="lengthRequirement" class="fas fa-circle"></i> ຢ່າງຕໍ່າ 8 ຕົວອັກສອນ</li>
                        <li><i id="uppercaseRequirement" class="fas fa-circle"></i> ມີຕົວອັກສອນພີມໃຫ່ຍ</li>
                        <li><i id="numberRequirement" class="fas fa-circle"></i> ມີຕົວເລກ</li>
                    </ul>
                </div>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">ຢືນຢັນລະຫັດຜ່ານ</label>
                <div class="input-group">
                    <input type="password" name="password_confirmation" id="confirmPassword" class="form-control"
                        placeholder="Confirm Password" required>

                    @error('password_confirmation')
                        <span class="text text-danger">{{ $message }}</span>
                    @enderror
                    <span class="input-group-text">
                        <i class="fas fa-eye-slash" id="toggleConfirmPassword"></i>
                    </span>
                </div>
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="terms" required>
                <label class="form-check-label" for="terms">
                    ຂ້ອຍຍອມຮັບ <a href="#">ເງື່ອນໄຂການໃຊ້ງານ</a> ແລະ <a href="#">ນະໂຍບາຍຄວາມລັບ</a>
                </label>
            </div>

            <button type="submit" class="btn btn-primary w-100">ສ້າງບັດຜູກທັບ</button>
            <p class="form-text">
                ມີບັດຜູກທັບແລ້ວຫຼືບໍ? <a href="{{ route('login') }}">ເຂົ້າສູ່ລະບົບ</a>
            </p>
        </form>
    </div>
</body>

</html>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
    const password = document.querySelector('input[name="password"]');
    const confirmPassword = document.querySelector('#confirmPassword');

    const passwordInput = document.querySelector('input[name="password"]');
    const lengthRequirement = document.querySelector('#lengthRequirement');
    const uppercaseRequirement = document.querySelector('#uppercaseRequirement');
    const numberRequirement = document.querySelector('#numberRequirement');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });

    toggleConfirmPassword.addEventListener('click', function() {
        const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
        confirmPassword.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });


    passwordInput.addEventListener('input', function() {
        const password = passwordInput.value;


        if (password.length >= 8) {
            lengthRequirement.classList.add('requirement-met');
            lengthRequirement.classList.remove('requirement-unmet');
        } else {
            lengthRequirement.classList.remove('requirement-met');
            lengthRequirement.classList.add('requirement-unmet');
        }

        // ตรวจสอบตัวอักษรพิมพ์ใหญ่
        if (/[A-Z]/.test(password)) {
            uppercaseRequirement.classList.add('requirement-met');
            uppercaseRequirement.classList.remove('requirement-unmet');
        } else {
            uppercaseRequirement.classList.remove('requirement-met');
            uppercaseRequirement.classList.add('requirement-unmet');
        }

        // ตรวจสอบตัวเลข
        if (/[0-9]/.test(password)) {
            numberRequirement.classList.add('requirement-met');
            numberRequirement.classList.remove('requirement-unmet');
        } else {
            numberRequirement.classList.remove('requirement-met');
            numberRequirement.classList.add('requirement-unmet');
        }
    });
</script>
