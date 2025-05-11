<?php
$host = 'localhost';
$db   = 'vet_clinic';
$user = 'root';
$pass = ''; 

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  echo "<script>alert('Login successful!'); window.location.href = 'index.html';</script>";
} else {
  echo "<script>alert('Invalid username or password.'); window.location.href = 'login.html';</script>";
}

$conn->close();
?>