<?php
include("../db_conn.php")
?>

<?php
$ID_toanha = $_GET["ID_toanha"];

$floors = $conn->query("SELECT * FROM tang WHERE tang.ID_toanha = $ID_toanha");

while ($floor = $floors->fetch(PDO::FETCH_ASSOC)) {
?>
  <div class="floors__floor">
    <?php
    $ID_tang = $floor['ID_tang'];
    ?>

    <div class="floors__floor--box">
      <?php
      $rooms = $conn->query("SELECT * FROM phong WHERE phong.ID_tang = $ID_tang");
      while ($room = $rooms->fetch(PDO::FETCH_ASSOC)) {
      ?>
        <?php
        if ($room['ID_loaiphong'] === 1) {
        ?>
          <div class="miniroom room--computer" data-modal="roomOpen" IDTang="<?php echo $room['ID_tang']; ?>" IDPhong="<?php echo $room['ID_phong']; ?>" IDLoai="<?php echo $room['ID_loaiphong']; ?>">
            <span class="miniroom--title"> <?php echo $room['Ten_phong']; ?> </span>
          </div>
        <?php } elseif ($room['ID_loaiphong'] === 2) { ?>
          <div class="miniroom room--tivi" data-modal="roomOpen" IDTang="<?php echo $room['ID_tang']; ?>" IDPhong="<?php echo $room['ID_phong']; ?>" IDLoai="<?php echo $room['ID_loaiphong']; ?>">
            <span class="miniroom--title"> <?php echo $room['Ten_phong']; ?> </span>
          </div>
        <?php } elseif ($room['ID_loaiphong'] === 3) { ?>
          <div class="miniroom room--projector" data-modal="roomOpen" IDTang="<?php echo $room['ID_tang']; ?>" IDPhong="<?php echo $room['ID_phong']; ?>" IDLoai="<?php echo $room['ID_loaiphong']; ?>">
            <span class="miniroom--title"> <?php echo $room['Ten_phong']; ?> </span>
          </div>
        <?php } elseif ($room['ID_loaiphong'] === 4) { ?>
          <div class="miniroom" data-modal="roomOpen" IDTang="<?php echo $room['ID_tang']; ?>" IDPhong="<?php echo $room['ID_phong']; ?>" IDLoai="<?php echo $room['ID_loaiphong']; ?>">
            <span class="miniroom--title"> <?php echo $room['Ten_phong']; ?> </span>
          </div>
        <?php } ?>

      <?php } ?>
    </div>

    <span> <?php echo $floor['Ten_Tang']; ?> </span>
  </div>

<?php } ?>

<script src="./JS/roomOpen.js"></script>