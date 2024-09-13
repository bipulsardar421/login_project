<?php
include("main-connection-db-model.php");
header('Content-Type: application/json');

$response = array();

if (isset($_POST["otpVerify"])) {
    $email = $_POST["email"];
    $entered_otp = $_POST["otp"];
    $stmt = $conn->prepare('SELECT email, otp FROM otpvalidation WHERE status = "active" AND email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $db_email = $row['email'];
        $db_otp = $row['otp'];

        if (password_verify($entered_otp, $db_otp)) {
            $sql = "UPDATE otpvalidation SET status = 'inactive' WHERE otp=?";
            $del = $conn->prepare($sql);
            $del->bind_param("s", $db_otp);
            if ($del->execute()) {
                $response['status'] = 'success';
                $response['message'] = 'OTP verified successfully';
                $response['redirect'] = './src/reset_pwd.php?email=' . urlencode($db_email);
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Error updating OTP status: ' . $del->error;
            }
            $del->close();
        } else {
            $response['status'] = 'error';
            $response['message'] = 'OTP does not match';
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'No active OTP found for this email';
    }
    $stmt->close();
} else {
    $response['status'] = 'error';
    $response['message'] = 'OTP verification request not received';
}
echo json_encode($response);
?>