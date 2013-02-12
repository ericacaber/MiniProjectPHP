<?php
    include 'report.php';
    echo "<h3 align= 'center'>Summary Report</h3>";
    echo "</br></br>";
    echo "<table border='2' cellspacing='5' align='center'>";

    echo "<tr>
            <th>Product ID</th>
            <th>Total</th>";

    $num2 = mysql_numrows($summaryResult);
    for ($i = 0; $i<$num2;$i++){
        $id= mysql_result($summaryResult,$i,'product_id');
        $count= mysql_result($summaryResult,$i,'COUNT(product_id)');


    echo "<tr>
              <td>$id</td>
              <td>$count</td>
          </tr>";
}

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
        $id= mysql_result($reportResult,$i,'id');
        $name= mysql_result($reportResult,$i,'productName');
        $datePurchased= mysql_result($reportResult,$i,'datePurchased');

        echo "<tr>
                <td>$id</td>
                <td>$name</td>
                <td>$datePurchased</td>
               </tr>";
    }

    echo "</table>";

?>