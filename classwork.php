<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Classwork</title>

  <!-- Exercise 1 -->
  <?php
    $viewer = getenv( "HTTP_USER_AGENT" );
    $browser = "An unidentified browser";
    if( preg_match( "/MSIE/i", "$viewer" ) )
    {
    $browser = "Internet Explorer" ;
    }
    else if( preg_match( "/Netscape/i", "$viewer"  ) )
    {
    $browser = "Netscape";
    }
    elseif(preg_match('/Chrome/i' , "$viewer"))
    {
    $browser = 'Google Chrome';
    }
    else  if( preg_match( "/Mozilla/i", "$viewer" ))
    {
    $browser = "Mozilla" ;
    }
    elseif(preg_match('/Safari/i',"$viewer"))
    {
    $browser = 'Apple Safari';
    }
    $platform = "An unidentified OS!";
    if( preg_match( "/Windows/i", "$viewer" ) )
    {
    $platform = "Windows!";
    }
    else if ( preg_match( "/Linux/i", "$viewer"  ) )
    {
    $platform = "Linux!";
    }
    else if  ( preg_match( "/Mac/i", "$viewer" ) )
    {
    $platform = "Mac!";
    }
    echo $viewer;
    echo("<br> You are using $browser on $platform <br>");
  ?>

  </head>

  <body>

  <!-- Exercise 2 -->
<!--   <form action="classwork.php" method="post">
    First name: <input type="text" name="first_name">
    Last name: <input type="text" name="last_name">
    Email: <input type="text" name="email">
    <input type="submit" name="submit">
  </form> -->

  <?php
    if(isset($_POST['submit'])) {
        if ($_POST["first_name"] || $_POST["last_name"]) {
            echo "Welcome" , $_POST["first_name"] . $_POST["last_name"];
        }
    }

    // Exercise 3
    function divide($a, $b) {
        return $a/$b;
    }
    echo divide(10,2) . "<br>";

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

    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if  (mysqli_query($conn, $sql)) {
        echo "Database $dbname created successfully! \n" . "<br>";
    } else {
        echo "Error creating database $dbname: " . mysqli_error($conn) . "<br>";
    }
    // Exercise 5
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

    // Exercise 6
/*    $sql = "INSERT INTO testTable (firstname, lastname, email)
    VALUES ('John', 'Doe', 'john@doe.com')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created.\n";
    } else {
       echo  "Record creation error for: " . $sql . "\n" . mysqli_error($conn);
    }*/

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

    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>