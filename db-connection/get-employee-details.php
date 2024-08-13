<?php
header('Content-Type: application/json');

include "../db-connection/main-connection-db-model.php";

if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}
$user_id = isset($_POST['user_id']) ? intval($_POST['user_id']) : 0;

if ($user_id <= 0) {
    echo json_encode(["error" => "Invalid user_id"]);
    $conn->close();
    exit;
}
$sql = "SELECT 
            mainEmp.user_id, mainEmp.fname, mainEmp.lname, mainEmp.email, mainEmp.phone_no, mainEmp.dept,
            details.gender, details.dob, details.maritial_status, details.physically_handicapped, details.blood_group, details.nationality,
            edu.type as eduType, edu.branch, edu.cgpa, edu.yop, edu.yoj,
            contact.personal_mobile_number, contact.personal_email, contact.residence_number,
            addr.type as addrType, addr.address, addr.city, addr.country, addr.post_code,
            emp_img.url
        FROM 
            employees AS mainEmp
        LEFT JOIN 
            employees_details_extended AS details ON mainEmp.user_id = details.user_id
        LEFT JOIN 
            employees_education AS edu ON mainEmp.user_id = edu.user_id
        LEFT JOIN 
            employees_personal_contact_details AS contact ON mainEmp.user_id = contact.user_id
        LEFT JOIN 
            employees_address AS addr ON mainEmp.user_id = addr.user_id
        LEFT JOIN
            emp_image AS emp_img on mainEmp.user_id = emp_img.user_id
        WHERE mainEmp.status = 'active' AND mainEmp.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$result = $stmt->get_result();

$employee = $result->fetch_assoc();

if ($employee) {
    echo json_encode($employee);
} else {
    echo json_encode(["error" => "No employee found"]);
}

$stmt->close();
$conn->close();
?>