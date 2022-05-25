<?php
include("../db_conn.php");
?>

<?php
$process = $_GET["process"];
$ID_phong = $_GET["ID_phong"];
$Content = $_GET["content"];
$User = $_GET["user"];
$datetime = $_GET["datetime"];
?>

<?php if ($process == "reporttable") { ?>
  <?php
  $ID_banghe = $_GET["ID_banghe"];
  $phanhu = "banghe";

  $sql = "INSERT INTO reports (ID_user, ID_phong, ngay, noidung, phanhu) VALUES (:User, :ID_phong, :datetime, :Content, :phanhu)";
  $stmt = $conn->prepare($sql);

  $stmt->execute(["User" => $User, "ID_phong" => $ID_phong, "datetime" => $datetime, "Content" => $Content, "phanhu" => $phanhu]);

  $tinhtrang = 0;
  $sql1 = "UPDATE tinhtrangbanghe SET tinhtrang=:tinhtrang, soluonghuhai=:soluonghuhai WHERE ID_banghe = $ID_banghe";

  $stmt1 = $conn->prepare($sql1);
  $stmt1->execute(["tinhtrang" => $tinhtrang, "soluonghuhai" => $soluonghuhai]);

  echo '<h2 style="text-align: center;">ĐÃ BÁO CÁO</h2>';

  ?>
<?php } elseif ($process == "reportcomputer") { ?>
  <?php
  $ID_maytinh = $_GET["ID_maytinh"];
  $phanhu = "maytinh";

  $sql = "INSERT INTO reports (ID_user, ID_phong, ngay, noidung, phanhu) VALUES (:User, :ID_phong, :datetime, :Content, :phanhu)";
  $stmt = $conn->prepare($sql);

  $stmt->execute(["User" => $User, "ID_phong" => $ID_phong, "datetime" => $datetime, "Content" => $Content, "phanhu" => $phanhu]);

  $tinhtrang = 0;
  $sql1 = "UPDATE tinhtrangmaytinh SET tinhtrang=:tinhtrang WHERE ID_maytinh = $ID_maytinh";

  $stmt1 = $conn->prepare($sql1);
  $stmt1->execute(["tinhtrang" => $tinhtrang]);

  echo '<h2 style="text-align: center;">ĐÃ BÁO CÁO</h2>';

  ?>
<?php } ?>