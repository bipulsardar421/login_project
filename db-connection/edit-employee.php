<?php
include "./main-connection-db-model.php";
$response = array();
header('Content-Type: application/json');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sl_no = isset($_POST['user_id']) ? $_POST['user_id'] : '';
    $fname = isset($_POST['fname']) ? $_POST['fname'] : '';
    $lname = isset($_POST['lname']) ? $_POST['lname'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone_no = isset($_POST['phone_no']) ? $_POST['phone_no'] : '';
    $dept = isset($_POST['dept']) ? $_POST['dept'] : '';

    if (empty($sl_no) || empty($fname) || empty($lname) || empty($email) || empty($phone_no) || empty($dept)) {
        $response['success'] = false;
        $response['message'] = 'All fields are required.';
        echo json_encode($response);
        exit();
    }
    $sql = "UPDATE employees SET fname=?, lname=?, email=?, phone_no=?, dept=? WHERE user_id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        $response['success'] = false;
        $response['message'] = 'Failed to prepare statement: ' . $conn->error;
        echo json_encode($response);
        exit();
    }
    $stmt->bind_param("sssssi", $fname, $lname, $email, $phone_no, $dept, $sl_no);
    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Employee details updated successfully!';
    } else {
        $response['success'] = false;
        $response['message'] = 'Error executing query: ' . $stmt->error;
    }
    $stmt->close();
} else {
    $response['success'] = false;
    $response['message'] = 'Invalid request method.';
}
$conn->close();
echo json_encode($response);
exit();
?>