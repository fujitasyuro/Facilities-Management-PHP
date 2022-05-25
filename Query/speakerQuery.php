<?php
  $loahong = $conn->query("SELECT COUNT(tinhtrangloa.tinhtrang) as soloahong FROM loa, tinhtrangloa WHERE loa.ID_loa = tinhtrangloa.ID_loa AND loa.ID_phong = $ID_phong AND tinhtrangloa.tinhtrang = 0");

  $soloahong = $loahong->fetch(PDO::FETCH_ASSOC);


  $soloa = $conn->query("SELECT COUNT(ID_loa) as soloadalap FROM loa WHERE loa.ID_phong = $ID_phong");

  $soloadalap = $soloa->fetch(PDO::FETCH_ASSOC);

  $soloahoatdong = $soloadalap['soloadalap'] - $soloahong['soloahong'];

  $loacheck = $soloadalap['soloadalap'] - $soloahoatdong;
