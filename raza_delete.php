<?php 
require_once './conexion/conexion.php';
if(isset($_POST['action'])=='delete')
{
    $idraza = $_POST['id'];
    $sql_delete = "delete from raza where id_raza=?";
    $statement = $conex->prepare($sql_delete);
    $statement->bind_param('i',$idraza);
    $statement->execute();
    $conex->close();
    header("Location: raza_listar.php");
}
?>