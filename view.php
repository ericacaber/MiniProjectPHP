
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

$viewQuery= "SELECT * from products";
$viewResults= mysql_query($viewQuery);

echo "<form action='add.php' method='post'>";
echo "<input type='submit' value='Add Product'>";
echo "</form>";
echo "<p align='right'><a href='logout.php'>LOGOUT</a></p>";
echo "</br></br><table border='1' align='center' cellpadding='10' cellspacing='5'>";
echo "<tr>
        <th>PRODUCT ID</th>
        <th>PRODUCT NAME</th>
        <th>TYPE</th>
        <th>PRICE</th>
     </tr>";

    $num = mysql_num_rows($viewResults);
    for ($i = 0; $i<$num;$i++){
        $id= mysql_result($viewResults,$i,'id');
        $name = mysql_result($viewResults,$i,'productName');
        $type= mysql_result($viewResults,$i,'type');
        $price = mysql_result($viewResults,$i,'price');

        echo "<tr>
                <td>$id</td>
                <td>$name</td>
                <td>$type</td>
                <td>$price</td>
                <form action='update.php?id=$id' method = 'post'>
                <td><input type='submit' value='Edit'/></td>
                </form>
                <form action='delete.php?id=$id' method = 'POST'>
                <td><input type='submit' value='Delete'/></td>
                </form>
            </tr>";
    }
echo "</table>";

?>