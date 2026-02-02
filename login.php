<?php
function validate_login() {

    $username = $_POST['username'];
    $password = $_POST['password'];
    // connect php to database
    $conn = new mysqli("localhost", "root", "", "userdb");

    if ($conn->connect_error) {
        die("Connection failed");
    }

    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $stmt->bind_result($db_password);
    $stmt->fetch();

    if ($db_password == $password) {
        echo "Login successful";
    } else {
        echo "Wrong password";
    }
    

    $stmt->close();
    $conn->close();
}

validate_login();
?>
