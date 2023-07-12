<!doctype html>
<html>
    <head>
        <title> LOGIN PAGE</title>
        <link rel="stylesheet" href="login_main.css"> 
    </head>
    <body bgcolor=#f3ca20>
 
        <form method="POST">
            <h1> Login </h1>
            <div class="textBoxdiv">
                <input type="text" placeholder="username" name="username">
            </div>
            <div class="textBoxdiv">
                <input type="password" placeholder="password" name="password">
            </div>
            <input type="submit" value="login" class="loginBtn" name="login_Btn">
            <div class="signup">
                Don't have an account?
                </br>
                <a href="signup.php">Sign Up</a>
            </div>
        </form>

    </body>
</html>


<?php
$conn=mysqli_connect("localhost","root","");
if(isset($_POST['login_Btn'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $sql="SELECT * FROM websitelogin.loginDetails WHERE username='$username'";
    $result=mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result)){
        $resultPassword=$row['pwd'];
        if($password==$resultPassword){
            header('Location:index.html');
        }
        else{
            echo "<script>
            alert('Login Unsuccessful');
            </script>";
        }
    }
}
?>

