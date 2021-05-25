<?php

$nom=$_POST['nom'];
$ape=$_POST['ape'];
$ape2=$_POST['ape2'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$dept=$_POST['dept'];

include '../services/connection.php';

$sql="INSERT INTO `tbl_professor` (`nom_prof`, `cognom1_prof`, `cognom2_prof`, `telf`, `email_prof`, `dept`) VALUES ('$nom','$ape','$ape2','$tel','$email','$dept')";
mysqli_query($conexion,$sql);

header("Location:../view/admin.php?type=profe");
?>