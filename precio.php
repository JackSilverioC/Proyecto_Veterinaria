<?php 
require_once './conexion/conexion.php';
$id=$_POST['id'];
$sql="SELECT preciC from products where id_prod='$id'";
$result=mysqli_query($conex,$sql);
$row = mysqli_fetch_array($result);
echo $row[0];
?>