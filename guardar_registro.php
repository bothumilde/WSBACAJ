<?php
include('connection.php');
$con = connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $familia = mysqli_real_escape_string($con, $_POST['familia']);
    $subfamilia = mysqli_real_escape_string($con, $_POST['subfamilia']);
    $ubicacion_paleta = mysqli_real_escape_string($con, $_POST['paleta']);
    $proveedor = mysqli_real_escape_string($con, $_POST['proveedor']);
    $stock_kg = isset($_POST['stock_kg']) ? floatval($_POST['stock_kg']) : null;
    $stock_und = isset($_POST['stock_und']) ? intval($_POST['stock_und']) : null;

    if (!empty($familia) && !empty($subfamilia) && !empty($ubicacion_paleta) && !empty($proveedor)) {
        // Agrega la lógica para manejar la fecha aquí si es necesario.

        // Insertar datos en la tabla historial utilizando una sentencia preparada
        $insertQuery = "INSERT INTO stock (familia, subfamilia, ubicacion_paleta, proveedor, stock_kg, stock_und) 
                        VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $insertQuery);
        mysqli_stmt_bind_param($stmt, "ssssdd", $familia, $subfamilia, $ubicacion_paleta, $proveedor, $stock_kg, $stock_und);

        if (mysqli_stmt_execute($stmt)) {
            echo "Registro insertado correctamente en tabla stock.";
            header("refresh: 2; URL=agregar.php"); // Redirige a agregar.php después de 2 segundos
        } else {
            echo "Error al insertar el registro en tabla stock: " . mysqli_stmt_error($stmt);
            header("refresh: 2; URL=agregar.php"); // Redirige a agregar.php después de 2 segundos
        } 
        }
    }
?>