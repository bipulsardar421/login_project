<?php
include 'main-connection-db-model.php';

function getStatus($conn, $user_id, $today_date)
{
    $stmt = $conn->prepare("SELECT * FROM attendance_hr WHERE today_date = ? AND user_id = ?");
    $stmt->bind_param('si', $today_date, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $status = $result->fetch_assoc();

    if ($status) {
        return [
            'status' => 'success',
            'data' => $status
        ];
    }
    return [
        'status' => 'error',
        'message' => 'No attendance record found.'
    ];
}

function customRequest($conn, $user_id, $date_range)
{
    list($start_date, $end_date) = explode(' to ', $date_range);

    $stmt = $conn->prepare("SELECT * FROM attendance_hr WHERE user_id = ? AND today_date BETWEEN ? AND ? ORDER BY today_date ASC");
    $stmt->bind_param('iss', $user_id, $start_date, $end_date);
    $stmt->execute();
    $result = $stmt->get_result();
    $records = [];

    while ($row = $result->fetch_assoc()) {
        $records[] = $row;
    }

    if (count($records) > 0) {
        return [
            'status' => 'success',
            'data' => $records
        ];
    }
    return [
        'status' => 'error',
        'message' => 'No records found in the given date range.'
    ];
}

function login($conn, $user_id, $login_time, $today_date)
{
    $status = getStatus($conn, $user_id, $today_date);

    if ($status['status'] === 'error') {
        $stmt = $conn->prepare("INSERT INTO attendance_hr (user_id, login_time, today_date, is_login) VALUES (?, ?, ?, 1)");
        $stmt->bind_param('iss', $user_id, $login_time, $today_date);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return [
                'status' => 'success',
                'message' => 'Login successful.'
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Error logging in.'
            ];
        }
    }
    return [
        'status' => 'error',
        'message' => 'User already logged in.'
    ];
}

function logout($conn, $user_id, $logout_time, $today_date)
{
    $status = getStatus($conn, $user_id, $today_date);

    if ($status['status'] === 'success' && !$status['data']['logout_time']) {
        $stmt = $conn->prepare("UPDATE attendance_hr SET logout_time = ?, is_login = 0 WHERE sl_no = ?");
        $stmt->bind_param('si', $logout_time, $status['data']['sl_no']);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return [
                'status' => 'success',
                'message' => 'Logout successful.'
            ];
        } else {
            return [
                'status' => 'error',
                'message' => 'Error logging out.'
            ];
        }
    }
    return [
        'status' => 'error',
        'message' => 'User not logged in or already logged out.'
    ];
}

function handleRequest($conn)
{
    $input = json_decode(file_get_contents('php://input'), true);
    $today_date = $input['today_date'] ?? date('Y-m-d');
    $user_id = $input['user_id'] ?? null;

    if (!$user_id) {
        return [
            'status' => 'error',
            'message' => 'User ID is required.'
        ];
    }

    if (isset($_GET['getStatus'])) {
        return getStatus($conn, $user_id, $today_date);
    } elseif (isset($_GET['login'])) {
        $login_time = $input['login_time'] ?? null;
        if ($login_time) {
            return login($conn, $user_id, $login_time, $today_date);
        } else {
            return [
                'status' => 'error',
                'message' => 'Login time is required.'
            ];
        }
    } elseif (isset($_GET['logout'])) {
        $logout_time = $input['logout_time'] ?? null;
        if ($logout_time) {
            return logout($conn, $user_id, $logout_time, $today_date);
        } else {
            return [
                'status' => 'error',
                'message' => 'Logout time is required.'
            ];
        }
    } elseif (isset($_GET['loginhistory'])) {
        $date_range = $input['date_range'] ?? null;
        if ($date_range) {
            return customRequest($conn, $user_id, $date_range);
        } else {
            return [
                'status' => 'error',
                'message' => 'Date range is required.'
            ];
        }
    }
    return [
        'status' => 'error',
        'message' => 'Invalid request.'
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    echo json_encode(handleRequest($conn));
}

$conn->close();
?>