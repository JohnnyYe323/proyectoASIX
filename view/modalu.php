<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icono.png">
    <link rel="stylesheet" type="text/css" href="../css/stylesmodalu.css">
    <script src="../js/scriptalu.js"></script>
    <title>Modificar alumno</title>
</head>

<body onload="myFunction()">
<div id="loader"></div>
<div class="carga" id="myDiv">
<div class="mod">
    <h1>Modificar alumno</h1>
<?php
$id=$_REQUEST['id'];

include '../services/connection.php';

$result = mysqli_query($conexion,"SELECT * FROM `tbl_alumne` where `id_alumne`=$id");

foreach ($result as $registro) {
        echo "<form action='../process/recibirmodalu.php'?.id=$registro[id_alumne] method='post' onsubmit='return validar_form();'>";
        echo "<input type='hidden' name='id' value='$registro[id_alumne]'>";

        echo "<label for='nom'>Nombre:</label><br>";
        echo "<input class='input' type=text id='nom' name='nom' size='30' value='$registro[nom_alu]'>";
        echo "<div id='mensajeNom'></div><br>";

        echo "<label for='ape1'>Primer apellido:</label><br>";
        echo "<input class='input' type=text id='ape' name='ape1' value='$registro[cognom1_alu]'>";
        echo "<div id='mensajeApe'></div><br>";

        echo "<label for='ape2'>Segundo apellido</label><br>";
        echo "<input class='input' type=text id='ape2' name='ape2' value='$registro[cognom2_alu]'>";
        echo "<div id='mensajeApe2'></div><br>";

        echo "<label for='telf'>Teléfono:</label><br>";
        echo "<input class='input' type=text id='tel' name=telf value='$registro[telf_alu]'>";
        echo "<div id='mensajeTel'></div><br>";

        echo "<label for='dni'>DNI:</label><br>";
        echo "<input class='input' type=text id='dni' name=dni value='$registro[dni_alu]'>";
        echo "<div id='mensajeDNI'></div><br>";

        echo "<label for='email'>Email:</label><br>";
        echo "<input class='input' type=text id='email' name=email value='$registro[email_alu]'>";
        echo "<div id='mensajeMail'></div><br>";

        echo "<label for='curso'>Curso:</label><br>";
        echo "<select name='curso' id='curso'>";
        echo     "<option value=$registro[classe] selected hidden>Seleccione:</option>";
        echo     "<option value='1'>ASIX</option>";
        echo     "<option value='2'>DAW</option>";
        echo     "<option value='3'>EAS</option>";
        echo "</select>";
        echo "<div id='mensajeCurso'></div><br><br>";

        echo "<input class='button' type=submit value=MODIFICAR><br><br>";
        echo "</form>";
};
?>

        <form>
            <input class="button" onclick="window.location.href='admin.php?type=alu'" type="button" value="VOLVER"><br><br>
        </form>
</div>
</div>
</body>
</html>