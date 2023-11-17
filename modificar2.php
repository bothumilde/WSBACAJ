<?php
include('connection.php');
$con = connection();

// Consultas para obtener datos de las tablas
$paletaQuery = "SELECT * FROM paleta";
$proveedorQuery = "SELECT * FROM proveedor";

// Ejecutar consultas
$paletaResult = mysqli_query($con, $paletaQuery);
$proveedorResult = mysqli_query($con, $proveedorQuery);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style_retirar.css">
    <link rel="stylesheet" href="css/style_agregar.css">
</head>
<body>
<header class="header">
    <div class="menu container">
        <a href="index.php" class="logo">WSBACAJ</a>
        <input type="checkbox" id="menu" />
        <label for="menu">
            <img src="images/menu.png" class="menu-icono" alt="menu">
        </label>
        <nav class="navbar">
            <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="agregar.php">Agregar</a></li>
            <li><a href="ultimos.php">Historial</a></li>
            <li><a href=#>Chakipá App</a></li>
            </ul>
        </nav>
    </div>
</header>
<h2 style="text-align: center;">NUEVA UBICACIÓN/PROVEEDOR</h2>
<form id="mercaderiaForm" method="post" action="actualizar2.php">
            <label id="identificador" style="display: inline;">ID:</label>
            <input type="number" id="identificador" name="identificador" min="1">
            
            <label for="paleta">Ubicacion Paleta:</label>
            <select id="paleta" name='paleta'>
                <option value="">Escoge una ubicación física</option>
                <?php while ($row = mysqli_fetch_assoc($paletaResult)): ?>
                    <option value="<?php echo $row['idPaleta']; ?>"><?php echo $row['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
            <label for="proveedor">Proveedor:</label>
            <select id="proveedor" name='proveedor'>
                <option value="">Seleccione proveedor</option>
                <?php while ($row = mysqli_fetch_assoc($proveedorResult)): ?>
                    <option value="<?php echo $row['idProveedor']; ?>"><?php echo $row['nombre']; ?></option>
                <?php endwhile; ?>
            </select>
            <input type="submit" value="Actualizar Registro">
</form>
<script>

</script>
</form>
