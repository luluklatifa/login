<?php
include 'config.php';
session_start();

if (isset($_SESSION['username'])){
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256' $_POST['password']);
    $cpassword = hash('sha256' $_POST['cpassword']);

    if ($password == $cpassword){
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if (!$result->num_rows > 0){
            $sql = "INSERT INTO user (username, email, password)
                    VALUE ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);
            if ($result){
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                $username = "";
                $email = "";
                $_POST['password'] = "";
                $_POST["cpassword"] = "";
            }else {
                echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
            }
        }else {
            echo "<script>alert('Password Tidak Sesuai')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport"
    </head>
</html>