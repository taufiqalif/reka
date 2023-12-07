<?php
$host = "localhost"; // Ganti dengan nama host database Anda
$email = "root"; // Ganti dengan email pengguna database Anda
$password = ""; // Ganti dengan kata sandi database Anda 
$database = "penjualan"; // Ganti dengan nama database Anda

// Membuat koneksi 
$conn = new mysqli($host, $email, $password, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

function registrasi($data)
{
    global $conn;

    $name = strtolower(stripslashes($data["reg-name"]));
    $email = $data["reg-email"];
    $password = mysqli_real_escape_string($conn, $data["reg-password"]);
    $password2 = mysqli_real_escape_string($conn, $data["reg-confirm-password"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$name'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username sudah terdaftar!');
          </script>";
        return false;
    }

    // cek konfirmasi password 
    if ($password !== $password2) {
        echo "<script>
            alert('Konfirmasi password tidak sesuai!');
          </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO users (username, email, password) VALUES ('$name', '$email', '$password')");

    return mysqli_affected_rows($conn);
}
