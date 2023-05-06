<?php 
require_once './conexion/conexion.php';

if(isset($_POST['action'])=='delete')
{
    $idproveedor = $_POST['id'];
    $sql_delete = "delete from supplier where id_prove=?";
    $statement = $conex->prepare($sql_delete);
    $statement->bind_param('i',$idproveedor);
    // $statement->execute();
    // $conex->close();
    // header("Location: proveedores_listar.php");

    try {
        $statement->execute();
        $conex->close();
        header("Location: proveedores_listar.php");
     } catch (Exception $e) {
        echo '<script>alert("Error al eliminar. \nError: '.$e->getMessage().'"); location.href="proveedores_listar.php";</script>';
     }
}
?>