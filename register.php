<?php

include_once 'includes/header.php';

?>



<div class="bg-register container-fluid position-relative" style="height: 100vh;">

    <div class="success-message">

    </div>
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-8 center-register-container">
            <div class="card register-card">

                <div class="col-md-12 login-form">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Register</h5>
                        <form method="POST" action="" class="mb-3">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">FirstName</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required>
                            </div>
                            <div class="mb-3">
                                <label for="lastname" class="form-label">Lastname</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password" name="password"
                                    required>
                            </div>
                            <button id="register-submit-btn" type="submit"
                                class="login-btn-bg login-btn-txt btn text-center w-100">REGISTER
                            </button>
                        </form>


                        <a class="login-link-btn mb-3" href="index.php">Go to login page</a>
                        <div>
                            <p class="mt-3" id="success-message">Registered successfully</p>
                            <p class="mt-3" id="error-message">Something wrong</p>
                        </div>
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

        $('#register-submit-btn').on('click', function (e) {

            e.preventDefault();

            let firstname = $('#firstname').val();
            let lastname = $('#lastname').val();
            let email = $('#email').val();
            let password = $('#password').val();
            let confirm_password = $('#confirm-password').val();

            if (!firstname || !lastname || !email || !password) {
                $('#success-message').slideUp();
                $('#error-message').html('Some Fields are empty please fill first!');
                $('#error-message').addClass('alert alert-danger');
                $('#error-message').slideDown();
                return;
            }

            if (password == confirm_password) {
                let formData = {
                    'user_firstname': firstname,
                    'user_lastname': lastname,
                    'user_email': email,
                    'user_password': password
                }
                $.ajax({
                    method: 'POST',
                    dataType: 'json',
                    url: 'backend/register.php',
                    data: formData,
                    success: function (response) {

                        if (response == 1) {
                            $('#error-message').slideUp();
                            $('#success-message').addClass('alert alert-success');
                            $('#success-message').slideDown();
                        } else {
                            $('#success-message').slideUp();
                            $('#error-message').addClass('alert alert-danger');
                            $('#success-message').slideDown();
                        }
                    }
                });
            } else {
                $('#success-message').slideUp();
                $('#error-message').html('Password should be same');
                $('#error-message').addClass('alert alert-danger');
                $('#error-message').slideDown();
            }
        });
    });
</script>

</body>