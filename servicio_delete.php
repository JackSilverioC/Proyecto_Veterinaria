<?php 
require_once './conexion/conexion.php';
if(isset($_POST['action'])=='delete')
{
    $idservicio = $_POST['id'];
    $sql_delete = "delete from service where id_servi=?";
    $statement = $conex->prepare($sql_delete);
    $statement->bind_param('i',$idservicio);
    $statement->execute();
    $conex->close();
    header("Location: servicio_listar.php");
}
?>