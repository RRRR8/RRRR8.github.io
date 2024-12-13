<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nerh";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Ошибка подключения: " . $conn->connect_error);
}

$name = $_POST["name"];
$email = $_POST["email"];
$description = $_POST["description"];


$stmt = $conn->prepare("INSERT INTO orders (name, email, description) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $description);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo "Заказ успешно отправлен!";
} else {
  echo "Ошибка при отправке заказа.";
}

$stmt->close();
$conn->close();
?>
