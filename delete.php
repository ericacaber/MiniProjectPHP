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

function yes(){

    echo "try";
}

$id=$_GET['id'];
$viewQuery= "SELECT * from products WHERE id='$id'";
$viewResults= mysql_query($viewQuery);

$name = mysql_result($viewResults,0,'productName');
$pid = mysql_result($viewResults,0,'id');
echo "</br><p align='center'>Are you Sure you Want to DELETE: </br></p>";

echo "<form action='confirmation.php?id=$id' method='post'>";
echo "<table border='1' align='center' cellspacing='5'>";
echo "<tr><td>PRODUCT ID <input type='text' name='productName' value='$pid'/></td></tr>";
echo "<tr><td>PRODUCT NAME <input type='text' name='price' value='$name'/></td></tr>";
echo "<tr><td align='center'><input type='submit' value='YES'>";
echo "<input type='button' value='NO'></td></tr>";
echo "</form>";


?>