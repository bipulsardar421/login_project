<?php
include "./main-connection-db-model.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST["search"];
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
            emp_image AS emp_img on mainEmp.user_id = emp_img.user_id WHERE 
            (mainEmp.fname LIKE '%$search%' OR 
            mainEmp.lname LIKE '%$search%' OR 
            mainEmp.email LIKE '%$search%' OR 
            mainEmp.dept LIKE '%$search%') AND 
            status = 'active' 
            ORDER BY updatedAt DESC";

    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($rows);
    } else {
        echo json_encode([]);
    }
}
?>