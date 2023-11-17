<?php
include('connection.php');
$con = connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener el valor del campo "identificador" del formulario
    $idStock = $_POST['identificador'];

    // Verificar si el valor es negativo
    if ($idStock < 0) {
        echo "El ID no puede ser un número negativo. Por favor, ingrese un valor válido.";
    } else {
        // Resto del código para procesar la actualización
        $paleta = $_POST['paleta'];
        $proveedor = $_POST['proveedor'];

        // Realizar la consulta de actualización
        $updateQuery = "UPDATE stock
                        SET ubicacion_paleta = ?, proveedor = ?
                        WHERE idStock = ?";

        $stmt = $con->prepare($updateQuery);

        // Vincular los parámetros
        $stmt->bind_param("ssi", $paleta, $proveedor, $idStock);

        if (mysqli_stmt_execute($stmt)) {
            echo "Registro actualizado correctamente en tabla stock.";
            header("refresh: 2; URL=modificar2.php"); // Redirige a agregar.php después de 2 segundos
        } else {
            echo "Error al actualizar el registro en tabla stock: " . mysqli_stmt_error($stmt);
            header("refresh: 2; URL=modificar2.php"); // Redirige a agregar.php después de 2 segundos
        } 
        $stmt->close();
    }
} else {
    echo "Acceso no permitido.";
}

$con->close();
?>
