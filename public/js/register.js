// Password visibility toggle
const togglePassword = document.querySelector('#togglePassword');
const toggleConfirmPassword = document.querySelector('#toggleConfirmPassword');
const password = document.querySelector('#password');
const confirmPassword = document.querySelector('#confirmPassword');

togglePassword.addEventListener('click', function () {
    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
    password.setAttribute('type', type);
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
});

toggleConfirmPassword.addEventListener('click', function () {
    const type = confirmPassword.getAttribute('type') === 'password' ? 'text' : 'password';
    confirmPassword.setAttribute('type', type);
    this.classList.toggle('fa-eye');
    this.classList.toggle('fa-eye-slash');
});

// Password validation
const passwordInput = document.querySelector('#password');
const requirements = document.querySelectorAll('.requirements-list li i');

passwordInput.addEventListener('input', function () {
    const password = this.value;

    // Check length
    if (password.length >= 8) {
        requirements[0].classList.add('requirement-met');
    } else {
        requirements[0].classList.remove('requirement-met');
    }

    // Check uppercase
    if (/[A-Z]/.test(password)) {
        requirements[1].classList.add('requirement-met');
    } else {
        requirements[1].classList.remove('requirement-met');
    }

    // Check number
    if (/[0-9]/.test(password)) {
        requirements[2].classList.add('requirement-met');
    } else {
        requirements[2].classList.remove('requirement-met');
    }
});