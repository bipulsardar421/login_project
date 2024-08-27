<?php
session_start();
include "./db-connection/main-connection-db-model.php";

// Set response header to JSON
header('Content-Type: application/json');

if ($conn->connect_error) {
    echo json_encode([
        "status" => "error",
        "message" => "Connection failed: " . $conn->connect_error
    ]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check the Content-Type to handle either JSON or form data
    $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

    if ($contentType === "application/json") {
        // Handle JSON input
        $input = json_decode(file_get_contents('php://input'), true);

        $user_id = $input['user_id'] ?? null;
        $gender = $input['gender'] ?? null;
        $dob = $input['dob'] ?? null;
        $maritial_status = $input['marStatus'] ?? null;
        $physically_handicapped = $input['handicapped'] ?? null;
        $blood_group = $input['blood'] ?? null;
        $nationality = $input['nation'] ?? null;
        $eduType = $input['eduType'] ?? null;
        $branch = $input['branch'] ?? null;
        $cgpa = $input['marks'] ?? null;
        $yop = $input['yop'] ?? null;
        $yoj = $input['yoj'] ?? null;
        $personal_mobile_number = $input['pnumber'] ?? null;
        $personal_email = $input['pEmail'] ?? null;
        $residence_number = $input['rNumber'] ?? null;
        $addressType = $input['addType'] ?? null;
        $address = $input['address'] ?? null;
        $city = $input['city'] ?? null;
        $country = $input['country'] ?? null;
        $post_code = $input['pincode'] ?? null;
    } else {
        // Handle form data input
        $user_id = $_POST['user_id'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $maritial_status = $_POST['marStatus'];
        $physically_handicapped = $_POST['handicapped'];
        $blood_group = $_POST['blood'];
        $nationality = $_POST['nation'];
        $eduType = $_POST['eduType'];
        $branch = $_POST['branch'];
        $cgpa = $_POST['marks'];
        $yop = $_POST['yop'];
        $yoj = $_POST['yoj'];
        $personal_mobile_number = $_POST['pnumber'];
        $personal_email = $_POST['pEmail'];
        $residence_number = $_POST['rNumber'];
        $addressType = $_POST['addType'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $country = $_POST['country'];
        $post_code = $_POST['pincode'];
    }

    // Insert into employees_details_extended
    $sql = "INSERT INTO employees_details_extended (user_id, gender, dob, maritial_status, physically_handicapped, blood_group, nationality)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $user_id, $gender, $dob, $maritial_status, $physically_handicapped, $blood_group, $nationality);

    if (!$stmt->execute()) {
        echo json_encode([
            "status" => "error",
            "message" => "Error inserting into employees_details_extended: " . $stmt->error
        ]);
        $stmt->close();
        $conn->close();
        exit();
    }

    // Insert into employees_education
    $sql = "INSERT INTO employees_education (user_id, type, branch, cgpa, yop, yoj)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $user_id, $eduType, $branch, $cgpa, $yop, $yoj);

    if (!$stmt->execute()) {
        echo json_encode([
            "status" => "error",
            "message" => "Error inserting into employees_education: " . $stmt->error
        ]);
        $stmt->close();
        $conn->close();
        exit();
    }

    // Insert into employees_personal_contact_details
    $sql = "INSERT INTO employees_personal_contact_details (user_id, personal_mobile_number, personal_email, residence_number)
            VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $user_id, $personal_mobile_number, $personal_email, $residence_number);

    if (!$stmt->execute()) {
        echo json_encode([
            "status" => "error",
            "message" => "Error inserting into employees_personal_contact_details: " . $stmt->error
        ]);
        $stmt->close();
        $conn->close();
        exit();
    }

    // Insert into employees_address
    $sql = "INSERT INTO employees_address (user_id, type, address, city, country, post_code)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $user_id, $addressType, $address, $city, $country, $post_code);

    if (!$stmt->execute()) {
        echo json_encode([
            "status" => "error",
            "message" => "Error inserting into employees_address: " . $stmt->error
        ]);
        $stmt->close();
        $conn->close();
        exit();
    }

    // If all queries are successful
    echo json_encode([
        "status" => "success",
        "message" => "New record created successfully"
    ]);

    $stmt->close();
    $conn->close();
}
?>