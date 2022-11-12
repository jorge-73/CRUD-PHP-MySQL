<?php
include('./db.php');

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = "SELECT * FROM tareas WHERE id = $id";
    $resultado = mysqli_query($conn, $query);
    if (mysqli_num_rows($resultado) == 1) {
        $fila = mysqli_fetch_array($resultado);
        $titulo_edit = $fila['titulo'];
        $descripcion_edit = $fila['descripcion'];
    }

    if (isset($_POST['edit_tarea'])) {
        $id = $_GET['id'];
        $edit_title = $_POST['edit_title'];
        $edit_descripcion = $_POST['edit_descripcion'];

        $query2 = "UPDATE tareas SET titulo = '$edit_title', descripcion = '$edit_descripcion' WHERE id = $id";
        mysqli_query($conn, $query2);
        $_SESSION['mensaje'] = "Tarea actualizada";
        $_SESSION['tipo_mensaje'] = "info";
        header("location: index.php");
    }
}
?>

<?php include('./includes/header.php'); ?>

            <div class="container p-4">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card card-body">
                            <form action="./editar_tarea.php?id=<?php echo $_GET['id'];?>" method="post">
                                <div class="mb-3">
                                    <label for="edit_title" class="form-label">Titulo: </label>
                                    <input type="text" name="edit_title" id="edit_title" value="<?php echo $titulo_edit; ?>" class="form-control" placeholder="Editar Título" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_descripcion" class="form-label">Descripción: </label>
                                    <textarea rows="5" name="edit_descripcion" id="edit_descripcion" class="form-control" placeholder="Editar Descripción" required><?php echo $descripcion_edit; ?></textarea>
                                </div>
                                    <input type="submit" value="Editar Tarea" class="btn btn-outline-success form-control" name="edit_tarea">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

    <?php include('./includes/footer.php'); ?>