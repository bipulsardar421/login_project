<?php
include "./main-connection-db-model.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pwdd = $_POST['pwdd'];
    $pwd = password_hash($pwdd, PASSWORD_DEFAULT);
    $checkStmt = $conn->prepare("SELECT * FROM userdetails WHERE email = ?");
    $checkStmt->bind_param("s", $email);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo json_encode(["status" => 'failed', "message" => "Email '$email' already exists"]);
    } else {
        $stmt = $conn->prepare("INSERT INTO userdetails (firstName, lastName, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $fname, $lname, $email, $pwd);
        try {
            if ($stmt->execute()) {
                echo json_encode(["status" => 'ok', "message" => "New record created successfully"]);
            } else {
                throw new Exception("Error executing query: " . $stmt->error);
            }
        } catch (Exception $e) {
            echo json_encode(["status" => 'failed', "message" => $e->getMessage()]);
        }
        $stmt->close();
    }
    $checkStmt->close();
    $conn->close();
}
?>