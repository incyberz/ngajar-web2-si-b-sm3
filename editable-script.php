<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
  $(function() {
    // alert('halo JQuery')
    $('.editable').click(function() {
      // alert('halo');

      let value_asal = $(this).text();
      // alert('halo Anda mengklik ' + value_asal);

      let new_value = prompt('Masukkan nilai baru', value_asal);
      if (!new_value) return; // validasi jika user klik cancel
      if (value_asal == new_value) return; // validasi jika user klik OK tapi tidak ada perubahan
      // alert('Nilai baru adalah ' + new_value);

      // id_peserta
      let elemen_id = $(this).prop('id');
      // elemen_id = nama 10
      // elemen_id = [0]  [1]
      let tmp = elemen_id.split('__');
      let kolom = tmp[0];
      let id_peserta = tmp[1];
      // alert('id_peserta adalah ' + id_peserta);

      // ajax
      $.ajax({
        url: 'ajax_update_peserta.php',
        method: 'POST',
        data: {
          id_peserta: id_peserta,
          kolom: kolom,
          new_value: new_value
        },
        success: function(response) {
          if (response == 'sukses') {
            $('#' + elemen_id).text(new_value);
          } else {
            alert(response);

          }
        }
      }) // akhir dari ajax
    }) // akhir dari click method
  }) // akhir dari $(function()
</script>