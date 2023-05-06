<?php 
require 'conexion/conexion.php';
if (isset($_POST['login'])) {
    $errMsg = '';

    $usuario = $_POST['usuario'];
    $contra = MD5($_POST['contra']);//Ver

    if ($usuario == '')
        $errMsg = 'Digite su usuario';
    if ($contra == '')
        $errMsg = 'Digite su contraseña';

    if ($errMsg == '') {
        try {
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
            $result = $conex->query($sql);
            $row = mysqli_fetch_array($result);

            if ($result->num_rows == 0 || $contra != $row['contra']) {
                $errMsg = "Usuario y/o contraseña no válidos.";
            } else {
                if ($contra == $row['contra']) {
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['nombre'] = $row['nombre'];
                    $_SESSION['usuario'] = $row['usuario'];
                    $_SESSION['correo'] = $row['correo'];
                    $_SESSION['contra'] = $row['contra'];
                    $_SESSION['cargo'] = $row['cargo'];

                        if(!empty($_POST['recordar'])){
                            setcookie ('usuario',$row['usuario'],time()+(3600*24*7), '/');
                            setcookie ('pass',$_POST['contra'],time()+(3600*24*7), '/');
                        }
                        else{
                            setcookie('usuario',$row['usuario'],30);
                            setcookie('pass',$_POST['contra'],30);
                        }

                    if ($_SESSION['cargo'] == 1) {
                        header('Location: inicio.php');
                    }
                }
            }
        } catch (PDOException $e) {
            $errMsg = $e->getMessage();
        }
    }
} ?>