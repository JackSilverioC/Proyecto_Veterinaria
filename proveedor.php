<?php 
require_once './conexion/conexion.php';
$id=$_POST['id'];
$sql="SELECT p.id_prove,nomprove from products p , supplier s where p.id_prod='$id' and p.id_prove=s.id_prove";
$result=mysqli_query($conex,$sql);
$row = mysqli_fetch_array($result);

$result = array();

$result['id'] = $row[0];
$result['nombre'] = $row[1];

echo json_encode($result);
?>