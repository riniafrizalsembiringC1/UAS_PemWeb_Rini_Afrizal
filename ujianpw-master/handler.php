<?php 

  include "dbconnect.php";


  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nim = $k->real_escape_string($_POST['nim']);
    $name = $k->real_escape_string($_POST['name']);
    $jenis_kelamin = $k->real_escape_string(intval($_POST['jenis_kelamin']));
    $alamat = $k->real_escape_string($_POST['alamat']);
    $program_studi = $k->real_escape_string($_POST['program_studi']);

    $sql = "INSERT INTO mahasiswa (nim, nama, jenis_kelamin, alamat, program_studi) VALUES ('$nim', '$name', $jenis_kelamin, '$alamat', '$program_studi')";
    $sttment = $k->prepare($sql);

    
    if ($sttment->execute()) {
      echo "New record created successfully";

      $redirect_url = '/ujianpw-master/?page=success';
      header('Location: ' . $redirect_url);
      exit();
    } else {
      echo "Error: " . $sql . "<br>" . $k->error;
    }
  }
?>