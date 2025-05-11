<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name   = $_POST["name"];
  $phone  = $_POST["phone"];
  $animal = $_POST["animal"];
  $date   = $_POST["date"];
  $time   = $_POST["time"];
  $notes  = $_POST["notes"];

  $conn = new mysqli("localhost", "root", "", "vet_clinic");


  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  $stmt = $conn->prepare("INSERT INTO appointments (name, phone, animal, date, time, notes) VALUES (?, ?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssss", $name, $phone, $animal, $date, $time, $notes);

  if ($stmt->execute()) {
    echo "<script>
      alert('Appointment booked successfully!');
      window.location.href = 'appointment.html';
    </script>";
  } else {
    echo "<script>
      alert('Error: Could not save appointment.');
      window.location.href = 'appointment.html';
    </script>";
  }

  $stmt->close();
  $conn->close();
} else {
  header("Location: appointment.html");
  exit();
}
?>