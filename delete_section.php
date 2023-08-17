<?php
include "config.php";
$id = $_GET["id"];
$sql = "DELETE FROM `section` WHERE sectionid = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: section.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}