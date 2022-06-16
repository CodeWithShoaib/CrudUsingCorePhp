<?php
$host="localhost";
$user="root";
$password="";
$database="usama";
$conn=mysqli_connect($host,$user,$password,$database);
if(!$conn){
    echo "connection failed";
}else{
    "Connection Successfully";
}
$tableCreate="CREATE TABLE nabeel (id INT NOT NULL AUTO_INCREMENT , name VARCHAR(255) NOT NULL , email VARCHAR(255) NOT NULL , dis TEXT NOT NULL , PRIMARY KEY (id))";

if(mysqli_query($conn,$tableCreate)){
    echo "you can made a new table";
}else{
    echo "you table cannot be created";
}

?>