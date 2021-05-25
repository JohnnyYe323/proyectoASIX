<?php
$id2=$_GET['id2'];

include '../services/connection.php';

$delete2 = mysqli_query($conexion,"DELETE FROM `tbl_professor` WHERE `id_professor`=$id2");
header("Location:../view/admin.php?type=profe");
?>