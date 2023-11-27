<?php
$host = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=mydatabase", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST['email'], $_POST['password']) &&
        !empty($_POST['email']) && !empty($_POST['password'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM userinfo WHERE email = :email AND password = :password";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "success";
        } else {
            echo "failure";
        }
    } else {
        echo "Please enter both email and password.";
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>