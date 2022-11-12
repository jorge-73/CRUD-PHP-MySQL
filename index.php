<?php include('./db.php'); ?>
<?php include('./includes/header.php'); ?>

<div class="container p-4">
  
  <div class="row">

    <div class="col-md-4">

      <?php if(isset($_SESSION['mensaje'])) { ?>
        <div class="alert alert-<?php echo $_SESSION['tipo_mensaje'] ?> alert-dismissible fade show" role="alert"><?php echo $_SESSION['mensaje'] ?><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
      <?php session_unset(); } ?>

      <div class="card card-body">
        <form action="./guardar_tareas.php" method="post">
          <div class="mb-3">
            <label for="title" class="form-label">Titulo: </label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Título" required>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción: </label>
            <textarea rows="5" name="descripcion" id="descripcion" class="form-control" placeholder="Descripción" required></textarea>
          </div>
          <input type="submit" value="Enviar Tareas" class="btn btn-outline-success form-control" name="save_tarea">
        </form>
      </div>
    </div>

    <div class="col-md-8">

      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                  <th scope="col">Titulo</th>
                  <th scope="col">Descripción</th>
                  <th scope="col">Fecha</th>
                  <th scope="col">Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $query = "SELECT * FROM tareas";
                $resultado = mysqli_query($conn, $query);
                while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                <tr>
                  <td><?php echo $fila['titulo']; ?></td>
                  <td><?php echo $fila['descripcion']; ?></td>
                  <td><?php echo $fila['fecha']; ?></td>
                  <td>
                    <a href="./editar_tarea.php?id=<?php echo $fila['id']; ?>" class="btn btn-secondary">
                      <i class="fa-solid fa-pen-to-square"></i>
                    </a> 
                    <a href="./eliminar_tarea.php?id=<?php echo $fila['id']; ?>" class="btn btn-danger">
                      <i class="fa-solid fa-trash-can"></i>
                    </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
      
  </div>

</div>

<?php include('./includes/footer.php'); ?>