<?php
include('config.php');
$id = $_POST['edit_id'];
$sql = "SELECT * FROM nama WHERE id_nama = $id";
$q_nama = mysqli_query($db, $sql);
$r_nama = mysqli_fetch_assoc($q_nama);

?>

<form action="proses/update.php" method="post">
  <div class="modal-body">
    <div class="form-group">
      <input type="hidden" name="id" value="<?php echo $r_nama['id_nama'] ?>">
      <input type="text" name="nama" id="" class="form-control" value="<?php echo $r_nama['nama'] ?>" required placeholder="Name ...">
    </div>
    <div class="form-group">
      <select name="work" id="wrk" class="form-control" required>
        <option value="" disabled>Work ...</option>
        <?php
        $q_work = mysqli_query($db, "SELECT * FROM work");
        while ($r_work = mysqli_fetch_array($q_work)) {
          if ($r_nama['id_work'] == $r_work['id_work']) {
            echo '<option selected value="' . $r_work['id_work'] . '">' . $r_work['namaw'] . '</option>';
          } else {
            echo '<option value="' . $r_work['id_work'] . '">' . $r_work['namaw'] . '</option>';
          }
        }
        ?>
      </select>
    </div>
    <div class="form-group">
      <select name="salary" id="sal" class="form-control" required>
        <option value="" disabled>Salary ...</option>
        <?php
        $q_sal = mysqli_query($db, "SELECT * FROM salary");
        while ($r_salary = mysqli_fetch_array($q_sal)) {
          if ($r_nama['id_salary'] == $r_salary['id_salary']) {
            echo '<option selected value="' . $r_salary['id_salary'] . '">' . $r_salary['salary'] . '</option>';
          }
        }
        ?>
      </select>
    </div>
  </div>

  <div class="modal-footer">
    <button type="submit" name="update" class="btn btn-warning tombol">EDIT</button>
  </div>
</form>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('#wrk').change(function() { // Jika select box id work dipilih
      let work_id = $(this).val(); // Ciptakan variabel work berisi id work yang dipilih
      $.ajax({
        type: 'POST', // Metode pengiriman data menggunakan POST
        url: 'proses/editSalary.php', // File yg akan pemroses data
        data: {
          wrk_id: work_id
        }, // ID yang akan dikirim ke file pemroses
        success: function(response) { // jika berhasil
          $('#sal').html(response); // berikan hasil ke id salary
        }
      });
    });
  });
</script>