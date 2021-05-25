<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icono.png">
    <link rel="stylesheet" type="text/css" href="../css/stylesmodprofe.css">
    <script src="../js/scriptprof.js"></script>
    <title>Modificar profesor</title>
</head>

<body onload="myFunction()">
<div id="loader"></div>
<div class="carga" id="myDiv">
<div class="mod">
    <h1>Modificar profesor</h1>
<?php
$id=$_REQUEST['id2'];

include '../services/connection.php';

$result = mysqli_query($conexion,"SELECT * FROM `tbl_professor` where `id_professor`=$id");

foreach ($result as $registro) {
        echo "<form action='../process/recibirmodprofe.php'?.id=$registro[id_professor] method=post onsubmit='return validar_form();'>";
        echo "<input type='hidden' name='id2' value='$registro[id_professor]'>";

        echo "<label for='nom'>Nombre:</label><br>";
        echo "<input class='input' id='nom' type=text name=nom value='$registro[nom_prof]'>";
        echo "<div id='mensajeNom'></div><br>";

        echo "<label for='ape1'>Primer apellido:</label><br>";
        echo "<input class='input' id='ape' type=text name=ape1 value='$registro[cognom1_prof]'>";
        echo "<div id='mensajeApe'></div><br>";

        echo "<label for='ape2'>Segundo apellido</label><br>";
        echo "<input class='input' id='ape2' type=text name=ape2 value='$registro[cognom2_prof]'>";
        echo "<div id='mensajeApe2'></div><br>";

        echo "<label for='telf'>Teléfono:</label><br>";
        echo "<input class='input' id='tel' type=text name=telf value='$registro[telf]'>";
        echo "<div id='mensajeTel'></div><br>";

        echo "<label for='email'>Email:</label><br>";
        echo "<input class='input' id='email' type=text name=email value='$registro[email_prof]'>";
        echo "<div id='mensajeMail'></div><br>";

        echo "<label for='dept'>Departamento:</label><br>";
        echo "<select name='dept' id='dept'>";
        echo     "<option value=$registro[dept] selected hidden>Seleccione:</option>";
        echo     "<option value='1'>BTX</option>";
        echo     "<option value='2'>EAS</option>";
        echo     "<option value='3'>EDIN</option>";
        echo     "<option value='4'>ASIX</option>";
        echo     "<option value='5'>AD</option>";
        echo "</select>";
        echo "<div id='mensajeDept'></div><br><br>";

        echo "<input class='button' type=submit value=MODIFICAR><br><br>";
        echo "</form>";
};
?>

        <form>
            <input class="button" onclick="window.location.href='admin.php?type=profe'" type="button" value="VOLVER"><br><br>
        </form>
</div>
</div>
</body>
</html>