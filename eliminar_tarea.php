<?php
include('./db.php');

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "DELETE FROM tareas WHERE id = $id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query Failed");
    }

    $_SESSION['mensaje'] = "Tarea eliminada";
    $_SESSION['tipo_mensaje'] = "danger";
    header("location: index.php");
}
?>