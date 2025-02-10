<?php
header('Content-Type: application/json');

// Database connection
$host = "localhost";
$user = "root";
$password = ""; // Update with your database password if needed
$dbname = "cafe_db";

$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed."]));
}

// Get and validate form inputs
$foodName = $_POST['unique_food_name'] ?? '';
$price = $_POST['unique_menu_price'] ?? 0;
$description = $_POST['unique_food_description'] ?? '';

if (empty($foodName) || empty($price) || empty($description) || !isset($_FILES['unique_food_image'])) {
    echo json_encode(["success" => false, "message" => "All fields are required."]);
    exit();
}

// Handle image upload
$image = $_FILES['unique_food_image'];
$imageData = file_get_contents($image['tmp_name']); // Read image contents
$imageType = $image['type'];

if (strpos($imageType, 'image') === false) {
    echo json_encode(["success" => false, "message" => "Uploaded file is not an image."]);
    exit();
}

// Insert data into the database
$query = "INSERT INTO menu (foodname, foodimage, price, fooddescription) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);

// Use "bind_param" for non-image data, and send the image data separately with "send_long_data"
$stmt->bind_param("sbds", $foodName, $null, $price, $description);
$stmt->send_long_data(1, $imageData); // Index "1" corresponds to the second parameter (foodimage)

// Execute the statement
if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Menu item added successfully."]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to add menu item."]);
}

// Close connections
$stmt->close();
$conn->close();
?>
