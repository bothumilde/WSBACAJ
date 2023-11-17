<?php
include('connection.php');
$con = connection();

// Función para obtener todos los registros desde PHP y convertirlos a JSON
function obtenerRegistrosJSON($con) {
    $registros = [];
    $sql = "SELECT * FROM `info_stock`;";
    $result = mysqli_query($con, $sql);
    while ($mostrar = mysqli_fetch_assoc($result)) {
        $registros[] = $mostrar;
    }
    return json_encode($registros);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="css/style_retirar.css">
    <link rel="stylesheet" href="css/inventario.css">
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

    <h2 style="text-align: center;">INVENTARIO ACTUAL</h2>
            <br>
            
            <div >
            <table id="tabla-exterior">
                <thead>
                    <tr>
                        <th data-data="ID">ID</th>
                        <th data-data="Familia">Familia</th>
                        <th data-data="Subfamilia">Subfamilia</th>
                        <th data-data="Stock_KG">Stock_KG</th>
                        <th data-data="Stock_UND">Stock_UND</th>
                        <th data-data="Ubicacion_Paleta">Ubicación_Paleta</th>
                        <th data-data="Proveedor">Proveedor</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `info_stock`;";
                        $result=mysqli_query($con,$sql);
                        while($mostrar=mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $mostrar['ID']?></td>
                            <td><?php echo $mostrar['Familia']?></td>
                            <td><?php echo $mostrar['Subfamilia']?></td>
                            <td><?php echo $mostrar['Stock_KG']?></td>
                            <td><?php echo $mostrar['Stock_UND']?></td>
                            <td><?php echo $mostrar['Ubicacion_Paleta']?></td>
                            <td><?php echo $mostrar['Proveedor']?></td>
                        </tr>
                    <?php
                    }
                    ?>              
                    </tbody>
                </table>
            </div>
            <button>
                <a href="exportarinventario.php" target="_blank">Exportar a Excel</a>
            </button>
            <button class="retirarbtn"><a href="modificar.php" target="_blank">Modificar Cantidad</a></button>
            <button class="retirarbtn"><a href="modificar2.php" target="_blank">Modificar ubicación/proveedor</a></button>
            <script>
            $(document).ready(function () {
            $('#tabla-exterior').DataTable({
                "ajax": "tablastock.php",
                "columns": [
                    { "data": "ID" },
                    { "data": "Familia" },
                    { "data": "Subfamilia" },
                    { "data": "Stock_KG" },
                    { "data": "Stock_UND" },
                    { "data": "Ubicacion_Paleta" },
                    { "data": "Proveedor" }
                ],
                "columnDefs": [
                    {
                        "targets": 3, // La columna Stock_KG es la cuarta columna (0-indexed)
                        "render": function (data, type, row) {
                            return parseFloat(data).toFixed(2); // Convierte a float y muestra con 2 decimales
                        }
                    }
                ]
            });

            // Obtener los registros desde PHP y pasarlos a JavaScript
            var registros = <?php echo obtenerRegistrosJSON($con); ?>;

            // Verificar si hay algún registro con valor menor o igual a 2 en Stock_KG o Stock_UND
            for (var i = 0; i < registros.length; i++) {
                if (registros[i].Stock_KG <= 2) {
                    alert('¡Alerta! Hay al menos un registro con valor menor o igual a 2 en Stock_KG.');
                    break;
                }
            }
        });
        </script>
</body>
</html>
