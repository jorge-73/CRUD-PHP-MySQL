<?php include('./db.php'); ?>
<?php include('./includes/header.php'); ?>

<div class="container p-4">
  
  <div class="row">

    <div class="col-md-4">

      <?php if(isset($_SESSION['mensaje'])) { ?>
        <div class="alert alert-<?php $_SESSION['tipo_mensaje'] ?>" role="alert">
            <?php $_SESSION['mensaje'] ?>
        </div>
      <?php } ?>
      <div class="card card-body">
        <form action="./guardar_tareas.php" method="post">
          <div class="mb-3">
            <label for="title" class="form-label">Titulo: </label>
            <input type="text" name="title" id="title" class="form-control" placeholder="Título" required>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción: </label>
            <textarea rows="5" name="descripcion" id="descripcion" class="form-control" placeholder="Título" required></textarea>
          </div>
          <input type="submit" value="Enviar Tareas" class="btn btn-outline-success form-control" name="save_tarea">
        </form>
      </div>
    </div>

    <div class="col-md-8">

      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Column 1</th>
                  <th scope="col">Column 2</th>
                  <th scope="col">Column 3</th>
                  <th scope="col">Column 4</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>R1C1</td>
                  <td>R1C2</td>
                  <td>R1C3</td>
                  <td>R1C4</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
      
  </div>

</div>

<?php include('./includes/footer.php'); ?>