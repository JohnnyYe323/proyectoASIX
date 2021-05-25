<?php

include '../services/connection.php';

$sql="select * from tbl_alumne";

$query = $conexion->query($sql);

echo "nom_alu,";
echo "cognom1_alu,";
echo "cognom2_alu,";
echo "telf_alu,";
echo "dni_alu,";
echo "email_alu,";
echo "classe\n";

if ($query){
    while($r = $query->fetch_object()){
        echo $r->nom_alu.",";
        echo $r->cognom1_alu.",";
        echo $r->cognom2_alu.",";
        echo $r->telf_alu.",";
        echo $r->dni_alu.",";
        echo $r->email_alu.",";
        echo $r->classe."\n";
    }
}

header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=users.csv;');

?>