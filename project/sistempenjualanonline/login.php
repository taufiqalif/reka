<?php
session_start();
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["login-email"];
    $password = $_POST["login-password"];

    // Sesuaikan dengan koneksi ke database dan query validasi login
    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";

    // Eksekusi query
    $result = $conn->query($query);

    // Periksa apakah ada hasil yang sesuai
    if ($result && $result->num_rows > 0) {
        // Login berhasil
        $_SESSION["email"] = $email;
        header("Location: index.php");
        exit();
    } else {
        // Login gagal
        $error_message = "Login gagal. Periksa kembali email dan password Anda.";
    }
}

// Tutup koneksi ke database
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login System</title>
</head>

<body>

    <div class="container">
        <div class="form-container">
            <form action="" method="post">
                <h2>Login</h2>
                <label for="login-email">Email:</label>
                <input type="email" id="login-email" name="login-email" required>
                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="login-password" required>
                <button type="submit">Login</button>
            </form>
            <a href="registrasi.html">Create New Account</a>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>