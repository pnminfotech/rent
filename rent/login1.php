
<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['password'];
//$role=$_POST['role'];
//$user=$_POST['user'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "6WjuW+YX:J\\O8:i4\\I;f;7@r");
// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
//$user = stripslashes($user);
$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);
//$user = mysqli_real_escape_string($connection,$user);
// Selecting Database
$db = mysqli_select_db($connection,"rent");
// SQL query to fetch information of registerd users and finds user match.
$query = mysqli_query( $connection,"select * from login where password='$password' AND username='$username'");
$rows = mysqli_num_rows($query);
$row = mysqli_fetch_row($query);
if ($rows == 1) {
    $_SESSION['login_user']=$username; // Initializing Session
    $role=$row["1"];
if(!empty($_POST["remember"]))
{
    setcookie ("member_login",$username,time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("member_password",$password,time()+ (10 * 365 * 24 * 60 * 60));
    setcookie ("member_user",$username,time()+ (10 * 365 * 24 * 60 * 60));
    $_SESSION["admin_name"] = $username;
}
else
{
    if(isset($_COOKIE["member_login"]))
    {
        setcookie ("member_login","");
    }
    if(isset($_COOKIE["member_password"]))
    {
        setcookie ("member_password","");
    }
    if(isset($_COOKIE["member_user"]))
    {
        setcookie ("member_user","");
    }
} 
if($row["3"]=="admin")
{
    header("location: rent-admin/home.php"); // Redirecting To Other Page
}
else if($row["3"]=="manager")
{
    header("location:home.php"); // Redirecting To Other Page
}
} 
else {
$error = "Username or Password is invalid";
}
mysqli_close($connection); // Closing Connection
}
}
?>
