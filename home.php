<?php
session_start();

include('connect.php');

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
} else {
    echo '<script>alert("Invalid user ID")</script>';
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

   <header>
        <div class="logo">
	<img class="centered-logo" src="./images/logow.png" height="30%" width="30%" />
        </div>
        <h1>Welcome, <?php echo $username; ?>!</h1>
        <p><a href="logout.php">Logout</a></p>
        <div class="social-links">
            <a href="#">Facebook</a><br>
            <a href="#">Twitter</a><br>
            <a href="#">Instagram</a>
        </div>
        <div class="contact-info">
            <p>Contact: info@fashion.com</p>
            <p>Phone: +2 012 00 000 0000</p>
        </div>
    </header>

    <nav>
        <a href="#">Home</a>
        <a href="#">About</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
    </nav>

   <div class="main-content">
    <div class="content-element">
        <img src="./images/image1.jpg" alt="Image 1">
        <p>Description</p>
        <a href="#" class="read-more-button">Read More</a>
    </div>
    <div class="content-element">
        <img src="./images/image2.jpg" alt="Image 2">
        <p>Description</p>
        <a href="#" class="read-more-button">Read More</a>
    </div>
    <div class="content-element">
        <img src="./images/image3.jpg" alt="Image 3">
        <p>Description</p>
        <a href="#" class="read-more-button">Read More</a>
    </div>
    <div class="content-element">
        <img src="./images/image4.jpg" alt="Image 4">
        <p>Description</p>
        <a href="#" class="read-more-button">Read More</a>
    </div>
</div>

</body>
</html>
