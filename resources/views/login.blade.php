<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ໂຮງແຮມ ຄອນສະຫວັນ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="{{ asset('css/Login.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="login-container">
        <h2>ຍິນດີຕອນຮັບ</h2>
        <form method="POST" action="{{ route('account.authenticate') }}">
            @csrf
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">{{ Session::get('error') }}
                </div>
            @endif

            <div class="mb-4">
                <label for="email" class="form-label @error('email') is-invalid @enderror">ອີເມວຜູ້ໃຊ້</label>
                <input type="email" class="form-control" name="email" placeholder="ປ້ອນອີເມວ" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">ລະຫັດຜ່ານ</label>
                @if ($errors->any())
                    <p class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                    </p>
                @endif

                <div class="input-group">

                    <input type="password" name="password" id="Password" class="form-control" placeholder="Password"
                        required>
                    <span class="input-group-text">
                        <i class="fas fa-eye-slash" id="togglePassword"></i>
                    </span>
                    @error('password')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="remember-forgot">
                <div class="flex items-start">
                    <div class="flex items-center h-5">
                        <input name="remember" id="remember" aria-describedby="remember" type="checkbox"
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800"
                            required="">
                        <label for="remember" class=" text text-bold">ຈື່ລະຫັດໄວ້ບໍ່</label>
                    </div>
                </div>
                <a href="#" class="forgot-password">ລືມລະຫັດຜ່ານ?</a>
            </div>
            <button type="submit" class="btn btn-primary w-100">ເຂົ້າສູ່ລະບົບ</button>
            <p class="form-text">
                ຍັງບໍ່ທັນລົງທະບຽນ ແມ່ນບໍ່? <a href="{{ route('register') }}">ລົງທະບຽນບ່ອນນີ້</a>
            </p>
            <div class="social-login">

                <div class="social-icons">
                    <a href="#" class="facebook" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="instagram" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
    const password = document.querySelector('input[name="password"]');
    const confirmPassword = document.querySelector('#confirmPassword');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
    });
</script>
