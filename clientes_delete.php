<?php 
require_once './conexion/conexion.php';
if(isset($_POST['action'])=='delete')
{
    $idcliente = $_POST['id'];
    $sql_delete = "delete from owner where id_due=?";
    $statement = $conex->prepare($sql_delete);
    $statement->bind_param('i',$idcliente);
    $statement->execute();
    $conex->close();
    header("Location: clientes_listar.php");
}
            ?>