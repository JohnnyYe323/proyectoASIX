<?php

$id=$_POST['id'];
$nom=$_POST['nom'];
$ape=$_POST['ape1'];
$ape2=$_POST['ape2'];
$dni=$_POST['dni'];
$tel=$_POST['telf'];
$email=$_POST['email'];
$curs=$_POST['curso'];

include '../services/connection.php';

$sql="UPDATE `tbl_alumne` set `dni_alu`='$dni',`nom_alu`='$nom',`cognom1_alu`='$ape',`cognom2_alu`='$ape2',`telf_alu`='$tel',`email_alu`='$email',`classe`='$curs' where `id_alumne`='$id'";
mysqli_query($conexion,$sql);

header("Location:../view/admin.php?type=alu");

?>