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
include('config.php');
if (isset($_POST['doDelete'])) {
  $id = $_POST['delete_id'];
  $nama = $_POST['delete_nama'];

  $qd = mysqli_query($db, "DELETE FROM nama WHERE id_nama=$id");
  if ($qd) {
    ?>
    <div class="modal fade" id="popDel" role="dialog">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body text-center ceklis">
            <button type="button" class="close" data-dismiss="modal">
              <span>&times;</span>
            </button>
            <i class="fa-5x fas fa-check-circle"></i>
            <h4>Data <?php echo $nama; ?> berhasil terhapus.</h4>
          </div>
        </div>
      </div>
    </div>

<?php
  } else {
    echo "<script>alert('Gagal Menghapus')</script>" . mysqli_error($qd);
  }
} else {
  die('Tidak Ditemukan ID');
}
?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
  // Show and Hide Modal Delete Succes
  $('#popDel').modal('show');
  setTimeout(function() {
    $('#popDel').on('hidden.bs.modal');
    document.location.href = '../index.php';
  }, 2500);
</script>