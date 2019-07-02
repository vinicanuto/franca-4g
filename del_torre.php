<?php

require_once "../backend/db.inc.php";

$id = $_GET['id_torre'];

$sql = "delete from torre where id_torre = '$id';";

if ($conn->query($sql)) {
      echo "Record deleted successfully";
      header("location:torre.php");
   } else {
      echo "Error deleting record: " . mysqli_error($conn);
   }