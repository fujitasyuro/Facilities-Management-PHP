<?php
  $maylanhhong = $conn->query("SELECT COUNT(tinhtrangmaylanh.tinhtrang) as somaylanhhong FROM maylanh, tinhtrangmaylanh WHERE maylanh.ID_maylanh = tinhtrangmaylanh.ID_maylanh AND maylanh.ID_phong = $ID_phong AND tinhtrangmaylanh.tinhtrang = 0");

  $somaylanhhong = $maylanhhong->fetch(PDO::FETCH_ASSOC);


  $somaylanh = $conn->query("SELECT COUNT(ID_maylanh) as somaylanhdalap FROM maylanh WHERE maylanh.ID_phong = $ID_phong");

  $somaylanhdalap = $somaylanh->fetch(PDO::FETCH_ASSOC);

  $somaylanhhoatdong = $somaylanhdalap['somaylanhdalap'] - $somaylanhhong['somaylanhhong'];

  $maylanhcheck = $somaylanhdalap['somaylanhdalap'] - $somaylanhhoatdong;
