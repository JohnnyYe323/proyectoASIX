<?php
$id=$_GET['id'];

include '../services/connection.php';

$delete = mysqli_query($conexion,"DELETE FROM tbl_alumne Where id_alumne=$id");
header("Location:../view/admin.php?type=alu");
?>