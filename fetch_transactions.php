<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transactions_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$searchName = isset($_GET['name']) ? $conn->real_escape_string($_GET['name']) : '';

if ($filter) {
    if ($filter === 'today') {
        $sql = "SELECT * FROM transactions WHERE transaction_date = CURDATE()";
    } elseif ($filter === 'week') {
        $sql = "SELECT * FROM transactions WHERE WEEK(transaction_date) = WEEK(CURDATE())";
    } else {
        $sql = "SELECT * FROM transactions";
    }
} elseif ($searchName) {
    $sql = "SELECT * FROM transactions WHERE transaction_name LIKE '%$searchName%'";
} else {
    $sql = "SELECT * FROM transactions";
}

$result = $conn->query($sql);

$transactions = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $transactions[] = $row;
    }
}
echo json_encode($transactions);

$conn->close();
?>
