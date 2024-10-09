<?php
include 'conn.php';
$id_peserta = $_POST['id_peserta'] ?? die('id_peserta tidak ditemukan');
$kolom = $_POST['kolom'] ?? die('kolom tidak ditemukan');
$new_value = $_POST['new_value'] ?? die('new_value tidak ditemukan');

$s = "UPDATE tb_peserta SET $kolom='$new_value' WHERE id=$id_peserta";
$q = mysqli_query($cn, $s) or die(mysqli_error($cn));
echo 'sukses';
