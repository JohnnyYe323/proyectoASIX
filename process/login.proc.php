<?php
//recoger los datos del login
$user=htmlentities($_REQUEST['user']);
$pass=htmlentities($_REQUEST['pass']);
$conexion = mysqli_connect("127.0.0.1","$user","$pass","curs") or die(header("location: ../index.php"));

$user=mysqli_real_escape_string($conexion,$user);
//comprobar el usuario
$usuarioBD = mysqli_query($conexion,"SELECT * FROM tbl_admin WHERE nom_admin='$user' and pass_admin='$pass'");

if (mysqli_num_rows($usuarioBD) == 1) {
    session_start();
    $_SESSION['user']=$user;
    header("location: ../view/admin.php?type=alu");
} else {
    header("location: ../index.php");
}

mysqli_free_result($usuarioBD);
?>