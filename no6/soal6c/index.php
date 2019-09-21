<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Crud Dinamis</title>
</head>

<body>
  <!-- Image and text -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="img/logo.svg" alt="">
      <span>Arcademy bootcamp</span>
    </a>
  </nav>

  <div class="container mt-4">
    <!-- ADD BUTTON -->
    <button type="button" class="btn btn-warning tombol float-right" data-toggle="modal" data-target="#addForm">ADD</button>

    <table class="table table-bordered">
      <thead class="thead-light text-center">
        <tr>
          <th>Name</th>
          <th>Work</th>
          <th>Salary</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php
        include_once('proses/config.php');
        $sql = "SELECT `nama`.`id_nama`, `nama`.`nama`, `work`.`namaw`, `salary`.`salary` FROM `nama`
        INNER JOIN `work` ON (`nama`.`id_work` = `work`.`id_work`)
        INNER JOIN `salary`ON (`nama`.`id_salary` = `salary`.`id_salary`) AND (`work`.`id_salary` = `salary`.`id_salary`)
        ORDER BY nama";

        $query = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_array($query)) {
          echo '
        <tr>
          <td>' . $row['nama'] . '</td>
          <td>' . $row['namaw'] . '</td>
          <td>' . $row['salary'] . '</td>
          <td>
          <button style="background: transparent;border: none" nama=' . $row['nama'] . ' id=' . $row['id_nama'] . '
          data-target="#deleteForm" data-toggle="modal" class="idDel"><i class="far fa-trash-alt"></i>
          </button>

          <a href="#" class="edit_id" id=' . $row['id_nama'] . ' data-target="#editForm" data-toggle="modal">
          <i class="far fa-edit"></i></a>
          </td> 
        </tr>
        ';
        }
        ?>
      </tbody>
    </table>

    <!-- DELETE MODAL -->
    <div class="modal fade mt-5" id="deleteForm" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h6 class="modal-title">DELETE DATA</h6>
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>

          <form action="proses/delete.php" method="post">
            <div class="modal-body">
              <h6>Apakah anda yakin menghaspus data?</h6>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary tombol" data-dismiss="modal">CANCEL</button>
              <input type="hidden" name="delete_id">
              <input type="hidden" name="delete_nama">
              <button type="submit" class="btn btn-danger tombol" name="doDelete">
                DELETE</button>
            </div>
          </form>

        </div>
      </div>
    </div>



    <?php
    $qsel = mysqli_query($db, "SELECT * FROM work");
    ?>
    <!-- ADD MODAL -->
    <div class="modal fade mt-5" id="addForm" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h6 class="modal-title">ADD DATA</h6>
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>

          <form action="proses/add.php" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="text" name="nama" id="" class="form-control" required placeholder="Name ...">
              </div>
              <div class="form-group">
                <select name="work" id="work_id" class="form-control" required>
                  <option value="" disabled selected>Work ...</option>
                  <?php while ($r = mysqli_fetch_array($qsel)) { ?>
                    <option value="<?php echo $r['id_work'] ?>"><?php echo $r['namaw'] ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <select name="salary" id="salary_id" class="form-control" required>
                  <option value="" disabled selected>Salary ...</option>
                </select>
              </div>
            </div>

            <div class="modal-footer">
              <button name="add" type="submit" class="btn btn-warning tombol">ADD</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- EDIT MODAL -->
    <div class="modal fade mt-5" id="editForm" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <div class="modal-header">
            <h6 class="modal-title">EDIT DATA</h6>
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
          </div>

          <div id="formEdit"></div>

        </div>
      </div>
    </div>

  </div>





















  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="js/script.js"></script>

</body>

</html>