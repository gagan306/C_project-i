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

// Fetch monthly cash flow data
$sql_monthly = "SELECT MONTH(transaction_date) as month, SUM(transaction_amount) as total
                FROM transactions
                WHERE YEAR(transaction_date) = YEAR(CURDATE())
                GROUP BY MONTH(transaction_date)";
$result_monthly = $conn->query($sql_monthly);

$monthly_data = array_fill(0, 12, 0); // Initialize array with zeros
while ($row = $result_monthly->fetch_assoc()) {
    $monthly_data[$row['month'] - 1] = $row['total'];
}

// Fetch yearly cash flow data
$sql_yearly = "SELECT YEAR(transaction_date) as year, SUM(transaction_amount) as total
               FROM transactions
               GROUP BY YEAR(transaction_date)";
$result_yearly = $conn->query($sql_yearly);

$yearly_data = [];
while ($row = $result_yearly->fetch_assoc()) {
    $yearly_data[$row['year']] = $row['total'];
}

// Fetch number of people visited monthly data
$sql_visits = "SELECT MONTH(transaction_date) as month, COUNT(*) as total
               FROM transactions
               WHERE YEAR(transaction_date) = YEAR(CURDATE())
               GROUP BY MONTH(transaction_date)";
$result_visits = $conn->query($sql_visits);

$visits_data = array_fill(0, 12, 0); // Initialize array with zeros
while ($row = $result_visits->fetch_assoc()) {
    $visits_data[$row['month'] - 1] = $row['total'];
}

$response = [
    'monthly' => $monthly_data,
    'yearly' => $yearly_data,
    'visits' => $visits_data
];

echo json_encode($response);

$conn->close();
?>
