<?php
header('Content-Type: application/json');

$host = "localhost";
$user = "root";
$password = "";
$dbname = "cafe_db";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed: " . $conn->connect_error]));
}

$query = "SELECT id, foodname, foodimage, price, fooddescription FROM menu";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $menuItems = [];
    while ($row = $result->fetch_assoc()) {
        $menuItems[] = [
            "id" => $row["id"],
            "foodname" => $row["foodname"],
            "foodimage" => "data:image/jpeg;base64," . base64_encode($row["foodimage"]),
            "price" => $row["price"],
            "fooddescription" => $row["fooddescription"]
        ];
    }
    echo json_encode(["success" => true, "menu" => $menuItems]);
} else {
    echo json_encode(["success" => false, "message" => "No menu items found."]);
}

$conn->close();
?>