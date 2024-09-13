<?php
include ("main-connection-db-model.php");


if (isset($_GET['otp'])) {
    $email = $_GET['email'];
    $msg = $_GET['otp'];
    $sql = "INSERT INTO otpvalidation (email, otp) VALUES ('$email', '$msg')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['status' => 'success', 'message' => 'OTP SENT']);
    } else {
        http_response_code(500);
        echo json_encode(['status' => 'failed', 'message' => 'OTP NOT SENT']);
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
} else {
    echo " " . $email, " " . $msg;
}


?>