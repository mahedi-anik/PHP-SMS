<?php
include "config.php";
$id = $_GET["id"];
$sql = "DELETE FROM `offer` WHERE offerid = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: offer.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}