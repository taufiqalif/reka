<?php
require 'koneksi.php';

if (isset($_POST["register"])) {
  if (registrasi($_POST) > 0) {
    echo "
          <script>
              alert('user baru berhasil di tambahkan!');
              document.location.href = 'login.php';
          </script>
      ";
  } else {
    echo mysqli_error($conn);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <div class="form-container">
        <form id="registration-form">
            <h2>Registration</h2>
            <label for="reg-name">Name:</label>
            <input type="text" id="reg-name" name="reg-name" required>
            <label for="reg-email">Email:</label>
            <input type="email" id="reg-email" name="reg-email" required>
            <label for="reg-password">Password:</label>
            <input type="password" id="reg-password" name="reg-password" required>
            <label for="reg-confirm-password">Confirm Password:</label>
            <input type="password" id="reg-confirm-password" name="reg-confirm-password" required>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>

</html>