<?php
// Add this code to the beginning of your secure endpoints
if (!isset($_POST['token']) || empty($_POST['token'])) {
    echo "Unauthorized access";
    exit;
}

$token = $_POST['token'];
$sql = "SELECT * FROM userinfo WHERE token = :token";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':token', $token);
$stmt->execute();

if ($stmt->rowCount() <= 0) {
    echo "Unauthorized access";
    exit;
}

// Continue processing for the secure endpoint

// ... (remaining code)
