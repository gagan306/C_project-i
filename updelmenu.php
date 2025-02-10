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

$action = $_POST['action'] ?? null;

if ($action === 'update') {
    $id = $_POST['menu-ud-opr-id'];
    $foodName = $_POST['menu-ud-opr-name'];
    $price = $_POST['menu-ud-opr-price'];
    $description = $_POST['menu-ud-opr-description'];

    if (isset($_FILES['menu-ud-opr-image']) && $_FILES['menu-ud-opr-image']['tmp_name']) {
        $imageData = file_get_contents($_FILES['menu-ud-opr-image']['tmp_name']);
        $stmt = $conn->prepare("UPDATE menu SET foodname=?, foodimage=?, price=?, fooddescription=? WHERE id=?");
        $stmt->bind_param("sbdsi", $foodName, $imageData, $price, $description, $id);
    } else {
        $stmt = $conn->prepare("UPDATE menu SET foodname=?, price=?, fooddescription=? WHERE id=?");
        $stmt->bind_param("sdsi", $foodName, $price, $description, $id);
    }

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Menu item updated successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to update menu item: " . $stmt->error]);
    }
    $stmt->close();
} elseif ($action === 'delete') {
    $id = $_POST['id']; // Get the ID from the POST data

    $stmt = $conn->prepare("DELETE FROM menu WHERE id=?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Menu item deleted successfully."]);
    } else {
        echo json_encode(["success" => false, "message" => "Failed to delete menu item: " . $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["success" => false, "message" => "Invalid action."]);
}

$conn->close();
?>