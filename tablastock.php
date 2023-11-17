<?php
include('connection.php');
$con = connection();

// Ejecuta la consulta SQL para obtener los datos de la base de datos
$sql = "SELECT * FROM `info_stock`";
$result = mysqli_query($con, $sql);

$data = array(); // Array para almacenar los datos

while ($row = mysqli_fetch_array($result)) {
    $data[] = array(
        "ID" => intval($row['ID']),
        "Familia" => $row['Familia'],
        "Subfamilia" => $row['Subfamilia'],
        "Ubicacion_Paleta" => $row['Ubicacion_Paleta'],
        "Proveedor" => $row['Proveedor'],
        "Stock_KG" => floatval($row['Stock_KG']),
        "Stock_UND" => intval($row['Stock_UND']),
    );
}

echo json_encode(array("data" => $data)); // Devuelve los datos en formato JSON
?>
