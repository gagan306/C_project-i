<?php
// Enable error reporting
error_reporting(E_ALL & ~E_NOTICE);
ini_set('display_errors', 1);
header('Content-Type: application/json');

// Database connection
$mysqli = new mysqli('localhost', 'root', '', 'cafe_db');
if ($mysqli->connect_error) {
    echo json_encode(['status' => 'error', 'message' => 'Connection failed: ' . $mysqli->connect_error]);
    exit;
}

// Fetch Reservations
function fetchReservations($mysqli) {
    $today = date('Y-m-d');
    $tomorrow = date('Y-m-d', strtotime('+1 day'));

    try {
        $queryToday = "SELECT id, name, time_from, time_to, table_number, mobile FROM reservations WHERE DATE(time_from) = ?";
        $stmtToday = $mysqli->prepare($queryToday);
        $stmtToday->bind_param("s", $today);
        $stmtToday->execute();
        $todayResults = $stmtToday->get_result();
        $todayData = $todayResults->fetch_all(MYSQLI_ASSOC);

        $queryTomorrow = "SELECT id, name, time_from, time_to, table_number, mobile FROM reservations WHERE DATE(time_from) = ?";
        $stmtTomorrow = $mysqli->prepare($queryTomorrow);
        $stmtTomorrow->bind_param("s", $tomorrow);
        $stmtTomorrow->execute();
        $tomorrowResults = $stmtTomorrow->get_result();
        $tomorrowData = $tomorrowResults->fetch_all(MYSQLI_ASSOC);

        echo json_encode(['status' => 'success', 'today' => $todayData, 'tomorrow' => $tomorrowData]);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
// Fetch reservation by ID
function fetchReservation($mysqli, $id) {
    $query = "SELECT * FROM reservations WHERE id = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $data = $stmt->get_result()->fetch_assoc();
    echo json_encode(['status' => 'success', 'reservation' => $data ?: null]);
    $stmt->close();
}

function updateReservation($mysqli, $data) {
    $id = (int)$data['id'];
    $name = $mysqli->real_escape_string($data['name']);
    $fromTime = $mysqli->real_escape_string($data['from_time']);
    $toTime = $mysqli->real_escape_string($data['to_time']);
    $tableNo = (int)$data['table_no'];
    $mobileNo = $mysqli->real_escape_string($data['mobile_no']);

    // Allowed time range: 8:00 AM (480 minutes) to 10:00 PM (1320 minutes)
    $earliestTime = '08:00:00';
    $latestTime = '22:00:00';

    // Check if the times are within the allowed range
    if ($fromTime < $earliestTime || $toTime > $latestTime) {
        echo json_encode(['status' => 'error', 'message' => 'Reservation times must be between 8:00 AM and 10:00 PM.']);
        return;
    }

    // Check if the time slot is available (already checked in JavaScript, but included here for redundancy)
    $conflictQuery = "SELECT COUNT(*) FROM reservations WHERE table_number = ? 
                      AND ((time_from < ? AND time_to > ?) OR (time_from < ? AND time_to > ?)) AND id != ?";
    $stmt = $mysqli->prepare($conflictQuery);
    $stmt->bind_param("issssi", $tableNo, $toTime, $toTime, $fromTime, $fromTime, $id);
    $stmt->execute();
    $stmt->bind_result($conflictCount);
    $stmt->fetch();
    $stmt->close();

    if ($conflictCount > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Time slot is already booked.']);
        return;
    }

    // Proceed to update if no conflict
    $updateQuery = "UPDATE reservations SET name=?, time_from=?, time_to=?, table_number=?, mobile=? WHERE id=?";
    $stmtUpdate = $mysqli->prepare($updateQuery);
    $stmtUpdate->bind_param("sssisi", $name, $fromTime, $toTime, $tableNo, $mobileNo, $id);
    
    if ($stmtUpdate->execute()) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to update reservation.']);
    }
    
    $stmtUpdate->close();
}

// ... existing code ...

if ($_GET['action'] === 'checkConflict') {
    // Ensure we're sending JSON response
    header('Content-Type: application/json');
    
    $data = json_decode(file_get_contents('php://input'), true);
    
    // Validate input data
    if (!isset($data['table_no']) || !isset($data['from_time']) || !isset($data['to_time']) || !isset($data['id'])) {
        echo json_encode(['status' => 'error', 'message' => 'Missing required parameters']);
        exit;
    }

    $table_no = (int)$data['table_no'];
    $from_time = $data['from_time'];
    $to_time = $data['to_time'];
    $current_id = (int)$data['id'];

    try {
        $sql = "SELECT * FROM reservations 
                WHERE table_number = ? 
                AND id != ? 
                AND (
                    (time_from <= ? AND time_to > ?) OR
                    (time_from < ? AND time_to >= ?) OR
                    (time_from >= ? AND time_to <= ?)
                )";
        
        $stmt = $mysqli->prepare($sql);  // Changed $conn to $mysqli to match your connection variable
        
        if (!$stmt) {
            throw new Exception("Prepare failed: " . $mysqli->error);
        }
        
        $stmt->bind_param("iissssss", 
            $table_no, 
            $current_id,
            $to_time, 
            $from_time,
            $to_time,
            $from_time,
            $from_time,
            $to_time
        );
        
        if (!$stmt->execute()) {
            throw new Exception("Execute failed: " . $stmt->error);
        }
        
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $conflict = $result->fetch_assoc();
            echo json_encode([
                'status' => 'conflict',
                'conflictDetails' => [
                    'from_time' => $conflict['time_from'],
                    'to_time' => $conflict['time_to']
                ]
            ]);
        } else {
            echo json_encode(['status' => 'available']);
        }
        
        $stmt->close();
        
    } catch (Exception $e) {
        echo json_encode([
            'status' => 'error',
            'message' => $e->getMessage()
        ]);
    }
    exit;
}

// ... rest of your code ...







// Search Reservations by Username
function searchReservationsByUsername($mysqli, $username) {
    $username = $mysqli->real_escape_string($username);
    $stmt = $mysqli->prepare("SELECT id, name, time_from, time_to, table_number, mobile FROM reservations WHERE name LIKE ?");
    $likeUsername = "%$username%";
    $stmt->bind_param("s", $likeUsername);
    $stmt->execute();
    $result = $stmt->get_result();
    echo json_encode(['status' => 'success', 'reservations' => $result->fetch_all(MYSQLI_ASSOC)]);
    $stmt->close();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['action']) && $_GET['action'] === 'deleteReservation') {
    header('Content-Type: application/json'); // Set content type to JSON

    $data = json_decode(file_get_contents('php://input'), true);
    
    if (isset($data['id']) && is_numeric($data['id'])) {
        $id = (int)$data['id'];
        
        // Log the ID for debugging
        error_log('Deleting reservation with ID: ' . $id);

        // Prepare and execute SQL delete statement
        $stmt = $mysqli->prepare("DELETE FROM reservations WHERE id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Reservation deleted successfully.']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Error deleting reservation: ' . $stmt->error]);
            }
            $stmt->close();
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Failed to prepare statement.']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid reservation ID.']);
    }
    exit; // Ensure no additional output is sent
}


// Handle requests
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'fetchReservations':
            fetchReservations($mysqli);
            break;
        case 'fetchReservation':
            fetchReservation($mysqli, (int)$_GET['id']);
            break;
        case 'updateReservation':
            $data = json_decode(file_get_contents('php://input'), true);
            updateReservation($mysqli, $data);
            break;
        case 'searchReservationsByUsername':
            searchReservationsByUsername($mysqli, $_GET['username']);
            break;
    }
}

$mysqli->close();
?>
