<?php
session_start();
include "./main-connection-db-model.php";

header('Content-Type: application/json'); // Set the content type to JSON

$response = array('success' => false, 'message' => '', 'user_id' => null);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $dept = $_POST['dept'];

    $sql = "INSERT INTO employees (fname, lname, email, phone_no, dept) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fname, $lname, $email, $phone_no, $dept);

    if ($stmt->execute()) {
        // Query to get the user ID of the newly added employee
        $getQuery = "SELECT user_id FROM employees WHERE email = ? AND status = 'active'";
        $runQuery = $conn->prepare($getQuery);
        $runQuery->bind_param("s", $email);
        
        if ($runQuery->execute()) {
            $result = $runQuery->get_result();
            $row = $result->fetch_assoc();
            if ($row) {
                $response['success'] = true;
                $response['message'] = 'Employee added successfully!';
                $response['user_id'] = $row['user_id'];
            } else {
                $response['message'] = 'No active user found with that email.';
            }
        } else {
            $response['message'] = 'Query error: ' . $runQuery->error;
        }
        
        $runQuery->close();
    } else {
        $response['message'] = 'Error: ' . $stmt->error;
    }

    $stmt->close();
} else {
    $response['message'] = 'Invalid request method.';
}

$conn->close();

echo json_encode($response);
?>
