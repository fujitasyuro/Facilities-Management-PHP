<?php
  $denhong = $conn->query("SELECT COUNT(tinhtrangden.tinhtrang) as sodenhong FROM den, tinhtrangden WHERE den.ID_den = tinhtrangden.ID_den AND den.ID_phong = $ID_phong AND tinhtrangden.tinhtrang = 0");

  $sodenhong = $denhong->fetch(PDO::FETCH_ASSOC);


  $soden = $conn->query("SELECT COUNT(ID_den) as sodendalap FROM den WHERE den.ID_phong = $ID_phong");

  $sodendalap = $soden->fetch(PDO::FETCH_ASSOC);

  $sodenhoatdong = $sodendalap['sodendalap'] - $sodenhong['sodenhong'];

  $dencheck = $sodendalap['sodendalap'] - $sodenhoatdong;
