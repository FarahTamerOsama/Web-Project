<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "vet_clinic";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $result = $conn->query("SELECT * FROM appointments WHERE id = $id");
  $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $animal = $_POST['animal'];
  $date = $_POST['date'];
  $time = $_POST['time'];
  $notes = $_POST['notes'];

  $sql = "UPDATE appointments SET 
            name='$name', phone='$phone', animal='$animal', 
            date='$date', time='$time', notes='$notes' 
          WHERE id=$id";

  if ($conn->query($sql)) {
    echo "<script>alert('Updated successfully'); window.location.href='manage.php';</script>";
  } else {
    echo "<script>alert('Error updating'); window.location.href='manage.php';</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Appointment</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h3 class="mb-4">Update Appointment</h3>
    <form method="post">
      <input type="hidden" name="id" value="<?= $row['id'] ?>">
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" value="<?= $row['name'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="<?= $row['phone'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Animal</label>
        <input type="text" name="animal" class="form-control" value="<?= $row['animal'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Date</label>
        <input type="date" name="date" class="form-control" value="<?= $row['date'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Time</label>
        <input type="time" name="time" class="form-control" value="<?= $row['time'] ?>" required>
      </div>
      <div class="mb-3">
        <label class="form-label">Notes</label>
        <textarea name="notes" class="form-control"><?= $row['notes'] ?></textarea>
      </div>
      <button type="submit" class="btn btn-success">Update</button>
    </form>
  </div>
</body>
</html>