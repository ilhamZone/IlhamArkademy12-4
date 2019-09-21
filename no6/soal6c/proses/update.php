<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css">
<style>
  .ceklis h4 {
    margin-bottom: 50px;
  }

  .ceklis i {
    color: #1dcfa8;
    margin-top: 50px;
    margin-bottom: 20px;
  }

  .ceklis span {
    color: red;
    font-size: 40px
  }
</style>

<?php
include_once('config.php');

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $nama = $_POST['nama'];
  $work = $_POST['work'];
  $salary = $_POST['salary'];

  $sql_up = "UPDATE nama SET nama='$nama', id_work='$work', id_salary='$salary' WHERE id_nama=$id ";
  $q_update = mysqli_query($db, $sql_up);

  if ($q_update) {
    ?>
    <div class="modal fade" id="popUp" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body text-center ceklis">
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
            <i class="fa-5x fas fa-check-circle"></i>
            <h4>Data <?php echo $nama; ?> berhasil diupdate.</h4>
          </div>
        </div>
      </div>
    </div>

<?php
  } else {
    die('<script>alert("Data Gagal Update")</script>');
  }
} else {
  echo 'Ndak Sobok';
}
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
  // Show and Hide Modal Delete Succes
  $('#popUp').modal('show');
  setTimeout(function() {
    $('#popUp').on('hidden.bs.modal');
    document.location.href = '../index.php';
  }, 2500);
</script>