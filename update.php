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
$viewQuery= "SELECT * from products WHERE id='$id'";
$viewResults= mysql_query($viewQuery);
$name = mysql_result($viewResults,0,'productName');
$price = mysql_result($viewResults,0,'price');

    echo "<form action='' method='post'>";
    echo"</br></br>
        <table border='1' align='center' cellspacing='5'>";
    echo "<tr><td>PRODUCT NAME <input type='text' name='productName' value='$name'/></td></tr>";
    echo "<tr><td>PRODUCT PRICE <input type='text' name='price' value='$price'/></td></tr>";
    echo "<tr><td align='center'><input type='submit' value='Update'></td></tr>";
    echo "</form>";

$prodName= $_POST['productName'];
$prodPrice= $_POST['price'];
$updateQuery= "UPDATE products SET productName= '$prodName', price = '$prodPrice'  WHERE id='$id'";
$updateResults= mysql_query($updateQuery);

if($updateResults){
    echo "</br><p align='center'>Update Successful</p>";
    echo "<p align='center'><a href='view.php'>Back to Main Page</a></p>";
}
?>