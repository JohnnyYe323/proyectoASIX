<?php

$nom=$_POST['nom'];
$ape=$_POST['ape'];
$ape2=$_POST['ape2'];
$dni=$_POST['dni'];
$tel=$_POST['tel'];
$email=$_POST['email'];
$curs=$_POST['curso'];

include '../services/connection.php';

$sql="INSERT INTO `tbl_alumne` (`nom_alu`, `cognom1_alu`, `cognom2_alu`, `dni_alu`, `telf_alu`, `email_alu`, `classe`) VALUES ('$nom','$ape','$ape2','$dni','$tel','$email','$curs')";
mysqli_query($conexion,$sql);

header("Location:../view/admin.php?type=alu");
?>