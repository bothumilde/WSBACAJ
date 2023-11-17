<?php
include('connection.php');
$con = connection();
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
<h2 style="text-align: center;">NUEVA CANTIDAD</h2>
<form id="mercaderiaForm" method="post" action="actualizar.php">
            <label id="identificador" style="display: inline;">ID:</label>
            <input type="number" id="identificador" name="identificador" min="1">
            <label for="radio_kg">Stock en KG:</label>
            <input type="radio" id="radio_kg" name="stock_type" value="kg">

            <label for="radio_und">Stock en UND:</label>
            <input type="radio" id="radio_und" name="stock_type" value="und">

            <label for="stock_kg" id="label_stock_kg" style="display: none;">Stock en KG:</label>
            <input type="text" id="stock_kg" name="stock_kg" style="display: none;">

            <label for="stock_und" id="label_stock_und" style="display: none;">Stock en UND:</label>
            <input type="text" id="stock_und" name="stock_und" style="display: none;">

            <input type="submit" value="Actualizar Registro">
</form>
<script>
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
</form>
