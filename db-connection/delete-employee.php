<?php
include "./main-connection-db-model.php";

header('Content-Type: application/json');

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sl_no = $_POST['user_id'];

    $sql = "UPDATE employees SET status = 'inactive' WHERE user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $sl_no);

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Employee removed successfully!';
        $response['user_id'] = $sl_no;
    } else {
        $response['success'] = false;
        $response['message'] = 'Error: ' . $stmt->error;
    }

    $stmt->close();
} else {
    $response['success'] = false;
    $response['message'] = 'Invalid request method.';
}

$conn->close();
echo json_encode($response);
?>