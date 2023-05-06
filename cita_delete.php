<?php 
require_once './conexion/conexion.php';
if(isset($_POST['action'])=='delete')
{
    $idcita = $_POST['id'];
    $sql_delete = "delete from quotes where id=?";
    $statement = $conex->prepare($sql_delete);
    $statement->bind_param('i',$idcita);
    $statement->execute();
    $conex->close();
    header("Location: cita_listar.php");
}
?>