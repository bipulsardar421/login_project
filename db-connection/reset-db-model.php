<?php
include "./main-connection-db-model.php";
session_start();
header('Content-Type: application/json');
$response = array();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $newPwd = password_hash($_POST['newPassword'], PASSWORD_DEFAULT);
    $sql = "UPDATE userdetails SET password = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ss", $newPwd, $email);
        if ($stmt->execute() === TRUE) {
            $response['status'] = 'success';
            $response['message'] = 'Password updated successfully';
            $response['redirect'] = '../index.php';
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Error updating password: ' . $stmt->error;
        }
        $stmt->close();
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error preparing statement: ' . $conn->error;
    }

    $conn->close();
} else {
    $response['status'] = 'error';
    $response['message'] = 'Invalid request method';
}
echo json_encode($response);
?>
