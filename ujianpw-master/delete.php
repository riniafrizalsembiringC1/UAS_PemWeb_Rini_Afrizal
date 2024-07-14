<?php
include('dbconnect.php');

$id = $_GET['id'];
$query = "DELETE FROM mahasiswa WHERE id='$id'";
$k->query($query);

header('Location: index.php');
?>