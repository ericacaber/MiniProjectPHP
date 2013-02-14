<?php
session_start();

if($_SESSION['login'] == 'member'){
    header('Location: message.php');
}
?>

<html>
<body>
<form action="" method="post">
    </br></br>
    <table border="1" align="center" cellspacing="5">

        <tr><td>PRODUCT NAME: <input type="text" name="productName" /></td></tr>
        <tr><td>PRODUCT TYPE:
            <select name="type">
                <option value="iphone">iPhone</option>
                <option value="ipod">iPod</option>
                <option value="mac">Mac</option>
            </select></td></tr>
        <tr><td>PRODUCT PRICE: <input type="text" name="price" /></td></tr>

        <tr>
            <td align='center'><input type='submit' value='Submit'></td>
        </tr>
</table>
</form>

<?php
$user = "root";
$password = "password";
$database = "shop";

mysql_connect(localhost,$user,$password);

@mysql_select_db($database)or die ("Unable to select database");

$name= $_POST['productName'];
$type= $_POST['type'];
$price= $_POST['price'];
$viewQuery= "INSERT INTO products VALUES (NULL,'$type' ,'$name' ,'$price')";
$viewResults= mysql_query($viewQuery);

if($viewResults){
    echo "</br><p align='center'>Added Successfully</p>";
    echo "<p align='center'><a href='view.php'>Back to Main Page</a></p>";
}
?>
</body>
</html>


