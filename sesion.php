<?php 
session_start();
if(empty( $_SESSION['usuario'])){
    session_start();
    session_destroy();
    header('location:index.php');
}
else{
    
    // echo $_SESSION['usuario'];
}
?>