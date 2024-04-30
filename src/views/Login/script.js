// Wait until the DOM is fully loaded
document.addEventListener('DOMContentLoaded', function () {
    // Get DOM elements
    const signup = document.getElementById('signup');
    const login = document.getElementById('login');
    const containerLogin = document.getElementById('container-login');
    const containerSignup = document.getElementById('container-signup');
    const password = document.getElementById('psw');
    const passwordSignup = document.getElementById('psw-signup');
    const eyePasswordLogin = document.getElementById('eye-password-login');
    const eyePasswordSignup = document.getElementById('eye-password-signup');
    const rememberMe = document.getElementById('remember-me');
    const email = document.getElementById('email');
    const btnLogin = document.getElementById('btn-login');
    const btnSignup = document.getElementById('btn-signup');

    // Event listeners for switching between login and signup
    signup.addEventListener('click', function () {
        containerLogin.classList.remove('active');
        containerSignup.classList.add('active');
    });

    login.addEventListener('click', function () {
        containerSignup.classList.remove('active');
        containerLogin.classList.add('active');
    });

    // Event listeners for showing and hiding password
    eyePasswordLogin.addEventListener('click', function () {
        togglePasswordVisibility(eyePasswordLogin, password);
    });

    eyePasswordSignup.addEventListener('click', function () {
        togglePasswordVisibility(eyePasswordSignup, passwordSignup);
    });

    // Remember me functionality
    if (localStorage.checkbox && localStorage.checkbox !== '') {
        rememberMe.setAttribute('checked', 'checked');
        email.value = localStorage.email;
        password.value = localStorage.password;
    } else {
        rememberMe.removeAttribute('checked');
        email.value = '';
        password.value = '';
    }

    rememberMe.addEventListener('change', remember);

    //Check email and password for login
    btnLogin.addEventListener('click', function (e) {
        if (email.value === '' && password.value === '') {
            e.preventDefault();
            errorMessage('errorMessageEmail', 'Vui lòng nhập email');
            errorMessage('errorMessagePassword', 'Vui lòng nhập mật khẩu');
        } else if (email.value === '') {
            e.preventDefault();
            errorMessage('errorMessageEmail', 'Vui lòng nhập email');
            email.focus();
        }
        else if (email.value !== '') {
            if (validateEmail(email.value) == false) {
                e.preventDefault();
                errorMessage('errorMessageEmail', 'Email không hợp lệ');
            } else {
                errorMessage('errorMessageEmail', '');
                if (password.value !== '') {
                    if (password.value.length < 6) {
                        e.preventDefault();
                        errorMessage('errorMessagePassword', 'Mật khẩu phải có ít nhất 6 ký tự');
                    } else {
                        errorMessage('errorMessagePassword', '');
                    }
                } else {
                    e.preventDefault();
                    errorMessage('errorMessagePassword', 'Vui lòng điền mật khẩu');
                    password.focus();
                }
            }
        } else if (password.value !== '') {
            if (password.value.length < 6) {
                e.preventDefault();
                errorMessage('errorMessagePassword', 'Mật khẩu phải có ít nhất 6 ký tự');
            } else {
                errorMessage('errorMessagePassword', '');
            }
        }
    });

    //Check email and password for register
    btnSignup.addEventListener('click', function (e) {
        const nameSignup = document.getElementById('name-signup');
        const emailSignup = document.getElementById('email-signup');
        const passwordSignup = document.getElementById('psw-signup');
        const passwordConfirmSignup = document.getElementById('psw-cf-signup');
        if (nameSignup.value === '' && emailSignup.value === '' && passwordSignup.value === '' && passwordConfirmSignup.value === '') {
            e.preventDefault();
            nameSignup.focus();
            errorMessage('errorMessageNameSignup', 'Vui lòng nhập tên');
            errorMessage('errorMessageEmailSignup', 'Vui lòng nhập email');
            errorMessage('errorMessagePasswordSignup', 'Vui lòng nhập mật khẩu');
            errorMessage('errorMessagePasswordConfirm', 'Vui lòng xác nhận mật khẩu');
            return;
        } else if (nameSignup.value === '') {
            e.preventDefault();
            errorMessage('errorMessageNameSignup', 'Vui lòng nhập tên');
            nameSignup.focus();
        } else if (nameSignup.value !== '') {
            errorMessage('errorMessageNameSignup', '');
            if (emailSignup.value === '') {
                e.preventDefault();
                errorMessage('errorMessageEmailSignup', 'Vui lòng nhập email');
                emailSignup.focus();
            } else if (emailSignup.value !== '') {
                if (validateEmail(emailSignup.value) == false) {
                    e.preventDefault();
                    errorMessage('errorMessageEmailSignup', 'Email không hợp lệ');
                } else {
                    errorMessage('errorMessageEmailSignup', '');
                    if (passwordSignup.value === '') {
                        e.preventDefault();
                        errorMessage('errorMessagePasswordSignup', 'Vui lòng nhập mật khẩu');
                        passwordSignup.focus();
                    } else if (passwordSignup.value !== '') {
                        if (passwordSignup.value.length < 6) {
                            e.preventDefault();
                            errorMessage('errorMessagePasswordSignup', 'Mật khẩu phải có ít nhất 6 ký tự');
                        } else {
                            errorMessage('errorMessagePasswordSignup', '');
                            if (passwordConfirmSignup.value === '') {
                                e.preventDefault();
                                errorMessage('errorMessagePasswordConfirm', 'Vui lòng xác nhận mật khẩu');
                                passwordConfirmSignup.focus();
                            } else if (passwordConfirmSignup.value !== '') {
                                if (passwordConfirmSignup.value !== passwordSignup.value) {
                                    e.preventDefault();
                                    errorMessage('errorMessagePasswordConfirm', 'Mật khẩu xác nhận không khớp');
                                } else {
                                    errorMessage('errorMessagePasswordConfirm', '');
                                }
                            }
                        }
                    }
                }
            }
        } else if (emailSignup.value === '') {
            e.preventDefault();
            errorMessage('errorMessageEmailSignup', 'Vui lòng nhập email');
            emailSignup.focus();
        } else if (emailSignup.value !== '') {
            if (validateEmail(emailSignup.value) == false) {
                e.preventDefault();
                errorMessage('errorMessageEmailSignup', 'Email không hợp lệ');
            } else {
                errorMessage('errorMessageEmailSignup', '');
                if (passwordSignup.value === '') {
                    e.preventDefault();
                    errorMessage('errorMessagePasswordSignup', 'Vui lòng nhập mật khẩu');
                    passwordSignup.focus();
                } else if (passwordSignup.value !== '') {
                    if (passwordSignup.value.length < 6) {
                        e.preventDefault();
                        errorMessage('errorMessagePasswordSignup', 'Mật khẩu phải có ít nhất 6 ký tự');
                    } else {
                        errorMessage('errorMessagePasswordSignup', '');
                        if (passwordConfirmSignup.value === '') {
                            e.preventDefault();
                            errorMessage('errorMessagePasswordConfirm', 'Vui lòng xác nhận mật khẩu');
                            passwordConfirmSignup.focus();
                        } else if (passwordConfirmSignup.value !== '') {
                            if (passwordConfirmSignup.value !== passwordSignup.value) {
                                e.preventDefault();
                                errorMessage('errorMessagePasswordConfirm', 'Mật khẩu xác nhận không khớp');
                            } else {
                                errorMessage('errorMessagePasswordConfirm', '');
                            }
                        }
                    }
                }
            }
        } else if (passwordSignup.value === '') {
            e.preventDefault();
            errorMessage('errorMessagePasswordSignup', 'Vui lòng nhập mật khẩu');
            passwordSignup.focus();
        } else if (passwordSignup.value !== '') {
            if (passwordSignup.value.length < 6) {
                e.preventDefault();
                errorMessage('errorMessagePasswordSignup', 'Mật khẩu phải có ít nhất 6 ký tự');
            } else {
                errorMessage('errorMessagePasswordSignup', '');
                if (passwordConfirmSignup.value === '') {
                    e.preventDefault();
                    errorMessage('errorMessagePasswordConfirm', 'Vui lòng xác nhận mật khẩu');
                    passwordConfirmSignup.focus();
                } else if (passwordConfirmSignup.value !== '') {
                    if (passwordConfirmSignup.value !== passwordSignup.value) {
                        e.preventDefault();
                        errorMessage('errorMessagePasswordConfirm', 'Mật khẩu xác nhận không khớp');
                    } else {
                        errorMessage('errorMessagePasswordConfirm', '');
                    }
                }
            }
        } else if (passwordConfirmSignup.value === '') {
            e.preventDefault();
            errorMessage('errorMessagePasswordConfirm', 'Vui lòng xác nhận mật khẩu');
            passwordConfirmSignup.focus();
        } else if (passwordConfirmSignup.value !== '') {
            if (passwordConfirmSignup.value !== passwordSignup.value) {
                e.preventDefault();
                errorMessage('errorMessagePasswordConfirm', 'Mật khẩu xác nhận không khớp');
            } else {
                errorMessage('errorMessagePasswordConfirm', '');
            }
        }
    });
});

