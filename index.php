<?php
// include "./db-connection/db.php";
?>




<?php include ("include_bootstrap/header.php"); ?>
<form id="loginForm">
    <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
        <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
            type="email" id="email_to_login" name="email" placeholder="Email" required>
    </div>
    <div class="input-group input-group-sm mb-3">
        <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
        <input class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm"
            type="password" id="pwd" name="pwd" placeholder="Password" required oninput="validatePassword()">
        <button class="input-group-text" type="button">
            <i class="fas fa-eye-slash" id="signInTogglePassword" style="cursor: pointer;"
                onclick="togglePasswordType('pwd','signInTogglePassword')"></i>
        </button>
    </div>
    <div class="row justify-content-center">
        <button class='btn btn-primary col-md-4 m-1' type="submit">Sign In</button>
        <button class='btn btn-success col-md-6 m-1' type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#forgotPwd">Forgot Password</button>
    </div>
    <div class="row justify-content-center">
        <button class='btn btn-warning col-md-6 m-1' type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#createNew">Create New</button>
    </div>
</form>

<div class="modal fade" id="createNew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Create New Credentials</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="signupForm">
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">First Name</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" id="fname" name="fname" placeholder="First Name"
                            required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Last Name</span>
                        <input type="text" class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" id="lname" name="lname" placeholder="Last Name"
                            required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                        <input class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" id="email_to_create" name="email"
                            placeholder="Email" required>
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Password</span>
                        <input class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" type="password" id="pwdd" name="pwdd"
                            placeholder="Password" required>
                        <button class="input-group-text" type="button">
                            <i class="fas fa-eye-slash" id="signupTogglePassword" style="cursor: pointer;"
                                onclick="togglePasswordType('pwdd','signupTogglePassword')"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class='btn btn-primary col-md-4 m-1' type="button" id="submitBtn">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="forgotPwd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Reset Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="forgotPwdForm">
                <div class="modal-body">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                        <input class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" type="email" id="email_to_reset" name="email"
                            placeholder="Email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class='btn btn-success col-md-6 m-1' type="submit" id="otpButton">Send OTP</button>
                </div>
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="otp" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="otpModalLabel">Reset Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="otpForm">
                <div class="modal-body">
                    <input type="hidden" name="email" id="otp_email">
                    <div class="input-group input-group-sm mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Enter the OTP</span>
                        <input class="form-control" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm" type="text" id="otpText" name="otpText"
                            placeholder="Enter OTP" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class='btn btn-success col-md-6 m-1' id="verifyOtpButton">Verify OTP</button>
                </div>
            </form>
            <div id="otpResponse" class="mt-3"></div>
        </div>
    </div>
</div>


<?php include ("include_bootstrap/footer.php"); ?>