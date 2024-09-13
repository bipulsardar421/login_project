<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body style=" background: rgb(255, 200, 224);
    background: radial-gradient(circle, rgba(255, 200, 224, 1) 0%, rgba(147, 171, 199, 1) 100%);">
    <div class="container-fluid mt-5 ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        &nbsp;
                        &nbsp;
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <form id="resetPasswordForm">
                                <div id="responseMessage" class="mt-3"></div>
                                    <input type="hidden" id="email" name="email"
                                        value="<?php echo htmlspecialchars($_GET['email']); ?>">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">New Password</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="password" id="newPassword"
                                            name="newPassword" placeholder="New Password" required>
                                    </div>
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">Confirm Password</span>
                                        <input class="form-control" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm" type="password" id="confirmPassword"
                                            name="confirmPassword" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="row justify-content-center">
                                        <button class='btn btn-primary col-md-4 m-1' type="button"
                                            onclick="redirectToSignIn()">Go Back</button>
                                        <button class='btn btn-success col-md-6 m-1' type="button"
                                            id="updatePasswordButton">Update Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- handler -->
    <script src="../js/handler/login-handler.js" defer></script>
    <script src="../js/handler/sign-up-handler.js" defer></script>
    <script src="../js/handler/password-reset-handler.js" defer></script>


    <!-- common functionality -->
    <script src="../js/common.js" defer></script>
    <script src="../js/spinner.js" defer></script>
    <script src="../js/alert.js" defer></script>

</body>

</html>