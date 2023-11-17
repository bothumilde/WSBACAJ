<?php
include('connection.php');
$con = connection();

// Consultas para obtener datos de las tablas
$categoriaQuery = "SELECT * FROM familia";
$subcategoriaQuery = "SELECT * FROM subfamilia";
$paletaQuery = "SELECT * FROM paleta";
$proveedorQuery = "SELECT * FROM proveedor";


// Ejecutar consultas
$categoriaResult = mysqli_query($con, $categoriaQuery);
$subcategoriaResult = mysqli_query($con, $subcategoriaQuery);
$paletaResult = mysqli_query($con, $paletaQuery);
$proveedorResult = mysqli_query($con, $proveedorQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar</title>
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
<h2 style="text-align: center;">NUEVO REGISTRO</h2>
<form id="mercaderiaForm" method="post" action="guardar_registro.php">
            <label for="categoria">Familia:</label>
            <select id="categoria" name='familia' onchange="getSubcategorias()">
                <option value="">Seleccione una categoría</option>
                <?php while ($row = mysqli_fetch_assoc($categoriaResult)): ?>
                    <option value="<?php echo $row['idFamilia']; ?>"><?php echo $row['nombre']; ?></option>
                <?php endwhile; ?>
            </select>

            <label for="subcategoria">Subfamilia:</label>
            <select id="subcategoria" name="subfamilia">
                <option value="">Seleccione una subcategoría</option>
                <?php while ($row = mysqli_fetch_assoc($subcategoriaResult)): ?>
                    <option value="<?php echo $row['idSubfamilia']; ?>"><?php echo $row['nombre']; ?></option>
                <?php endwhile; ?>
            </select>

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
            
            <label for="radio_kg">Stock en KG:</label>
            <input type="radio" id="radio_kg" name="stock_type" value="kg">
            <label for="radio_und">Stock en UND:</label>
            <input type="radio" id="radio_und" name="stock_type" value="und">

            <label for="stock_kg" id="label_stock_kg" style="display: none;">Stock en KG:</label>
            <input type="text" id="stock_kg" name="stock_kg" style="display: none;">
            <label for="stock_und" id="label_stock_und" style="display: none;">Stock en UND:</label>
            <input type="text" id="stock_und" name="stock_und" style="display: none;">
            
            <input type="submit" value="Guardar Registro">
</form>
<script>
function getSubcategorias() {
    var categoriaSeleccionada = $("#categoria").val();

    if (categoriaSeleccionada !== "") {
        $.ajax({
            type: "POST",
            url: "get_subcategorias.php",
            data: { familia: categoriaSeleccionada },
            dataType: "json",
            success: function(data) {
                var subcategoriaSelect = $("#subcategoria");
                subcategoriaSelect.empty();
                subcategoriaSelect.append($('<option>', {
                    value: '',
                    text: 'Seleccione una subcategoría'
                }));
                $.each(data, function(key, value) {
                    subcategoriaSelect.append($('<option>', {
                        value: value.idSubfamilia,
                        text: value.nombre
                    }));
                });
            },
            error: function(xhr, status, error) {
                console.log("Error en la solicitud AJAX: " + error);
            }
        });
    } else {
        // Handle the case when no category is selected, e.g., reset the subcategory select.
        var subcategoriaSelect = $("#subcategoria");
        subcategoriaSelect.empty();
        subcategoriaSelect.append($('<option>', {
            value: '',
            text: 'Seleccione una subcategoría'
        }));
    }
}
$(document).ready(function() {
    $("input[type='radio']").change(function() {
        if ($(this).val() === "kg") {
            $("#label_stock_kg").show();
            $("#stock_kg").show();
            $("#label_stock_und").hide();
            $("#stock_und").hide();
        } else if ($(this).val() === "und") {
            $("#label_stock_kg").hide();
            $("#stock_kg").hide();
            $("#label_stock_und").show();
            $("#stock_und").show();
        }
    });
});
</script>
</body>
</html>
