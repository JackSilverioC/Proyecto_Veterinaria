<?php 
require_once './conexion/conexion.php';
if(isset($_POST['action'])=='delete')
{
    $idcate = $_POST['id'];
    $sql_delete = "delete from category where id_cate=?";
    $statement = $conex->prepare($sql_delete);
    $statement->bind_param('i',$idcate);
    $statement->execute();
    $conex->close();
    header("Location: categorias_listar.php");
}
            ?>