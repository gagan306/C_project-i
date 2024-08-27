<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transactions_db";

$conn = new mysqli($servername, $username, $password, $dbname);

$response = array();

if ($conn->connect_error) {
    $response['status'] = 'error';
    $response['message'] = 'Connection failed: ' . $conn->connect_error;
    echo json_encode($response);
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $transaction_id = $_POST['transaction_id'];
    $transaction_name = $_POST['transaction_name'];  // Can be NULL
    $transaction_amount = $_POST['transaction_amount'];
    $transaction_time = $_POST['transaction_time'];
    $transaction_date = $_POST['transaction_date'];

    // Insert data into the table
    $stmt = $conn->prepare("INSERT INTO transactions (transaction_id, transaction_name, transaction_amount, transaction_time, transaction_date) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        $response['status'] = 'error';
        $response['message'] = 'Prepare failed: ' . $conn->error;
        echo json_encode($response);
        exit();
    }
    $stmt->bind_param("ssdss", $transaction_id, $transaction_name, $transaction_amount, $transaction_time, $transaction_date);

    if ($stmt->execute()) {
        $response['status'] = 'success';
        $response['message'] = 'Data added successfully!';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: ' . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
echo json_encode($response);
?>
