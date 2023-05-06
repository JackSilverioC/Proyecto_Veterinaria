<?php 
require_once './conexion/conexion.php';
if(isset($_POST['action'])=='delete')
{
    $idpedido = $_POST['id'];
    $sql_delete = "delete from compra where id_compra=?";
    $statement = $conex->prepare($sql_delete);
    $statement->bind_param('i',$idpedido);
    $statement->execute();
    $conex->close();
    header("Location: compra_listar.php");
}
?>