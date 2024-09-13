<?php
include "./main-connection-db-model.php";
require "../assets/mail-sender.php";
session_start();

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $stmt = $conn->prepare("SELECT firstName, lastName, password FROM userdetails WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($fname, $lname, $password);

    if ($stmt->fetch()) {
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['email'] = $email;

        prepare_email($email);
        echo json_encode([
            'status' => 'success',
            'message' => 'User found',
        ]);
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'No user found'
        ]);
    }

    $stmt->close();
    $conn->close();
}
?>