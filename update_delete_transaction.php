<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transactions_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

$transaction_id = $_POST['transaction_id'] ?? '';
$action = $_POST['action'] ?? '';

if ($action === 'update') {
    $transaction_name = $_POST['transaction_name'] ?? '';
    $transaction_date = $_POST['transaction_date'] ?? '';
    $transaction_time = $_POST['transaction_time'] ?? '';
    $transaction_amount = $_POST['transaction_amount'] ?? '';

    if (!empty($transaction_id)) {
        $sql = "UPDATE transactions 
                SET transaction_name = ?, transaction_date = ?, transaction_time = ?, transaction_amount = ?
                WHERE transaction_id = ?";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssds', $transaction_name, $transaction_date, $transaction_time, $transaction_amount, $transaction_id);

        if ($stmt->execute()) {
            echo 'Transaction updated successfully';
        } else {
            echo 'Error updating transaction: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        echo 'Invalid or missing transaction ID';
    }

} elseif ($action === 'delete') {
    if (!empty($transaction_id)) {
        $sql = "DELETE FROM transactions WHERE transaction_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $transaction_id);

        if ($stmt->execute()) {
            echo 'Transaction deleted successfully';
        } else {
            echo 'Error deleting transaction: ' . $stmt->error;
        }

        $stmt->close();
    } else {
        echo 'Invalid or missing transaction ID';
    }
}

$conn->close();
?>
