<?php

include '../services/connection.php';

$sql="select * from tbl_professor";

$query = $conexion->query($sql);

echo "nom_prof,";
echo "cognom1_prof,";
echo "cognom2_prof,";
echo "telf,";
echo "email_prof,";
echo "dept\n";

if ($query){
    while($r = $query->fetch_object()){
        echo $r->nom_prof.",";
        echo $r->cognom1_prof.",";
        echo $r->cognom2_prof.",";
        echo $r->telf.",";
        echo $r->email_prof.",";
        echo $r->dept."\n";
    }
}

header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=users.csv;');

?>