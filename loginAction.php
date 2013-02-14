<?php
session_start();

$user = "root";
$password = "password";
$database = "shop";

mysql_connect(localhost,$user,$password);

@mysql_select_db($database)or die ("Unable to select database");

$userName = $_POST['username'];
$password = $_POST['password'];

$viewQuery= "SELECT * from user WHERE username = '$userName' AND password ='$password'";
$viewResults= mysql_query($viewQuery);

$count = mysql_num_rows($viewResults);

if($count == 1){
    if ($userName == 'admin'){
        $_SESSION['login'] = $userName;
    }else{
        $_SESSION['login'] = $userName;
    }
}

echo "<p align='right'><a href='logout.php'>LOGOUT</a></p></br></br>";
echo "<h3 align= 'center'>MAIN MENU</h3></br></br>";
echo "<p align='center'><a href='shop.php'> Shop</a></p>";
echo "<p align='center'><a href='view.php'> Admin Page</a></p>";
echo "<p align='center'><a href='summaryReport.php'>Reports</a></p>";

?>
