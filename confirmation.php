<?php

session_start();

if($_SESSION['login'] == 'member'){
    header('Location: message.php');
}

$user = "root";
$password = "password";
$database = "shop";

mysql_connect(localhost,$user,$password);

@mysql_select_db($database)or die ("Unable to select database");

$id=$_GET['id'];
$deleteQuery= "DELETE FROM products WHERE id='$id'";
$deleteResults= mysql_query($deleteQuery);

if($deleteResults){
    echo "</br></br><p align='center'>SUCCESSFULLY DELETED!</br></p>";
    echo "<p align='center'><a href='view.php'>Back to Main Page</a></p>";
}else{
    echo "FAILED";
}
?>