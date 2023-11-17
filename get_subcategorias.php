<?php
include('connection.php');
$con = connection();
if (isset($_POST['familia'])) {
    $categoriaSeleccionada = $_POST['familia'];
    // Use prepared statements to prevent SQL injection
    $query = "SELECT idSubfamilia, nombre FROM subfamilia WHERE familia = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("i", $categoriaSeleccionada);
    $stmt->execute();
    $result = $stmt->get_result();
    $subcategorias = array();

    while ($row = $result->fetch_assoc()) {
        $subcategorias[] = $row;
    }
    echo json_encode($subcategorias);
} else {
    // Handle cases when no category is provided or other errors.
    echo json_encode([]);
}
?>
