<?php
$host = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=mydatabase", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['name'], $_POST['email'], $_POST['password']) &&
        !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "INSERT INTO userinfo (name, email, password) VALUES (:name, :email, :password)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        echo "Record inserted successfully.";
    } else {
        echo "Please fill in all required fields.";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
