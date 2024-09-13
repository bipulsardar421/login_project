<?php
session_start();
include "./main-connection-db-model.php";

header('Content-Type: application/json');

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $stmt = $conn->prepare("SELECT sl_no, firstName, lastName, password FROM userdetails WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($sl_no, $fname, $lname, $hashed_pwd);

    if ($stmt->fetch() && password_verify($pwd, $hashed_pwd)) {
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['email'] = $email;
        $_SESSION['sl_no'] = $sl_no;

        $response = [
            'status' => 'success',
            'message' => 'Login successful',
            'data' => $_SESSION,
            'redirect_url' => './employee_information-db-model.php'
        ];
    } else {
        $response = [
            'status' => 'error',
            'message' => 'No user found or incorrect password'
        ];
    }

    $stmt->close();
    $conn->close();
} else {
    $response = [
        'status' => 'error',
        'message' => 'Invalid request method'
    ];
}

echo json_encode($response);
?>