<?php
include("../db_conn.php")
?>
<?php
$process = $_GET["process"];
if ($process = "themmaytinh") { ?>

  <?php
  $ID_phong = $_GET["ID_phong"];
  $cpuAdd = $_GET["cpuAdd"];
  $gpuAdd = $_GET["gpuAdd"];
  $ramAdd = $_GET["ramAdd"];
  $osAdd = $_GET["osAdd"];
  $diskAdd = $_GET["diskAdd"];
  $mainboardAdd = $_GET["mainboardAdd"];
  $displayAdd = $_GET["displayAdd"];
  $mouseAdd = $_GET["mouseAdd"];
  $keyboardAdd = $_GET["keyboardAdd"];
  $numberOfComputer = $_GET["numberOfComputer"];
  $dateAdd = $_GET["dateAdd"];
  ?>

  <?php
  $sql = "INSERT INTO maytinh (somay, Ngay_mua_maytinh, ID_phong, cpu, gpu, ram, ocung, mainboard, os, manhinh, banphim, chuot) VALUES (:numberOfComputer, :dateAdd, :ID_phong, :cpuAdd, :gpuAdd, :ramAdd, :diskAdd, :mainboardAdd, :osAdd, :displayAdd, :keyboardAdd, :mouseAdd)";

  $stmt = $conn->prepare($sql);

  $stmt->execute(["numberOfComputer" => $numberOfComputer, "dateAdd" => $dateAdd, "ID_phong" => $ID_phong, "cpuAdd" => $cpuAdd, "gpuAdd" => $gpuAdd, "ramAdd" => $ramAdd, "diskAdd" => $diskAdd, "mainboardAdd" => $mainboardAdd, "osAdd" => $osAdd, "displayAdd" => $displayAdd, "keyboardAdd" => $keyboardAdd, "mouseAdd" => $mouseAdd]);

  $getid = $conn->query("SELECT ID_maytinh FROM maytinh ORDER BY ID_maytinh DESC LIMIT 1");
  $getidmaytinhmoi = $getid->fetch(PDO::FETCH_ASSOC);

  $idmaymoi = $getidmaytinhmoi["ID_maytinh"];
  $tinhtrang = 1;

  $sql2 = "INSERT INTO tinhtrangmaytinh (ID_maytinh, ngay, tinhtrang) VALUES (:ID_maytinh, :dateAdd, :tinhtrang)";

  $stmt2 = $conn->prepare($sql2);

  $stmt2->execute(["ID_maytinh" => $idmaymoi, "dateAdd" => $dateAdd, "tinhtrang" => $tinhtrang]);

  echo '<h2 style="text-align: center;">ĐÃ THÊM</h2>';

  ?>

<?php } ?>