<?php
session_start();
$server = "localhost";
$username1 = "root";
$password = "";
$dbname = "business-service";
$conn = mysqli_connect($server, $username1, $password, $dbname);

if (isset($_POST["submit"])) {
    // Sanitize inputs
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmPassword"];

    // Check if username or email already exists
    $stmt = $conn->prepare("SELECT * FROM `signup-b` WHERE `username` = ? OR `email` = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username or Email Has Already Taken');</script>";
    } else {
        if ($password == $confirmpassword) {
            // Check if the password is already used
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Check if the hashed password already exists in the database
            $stmt_check_password = $conn->prepare("SELECT * FROM `signup-b` WHERE `password` = ?");
            $stmt_check_password->bind_param("s", $hashed_password);
            $stmt_check_password->execute();
            $result_check = $stmt_check_password->get_result();

            if (mysqli_num_rows($result_check) > 0) {
                echo "<script>alert('This password is already in use. Please choose another one.');</script>";
            } else {
                // Insert the new data into the database
                $stmt_insert = $conn->prepare("INSERT INTO `signup-b` (`username`, `email`, `password`) VALUES (?, ?, ?)");
                $stmt_insert->bind_param("sss", $username, $email, $hashed_password);
                
                if ($stmt_insert->execute()) {
                    // Redirect to login page after successful registration
                    echo "<script>
                            alert('Data submitted successfully!');
                            window.location.href = 'login.html'; // Replace 'login.php' with your actual login page URL
                          </script>";
                } else {
                    echo "Query failed...";
                }
            }
        } else {
            echo "<script>alert('Passwords do not match');</script>";
        }
    }
}
?>
