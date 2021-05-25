<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icono.png">
    <link rel="stylesheet" type="text/css" href="../css/stylescrearprofe.css">
    <script src="../js/scriptprof.js"></script>
    <title>Añadir profesor</title>
</head>

<body onload="myFunction()">
    <div id="loader"></div>
    <div class="carga" id="myDiv">
    <div class="crear">
        <h1>Añadir profesor</h1>
        <form action="../process/recibircrearprofe.php" method="POST" onsubmit="return validar_form();">
            <label for="nom">Nombre:</label><br>
            <input class="input" type="text" id="nom" name="nom" placeholder="Nombre" onchange="validar_form()">
            <div id="mensajeNom"></div><br>
            <label for="ape">Primer apellido:</label><br>
            <input class="input" type="text" id="ape" name="ape" placeholder="Primer apellido" onchange="validar_form()">
            <div id="mensajeApe"></div><br>
            <label for="ape2">Segundo apellido:</label><br>
            <input class="input" type="text" id="ape2" name="ape2" placeholder="Segundo apellido" onchange="validar_form()">
            <div id="mensajeApe2"></div><br>
            <label for="tel">Teléfono:</label><br>
            <input class="input" type="text" id="tel" name="tel" placeholder="Teléfono" onchange="validar_form()">
            <div id="mensajeTel"></div><br>
            <label for="email">Email:</label><br>
            <input class="input" type="email" id="email" name="email" placeholder="Email" onchange="validar_form()">
            <div id="mensajeMail"></div><br>
            <!--Desplegable en departamento-->
            <label for="dept">Departamento:</label><br>
            <select name="dept" id="dept" onchange="validar_form()">
                <option value="">Seleccione:</option>
                <option value="1">BTX</option>
                <option value="2">EAS</option>
                <option value="3">EDIN</option>
                <option value="4">ASIX</option>
                <option value="5">AD</option>
            </select>
            <div id='mensajeDept'></div><br><br>
            <input class="button" type="submit" value="ENVIAR">
        </form>
        <br>
        <form>
            <input class="button" onclick="window.location.href='admin.php?type=profe'" type="button" value="VOLVER"><br><br>
        </form>
    </div>
    </div>
</body>

</html>