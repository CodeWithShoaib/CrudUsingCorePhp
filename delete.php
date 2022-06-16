<?php

$servername = "localhost";
$database = "nasir";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
die('connection failed');   
}

if(isset($_REQUEST["id"])){
    $deleting="DELETE FROM `student` WHERE id={$_REQUEST['delete']}";
}
?>











<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap demo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

<div class="col-sm-6">

<?php
$sql="select * from student";
$result=mysqli_query($conn,$sql);

echo "<table class='table'>";
echo "<thead>";
echo "<tr>";
echo "<th> Id </th>";
echo "<th> NAME </th>";
echo "<th> Email </th>";
echo "<th> Address </th>";
echo "<th> Action </th>";
echo "</tr>";
echo "</thead>";


echo "<tbody>";
if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){


echo "<tr>";
echo "<td>" .$row["id"]. "</td>";
echo "<td>".$row["name"]."</td>";
echo "<td>".$row["email"]."</td>";
echo "<td>".$row["address"]."</td>";
echo '<td>
<form action="" method="POST">
<input type="hidden" name="id" value='.$row["id"].'><input type="submit" name="delete" value="delete" class="btn btn-danger">
</form>

</td>';

echo "</tr>";        
}
}
echo "</tbody>";
echo "</table>";

?>

</div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>



