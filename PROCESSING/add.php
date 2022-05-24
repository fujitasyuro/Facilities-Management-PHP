<?php
include("../db_conn.php")
?>
<?php
$process = $_GET["process"];
if ($process == "themmaytinh") { ?>

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

<?php } elseif ($process == "themquat") { ?>
  <?php
  $ID_phong = $_GET["ID_phong"];
  $ID_loaiquat = $_GET["loaiquat"];
  $Ten_quat = $_GET["tenquat"];
  $Ngay_mua_quat = $_GET["ngaymua"];
  ?>

  <?php
  $sql = "INSERT INTO quat (ID_loaiquat, Ten_quat, Ngay_mua_quat, ID_phong) VALUES (:loaiquat, :tenquat, :ngaymua, :ID_phong)";

  $stmt = $conn->prepare($sql);

  $stmt->execute(["loaiquat" => $ID_loaiquat, "tenquat" => $Ten_quat, "ngaymua" => $Ngay_mua_quat, "ID_phong" => $ID_phong]);

  $getid = $conn->query("SELECT ID_quat FROM quat ORDER BY ID_quat DESC LIMIT 1");
  $getidmoi = $getid->fetch(PDO::FETCH_ASSOC);

  $idmaymoi = $getidmoi["ID_quat"];
  $tinhtrang = 1;

  $sql2 = "INSERT INTO tinhtrangquat (ID_quat, ngay, tinhtrang) VALUES (:ID_moi, :dateAdd, :tinhtrang)";

  $stmt2 = $conn->prepare($sql2);

  $stmt2->execute(["ID_moi" => $idmaymoi, "dateAdd" => $Ngay_mua_quat, "tinhtrang" => $tinhtrang]);

  echo '<h2 style="text-align: center;">ĐÃ THÊM</h2>';

  ?>
<?php } elseif ($process == "themden") { ?>
  <?php
  $ID_phong = $_GET["ID_phong"];
  $Ten_den = $_GET["tenden"];
  $Ngay_mua_den = $_GET["ngaymua"];
  ?>

  <?php
  $sql = "INSERT INTO den (Ten_den, Ngay_mua_den, ID_phong) VALUES (:tenden, :ngaymua, :ID_phong)";

  $stmt = $conn->prepare($sql);

  $stmt->execute(["tenden" => $Ten_den, "ngaymua" => $Ngay_mua_den, "ID_phong" => $ID_phong]);

  $getid = $conn->query("SELECT ID_den FROM den ORDER BY ID_den DESC LIMIT 1");
  $getidmoi = $getid->fetch(PDO::FETCH_ASSOC);

  $idmaymoi = $getidmoi["ID_den"];
  $tinhtrang = 1;

  $sql2 = "INSERT INTO tinhtrangden (ID_den, ngay, tinhtrang) VALUES (:ID_moi, :dateAdd, :tinhtrang)";

  $stmt2 = $conn->prepare($sql2);

  $stmt2->execute(["ID_moi" => $idmaymoi, "dateAdd" => $Ngay_mua_den, "tinhtrang" => $tinhtrang]);

  echo '<h2 style="text-align: center;">ĐÃ THÊM</h2>';

  ?>
<?php } elseif ($process == "themmaylanh") { ?>
  <?php
  $ID_phong = $_GET["ID_phong"];
  $Ten_maylanh = $_GET["tenmaylanh"];
  $Ngay_mua_maylanh = $_GET["ngaymua"];
  ?>

  <?php
  $sql = "INSERT INTO maylanh (Ten_maylanh, Ngay_mua_maylanh, ID_phong) VALUES (:tenmaylanh, :ngaymua, :ID_phong)";

  $stmt = $conn->prepare($sql);

  $stmt->execute(["tenmaylanh" => $Ten_maylanh, "ngaymua" => $Ngay_mua_maylanh, "ID_phong" => $ID_phong]);

  $getid = $conn->query("SELECT ID_maylanh FROM maylanh ORDER BY ID_maylanh DESC LIMIT 1");
  $getidmoi = $getid->fetch(PDO::FETCH_ASSOC);

  $idmaymoi = $getidmoi["ID_maylanh"];
  $tinhtrang = 1;

  $sql2 = "INSERT INTO tinhtrangmaylanh (ID_maylanh, ngay, tinhtrang) VALUES (:ID_moi, :dateAdd, :tinhtrang)";

  $stmt2 = $conn->prepare($sql2);

  $stmt2->execute(["ID_moi" => $idmaymoi, "dateAdd" => $Ngay_mua_maylanh, "tinhtrang" => $tinhtrang]);

  echo '<h2 style="text-align: center;">ĐÃ THÊM</h2>';

  ?>
<?php } elseif ($process == "thembanghe") { ?>
  <?php
  $ID_phong = $_GET["ID_phong"];
  $Ten_banghe = $_GET["tenbanghe"];
  $Ngay_mua_banghe = $_GET["ngaymua"];
  $soluong = $_GET["soluong"];
  ?>

  <?php
  $sql = "INSERT INTO banghe (Ten_banghe, Ngay_mua_banghe, ID_phong, soluong) VALUES (:tenbanghe, :ngaymua, :ID_phong, :soluong)";

  $stmt = $conn->prepare($sql);

  $stmt->execute(["tenbanghe" => $Ten_banghe, "ngaymua" => $Ngay_mua_banghe, "ID_phong" => $ID_phong, "soluong" => $soluong]);

  $getid = $conn->query("SELECT ID_banghe FROM banghe ORDER BY ID_banghe DESC LIMIT 1");
  $getidmoi = $getid->fetch(PDO::FETCH_ASSOC);

  $idmaymoi = $getidmoi["ID_banghe"];
  $tinhtrang = 1;

  $sql2 = "INSERT INTO tinhtrangbanghe (ID_banghe, ngay, tinhtrang) VALUES (:ID_moi, :dateAdd, :tinhtrang)";

  $stmt2 = $conn->prepare($sql2);

  $stmt2->execute(["ID_moi" => $idmaymoi, "dateAdd" => $Ngay_mua_banghe, "tinhtrang" => $tinhtrang]);

  echo '<h2 style="text-align: center;">ĐÃ THÊM</h2>';

  ?>
<?php } elseif ($process == "themtivi") { ?>
  <?php
  $ID_phong = $_GET["ID_phong"];
  $Ten_tivi = $_GET["tentivi"];
  $Ngay_mua_tivi = $_GET["ngaymua"];
  ?>

  <?php
  $sql = "INSERT INTO tivi (Ten_tivi, Ngay_mua_tivi, ID_phong) VALUES (:tentivi, :ngaymua, :ID_phong)";

  $stmt = $conn->prepare($sql);

  $stmt->execute(["tentivi" => $Ten_tivi, "ngaymua" => $Ngay_mua_tivi, "ID_phong" => $ID_phong]);

  $getid = $conn->query("SELECT ID_tivi FROM tivi ORDER BY ID_tivi DESC LIMIT 1");
  $getidmoi = $getid->fetch(PDO::FETCH_ASSOC);

  $idmaymoi = $getidmoi["ID_tivi"];
  $tinhtrang = 1;

  $sql2 = "INSERT INTO tinhtrangtivi (ID_tivi, ngay, tinhtrang) VALUES (:ID_moi, :dateAdd, :tinhtrang)";

  $stmt2 = $conn->prepare($sql2);

  $stmt2->execute(["ID_moi" => $idmaymoi, "dateAdd" => $Ngay_mua_tivi, "tinhtrang" => $tinhtrang]);

  echo '<h2 style="text-align: center;">ĐÃ THÊM</h2>';

  ?>
<?php } elseif ($process == "themloa") { ?>

  <?php
  $ID_phong = $_GET["ID_phong"];
  $Ten_loa = $_GET["tenloa"];
  $Ngay_mua_loa = $_GET["ngaymua"];
  ?>

  <?php
  $sql = "INSERT INTO loa (Ten_loa, Ngay_mua_loa, ID_phong) VALUES (:tenloa, :ngaymua, :ID_phong)";

  $stmt = $conn->prepare($sql);

  $stmt->execute(["tenloa" => $Ten_loa, "ngaymua" => $Ngay_mua_loa, "ID_phong" => $ID_phong]);

  $getid = $conn->query("SELECT ID_loa FROM loa ORDER BY ID_loa DESC LIMIT 1");
  $getidmoi = $getid->fetch(PDO::FETCH_ASSOC);

  $idmaymoi = $getidmoi["ID_loa"];
  $tinhtrang = 1;

  $sql2 = "INSERT INTO tinhtrangloa (ID_loa, ngay, tinhtrang) VALUES (:ID_moi, :dateAdd, :tinhtrang)";

  $stmt2 = $conn->prepare($sql2);

  $stmt2->execute(["ID_moi" => $idmaymoi, "dateAdd" => $Ngay_mua_loa, "tinhtrang" => $tinhtrang]);

  echo '<h2 style="text-align: center;">ĐÃ THÊM</h2>';

  ?>
<?php } elseif ($process == "themmaychieu") { ?>

  <?php
  $ID_phong = $_GET["ID_phong"];
  $Ten_maychieu = $_GET["tenmaychieu"];
  $Ngay_mua_maychieu = $_GET["ngaymua"];
  ?>

  <?php
  $sql = "INSERT INTO maychieu (Ten_maychieu, Ngay_mua_maychieu, ID_phong) VALUES (:tenmaychieu, :ngaymua, :ID_phong)";

  $stmt = $conn->prepare($sql);

  $stmt->execute(["tenmaychieu" => $Ten_maychieu, "ngaymua" => $Ngay_mua_maychieu, "ID_phong" => $ID_phong]);

  $getid = $conn->query("SELECT ID_maychieu FROM maychieu ORDER BY ID_maychieu DESC LIMIT 1");
  $getidmoi = $getid->fetch(PDO::FETCH_ASSOC);

  $idmaymoi = $getidmoi["ID_maychieu"];
  $tinhtrang = 1;

  $sql2 = "INSERT INTO tinhtrangmaychieu (ID_maychieu, ngay, tinhtrang) VALUES (:ID_moi, :dateAdd, :tinhtrang)";

  $stmt2 = $conn->prepare($sql2);

  $stmt2->execute(["ID_moi" => $idmaymoi, "dateAdd" => $Ngay_mua_maychieu, "tinhtrang" => $tinhtrang]);

  echo '<h2 style="text-align: center;">ĐÃ THÊM</h2>';

  ?>
<?php } ?>