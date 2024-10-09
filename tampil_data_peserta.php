<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php
include 'sib-styles.php';
include 'editable-script.php';

# ============================================================
# PROCESSORS
# ============================================================
if (isset($_POST['btn_delete'])) {
  echo '<pre>';
  var_dump($_POST);
  echo '</pre>';

  $id = $_POST['btn_delete'];

  // perintah delete
  $s = "DELETE FROM tb_peserta WHERE id=$id";
  $q = mysqli_query($cn, $s) or die(mysqli_error($cn));

  echo "<div class='alert alert-success'>Data berhasil dihapus</div>";

  echo "
    <script>
      location.replace('index.php');
    </script>
  ";
}

# ============================================================
# TAMPIL DATA
# ============================================================
$s = "SELECT * FROM tb_peserta";
$q = mysqli_query($cn, $s) or die(mysqli_error($cn));

$tr = '';
$i = 0;
while ($d = mysqli_fetch_assoc($q)) {
  $i++;
  $id_peserta = $d['id'];
  $tr .= "
    <tr>
      <td>$i</td>
      <td class=editable id=nama__$id_peserta>$d[nama]</td>
      <td class=editable id=ip_address__$id_peserta>$d[ip_address]</td>
      <td class=editable id=tipe_gadget__$id_peserta>$d[tipe_gadget]</td>
      <td>$d[date_created]</td>
      <td>
        <form method=post style='display: inline'>
          <button onclick='return confirm(`Yakin untuk delete?`)' class='btn btn-sm btn-danger' value=$d[id] name=btn_delete>Delete</button> 
        </form>
      </td>
    </tr>
  ";
}

echo "
  <div class='container'>
    <h1>Data Peserta PMB</h1>
    <table class='table table-striped table-hover'>
      <thead>
        <th>No</th>
        <th>Nama</th>
        <th>IP Address</th>
        <th>Tipe Gadget</th>
        <th>Date Created</th>
        <th>Aksi</th>
      </thead>
      $tr
    </table>
  </div>
";
