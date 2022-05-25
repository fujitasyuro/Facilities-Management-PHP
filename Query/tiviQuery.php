<?php
  $tivihong = $conn->query("SELECT COUNT(tinhtrangtivi.tinhtrang) as sotivihong FROM tivi, tinhtrangtivi WHERE tivi.ID_tivi = tinhtrangtivi.ID_tivi AND tivi.ID_phong = $ID_phong AND tinhtrangtivi.tinhtrang = 0");

  $sotivihong = $tivihong->fetch(PDO::FETCH_ASSOC);


  $sotivi = $conn->query("SELECT COUNT(ID_tivi) as sotividalap FROM tivi WHERE tivi.ID_phong = $ID_phong");

  $sotividalap = $sotivi->fetch(PDO::FETCH_ASSOC);

  $sotivihoatdong = $sotividalap['sotividalap'] - $sotivihong['sotivihong'];
