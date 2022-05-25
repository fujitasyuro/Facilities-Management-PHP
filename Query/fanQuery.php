<?php
  $quathong = $conn->query("SELECT COUNT(tinhtrangquat.tinhtrang) as soquathong FROM quat, tinhtrangquat WHERE quat.ID_quat = tinhtrangquat.ID_quat AND quat.ID_phong = $ID_phong AND tinhtrangquat.tinhtrang = 0");

  $soquathong = $quathong->fetch(PDO::FETCH_ASSOC);


  $soquat = $conn->query("SELECT COUNT(ID_quat) as soquatdalap FROM quat WHERE quat.ID_phong = $ID_phong");

  $soquatdalap = $soquat->fetch(PDO::FETCH_ASSOC);

  $soquathoatdong = $soquatdalap['soquatdalap'] - $soquathong['soquathong'];

  $quatcheck = $soquatdalap['soquatdalap'] - $soquathoatdong;
