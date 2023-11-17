<?php
include('connection.php');
$con=connection();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    <h2 style="text-align: center;">ULTIMAS TRANSACCIONES</h2>
            <br>
            <div >
                <table id="tabla-exterior">
                    <thead>
                         <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Familia</th>
                        <th>Subfamilia</th>
                        <th>Ubicacion_Paleta</th>
                        <th>Proveedor</th>
                        <th>Stock_KG</th>
                        <th>Stock_UND</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `info_historial`;";
                        $result=mysqli_query($con,$sql);
                        while($mostrar=mysqli_fetch_array($result)){
                        ?>
                        <tr>
                            <td><?php echo $mostrar['ID']?></td>
                            <td><?php echo $mostrar['Fecha']?></td>
                            <td><?php echo $mostrar['Familia']?></td>
                            <td><?php echo $mostrar['Subfamilia']?></td>
                            <td><?php echo $mostrar['Ubicacion_Paleta']?></td>
                            <td><?php echo $mostrar['Proveedor']?></td>
                            <td><?php echo $mostrar['Stock_KG']?></td>
                            <td><?php echo $mostrar['Stock_UND']?></td>
                        </tr>
                    <?php
                    }
                    ?>              
                    </tbody>
                </table>
                </div>
            <button>
                <a href="exportarhistorial.php" target="_blank">Exportar a Excel</a>
            </button>
</body>
</html>