<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "vet_clinic";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM appointments");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Appointments</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
  <div class="container">
    <h2 class="mb-4">Manage Appointments</h2>
    <table class="table table-bordered text-center">
      <thead class="table-success">
        <tr>
          <th>ID</th><th>Name</th><th>Phone</th><th>Animal</th><th>Date</th><th>Time</th><th>Notes</th><th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
          <td><?= $row['id'] ?></td>
          <td><?= $row['name'] ?></td>
          <td><?= $row['phone'] ?></td>
          <td><?= $row['animal'] ?></td>
          <td><?= $row['date'] ?></td>
          <td><?= $row['time'] ?></td>
          <td><?= $row['notes'] ?></td>
          <td>
            <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-success">Update</a>
            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
          </td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="appointment.html" class=" btn btn-outline-success"> Go To Appointment</a>
</body>
</html>