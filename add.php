<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Data</title>
</head>
<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {   
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
        
    // checking empty fields
    if(empty($name) || empty($age) || empty($email)) {              
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
        
        //link to the previous page
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    } else { 
        // if all the fields are filled (not empty)             
        //insert data to database
        $query = $conn->prepare("INSERT INTO users(name,age,email) VALUES(:name,:age,:email)");
        $query->bindParam(':name',$name,PDO::PARAM_STR);
        $query->bindParam(':age',$age,PDO::PARAM_INT); 
        $query->bindParam(':email',$email,PDO::PARAM_STR); 
        $query->execute();
        //display success message
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}
?>
    
</body>
</html>