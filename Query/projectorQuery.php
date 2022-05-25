<?php
  $maychieuhong = $conn->query("SELECT COUNT(tinhtrangmaychieu.tinhtrang) as somaychieuhong FROM maychieu, tinhtrangmaychieu WHERE maychieu.ID_maychieu = tinhtrangmaychieu.ID_maychieu AND maychieu.ID_phong = $ID_phong AND tinhtrangmaychieu.tinhtrang = 0");

  $somaychieuhong = $maychieuhong->fetch(PDO::FETCH_ASSOC);


  $somaychieu = $conn->query("SELECT COUNT(ID_maychieu) as somaychieudalap FROM maychieu WHERE maychieu.ID_phong = $ID_phong");

  $somaychieudalap = $somaychieu->fetch(PDO::FETCH_ASSOC);

  $somaychieuhoatdong = $somaychieudalap['somaychieudalap'] - $somaychieuhong['somaychieuhong'];
