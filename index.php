<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_retirar.css">
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
    <div class="header-content container">
        <div class="header-txt">
            <h1>INVENTARIO</h1>
            <p>
            Da click en 'Consultar' para visualizar de una manera
            más completa las reservas actuales antes de realizar 
            cualquier transacción en este sistema.
            </p>
            <a href="inventario.php" class="btn-1">Consultar</a>
        </div>
        <div class="header-img">
            <img src="images/left.png" alt="">

        </div>
    </div>

    <footer class="footer">

        <div class="footer-content container">
            <div class="link">
                <ul>
                    <li>v1.0</li>
                </ul>
            </div>
        </div>
    </footer>

    <script>
        function myfunction(){
            window.location.href="http://localhost/alterpagina"
        }
    </script>
</body>
</html>