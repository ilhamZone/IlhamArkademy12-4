// Ajax untuk Salary option add
$(document).ready(function () {
  $('#work_id').change(function () { // Jika select box id work dipilih
    let work_id = $(this).val(); // Ciptakan variabel work berisi id work yang dipilih
    $.ajax({
      type: 'POST', // Metode pengiriman data menggunakan POST
      url: 'proses/addSalary.php', // File yg akan pemroses data
      data: { wk_id: work_id }, // ID yang akan dikirim ke file pemroses
      success: function (response) { // jika berhasil
        $('#salary_id').html(response); // berikan hasil ke id salary
      }
    });
  });
});

// pass id to file edit
$(document).ready(function () {
  $('a.edit_id').click(function () { 
    let id = $(this).attr('id');
    $.ajax({
      type: "POST",
      url: "proses/edit.php",
      data: { edit_id : id},
      success: function (response) {
        $('#formEdit').html(response);
      }
    });
  });
});


// passing id delete to modal
$(document).ready(function () {
  $('button.idDel').click(function () { // ketika button delete diklik 
   $('input[name="delete_id"]').val($(this).attr('id')); // kirim id ke modul input
   $('input[name="delete_nama"]').val($(this).attr('nama')); // kirim nama
  });
});
