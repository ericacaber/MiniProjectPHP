<?php

session_start();

if($_SESSION['login'] == 'admin'){
    header('Location: message.php');
}

$user = "root";
$password = "password";
$database = "shop";

    mysql_connect(localhost,$user,$password);

    @mysql_select_db($database)or die ("Unable to select database");

$dateToday= date("Y/m/d");
$totalAmount=0;

    echo "</br></br><table border='1' align='center' cellpadding='10' cellspacing='5'>";

    foreach($_POST['checked'] as $checkedProduct){
        $priceQuery= "SELECT id,price, productName FROM products WHERE id='$checkedProduct'";
        $result = mysql_query($priceQuery);
        $id= mysql_result($result,0,"id");
        $name= mysql_result($result,0,"productName");
        $price = mysql_result($result,0,"price");

        echo "<tr>
                <td>$name</td>
                <td>$price</td>
            </tr>";

        $reportQuery= "INSERT INTO report VALUES (NULL ,'$id','$name','$price','$dateToday')";
        mysql_query($reportQuery);

        $totalAmount+=$price;
    }
    echo "<tr><td colspan='3'>Total Amount: P$totalAmount</td></tr>";
    echo "</table>";
    
    //comment

mysql_close();

?>