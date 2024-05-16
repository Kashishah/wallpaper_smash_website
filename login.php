<?php

include_once 'includes/header.php';

?>

<div class="bg-login container-fluid position-relative" style="height: 100vh;">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-8 center-container">
            <div class="card login-card">
                <div class="row g-0">
                    <!-- Login Form Section -->
                    <div class="col-md-6 login-form">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Login</h5>
                            <form>
                                <div class="mb-3">
                                    <label for="email" class="form-label">email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <span id="feedback-email" class="text-capitalize"></span>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button id="login-submit-btn" type="submit"
                                    class="login-btn-bg login-btn-txt btn text-center w-100">Login
                                </button>
                                <div class="d-flex justify-content-around">
                                    <div class="forgot-pass">
                                        <span><a href="forgot_password.php">Forgot Password?</a> </span>
                                    </div>
                                    <div class="remember-me">
                                        <span>
                                            <label for="remember-me">Remember me</label>
                                            <input class="bg-checked" type="checkbox" name="rememberme"
                                                id="remember-me">
                                        </span>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <a class="register-link-btn" href="register.php"> Unable to login ? Register
                                Now</a>
                            <div>
                                <p class="mt-3" id="success-message">Registered successfully</p>
                                <p class="mt-3" id="error-message">Something wrong</p>
                            </div>
                        </div>
                    </div>
                    <!-- Image Section -->
                    <div class="col-md-6 login-image"></div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<script>
    $(document).ready(function () {

        // alert("Login page loaded")
        localEmail = localStorage.getItem("user_email");
        localPassword = localStorage.getItem("user_password");
        // console.log(localEmail);
        console.log('out if');
        console.log(localEmail);
        console.log(localPassword);
        if (localEmail && localPassword) {
            console.log('in if');
            window.location.href = 'dashboard.php';
            // $('#email').attr('value', localEmail);
            // $('#password').attr('value', localPassword);
            // $('#remember-me').prop('checked', true);
        }

        $('#email').on('blur', function (e) {
            let emailInput = $(this).val();
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            let emailFeedback = $('#feedback-email');
            if (emailRegex.test(emailInput)) {
                $('#feedback-email').text('Valid Email address').removeClass('text-danger').addClass('text-success');
                // $.ajax({ })
            } else {
                if (emailInput == "") {
                    $('#feedback-email').text('Please fill the email first').removeClass('text-success').addClass('text-danger');
                }
                else {
                    $('#feedback-email').text('Please enter valid email').removeClass('text-success').addClass('text-danger');
                }
            }
        });


        $('#success-message').hide();
        $('#error-message').hide();
        $('#login-submit-btn').on('click', function (e) {
            e.preventDefault();
            let email = $('#email').val();
            let password = $('#password').val();

            let formData = {
                'user_email': email,
                'user_password': password
            };


            $.ajax({
                method: 'POST',
                dataType: 'json',
                url: 'backend/login.php',
                data: formData,
                success: function (response) {

                    switch (response) {
                        case 0: $('#success-message').slideUp();
                            $('#error-message').html('Email is wrong');
                            $('#error-message').addClass('alert alert-danger');
                            $('#error-message').slideDown();
                            break;
                        case 1:
                            if ($('#remember-me').is(':checked')) {
                                localStorage.setItem("user_email", email);
                                localStorage.setItem("user_password", password);
                                window.location.href = 'dashboard.php';
                            }
                            $('#error-message').slideUp();
                            $('#success-message').html('Login Successfully');
                            $('#success-message').addClass('alert alert-success');
                            $('#success-message').slideDown();
                            break;
                        case 2: $('#success-message').slideUp();
                            $('#error-message').html('Password is wrong');
                            $('#error-message').addClass('alert alert-danger');
                            $('#error-message').slideDown();
                            break;
                    }


                }
            });
        });
    });
</script>