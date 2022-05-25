<?php
$maytinhhong = $conn->query("SELECT COUNT(tinhtrangmaytinh.tinhtrang) as somayhong, maytinh.ID_maytinh FROM maytinh, tinhtrangmaytinh WHERE maytinh.ID_maytinh = tinhtrangmaytinh.ID_maytinh AND maytinh.ID_phong = $ID_phong AND tinhtrangmaytinh.tinhtrang = 0");

$somayhong = $maytinhhong->fetch(PDO::FETCH_ASSOC);


$somaytinh = $conn->query("SELECT COUNT(maytinh.ID_maytinh) as somaydalap FROM maytinh WHERE maytinh.ID_phong = $ID_phong");

$somaydalap = $somaytinh->fetch(PDO::FETCH_ASSOC);

$somayhoatdong = $somaydalap['somaydalap'] - $somayhong['somayhong'];
$ID_maytinh = $somayhong["ID_maytinh"];
