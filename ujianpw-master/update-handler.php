<?php 

  include "./dbconnect.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $k->real_escape_string($_POST["id"]);
    $nim = $k->real_escape_string($_POST['nim']);
    $name = $k->real_escape_string($_POST['name']);
    $jenis_kelamin = $k->real_escape_string(intval($_POST['jenis_kelamin']));
    $alamat = $k->real_escape_string($_POST['alamat']);
    $program_studi = $k->real_escape_string($_POST['program_studi']);

    $sql = "UPDATE mahasiswa SET nim=?, nama=?, jenis_kelamin=?, alamat=?, program_studi=? WHERE id=?";
    $stmnt = $k->prepare($sql);

    // Bind parameters to the prepared statement
    $stmnt->bind_param("ssissi", $nim, $name, $jenis_kelamin, $alamat, $program_studi, $id);

    if ($stmnt->execute()) {
      echo "Record updated successfully";

      $redirect_url = '/ujianpw-master/?page=success';
      header('Location: ' . $redirect_url);
      exit();
    } else {
      echo "Error: " . $stmnt->error;
    }
    
    $stmnt->close();
  };

  if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $id = $k->real_escape_string($_POST['id']);

    $sql = "DELETE FROM mahasiswa WHERE id='$id'";
    $stmnt = $k->prepare($sql);
    
    if ($stmnt->execute()) {
      echo "Delete Success";
    } else {
      echo "Error: " . $sql . "<br>" . $k->error;
    }

  }

  $k->close();

?>