<?php 

include('./db.php');

if (isset($_POST['save_tarea'])) {
    $titulo = $_POST['title'];
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO `tareas`(`titulo`, `descripcion`) VALUES ('$titulo', '$descripcion')";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error Failed");
    }

    $_SESSION['mensaje'] = "Tarea guardada";
    $_SESSION['tipo_mensaje'] = "success";
    header("location: index.php");
}
?>