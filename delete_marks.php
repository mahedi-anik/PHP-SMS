<?php
include "config.php";
$id = $_GET["id"];
$sql = "DELETE FROM `exammarks` WHERE exammarksid = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: session.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}