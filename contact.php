<?php
$conn = new mysqli("localhost", "root", "", "vet_clinic");
if ($conn->connect_error) {
  die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name    = $conn->real_escape_string($_POST["name"]);
  $email   = $conn->real_escape_string($_POST["email"]);
  $message = $conn->real_escape_string($_POST["message"]);
  if (!empty($name) && !empty($email) && !empty($message)) {
    $sql = "INSERT INTO contact_messages (name, email, message)
            VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
      echo "<h2 style='text-align:center; color:green;'>تم إرسال رسالتك بنجاح، شكرًا لتواصلك معنا!</h2>";
    } else {
      echo "<h2 style='text-align:center; color:red;'>حدث خطأ أثناء إرسال الرسالة.</h2>";
    }
  } else {
    echo "<h2 style='text-align:center; color:red;'>يرجى ملء جميع الحقول.</h2>";
  }
}

$conn->close();
?>