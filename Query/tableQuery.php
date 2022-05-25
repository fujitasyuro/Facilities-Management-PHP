<?php
$table = $conn->query("SELECT SUM(tinhtrangbanghe.soluonghuhai) as soluonghuhai, banghe.ID_banghe FROM tinhtrangbanghe, banghe WHERE tinhtrangbanghe.ID_banghe = banghe.ID_banghe AND banghe.ID_phong = $ID_phong");
$tableContent = $table->fetch(PDO::FETCH_ASSOC);

$bandalap = $conn->query("SELECT SUM(soluong) as soluong FROM banghe WHERE ID_phong = $ID_phong");
$sobandalap = $bandalap->fetch(PDO::FETCH_ASSOC);
?>

  <?php
  $sobanghe = $roomContent['soluongbanghe'];
  $sobanghehu = $tableContent['soluonghuhai'];

  $sobanghedungduoc = $sobandalap["soluong"] - $sobanghehu;
  $ID_banghe = $tableContent["ID_banghe"]
  ?>