<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transactions_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$response = array();

if ($conn->connect_error) {
    $response['status'] = 'error';
    $response['message'] = 'Connection failed: ' . $conn->connect_error;
    echo json_encode($response);
    exit();
}

// Get date parameter if provided
$date = isset($_GET['date']) ? $_GET['date'] : null;

if ($date) {
    // Fetch data for the specific date
    $stmt = $conn->prepare("SELECT SUM(transaction_amount) AS total_revenue, COUNT(DISTINCT transaction_id) AS total_clients FROM transactions WHERE transaction_date = ?");
    $stmt->bind_param("s", $date);
} else {
    // Fetch total revenue and clients
    $stmt = $conn->prepare("SELECT SUM(transaction_amount) AS total_revenue, COUNT(DISTINCT transaction_id) AS total_clients FROM transactions");
}

if (!$stmt) {
    $response['status'] = 'error';
    $response['message'] = 'Prepare failed: ' . $conn->error;
    echo json_encode($response);
    exit();
}

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response['status'] = 'success';
    $response['total_revenue'] = number_format($row['total_revenue'], 2);
    $response['total_clients'] = $row['total_clients'];
} else {
    $response['status'] = 'error';
    $response['message'] = 'No data found';
}

$stmt->close();
$conn->close();
echo json_encode($response);
?>
