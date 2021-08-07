<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$id = $_GET['id'];

//deleting the row from table

$query=$conn->prepare( "DELETE FROM users WHERE id=$id"); // using mysqli_query instead
$query->execute();
$users = $query->fetchAll(PDO::FETCH_ASSOC);


//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>