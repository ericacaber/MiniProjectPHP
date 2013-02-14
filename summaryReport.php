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

$viewReportQuery= "SELECT * FROM report";
$reportResult = mysql_query($viewReportQuery);

$summaryQuery = "SELECT product_id, productName, price, COUNT(product_id) as c FROM report GROUP BY product_id";
$summaryResult = mysql_query($summaryQuery);
echo "<p align='right'><a href='logout.php'>LOGOUT</a></p>";
echo "<h3 align= 'center'>Summary Report</h3>";
    echo "</br></br>";
    echo "<table border='2' cellspacing='5' align='center'>";

    echo "<tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Total Count</th>
            <th>Total Amount</th>";

    $overall=0;
    $num2 = mysql_numrows($summaryResult);
    for ($i = 0; $i<$num2;$i++){
        $id= mysql_result($summaryResult,$i,'product_id');
        $count= mysql_result($summaryResult,$i,'c');
        $name= mysql_result($summaryResult,$i,'productName');
        $price= mysql_result($summaryResult,$i,'price');
        $total = $count * $price;

    echo "<tr>

              <td>$id</td>
              <td>$name</td>
              <td>$count</td>
              <td>$total</td>
          </tr>";

        $overall+=$total;

    }
echo "<tr><td colspan='4' align='center'>Overall Amount: P$overall</td></tr>";
echo "</table>";
echo "</br></br>";
echo "<h3 align= 'center'>Detailed Report</h3>";
echo "</br></br>";


echo "<table border='2' cellspacing='5' align='center'>";

    echo "<tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Date Purchased</th>
            </tr>";

    $num = mysql_numrows($reportResult);
    for ($i = 0; $i<$num;$i++){
        $id= mysql_result($reportResult,$i,'product_id');
        $name= mysql_result($reportResult,$i,'productName');
        $datePurchased= mysql_result($reportResult,$i,'datePurchased');

        echo "<tr>
                <td>$id</td>
                <td>$name</td>
                <td>$datePurchased</td>
               </tr>";
    }

    echo "</table>";

mysql_close();
?>