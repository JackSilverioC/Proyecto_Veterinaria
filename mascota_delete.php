<?php 
require_once './conexion/conexion.php';
if(isset($_POST['action'])=='delete')
{
    $idmascota = $_POST['id'];
    $sql_delete = "delete from pet where id_pet=?";
    $statement = $conex->prepare($sql_delete);
    $statement->bind_param('i',$idmascota);
    $statement->execute();
    $conex->close();
    header("Location: mascota_listar.php");
}
?>