<?php

include_once 'header.php';

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
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" class="login-btn-bg login-btn-txt btn text-center w-100">Login
                                </button>
                                <div class="forgot-pass">
                                    <span><a href="">Forgot Password?</a> </span>
                                </div>
                                <hr>
                                <!-- <div class="register-txt">
                                    Unable to login ? <a class="register-link" href="register.php"> Register</a>
                                </div> -->
                                <a class="register-link-btn" href="register.php"> Unable to login ? Register
                                    Now</a>
                            </form>
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