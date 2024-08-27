<?php
include "./main-connection-db-model.php";

$response = array(
    'status' => 'error',
    'message' => ''
);
$target_dir = "./images/emp_images/";
$image_name = basename($_FILES["image"]["name"]);
$target_file = $target_dir . $image_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$user_id = $_POST['user_id'];

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $response['status'] = 'success';
        $response['message'] = 'File is an image - ' . $check["mime"] . '.';
    } else {
        $response['message'] = 'File is not an image.';
        $uploadOk = 0;
    }
}

if ($_FILES["image"]["size"] > 5000000) {
    $response['message'] = 'Sorry, your file is too large.';
    $uploadOk = 0;
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    $response['message'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    $response['status'] = 'error';
    $response['message'] = 'Sorry, your file was not uploaded.';
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $response['status'] = 'success';
        $response['message'] = 'The file ' . htmlspecialchars($image_name) . ' has been uploaded.';
        $sql = "INSERT INTO emp_image (user_id, url) VALUES ('$user_id', '$image_name')";
        if ($conn->query($sql) === TRUE) {
            $response['message'] .= ' Image name and user ID saved to database.';
        } else {
            $response['status'] = 'error';
            $response['message'] .= ' Error: ' . $conn->error;
        }
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Sorry, there was an error uploading your file.';
    }
}

$conn->close();
header('Content-Type: application/json');
echo json_encode($response);
?>