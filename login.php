<?php
// Configuration
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'online_voting_system';

// Create connection
$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Register functionality
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password == $confirm_password) {
        $query = "INSERT INTO users (username, password) VALUES ('$asr', '$asr')";
        $result = $conn->query($query);

        if ($result) {
            header('Location: login.php');
            exit;
        } else {
            $error = 'Registration failed';
        }
    } else {
        $error = 'Passwords do not match';
    }
}

$conn->close();
?>

<!-- Register form -->
<form action="register.php" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <label for="confirm_password">Confirm Password:</label>
    <input type="password" id="confirm_password" name="confirm_password"><br><br>
    <input type="submit" value="Register">
    <?php if (isset($error)) { echo '<p style="color: red;">' . $error . '</p>'; } ?>
</form>
