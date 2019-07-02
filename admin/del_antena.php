<?php

require_once "../backend/db.inc.php";

$id = $_GET['id'];

$sql = "delete from antena where id_antena = '$id';";

if ($conn->query($sql)) {
      echo "Record deleted successfully";
      header("location:antena.php");
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }