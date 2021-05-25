<?php

$id=$_POST['id2'];
$nom=$_POST['nom'];
$ape=$_POST['ape1'];
$ape2=$_POST['ape2'];
$tel=$_POST['telf'];
$email=$_POST['email'];
$dept=$_POST['dept'];

include '../services/connection.php';

$sql="UPDATE `tbl_professor` set `nom_prof`='$nom',`cognom1_prof`='$ape',`cognom2_prof`='$ape2',`telf`='$tel',`email_prof`='$email',`dept`='$dept' where `id_professor`='$id'";

mysqli_query($conexion,$sql);

header("Location:../view/admin.php?type=profe");

?>