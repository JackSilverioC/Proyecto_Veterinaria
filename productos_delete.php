<?php 
require_once './conexion/conexion.php';
if(isset($_POST['action'])=='delete')
{
    $idproducto = $_POST['id'];
    $sql_delete = "delete from products where id_prod=?";
    $statement = $conex->prepare($sql_delete);
    $statement->bind_param('i',$idproducto);
    $statement->execute();
    $conex->close();
    header("Location: productos_listar.php");
}
?>