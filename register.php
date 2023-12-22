<?php
include('connect.php');

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['country'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, email, country, password) VALUES ('$username', '$email', '$country', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo '<script>alert("Registration successful")</script>';
        header('Location: index.php');
        exit();
    }
}
?>
