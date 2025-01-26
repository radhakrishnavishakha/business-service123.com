<?php
session_start();.


$server = "localhost";
$username1 = "root";
$password = "";
$dbname = "business-service";
$conn = mysqli_connect($server, $username1, $password, $dbname);

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    // Check if the user exists
    $stmt = $conn->prepare("SELECT * FROM `signup-b` WHERE `username` = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
        $user = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            
            // Redirect to index.html after successful login
            header("Location: home.html");
            exit();
        } else {
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
        echo "<script>alert('No account found with this username');</script>";
    }
}

mysqli_close($conn);
?>
