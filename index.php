<?php
include("./db_conn.php")
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trang Chủ</title>
  <link rel="shortcut icon" href="./IMG/logo-ctu.png" type="image/x-icon" />
  <link rel="stylesheet" href="./CSS/app.css" />
  <script src="https://kit.fontawesome.com/15d8d80360.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <div class="nav">
      <div class="nav__logo">
        <img src="./IMG/logo-ctu.png" alt="CTU Logo" class="nav__logo--img" />
      </div>

      <div class="nav__menu">
        <div class="tab-item active-tab">
          <span>Phòng học</span>
        </div>
        <div class="tab-item">
          <span>Thiết bị</span>
        </div>
        <div class="line"></div>
      </div>
    </div>
  </header>

  <main>
    <!-- PHÒNG HỌC -->
    <div class="tab-content active-content classroom" style="display: none">
      <!-- DÃY NHÀ -->
      <?php
      $buildings = $conn->query("SELECT * FROM toa_nha");
      ?>


      <div class="buildings">
        <?php while ($building = $buildings->fetch(PDO::FETCH_ASSOC)) { ?>
          <div class="buildings__building" data-modal="buildingModal" buildingId="<?php echo $building['ID_toanha']; ?>">
            <span><?php echo $building['Ten_toanha']; ?></span>
          </div>
        <?php } ?>
      </div>

      <!-- TẦNG -->

      <div class="floors" id="buildingModal">
        <!-- <h1 class="title--large">HA 1-2</h1> -->

        <button class="modal__btn--close floor--close">
          <i class="fa-solid fa-xmark"></i>
        </button>

        <div class="floors--box" id="floors--box">
        </div>
      </div>

      <!-- PHÒNG -->

      <div class="room" id="roomOpen">
        <button class="modal__btn--close room--close">
          <i class="fa-solid fa-xmark"></i>
        </button>
        <!-- PHẦN CHÍNH -->
        <div id="rooms--box">

        </div>
      </div>

      <!-- SEEMORE -->

      <div class="seemore" id="seemore">
        <button class="modal__btn--close seemore--close">
          <i class="fa-solid fa-xmark"></i>
        </button>
        <div id="seemore--box">

        </div>
      </div>
    </div>

    <!-- KHO -->
    <div class="tab-content device" style="display: none; z-index: 10">
      <?php
      include("./Modules/pageUpdate.php")
      ?>
    </div>
  </main>

  <footer></footer>

  <script src="./JS/floorOpen.js"></script>
  <!-- <script src="./JS/seeMore.js"></script> -->
  <script src="./JS/tabsMenu.js"></script>
  <script src="./JS/jquery-3.2.1.min.js"></script>
</body>

</html>