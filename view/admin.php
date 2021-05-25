<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/icono.png">
    <link rel="stylesheet" type="text/css" href="../css/stylesadmin.css">
    <link href="../fontawesome/css/all.css" rel="stylesheet">
    <script src="../js/scriptsadmin.js"></script>
    <title>Administrar usuarios</title>
</head>

<body onload="myFunction()">
<?php
    $tipo=$_REQUEST["type"];
    echo "<input type='hidden' id='tipo' value='$tipo'>";
?>
<div id="loader"></div>
<div class="carga" id="myDiv">
    <?php
    include '../services/connection.php';
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.html');
    }
    ?>
    <!--Da la bienvenida al usuario-->
    <div class="user">
        <h1> Bienvenido/a, 
            <?php echo $_SESSION['user']?>
        </h1>
    </div>

    <!--boton para cerrar sesion-->
    <div class="logout">
        <a href="../process/logout.php"><button type="button">Cerrar sesión</button></a>
    </div>

    <div class="elementos">
    <!--tabs alumnos/profes-->
        <div class="tab">
            <button class="tablinks active" onclick="tabUser(event, 'alu')" id="defaultOpen">Alumnos</button>
            <button class="tablinks" onclick="tabUser(event, 'profe')">Profesores</button>
        </div>
        <br>
    <!--formulario filtrar-->
        <div class="filtro" id="clicfiltro">
            <form action="" method="post">
                <input class="textobuscar" type="text" placeholder="Buscar..." name="titulo">
                <input class="buscar" type="submit" value="Buscar" name="filtro">
            </form>
        </div>
        <br>
    </div>
    <!--tabla donde se muestran los alumnos-->
        <div id="alu" class="tabcontent">
            <div class="añadir">
                <a href="crearalu.php"><button type="button">Añadir alumno</button></a>
            </div>
            <div class="tabla">
            <table class="centrarTabla">
                <tr>
                    <th>Nombre</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Teléfono</th>
                    <th>DNI</th>
                    <th>Email</th>
                    <th>Clase</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                $result = mysqli_query($conexion,"select * from tbl_alumne");
                
                //filtrar 
                if (isset($_REQUEST['filtro'])) {
                    $titulo=$_REQUEST['titulo'];
                    $result = mysqli_query($conexion,"SELECT `tbl_alumne`.`id_alumne`,`tbl_alumne`.`dni_alu`,`tbl_alumne`.`nom_alu`,`tbl_alumne`.`cognom1_alu`,`tbl_alumne`.`cognom2_alu`,`tbl_alumne`.`telf_alu`,`tbl_alumne`.`email_alu`,`tbl_classe`.`codi_classe` FROM `tbl_alumne` INNER JOIN `tbl_classe` ON `tbl_alumne`.`classe`=`tbl_classe`.`id_classe` WHERE `nom_alu` LIKE '%$titulo%' OR `id_alumne` LIKE '%$titulo%' OR `dni_alu` LIKE '%$titulo%' OR `cognom1_alu` LIKE '%$titulo%' OR `cognom2_alu` LIKE '%$titulo%' OR `telf_alu` LIKE '%$titulo%' OR `email_alu` LIKE '%$titulo%' OR `tbl_classe`.`codi_classe` LIKE '%$titulo%' ORDER BY id_alumne ASC");
                    $total = mysqli_query ($conexion,"SELECT `tbl_alumne`.`dni_alu`,`tbl_alumne`.`nom_alu`,`tbl_alumne`.`cognom1_alu`,`tbl_alumne`.`cognom2_alu`,`tbl_alumne`.`telf_alu`,`tbl_alumne`.`email_alu`,`tbl_classe`.`codi_classe` FROM `tbl_alumne` INNER JOIN `tbl_classe` ON `tbl_classe`.`id_classe` = `tbl_alumne`.`classe`");
                    $cantidadRegistros=mysqli_num_rows($result);
                    $cantidadRegistrosTotal=mysqli_num_rows($total);
                }else{
                    $result = mysqli_query($conexion,"SELECT `tbl_alumne`.`id_alumne`, `tbl_alumne`.`dni_alu`,`tbl_alumne`.`nom_alu`,`tbl_alumne`.`cognom1_alu`,`tbl_alumne`.`cognom2_alu`,`tbl_alumne`.`telf_alu`,`tbl_alumne`.`email_alu`,`tbl_classe`.`codi_classe` FROM `tbl_alumne` INNER JOIN `tbl_classe` ON `tbl_classe`.`id_classe` = `tbl_alumne`.`classe`");
                    $total = mysqli_query ($conexion,"SELECT `tbl_alumne`.`dni_alu`,`tbl_alumne`.`nom_alu`,`tbl_alumne`.`cognom1_alu`,`tbl_alumne`.`cognom2_alu`,`tbl_alumne`.`telf_alu`,`tbl_alumne`.`email_alu`,`tbl_classe`.`codi_classe` FROM `tbl_alumne` INNER JOIN `tbl_classe` ON `tbl_classe`.`id_classe` = `tbl_alumne`.`classe`");
                    $cantidadRegistros=mysqli_num_rows($result);
                    $cantidadRegistrosTotal=mysqli_num_rows($total);
                }
                //mostrar datos
                foreach ($result as $user) {
                    echo "<tr>";
                    echo "<td>{$user['nom_alu']}</td>";
                    echo "<td>{$user['cognom1_alu']}</td>";
                    echo "<td>{$user['cognom2_alu']}</td>";
                    echo "<td>{$user['telf_alu']}</td>";
                    echo "<td>{$user['dni_alu']}</td>";
                    echo "<td>{$user['email_alu']}</td>";
                    echo "<td>{$user['codi_classe']}</td>";
                    //modificar alu
                    echo "<form method='GET' action='modalu.php'>";
                    echo "<input type='hidden' name='id' value='$user[id_alumne]'>";
                    echo "<td><button class='btnCRUD' type='submit' value='Modificar'><i class='fas fa-edit fa-2x'></i></button></td>";
                    echo "</form>";
                    //eliminar alu
                    echo "<form method='GET' action='../process/eliminaralu.php'>";
                    echo "<input type='hidden' name='id' value='$user[id_alumne]'>";
                    echo "<td><button class='btnCRUD' type='submit' onclick=\"return confirm('¿Seguro que quieres eliminar?')\"><i class='fas fa-trash fa-2x'></i></button></td>";
                    echo "</form>";
                    echo "</tr>";
                }
                ?>
            </table><br>
            <?php echo 'Se han encontrado '.$cantidadRegistros.' registro/s de '.$cantidadRegistrosTotal.'.'; ?>
            </div><br>
            <form action="../process/exportcsvalu.php" method="POST">
            <input class="csv" type='submit' value='Exportar a CSV'/>
            </form>
        </div>
        <!--tabla donde se muestran los profes-->
        <div id="profe" class="tabcontent ocultar">
            <div class="añadir">
                <a href="crearprofe.php"><button type="button">Añadir profesor</button></a>
            </div>
            <div class="tabla">
            <table class="centrarTabla">
                <tr>
                    <th>Nombre</th>
                    <th>Primer apellido</th>
                    <th>Segundo apellido</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Departamento</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
                <?php
                $result2 = mysqli_query($conexion,"select * from tbl_professor");
                //filtrar 
                if (isset($_REQUEST['filtro'])) {
                    $titulo=$_REQUEST['titulo'];
                    $result2 = mysqli_query($conexion,"SELECT `id_professor`,`nom_prof`,`cognom1_prof`,`cognom2_prof`,`telf`,`email_prof`,`tbl_dept`.`nom_dept` FROM `tbl_professor` INNER JOIN `tbl_dept` ON `tbl_dept`.`id_dept` = `tbl_professor`.`dept` WHERE `nom_prof` LIKE '%$titulo%' OR `id_professor` LIKE '%$titulo%' OR `cognom1_prof` LIKE '%$titulo%' OR `cognom2_prof` LIKE '%$titulo%' OR `telf` LIKE '%$titulo%' OR `email_prof` LIKE '%$titulo%' OR `nom_dept` LIKE '%$titulo%' ORDER BY id_professor ASC");
                    $total2=mysqli_query($conexion,"SELECT * FROM `tbl_professor` INNER JOIN `tbl_dept` ON `tbl_dept`.`id_dept` = `tbl_professor`.`dept`");
                    $cantidadRegistros2=mysqli_num_rows($result2);
                    $cantidadRegistrosTotal2=mysqli_num_rows($total2);
                }else{
                    $result2 = mysqli_query($conexion,"SELECT `id_professor`,`nom_prof`,`cognom1_prof`,`cognom2_prof`,`telf`,`email_prof`,`tbl_dept`.`nom_dept` FROM `tbl_professor` INNER JOIN `tbl_dept` ON `tbl_dept`.`id_dept` = `tbl_professor`.`dept` ORDER BY id_professor ASC");
                    $total2=mysqli_query($conexion,"SELECT * FROM `tbl_professor` INNER JOIN `tbl_dept` ON `tbl_dept`.`id_dept` = `tbl_professor`.`dept`");
                    $cantidadRegistros2=mysqli_num_rows($result2);
                    $cantidadRegistrosTotal2=mysqli_num_rows($total2);
                }
                //mostrar datos
                foreach ($result2 as $user2) {
                    echo "<tr>";
                    echo "<td>{$user2['nom_prof']}</td>";
                    echo "<td>{$user2['cognom1_prof']}</td>";
                    echo "<td>{$user2['cognom2_prof']}</td>";
                    echo "<td>{$user2['telf']}</td>";
                    echo "<td>{$user2['email_prof']}</td>";
                    echo "<td>{$user2['nom_dept']}</td>";
                    //modificar profe
                    echo "<form method='GET' action='modprofe.php'>";
                    echo "<input type='hidden' name='id2' value='$user2[id_professor]'>";
                    echo "<td><button class='btnCRUD' type='submit' value='Modificar'><i class='fas fa-edit fa-2x'></i></button></td>";
                    echo "</form>";
                    //eliminar profe
                    echo "<form method='GET' action='../process/eliminarprofe.php'>";
                    echo "<input type='hidden' name='id2' value='$user2[id_professor]'>";
                    echo "<td><button class='btnCRUD' type='submit' onclick=\"return confirm('¿Seguro que quieres eliminar?')\"><i class='fas fa-trash fa-2x'></i></button></td>";
                    echo "</form>";
                    echo "</tr>";
                }
                ?>
            </table><br>
            <?php echo 'Se han encontrado '.$cantidadRegistros2.' registro/s de '.$cantidadRegistrosTotal2.'.'; ?>
            </div><br>
            <form action="../process/exportcsvprof.php" method="POST">
            <input class="csv" type='submit' value='Exportar a CSV'/>
            </form>
        </div>
    </div>
</body>
</html>