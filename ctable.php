<?php
$servername = "localhost";
$username = "ladiesin_dab2";
$password = "dab2@2019";
$dbname = "ladiesin_batch2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//delete table
/*$sql1 = "DROP TABLE message1";
    if(mysqli_query($conn, $sql1)) {  
      	echo "Table is deleted successfully";  
    } 
    else {  
         echo "Table is not deleted successfully\n";
    }  */

// sql to create table
$sql1 = "CREATE TABLE admin (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
name VARCHAR(255) NOT NULL,
profile LONGBLOB,
username VARCHAR(255) NOT NULL,
password VARCHAR(255) NOT NULL
)";

if ($conn->query($sql1) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


$sql2= "CREATE TABLE movie(
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
title VARCHAR(255) NOT NULL,
comment TEXT,
image LONGBLOB,
website VARCHAR(255) NOT NULL,
contact VARCHAR(255) NOT NULL,
datep DATE,
userid INT(11)
)";

if ($conn->query($sql2) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>