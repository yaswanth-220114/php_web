<?php
    $id = (int)$_POST['id'];
    $username = (String)$_POST['username'];
    $email = (String)$_POST['email'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost', 'root', '', 'userdb');

    // form validation
    if(!$email || !$username || !$password){
        die("Please fill all required fields!");
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){  //true when email is invalid
        die("Invalid email format");
    }

    if(strlen($password) < 6){
        die("Password must be at least 6 characters long.");
    }

    if(!$conn){
        die("Connection failed: ". mysqli_connect_error());
    }
    else{
        $stmt = $conn->prepare("INSERT INTO users (id, username, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $id, $username, $email, $password);
        $stmt->execute();
        echo "Registration successful!";
        $stmt->close();
        $conn->close();
    }

    

    



?>