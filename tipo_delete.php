<?php 
require_once './conexion/conexion.php';
if(isset($_POST['action'])=='delete')
{
    $idtipo = $_POST['id'];
    $sql_delete = "delete from pet_type where id_tiM=?";
    $statement = $conex->prepare($sql_delete);
    $statement->bind_param('i',$idtipo);
    $statement->execute();
    $conex->close();
    header("Location: tipo_listar.php");
    
}
?>