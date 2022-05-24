<?php
include("../db_conn.php")
?>

<?php
$ID_phong = $_GET["ID_phong"];
$ID_loaiphong = $_GET["ID_loaiphong"];
?>
<!-- PHÒNG MÁY TÍNH -->
<?php
if ($ID_loaiphong == 1) {
?>
  <?php
  $room = $conn->query("SELECT * FROM phong WHERE phong.ID_phong = $ID_phong");
  $roomContent = $room->fetch(PDO::FETCH_ASSOC);
  ?>

  <!-- QUERY BÀN GHẾ -->
  <?php
  $table = $conn->query("SELECT SUM(tinhtrangbanghe.soluonghuhai) as soluonghuhai FROM tinhtrangbanghe, banghe WHERE tinhtrangbanghe.ID_banghe = banghe.ID_banghe AND banghe.ID_phong = $ID_phong");
  $tableContent = $table->fetch(PDO::FETCH_ASSOC);

  $bandalap = $conn->query("SELECT SUM(soluong) as soluong FROM banghe WHERE ID_phong = $ID_phong");
  $sobandalap = $bandalap->fetch(PDO::FETCH_ASSOC);
  ?>

  <?php
  $sobanghe = $roomContent['soluongbanghe'];
  $sobanghehu = $tableContent['soluonghuhai'];

  $sobanghedungduoc = $sobandalap["soluong"] - $sobanghehu;
  ?>

  <!-- QUERY MÁY TÍNH -->
  <?php
  $maytinhhong = $conn->query("SELECT COUNT(tinhtrangmaytinh.tinhtrang) as somayhong FROM maytinh, tinhtrangmaytinh WHERE maytinh.ID_maytinh = tinhtrangmaytinh.ID_maytinh AND maytinh.ID_phong = $ID_phong AND tinhtrangmaytinh.tinhtrang = 0");

  $somayhong = $maytinhhong->fetch(PDO::FETCH_ASSOC);


  $somaytinh = $conn->query("SELECT COUNT(maytinh.ID_maytinh) as somaydalap FROM maytinh WHERE maytinh.ID_phong = $ID_phong");

  $somaydalap = $somaytinh->fetch(PDO::FETCH_ASSOC);

  $somayhoatdong = $somaydalap['somaydalap'] - $somayhong['somayhong'];
  ?>

  <!-- QUERY QUẠT -->
  <?php
  $quathong = $conn->query("SELECT COUNT(tinhtrangquat.tinhtrang) as soquathong FROM quat, tinhtrangquat WHERE quat.ID_quat = tinhtrangquat.ID_quat AND quat.ID_phong = $ID_phong AND tinhtrangquat.tinhtrang = 0");

  $soquathong = $quathong->fetch(PDO::FETCH_ASSOC);


  $soquat = $conn->query("SELECT COUNT(ID_quat) as soquatdalap FROM quat WHERE quat.ID_phong = $ID_phong");

  $soquatdalap = $soquat->fetch(PDO::FETCH_ASSOC);

  $soquathoatdong = $soquatdalap['soquatdalap'] - $soquathong['soquathong'];

  $quatcheck = $soquatdalap['soquatdalap'] - $soquathoatdong;
  ?>

  <!-- QUERY ĐÈN -->
  <?php
  $denhong = $conn->query("SELECT COUNT(tinhtrangden.tinhtrang) as sodenhong FROM den, tinhtrangden WHERE den.ID_den = tinhtrangden.ID_den AND den.ID_phong = $ID_phong AND tinhtrangden.tinhtrang = 0");

  $sodenhong = $denhong->fetch(PDO::FETCH_ASSOC);


  $soden = $conn->query("SELECT COUNT(ID_den) as sodendalap FROM den WHERE den.ID_phong = $ID_phong");

  $sodendalap = $soden->fetch(PDO::FETCH_ASSOC);

  $sodenhoatdong = $sodendalap['sodendalap'] - $sodenhong['sodenhong'];

  $dencheck = $sodendalap['sodendalap'] - $sodenhoatdong;
  ?>

  <h1 class="roomname">PHÒNG <?php echo $roomContent['Ten_phong']; ?></h1>


  <div class="room__content" id="rooms__room__content">
    <div class="room__content--main">
      <!-- MÁY TÍNH -->
      <div class="computer">
        <div class="computer--box">
          <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="maytinh">
            <i class="fa-regular fa-eye"></i>
          </bottom>
          <!-- THÊM MÁY TÍNH -->
          <bottom class="modal__btn--add">
            <i class="fa-solid fa-plus"></i>
            <div class="computer__add__option">
              <ul>
                <li>
                  <a href="./APP/ADD/addNewComputer.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm máy mới</a>
                </li>
                <li>
                  <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
                </li>
              </ul>
            </div>
          </bottom>

          <h1 class="title--large">MÁY TÍNH</h1>
          <div class="detail">
            <div class="detail__amount">
              <span class="detail--title"> Số lượng máy: </span>
              <span class="detail--content"> <?php echo $somaydalap['somaydalap']; ?> / <?php echo $roomContent['soluongmaytinh']; ?> </span>
            </div>
            <div class="detail__work">
              <span class="detail--title"> Số máy hoạt động: </span>
              <span class="detail--content"> <?php echo $somayhoatdong ?> </span>
            </div>
            <div class="detail__broken">
              <span class="detail--title">
                Số máy không hoạt động:
              </span>
              <span class="detail--content"> <?php echo $somayhong['somayhong']; ?> </span>
            </div>
          </div>
          <div class="computer--svg" id="computer--svg" style="display: block">
            <?php
            include("computerSVG.php")
            ?>
          </div>
        </div>
      </div>
      <!-- BÀN GHẾ -->
      <div class="table">
        <div class="table--box">
          <bottom class="modal__btn--add">
            <i class="fa-solid fa-plus"></i>
            <div class="table__add__option">
              <ul>
                <li>
                  <a href="./APP/ADD/addNewTable.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm bàn mới</a>
                </li>
                <li>
                  <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
                </li>
              </ul>
            </div>
          </bottom>
          <button class="modal__btn--report--all">
            <a class="a__btn a__btn--report" href="./APP/REPORT/reportTable.html">
              <i class="fa-solid fa-circle-exclamation"></i>
            </a>
          </button>

          <h1 class="title--large">BÀN GHẾ</h1>
          <div class="detail">
            <div class="detail__amount">
              <span class="detail--title"> Số lượng bàn ghế: </span>
              <span class="detail--content"> <?php echo $sobandalap["soluong"] ?> / <?php echo $roomContent['soluongbanghe']; ?> </span>
            </div>
            <div class="detail__work">
              <span class="detail--title"> Số bàn ghế dùng được: </span>
              <span class="detail--content"> <?php echo ($sobanghedungduoc); ?> </span>
            </div>
            <div class="detail__broken">
              <span class="detail--title"> Số bàn ghế hư hỏng: </span>
              <span class="detail--content"> <?php echo $tableContent['soluonghuhai']; ?> </span>
            </div>
          </div>
          <div class="table--svg" id="table--svg" style="display: block">
            <?php
            include("tableSVG.php")
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- PHẦN PHỤ -->
  <div class="room__content--complement">
    <!-- QUẠT -->
    <?php if ($quatcheck == 0) { ?>
      <div class="fans room__content--complement--box status--good">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="quat">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">QUẠT</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soquathoatdong ?></span>
          <span class="detail--complement">/<?php echo $soquatdalap['soquatdalap'] ?></span>

          <span class="status--text"> Tốt </span>

        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewFan.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm quạt mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($quatcheck == 1) { ?>
      <div class="fans room__content--complement--box status--notgood">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="quat">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">QUẠT</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soquathoatdong ?></span>
          <span class="detail--complement">/<?php echo $soquatdalap['soquatdalap'] ?></span>

          <span class="status--text"> Có hư hại </span>

        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewFan.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm quạt mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($quatcheck > 1) { ?>
      <div class="fans room__content--complement--box status--damage">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="quat">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">QUẠT</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soquathoatdong ?></span>
          <span class="detail--complement">/<?php echo $soquatdalap['soquatdalap'] ?></span>

          <span class="status--text"> Hư hại nhiều </span>

        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewFan.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm quạt mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } ?>

    <!-- ĐÈN -->
    <?php if ($dencheck == 0) { ?>
      <div class="lamps room__content--complement--box status--good">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="den">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">ĐÈN</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $sodenhoatdong ?></span>
          <span class="detail--complement">/<?php echo $sodendalap['sodendalap']; ?></span>
          <span class="status--text"> Tốt </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewLamps.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm đèn mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($quatcheck == 1) { ?>
      <div class="lamps room__content--complement--box status--notgood">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="den">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">ĐÈN</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $sodenhoatdong ?></span>
          <span class="detail--complement">/<?php echo $sodendalap['sodendalap']; ?></span>
          <span class="status--text"> Có hư hại </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewLamps.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm đèn mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($quatcheck > 1) { ?>
      <div class="lamps room__content--complement--box status--damage">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="den">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">ĐÈN</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $sodenhoatdong ?></span>
          <span class="detail--complement">/<?php echo $sodendalap['sodendalap']; ?></span>
          <span class="status--text"> Hư hại nhiều </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewLamps.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm đèn mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } ?>
    <!-- MÁY LẠNH -->
    <div class="air-conditioner room__content--complement--box status--good">
      <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="maylanh">
        <i class="fa-regular fa-eye"></i>
      </bottom>
      <h1 class="title--medium">MÁY LẠNH</h1>
      <div class="amount">
        <span class="detail--complement" style="font-weight: 600; font-size: 40px">2</span>
        <span class="detail--complement">/2</span>
        <span class="status--text"> Tốt </span>
      </div>
      <bottom class="modal__btn--add">
        <i class="fa-solid fa-plus"></i>
        <div class="complement__add__option">
          <ul>
            <li>
              <a href="./APP/ADD/addNewConditioner.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm máy lạnh mới</a>
            </li>
            <li>
              <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
            </li>
          </ul>
        </div>
      </bottom>
    </div>
  </div>

  <!-- PHÒNG TIVI -->

<?php } elseif ($ID_loaiphong == 2) { ?>

  <?php
  $room = $conn->query("SELECT * FROM phong WHERE phong.ID_phong = $ID_phong");
  $roomContent = $room->fetch(PDO::FETCH_ASSOC);
  ?>

  <!-- QUERY BÀN GHẾ -->
  <?php
  $table = $conn->query("SELECT SUM(tinhtrangbanghe.soluonghuhai) as soluonghuhai FROM tinhtrangbanghe, banghe WHERE tinhtrangbanghe.ID_banghe = banghe.ID_banghe AND banghe.ID_phong = $ID_phong");
  $tableContent = $table->fetch(PDO::FETCH_ASSOC);

  $bandalap = $conn->query("SELECT SUM(soluong) as soluong FROM banghe WHERE ID_phong = $ID_phong");
  $sobandalap = $bandalap->fetch(PDO::FETCH_ASSOC);
  ?>

  <?php
  $sobanghe = $roomContent['soluongbanghe'];
  $sobanghehu = $tableContent['soluonghuhai'];

  $sobanghedungduoc = $sobandalap["soluong"] - $sobanghehu;
  ?>

  <!-- QUERY QUẠT -->
  <?php
  $quathong = $conn->query("SELECT COUNT(tinhtrangquat.tinhtrang) as soquathong FROM quat, tinhtrangquat WHERE quat.ID_quat = tinhtrangquat.ID_quat AND quat.ID_phong = $ID_phong AND tinhtrangquat.tinhtrang = 0");

  $soquathong = $quathong->fetch(PDO::FETCH_ASSOC);


  $soquat = $conn->query("SELECT COUNT(ID_quat) as soquatdalap FROM quat WHERE quat.ID_phong = $ID_phong");

  $soquatdalap = $soquat->fetch(PDO::FETCH_ASSOC);

  $soquathoatdong = $soquatdalap['soquatdalap'] - $soquathong['soquathong'];

  $quatcheck = $soquatdalap['soquatdalap'] - $soquathoatdong;
  ?>

  <!-- QUERY ĐÈN -->
  <?php
  $denhong = $conn->query("SELECT COUNT(tinhtrangden.tinhtrang) as sodenhong FROM den, tinhtrangden WHERE den.ID_den = tinhtrangden.ID_den AND den.ID_phong = $ID_phong AND tinhtrangden.tinhtrang = 0");

  $sodenhong = $denhong->fetch(PDO::FETCH_ASSOC);


  $soden = $conn->query("SELECT COUNT(ID_den) as sodendalap FROM den WHERE den.ID_phong = $ID_phong");

  $sodendalap = $soden->fetch(PDO::FETCH_ASSOC);

  $sodenhoatdong = $sodendalap['sodendalap'] - $sodenhong['sodenhong'];

  $dencheck = $sodendalap['sodendalap'] - $sodenhoatdong;
  ?>

  <!-- QUERY TIVI -->
  <?php
  $tivihong = $conn->query("SELECT COUNT(tinhtrangtivi.tinhtrang) as sotivihong FROM tivi, tinhtrangtivi WHERE tivi.ID_tivi = tinhtrangtivi.ID_tivi AND tivi.ID_phong = $ID_phong AND tinhtrangtivi.tinhtrang = 0");

  $sotivihong = $tivihong->fetch(PDO::FETCH_ASSOC);


  $sotivi = $conn->query("SELECT COUNT(ID_tivi) as sotividalap FROM tivi WHERE tivi.ID_phong = $ID_phong");

  $sotividalap = $sotivi->fetch(PDO::FETCH_ASSOC);

  $sotivihoatdong = $sotividalap['sotividalap'] - $sotivihong['sotivihong'];
  ?>

  <!-- QUERY LOA -->
  <?php
  $loahong = $conn->query("SELECT COUNT(tinhtrangloa.tinhtrang) as soloahong FROM loa, tinhtrangloa WHERE loa.ID_loa = tinhtrangloa.ID_loa AND loa.ID_phong = $ID_phong AND tinhtrangloa.tinhtrang = 0");

  $soloahong = $loahong->fetch(PDO::FETCH_ASSOC);


  $soloa = $conn->query("SELECT COUNT(ID_loa) as soloadalap FROM loa WHERE loa.ID_phong = $ID_phong");

  $soloadalap = $soloa->fetch(PDO::FETCH_ASSOC);

  $soloahoatdong = $soloadalap['soloadalap'] - $soloahong['soloahong'];

  $loacheck = $soloadalap['soloadalap'] - $soloahoatdong;
  ?>

  <h1 class="roomname">PHÒNG <?php echo $roomContent['Ten_phong']; ?></h1>

  <div class="room__content" id="rooms__room__content">
    <div class="room__content--main">
      <!-- TIVI -->
      <div class="computer">
        <div class="computer--box">
          <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="tivi">
            <i class="fa-regular fa-eye"></i>
          </bottom>
          <!-- THÊM TIVI -->
          <bottom class="modal__btn--add">
            <i class="fa-solid fa-plus"></i>
            <div class="computer__add__option">
              <ul>
                <li>
                  <a href="./APP/ADD/addNewTivi.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm tivi mới</a>
                </li>
                <li>
                  <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
                </li>
              </ul>
            </div>
          </bottom>
          <h1 class="title--large">TIVI</h1>
          <div class="detail">
            <div class="detail__amount">
              <span class="detail--title"> Số lượng tivi: </span>
              <span class="detail--content"> <?php echo $sotividalap['sotividalap']; ?> </span>
            </div>
            <div class="detail__work">
              <span class="detail--title"> Số tivi hoạt động: </span>
              <span class="detail--content"> <?php echo $sotivihoatdong ?> </span>
            </div>
            <div class="detail__broken">
              <span class="detail--title">
                Số tivi không hoạt động:
              </span>
              <span class="detail--content"> <?php echo $sotivihong['sotivihong'] ?> </span>
            </div>
          </div>
          <div class="tivi--svg" id="tivi--svg" style="display: block">
            <?php
            include("tiviSVG.php")
            ?>
          </div>
        </div>
      </div>
      <!-- BÀN GHẾ -->
      <div class="table">
        <div class="table--box">
          <bottom class="modal__btn--add">
            <i class="fa-solid fa-plus"></i>
            <div class="table__add__option">
              <ul>
                <li>
                  <a href="./APP/ADD/addNewTable.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm bàn mới</a>
                </li>
                <li>
                  <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
                </li>
              </ul>
            </div>
          </bottom>
          <button class="modal__btn--report--all">
            <a class="a__btn a__btn--report" href="./APP/REPORT/reportTable.html">
              <i class="fa-solid fa-circle-exclamation"></i>
            </a>
          </button>

          <h1 class="title--large">BÀN GHẾ</h1>
          <div class="detail">
            <div class="detail__amount">
              <span class="detail--title"> Số lượng bàn ghế: </span>
              <span class="detail--content"> <?php echo $sobandalap["soluong"] ?> / <?php echo $roomContent['soluongbanghe']; ?> </span>
            </div>
            <div class="detail__work">
              <span class="detail--title"> Số bàn ghế dùng được: </span>
              <span class="detail--content"> <?php echo ($sobanghedungduoc); ?> </span>
            </div>
            <div class="detail__broken">
              <span class="detail--title"> Số bàn ghế hư hỏng: </span>
              <span class="detail--content"> <?php echo $tableContent['soluonghuhai']; ?> </span>
            </div>
          </div>
          <div class="table--svg" id="table--svg" style="display: block">
            <?php
            include("tableSVG.php")
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- PHẦN PHỤ -->
  <div class="room__content--complement">
    <!-- QUẠT -->
    <?php if ($quatcheck == 0) { ?>
      <div class="fans room__content--complement--box status--good">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="quat">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">QUẠT</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soquathoatdong ?></span>
          <span class="detail--complement">/<?php echo $soquatdalap['soquatdalap'] ?></span>

          <span class="status--text"> Tốt </span>

        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewFan.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm quạt mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($quatcheck == 1) { ?>
      <div class="fans room__content--complement--box status--notgood">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="quat">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">QUẠT</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soquathoatdong ?></span>
          <span class="detail--complement">/<?php echo $soquatdalap['soquatdalap'] ?></span>

          <span class="status--text"> Có hư hại </span>

        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewFan.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm quạt mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($quatcheck > 1) { ?>
      <div class="fans room__content--complement--box status--damage">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="quat">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">QUẠT</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soquathoatdong ?></span>
          <span class="detail--complement">/<?php echo $soquatdalap['soquatdalap'] ?></span>

          <span class="status--text"> Hư hại nhiều </span>

        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewFan.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm quạt mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } ?>
    <!-- ĐÈN -->
    <?php if ($dencheck == 0) { ?>
      <div class="lamps room__content--complement--box status--good">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="den">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">ĐÈN</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $sodenhoatdong ?></span>
          <span class="detail--complement">/<?php echo $sodendalap['sodendalap']; ?></span>
          <span class="status--text"> Tốt </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewLamps.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm đèn mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($quatcheck == 1) { ?>
      <div class="lamps room__content--complement--box status--notgood">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="den">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">ĐÈN</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $sodenhoatdong ?></span>
          <span class="detail--complement">/<?php echo $sodendalap['sodendalap']; ?></span>
          <span class="status--text"> Có hư hại </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewLamps.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm đèn mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($quatcheck > 1) { ?>
      <div class="lamps room__content--complement--box status--damage">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="den">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">ĐÈN</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $sodenhoatdong ?></span>
          <span class="detail--complement">/<?php echo $sodendalap['sodendalap']; ?></span>
          <span class="status--text"> Hư hại nhiều </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewLamps.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm đèn mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } ?>
    <!-- Loa -->
    <?php if ($loacheck == 0) { ?>
      <div class="air-conditioner room__content--complement--box status--good">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="loa">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">LOA</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soloahoatdong ?></span>
          <span class="detail--complement">/<?php echo $soloadalap['soloadalap']; ?></span>
          <span class="status--text"> Tốt </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewSpeaker.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm loa mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($loacheck == 1) { ?>
      <div class="air-conditioner room__content--complement--box status--notgood">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="loa">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">LOA</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soloahoatdong ?></span>
          <span class="detail--complement">/<?php echo $soloadalap['soloadalap']; ?></span>
          <span class="status--text"> Có hư hại </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewSpeaker.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm loa mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($loacheck > 1) { ?>
      <div class="air-conditioner room__content--complement--box status--damage">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="loa">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">LOA</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soloahoatdong ?></span>
          <span class="detail--complement">/<?php echo $soloadalap['soloadalap']; ?></span>
          <span class="status--text"> Hư hại nhiều </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewSpeaker.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm loa mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } ?>
  </div>

  <!-- PHÒNG MÁY CHIẾU -->
<?php } elseif ($ID_loaiphong == 3) { ?>

  <?php
  $room = $conn->query("SELECT * FROM phong WHERE phong.ID_phong = $ID_phong");
  $roomContent = $room->fetch(PDO::FETCH_ASSOC);
  ?>

  <?php
  $table = $conn->query("SELECT SUM(tinhtrangbanghe.soluonghuhai) as soluonghuhai FROM tinhtrangbanghe, banghe WHERE tinhtrangbanghe.ID_banghe = banghe.ID_banghe AND banghe.ID_phong = $ID_phong");
  $tableContent = $table->fetch(PDO::FETCH_ASSOC);

  $bandalap = $conn->query("SELECT SUM(soluong) as soluong FROM banghe WHERE ID_phong = $ID_phong");
  $sobandalap = $bandalap->fetch(PDO::FETCH_ASSOC);
  ?>

  <?php
  $sobanghe = $roomContent['soluongbanghe'];
  $sobanghehu = $tableContent['soluonghuhai'];

  $sobanghedungduoc = $sobandalap["soluong"] - $sobanghehu;
  ?>

  <!-- QUERY QUẠT -->
  <?php
  $quathong = $conn->query("SELECT COUNT(tinhtrangquat.tinhtrang) as soquathong FROM quat, tinhtrangquat WHERE quat.ID_quat = tinhtrangquat.ID_quat AND quat.ID_phong = $ID_phong AND tinhtrangquat.tinhtrang = 0");

  $soquathong = $quathong->fetch(PDO::FETCH_ASSOC);


  $soquat = $conn->query("SELECT COUNT(ID_quat) as soquatdalap FROM quat WHERE quat.ID_phong = $ID_phong");

  $soquatdalap = $soquat->fetch(PDO::FETCH_ASSOC);

  $soquathoatdong = $soquatdalap['soquatdalap'] - $soquathong['soquathong'];

  $quatcheck = $soquatdalap['soquatdalap'] - $soquathoatdong;
  ?>

  <!-- QUERY ĐÈN -->
  <?php
  $denhong = $conn->query("SELECT COUNT(tinhtrangden.tinhtrang) as sodenhong FROM den, tinhtrangden WHERE den.ID_den = tinhtrangden.ID_den AND den.ID_phong = $ID_phong AND tinhtrangden.tinhtrang = 0");

  $sodenhong = $denhong->fetch(PDO::FETCH_ASSOC);


  $soden = $conn->query("SELECT COUNT(ID_den) as sodendalap FROM den WHERE den.ID_phong = $ID_phong");

  $sodendalap = $soden->fetch(PDO::FETCH_ASSOC);

  $sodenhoatdong = $sodendalap['sodendalap'] - $sodenhong['sodenhong'];

  $dencheck = $sodendalap['sodendalap'] - $sodenhoatdong;
  ?>

  <!-- QUERY LOA -->
  <?php
  $loahong = $conn->query("SELECT COUNT(tinhtrangloa.tinhtrang) as soloahong FROM loa, tinhtrangloa WHERE loa.ID_loa = tinhtrangloa.ID_loa AND loa.ID_phong = $ID_phong AND tinhtrangloa.tinhtrang = 0");

  $soloahong = $loahong->fetch(PDO::FETCH_ASSOC);


  $soloa = $conn->query("SELECT COUNT(ID_loa) as soloadalap FROM loa WHERE loa.ID_phong = $ID_phong");

  $soloadalap = $soloa->fetch(PDO::FETCH_ASSOC);

  $soloahoatdong = $soloadalap['soloadalap'] - $soloahong['soloahong'];

  $loacheck = $soloadalap['soloadalap'] - $soloahoatdong;
  ?>

  <!-- QUERY MÁY CHIẾU -->
  <?php
  $maychieuhong = $conn->query("SELECT COUNT(tinhtrangmaychieu.tinhtrang) as somaychieuhong FROM maychieu, tinhtrangmaychieu WHERE maychieu.ID_maychieu = tinhtrangmaychieu.ID_maychieu AND maychieu.ID_phong = $ID_phong AND tinhtrangmaychieu.tinhtrang = 0");

  $somaychieuhong = $maychieuhong->fetch(PDO::FETCH_ASSOC);


  $somaychieu = $conn->query("SELECT COUNT(ID_maychieu) as somaychieudalap FROM maychieu WHERE maychieu.ID_phong = $ID_phong");

  $somaychieudalap = $somaychieu->fetch(PDO::FETCH_ASSOC);

  $somaychieuhoatdong = $somaychieudalap['somaychieudalap'] - $somaychieuhong['somaychieuhong'];
  ?>

  <h1 class="roomname">PHÒNG <?php echo $roomContent['Ten_phong']; ?></h1>


  <div class="room__content" id="rooms__room__content">
    <div class="room__content--main">
      <!-- MÁY CHIẾU -->
      <div class="computer">
        <div class="computer--box">
          <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="maychieu">
            <i class="fa-regular fa-eye"></i>
          </bottom>
          <!-- THÊM MÁY CHIẾU -->
          <bottom class="modal__btn--add">
            <i class="fa-solid fa-plus"></i>
            <div class="computer__add__option">
              <ul>
                <li>
                  <a href="./APP/ADD/addNewProjector.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm máy mới</a>
                </li>
                <li>
                  <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
                </li>
              </ul>
            </div>
          </bottom>
          <h1 class="title--large">MÁY CHIẾU</h1>
          <div class="detail">
            <div class="detail__amount">
              <span class="detail--title"> Số lượng máy: </span>
              <span class="detail--content"> <?php echo $somaychieudalap['somaychieudalap'] ?> </span>
            </div>
            <div class="detail__work">
              <span class="detail--title"> Số máy hoạt động: </span>
              <span class="detail--content"> <?php echo $somaychieuhoatdong ?> </span>
            </div>
            <div class="detail__broken">
              <span class="detail--title">
                Số máy không hoạt động:
              </span>
              <span class="detail--content"> <?php echo $somaychieuhong['somaychieuhong'] ?> </span>
            </div>
          </div>
          <div class="projector--svg" id="computer--svg" style="display: block">
            <?php
            include("projectorSVG.php")
            ?>
          </div>
        </div>
      </div>
      <!-- BÀN GHẾ -->
      <div class="table">
        <div class="table--box">
          <bottom class="modal__btn--add">
            <i class="fa-solid fa-plus"></i>
            <div class="table__add__option">
              <ul>
                <li>
                  <a href="./APP/ADD/addNewTable.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm bàn mới</a>
                </li>
                <li>
                  <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
                </li>
              </ul>
            </div>
          </bottom>
          <button class="modal__btn--report--all">
            <a class="a__btn a__btn--report" href="./APP/REPORT/reportTable.html">
              <i class="fa-solid fa-circle-exclamation"></i>
            </a>
          </button>

          <h1 class="title--large">BÀN GHẾ</h1>
          <div class="detail">
            <div class="detail__amount">
              <span class="detail--title"> Số lượng bàn ghế: </span>
              <span class="detail--content"> <?php echo $sobandalap["soluong"] ?> / <?php echo $roomContent['soluongbanghe']; ?> </span>
            </div>
            <div class="detail__work">
              <span class="detail--title"> Số bàn ghế dùng được: </span>
              <span class="detail--content"> <?php echo ($sobanghedungduoc); ?> </span>
            </div>
            <div class="detail__broken">
              <span class="detail--title"> Số bàn ghế hư hỏng: </span>
              <span class="detail--content"> <?php echo $tableContent['soluonghuhai']; ?> </span>
            </div>
          </div>
          <div class="table--svg" id="table--svg" style="display: block">
            <?php
            include("tableSVG.php")
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- PHẦN PHỤ -->
  <div class="room__content--complement">
    <!-- QUẠT -->
    <?php if ($quatcheck == 0) { ?>
      <div class="fans room__content--complement--box status--good">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="quat">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">QUẠT</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soquathoatdong ?></span>
          <span class="detail--complement">/<?php echo $soquatdalap['soquatdalap'] ?></span>

          <span class="status--text"> Tốt </span>

        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewFan.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm quạt mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($quatcheck == 1) { ?>
      <div class="fans room__content--complement--box status--notgood">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="quat">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">QUẠT</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soquathoatdong ?></span>
          <span class="detail--complement">/<?php echo $soquatdalap['soquatdalap'] ?></span>

          <span class="status--text"> Có hư hại </span>

        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewFan.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm quạt mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($quatcheck > 1) { ?>
      <div class="fans room__content--complement--box status--damage">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="quat">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">QUẠT</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soquathoatdong ?></span>
          <span class="detail--complement">/<?php echo $soquatdalap['soquatdalap'] ?></span>

          <span class="status--text"> Hư hại nhiều </span>

        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewFan.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm quạt mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } ?>
    <!-- ĐÈN -->
    <?php if ($dencheck == 0) { ?>
      <div class="lamps room__content--complement--box status--good">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="den">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">ĐÈN</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $sodenhoatdong ?></span>
          <span class="detail--complement">/<?php echo $sodendalap['sodendalap']; ?></span>
          <span class="status--text"> Tốt </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewLamps.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm đèn mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($quatcheck == 1) { ?>
      <div class="lamps room__content--complement--box status--notgood">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="den">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">ĐÈN</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $sodenhoatdong ?></span>
          <span class="detail--complement">/<?php echo $sodendalap['sodendalap']; ?></span>
          <span class="status--text"> Có hư hại </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewLamps.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm đèn mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($quatcheck > 1) { ?>
      <div class="lamps room__content--complement--box status--damage">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="den">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">ĐÈN</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $sodenhoatdong ?></span>
          <span class="detail--complement">/<?php echo $sodendalap['sodendalap']; ?></span>
          <span class="status--text"> Hư hại nhiều </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewLamps.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm đèn mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } ?>
    <!-- LOA -->
    <?php if ($loacheck == 0) { ?>
      <div class="air-conditioner room__content--complement--box status--good">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="loa">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">LOA</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soloahoatdong ?></span>
          <span class="detail--complement">/<?php echo $soloadalap['soloadalap']; ?></span>
          <span class="status--text"> Tốt </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewSpeaker.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm loa mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($loacheck == 1) { ?>
      <div class="air-conditioner room__content--complement--box status--notgood">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="loa">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">LOA</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soloahoatdong ?></span>
          <span class="detail--complement">/<?php echo $soloadalap['soloadalap']; ?></span>
          <span class="status--text"> Có hư hại </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewSpeaker.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm loa mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } elseif ($loacheck > 1) { ?>
      <div class="air-conditioner room__content--complement--box status--damage">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="loa">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <h1 class="title--medium">LOA</h1>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $soloahoatdong ?></span>
          <span class="detail--complement">/<?php echo $soloadalap['soloadalap']; ?></span>
          <span class="status--text"> Hư hại nhiều </span>
        </div>
        <bottom class="modal__btn--add">
          <i class="fa-solid fa-plus"></i>
          <div class="complement__add__option">
            <ul>
              <li>
                <a href="./APP/ADD/addNewSpeaker.php?ID_phong=<?php echo ($ID_phong); ?>" class="add--option">Thêm loa mới</a>
              </li>
              <li>
                <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
              </li>
            </ul>
          </div>
        </bottom>
      </div>
    <?php } ?>
  </div>
<?php } elseif ($ID_loaiphong == 4) { ?>

  <?php
  $room = $conn->query("SELECT * FROM phong WHERE phong.ID_phong = $ID_phong");
  $roomContent = $room->fetch(PDO::FETCH_ASSOC);
  ?>

  <?php
  $table = $conn->query("SELECT tinhtrangbanghe.tinhtrang, tinhtrangbanghe.soluonghuhai as soluonghuhai FROM tinhtrangbanghe, banghe WHERE tinhtrangbanghe.ID_banghe = banghe.ID_banghe AND banghe.ID_phong = $ID_phong");
  $tableContent = $table->fetch(PDO::FETCH_ASSOC);
  ?>

  <?php
  $sobanghe = $roomContent['soluongbanghe'];
  $sobanghehu = $tableContent['soluonghuhai'];

  $sobanghedungduoc = $sobanghe - $sobanghehu;
  ?>

  <h1 class="roomname">PHÒNG <?php echo $roomContent['Ten_phong']; ?></h1>


  <div class="room__content" id="rooms__room__content">
    <div class="room__content--main">
      <!-- MÁY TÍNH -->
      <div class="computer">
        <div class="computer--box">
          <bottom class="modal__btn--seemore" data-modal="seemore">
            <i class="fa-regular fa-eye"></i>
          </bottom>
          <!-- THÊM MÁY TÍNH -->
          <bottom class="modal__btn--add">
            <i class="fa-solid fa-plus"></i>
            <div class="computer__add__option">
              <ul>
                <li>
                  <a href="./APP/ADD/addNewComputer.html" class="add--option">Thêm máy mới</a>
                </li>
                <li>
                  <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
                </li>
              </ul>
            </div>
          </bottom>
          <h1 class="title--large">MÁY TÍNH</h1>
          <div class="detail">
            <div class="detail__amount">
              <span class="detail--title"> Số lượng máy: </span>
              <span class="detail--content"> 50 </span>
            </div>
            <div class="detail__work">
              <span class="detail--title"> Số máy hoạt động: </span>
              <span class="detail--content"> 48 </span>
            </div>
            <div class="detail__broken">
              <span class="detail--title">
                Số máy không hoạt động:
              </span>
              <span class="detail--content"> 2 </span>
            </div>
          </div>
          <div class="computer--svg" id="computer--svg" style="display: block">
            <?php
            include("computerSVG.php")
            ?>
          </div>
        </div>
      </div>
      <!-- BÀN GHẾ -->
      <div class="table">
        <div class="table--box">
          <bottom class="modal__btn--add">
            <i class="fa-solid fa-plus"></i>
            <div class="table__add__option">
              <ul>
                <li>
                  <a href="./APP/ADD/addNewTable.html" class="add--option">Thêm bàn mới</a>
                </li>
                <li>
                  <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
                </li>
              </ul>
            </div>
          </bottom>
          <button class="modal__btn--report--all">
            <a class="a__btn a__btn--report" href="./APP/REPORT/reportTable.html">
              <i class="fa-solid fa-circle-exclamation"></i>
            </a>
          </button>
          <h1 class="title--large">BÀN GHẾ</h1>
          <div class="detail">
            <div class="detail__amount">
              <span class="detail--title"> Số lượng bàn: </span>
              <span class="detail--content"> <?php echo $roomContent['soluongbanghe']; ?> </span>
            </div>
            <div class="detail__amount">
              <span class="detail--title"> Số lượng ghế: </span>
              <span class="detail--content"> <?php echo $roomContent['soluongbanghe']; ?> </span>
            </div>
            <div class="detail__work">
              <span class="detail--title"> Số bàn dùng được: </span>
              <span class="detail--content"> <?php echo ($sobanghedungduoc); ?> </span>
            </div>
            <div class="detail__broken">
              <span class="detail--title"> Số bàn hư hỏng: </span>
              <span class="detail--content"> <?php echo $tableContent['soluonghuhai']; ?> </span>
            </div>
            <div class="detail__work">
              <span class="detail--title"> Số ghế dùng được: </span>
              <span class="detail--content"> <?php echo ($sobanghedungduoc); ?> </span>
            </div>
            <div class="detail__broken">
              <span class="detail--title"> Số ghế hư hỏng: </span>
              <span class="detail--content"> <?php echo $tableContent['soluonghuhai']; ?> </span>
            </div>
          </div>
          <div class="table--svg" id="table--svg" style="display: block">
            <?php
            include("tableSVG.php")
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- PHẦN PHỤ -->
  <div class="room__content--complement">
    <!-- QUẠT -->
    <div class="fans room__content--complement--box status--damage">
      <bottom class="modal__btn--seemore">
        <i class="fa-regular fa-eye"></i>
      </bottom>
      <h1 class="title--medium">QUẠT</h1>
      <div class="amount">
        <span class="detail--complement" style="font-weight: 600; font-size: 40px">3</span>
        <span class="detail--complement">/6</span>
        <span class="status--text"> Hư hại nhiều </span>
      </div>
      <bottom class="modal__btn--add">
        <i class="fa-solid fa-plus"></i>
        <div class="complement__add__option">
          <ul>
            <li>
              <a href="./APP/ADD/addNewFan.php" class="add--option">Thêm quạt mới</a>
            </li>
            <li>
              <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
            </li>
          </ul>
        </div>
      </bottom>
    </div>
    <!-- ĐÈN -->
    <div class="lamps room__content--complement--box status--notgood">
      <bottom class="modal__btn--seemore">
        <i class="fa-regular fa-eye"></i>
      </bottom>
      <h1 class="title--medium">ĐÈN</h1>
      <div class="amount">
        <span class="detail--complement" style="font-weight: 600; font-size: 40px">7</span>
        <span class="detail--complement">/8</span>
        <span class="status--text"> Có hư hại </span>
      </div>
      <bottom class="modal__btn--add">
        <i class="fa-solid fa-plus"></i>
        <div class="complement__add__option">
          <ul>
            <li>
              <a href="./APP/ADD/addNewFan.php" class="add--option">Thêm quạt mới</a>
            </li>
            <li>
              <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
            </li>
          </ul>
        </div>
      </bottom>
    </div>
    <!-- MÁY LẠNH -->
    <div class="air-conditioner room__content--complement--box status--good">
      <bottom class="modal__btn--seemore">
        <i class="fa-regular fa-eye"></i>
      </bottom>
      <h1 class="title--medium">MÁY LẠNH</h1>
      <div class="amount">
        <span class="detail--complement" style="font-weight: 600; font-size: 40px">1</span>
        <span class="detail--complement">/1</span>
        <span class="status--text"> Tốt </span>
      </div>
      <bottom class="modal__btn--add">
        <i class="fa-solid fa-plus"></i>
        <div class="complement__add__option">
          <ul>
            <li>
              <a href="#" class="add--option">Thêm máy lạnh mới</a>
            </li>
            <li>
              <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
            </li>
          </ul>
        </div>
      </bottom>
    </div>
  </div>
<?php } ?>


<script src="./JS/seeMore.js"></script>