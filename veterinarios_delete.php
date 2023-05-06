<?php 
require_once './conexion/conexion.php';

if(isset($_POST['action'])=='delete')
{
    $idvet = $_POST['id'];
    $sql_delete = "delete from veterinarian where id_vet=?";
    $statement = $conex->prepare($sql_delete);
    $statement->bind_param('i',$idvet);
    $statement->execute();
    $conex->close();
    header("Location: veterinarios_listar.php");
}
?>