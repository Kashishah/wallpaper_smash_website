<?php
include_once 'includes/header.php';
?>


<div class="bg-forgot-pass container-fluid position-relative" style="height:100vh;">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-8 center-container">
            <div class="card w-50 login-card">
                <div class="row g-0">
                    <div class="col-md-12 ">
                        <!-- Reset password form start -->
                        <div id="forget-passsword-email-form" class="card-body">
                            <h5 class="card-title mb-4">Reset Password</h5>
                            <form>
                                <div class="mb-3 text-uppercase">
                                    <label for="email" class="form-label">enter your email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                    <span id="feedback-email" class="text-capitalize"></span>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="password" class="form-label"> New Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="confirm-password" class="form-label"> Confirm Password</label>
                                    <input type="password" class="form-control" id="confirm-password"
                                        name="confirm-password" required>
                                </div> -->
                                <button id="forgot-pass-submit-btn" type="submit"
                                    class="forget-pass-btn-bg  forget-pass-btn-txt  btn text-center w-100">Login
                                </button>
                            </form>
                        </div>
                        <!-- Reset password form End -->

                        <div id="security-code-form" class="card-body">
                            <h5 class="card-title mb-4">Security Password</h5>
                            <p class="alert alert-dark">Please enter the security code that you received in your email
                                to proceed with the
                                password reset process.</p>
                            <form>
                                <div class="mb-3 text-uppercase">
                                    <label for="security-code" class="form-label">enter 6 digit security code</label>
                                    <input type="password" class="form-control" id="security-code" name="security-code"
                                        placeholder="* * * * * *" required>
                                    <span id="feedback-email" class="text-capitalize"></span>
                                </div>
                                <button id="security-code-submit-btn" type="submit"
                                    class="forget-pass-btn-bg  forget-pass-btn-txt  btn text-center w-100">Login
                                </button>
                            </form>
                        </div>
                        <div>
                            <p class="mt-3" id="success-message"></p>
                            <p class="mt-3" id="error-message"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        $('#success-message').hide();
        $('#error-message').hide();
        $('#security-code-form').hide();


        $('#email').on('blur', function (e) {

            let emailInput = $(this).val();
            let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            let emailFeedback = $('#feedback-email');
            if (emailInput == "") {
                $('#forgot-pass-submit-btn').prop('disabled', true);
                $('#feedback-email').text('Please write email first').removeClass('text-success').addClass('text-danger');
                return;
            }
            if (emailRegex.test(emailInput)) {
                $('#forgot-pass-submit-btn').prop('disabled', false);
                $('#feedback-email').text('All good').removeClass('text-danger').addClass('text-success');
            } else {
                $('#feedback-email').text('Please correct a format').removeClass('text-success').addClass('text-danger');
                $('#forgot-pass-submit-btn').prop('disabled', true);
            }
        });

        $('#forgot-pass-submit-btn').on('click', function (e) {
            e.preventDefault();
            let inputEmail = $('#email').val();
            if (!inputEmail) {
                $('#success-message').slideUp().removeClass('alert alert-success');
                $('#error-message').html('Please Fill the form first').addClass('alert alert-danger').slideDown();
                return;
            }
            $.ajax({
                url: 'mail/forgot_password_mail.php',
                dataType: 'json',
                method: 'post',
                data: { 'user_email': inputEmail },
                success: function (response) {
                    if (response == 1) {
                        $('#error-message').removeClass('alert alert-danger').fadeOut();
                        $('#success-message').html('Mail Sent Successfully check your inbox').addClass('alert alert-success').fadeIn();
                        $('#forget-passsword-email-form').hide();
                        $('#success-message').fadeOut(2000);
                        $('#security-code-form').show();


                    }
                    else {
                        $('#success-message').fadeOut().removeClass('alert alert-success');
                        $('#error-message').html('Something is wrong please try again').addClass('alert alert-danger').fadeIn();
                    }
                }
            });
        })

        $('#security-code-submit-btn').on('click', function (e) {
            e.preventDefault();
            let inputSecurityCode = $('#security-code').val();
            if (!inputSecurityCode) {
                $('#success-message').slideUp().removeClass('alert alert-success');
                $('#error-message').html('Please enter the security code first').addClass('alert alert-danger').slideDown();
                return;
            }
            $.ajax({
                url: 'mail/security_code.php',
                dataType: 'json',
                method: 'post',
                data: { 'security_code': inputSecurityCode },
                success: function (response) {
                    if (response == 1) {
                        $('#error-message').removeClass('alert alert-danger').fadeOut();
                        $('#success-message').html('Mail Sent Successfully check your inbox').addClass('alert alert-success').fadeIn();
                        $('#forget-passsword-email-form').hide();
                        $('#success-message').fadeOut(2000);
                        $('#security-code-form').show();


                    }
                    else {
                        $('#success-message').fadeOut().removeClass('alert alert-success');
                        $('#error-message').html('Something is wrong please try again').addClass('alert alert-danger').fadeIn();
                    }
                }
            });
        });
    });
</script>

</body>