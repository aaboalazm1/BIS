<?php
include('connect.php');

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $userId = $row['id'];
        $username = $row['username'];
        $pass = $row['password'];

        $token = bin2hex(random_bytes(16));
        $sql = "INSERT INTO password_resets (user_id, token, created_at) VALUES ('$userId', '$token', NOW())";
        mysqli_query($conn, $sql);

        echo 'Password is: '.$pass;
    } else {
        echo '<script>alert("Invalid email address")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <div class="container">
	<img class="centered-logo" src="./images/logo.png" height="50%" width="50%" />

        <form action="forgot_password.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Submit</button>
        </form>
        <p>Remember your password? <a href="index.php">Login here</a></p>
    </div>
</body>
</html>
