<?php
include("../db_conn.php")
?>

<?php
$ID_maytinh = $_GET["ID_maytinh"];
$process = $_GET["process"];
?>

<?php if ($process == "xoamaytinh") { ?>
<?php

  $sql = "DELETE FROM tinhtrangmaytinh WHERE ID_maytinh=:id";
  $stmt = $conn->prepare($sql);
  $stmt->execute([":id" => $ID_maytinh]);

?>

<?php
  $sql1 = "DELETE FROM maytinh WHERE ID_maytinh=:ids";
  $stmt1 = $conn->prepare($sql1);
  $stmt1->execute([":ids" => $ID_maytinh]);

  echo '
    <h2 style="text-align: center;">ĐÃ XÓA</h2>
  ';

?>
<?php } ?>
