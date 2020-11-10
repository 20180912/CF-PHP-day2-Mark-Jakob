<?php
    

// Exercise 4
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "hubbedischnubb";

    // Create connection

    //commented vecause database already created
    /*$conn = mysqli_connect($servername, $username, $password);*/ 

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    echo "Connected successfully" . "<br>";

    //creating db
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if  (mysqli_query($conn, $sql)) {
        echo "Database $dbname created successfully! \n" . "<br>";
    } else {
        echo "Error creating database $dbname: " . mysqli_error($conn) . "<br>";
    }

// Exercise 5

    //create table
    $sql = "CREATE TABLE IF NOT EXISTS testTable (
    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(20) NOT NULL,
    lastname VARCHAR(20) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    )" ;

    if (mysqli_query($conn, $sql)) {
    echo "Table Users created successfully"  . "\n" . "<br>";
    } else {
       echo  "Error creating table: " . mysqli_error($conn) . "\n" . "<br>";
    }

// Exercise 7

    // Escape user inputs for security
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST[ 'last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    // attempt insert query execution
    $sql = "INSERT INTO testTable (firstname, lastname, email) VALUES ('$first_name', '$last_name', '$email')";
    if (mysqli_query($conn, $sql)) {
        echo "<h1>New record created.<h1>";
    } else {
        echo "<h1>Record creation error for: </h1>" .
             "<p>"  . $sql . "</p>" .
             mysqli_error($conn);
    }

    mysqli_close($conn);
?>