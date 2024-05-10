<?php

include_once 'header.php';

?>

<div class="bg-register container-fluid position-relative" style="height: 100vh;">
    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-8 center-register-container">
            <div class="card register-card">

                <div class="col-md-12 login-form">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-4">Register</h5>
                        <form class="mb-3">
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
                                <label for="password" class="form-label">Create Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="login-btn-bg login-btn-txt btn text-center w-100">REGISTER
                            </button>
                            <!-- <hr> -->
                            <!-- <div class="register-txt">
                                Unable to login ? <a class="register-link" href=""> Register</a>
                            </div> -->
                        </form>

                        <a class="login-link-btn " href="login.php">Go to login page</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

</body>