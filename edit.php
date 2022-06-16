<?php

$servername = "localhost";
$database = "nasir";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn){
die('connection failed');   
}

if(isset($_REQUEST["edit"])){
    $sql="select * from student where id={$_REQUEST['id']}";
    $process=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($process);
}
if (isset($_REQUEST["update"])){
    if(($_REQUEST["name"]=="")||($_REQUEST["email"]=="")|| ($_REQUEST["address"]=="")){
        echo "please fill all the fields";
    }else{
        $name=$_REQUEST["name"];
        $email=$_REQUEST["email"];
        $address=$_REQUEST["address"];
        $updating="UPDATE student SET name='$name',email='$email',address='$address' WHERE id={$_REQUEST['id']}";
if(mysqli_query($conn,$updating)){
    echo "data is updated";
}else{
    echo "data not updated";
}
    }
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
<div class="container my-4">
<div class="row">
<div class="col-sm-4">
<form action="" method="post" class="form">
<div class="input">
    <label for="name">Name:-</label>
    <input type="text" placeholder="name" name="name" class="form-control" value="<?php if(isset($row["name"])){echo $row["name"];} ?>">
</div>
<div class="input">
    <label for="email">Name:-</label>
    <input type="email" placeholder="email" name="email"  class="form-control" value="<?php if(isset($row["email"])){echo $row["email"];} ?>">
</div>
<div class="input">
    <label for="address">Address:-</label>
    <input type="text" placeholder="address" name="address"  class="form-control" value="<?php if(isset($row["address"])){echo $row["address"];} ?>">
</div>
<input type="hidden" value="<?php echo $row['id'] ?>" name="id" >
<input type="submit" value="update" class="btn btn-secondary "   name="update">
</form>
</div>
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
<input type="hidden" name="id" value='.$row["id"].'><input type="submit" name="edit" value="edit" class="btn btn-success">
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



