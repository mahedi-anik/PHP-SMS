<?php
include "config.php";
$id = $_GET["id"];
$sql = "DELETE FROM `grades` WHERE gradeid = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: grades.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}