// Function to toggle password visibility
function togglePasswordVisibility(eyePassword, password) {
    if (password.type === 'password') {
        password.type = 'text';
        eyePassword.classList.remove('fa-eye-slash');
        eyePassword.classList.add('fa-eye');
    } else {
        password.type = 'password';
        eyePassword.classList.remove('fa-eye');
        eyePassword.classList.add('fa-eye-slash');
    }
}

// Function to remember user credentials
function remember() {
    const rememberMe = document.getElementById('remember-me');
    const email = document.getElementById('email');
    const password = document.getElementById('psw');

    if (rememberMe.checked && email.value !== '' && password.value !== '') {
        localStorage.email = email.value;
        localStorage.password = password.value;
        localStorage.checkbox = rememberMe.value;
    } else {
        localStorage.email = '';
        localStorage.password = '';
        localStorage.checkbox = '';
    }
}

//Check mail and password
function validateEmail(email) {
    const emailRegex = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
    if (emailRegex.test(email)) {
        return true;
    } else {
        return false;
    }
}

function errorMessage(id, message) {
    const iderror = document.getElementById(id);
    iderror.innerHTML = message;
    iderror.style.fontSize = '0.8rem';
    iderror.style.color = 'red';
    iderror.style.margin = '-17px 0 15px 0';
    iderror.style.width = '312px';
}