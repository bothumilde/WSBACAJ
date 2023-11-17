<?php
include('connection.php');
$con=connection();
?>
<?php
// Nombre del archivo a exportar
$nombre_archivo = "INVENTARIO". ".xls";

// Establecer encabezados HTTP para descargar el archivo
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$nombre_archivo");
header("Pragma: no-cache");
header("Expires: 0");

echo "
<table border='1'>
    <tr>
    <th>ID</th>
    <th>Familia</th>
    <th>Subfamilia</th>
    <th>Ubicacion_Paleta</th>
    <th>Proveedor</th>
    <th>Stock_KG</th>
    <th>Stock_UND</th>
    </tr>";

$sql = "SELECT * FROM `info_stock`;";
$result=mysqli_query($con,$sql);
while($mostrar=mysqli_fetch_array($result)){
    echo "
    <tr>
    <td>".$mostrar['ID']."</td>
        <td>".$mostrar['Familia']."</td>
        <td>".$mostrar['Subfamilia']."</td>
        <td>".$mostrar['Ubicacion_Paleta']."</td>
        <td>".$mostrar['Proveedor']."</td>
        <td>".$mostrar['Stock_KG']."</td>
        <td>".$mostrar['Stock_UND']."</td>
    </tr>";
}
echo "</table>";
?>