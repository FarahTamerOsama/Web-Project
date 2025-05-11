<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "vet_clinic";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $sql = "DELETE FROM appointments WHERE id = $id";

  if ($conn->query($sql)) {
    echo "<script>alert('Appointment deleted successfully'); window.location.href='manage.php';</script>";
  } else {
    echo "<script>alert('Error deleting appointment'); window.location.href='manage.php';</script>";
  }
} else {
  header("Location: manage.php");
}
?>