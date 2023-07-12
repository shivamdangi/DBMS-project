<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="login_main.css">

  </head>
  <body>
    <form method="POST">
      <h1>Sign Up</h1>
      <label for="username">User Name:</label>
      <input type="text" id="username" name="username"><br><br>
      
      <label for="email">Email:</label>
      <input type="email" id="email" name="email"><br><br>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password"><br><br>
      <input type="submit" value="signup" class="signupbtn" name="signup_btn">
    </form>
  </body>
</html>


<?php
// Establish database connection
$host = "localhost"; // Your database hostname
$user = "root"; // Your database username
$pass = ""; // Your database password
$db = "websitelogin"; // Your database name

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if (isset($_POST['signup_btn'])) {
    // Get form data
    $username =  $_POST['username'];
    $email =  $_POST['email'];
    $password =  $_POST['password'];

    // Check for empty input fields
    if (empty($username) || empty($email) || empty($password)) {
        echo "Please fill all the fields.";
    } else {
        // Insert user data into database
        $sql = "INSERT INTO loginDetails (username, email, pwd) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            // Redirect to login page
            header("Location: login.php");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

// Close database connection
mysqli_close($conn);
?>