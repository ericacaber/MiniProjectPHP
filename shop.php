<?php
session_start();

    if($_SESSION['login'] == 'admin'){
        header('Location: message.php');
    }

?>

<html>
<head>
    <title></title>
</head>
<body>
<br/><br/>
<p align="right"><a href="logout.php">LOGOUT</a></p>
<br/>
<form action="report.php" method="post">
<table border="1" cellspacing="15" cellpadding="15" align="center">
    <tr>
        <th colspan="3" align="center">APPLE PRODUCTS</th>
    </tr>

    <tr>
        <th>IPHONE</th>
        <th>IPOD</th>
        <th>COMPUTER</th>
    </tr>
    <tr>
        <td><input type="checkbox" name="checked[]" value="1000"/>Iphone 4</td>
        <td><input type="checkbox" name="checked[]" value="1003"/>Ipod Shuffle</td>
        <td><input type="checkbox" name="checked[]" value="1006"/>Mac mini</td>
    </tr>
    <tr>
        <td><input type="checkbox" name="checked[]" value="1001"/>Iphone 4s</td>
        <td><input type="checkbox" name="checked[]" value="1004"/>Ipod 4th Gen</td>
        <td><input type="checkbox" name="checked[]" value="1007"/>iMac</td>
    </tr>
    <tr>
        <td><input type="checkbox" name="checked[]" value="1002"/>Iphone 5</td>
        <td><input type="checkbox" name="checked[]" value="1005"/>Ipod 5th gen</td>
        <td><input type="checkbox" name="checked[]" value="1008"/>Macbook Air</td>
    </tr>
    <tr>
        <td colspan="3" align="center"> <input type="submit" value="Compute"/></td>
    </tr>

</table>
</form>
</body>
</html>