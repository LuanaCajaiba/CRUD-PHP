<?php
//including the database connection file
include_once("config.php");

//fetching data in descending order (lastest entry first)

$query=$conn->prepare("SELECT * FROM users ORDER BY id DESC"); 
$query->execute();
$users = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<html> 
<head>  
    <title>Homepage</title>
</head>

<body>
    <a href="add.html">Add New Data</a><br/><br/>

    <table width='80%' border=0>
        <tr bgcolor='#CCCCCC'>
            <td>Name</td>
            <td>Age</td>
            <td>Email</td>
            <td>Update</td>
        </tr>
        <?php 
       
        foreach($users as $res){
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['age']."</td>";
            echo "<td>".$res['email']."</td>";  
            echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";       
        }
        ?>
    </table>
</body>
</html>
