<?php
session_start();
if (isset($_POST['employees'])) {
    $employees = json_decode($_POST['employees'], true);
    $_SESSION['employees'] = $employees;
} else {
    echo "error";
}
?>