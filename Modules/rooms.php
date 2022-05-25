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
  include("../Query/tableQuery.php")
  ?>

  <!-- QUERY MÁY TÍNH -->
  <?php
  include("../Query/computerQuery.php")
  ?>

  <!-- QUERY QUẠT -->
  <?php
  include("../Query/fanQuery.php")
  ?>

  <!-- QUERY ĐÈN -->
  <?php
  include("../Query/lampQuery.php")
  ?>

  <!-- QUERY MÁY LẠNH -->
  <?php
  include("../Query/conditionerQuery.php")
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
            <a class="a__btn a__btn--report" href="./APP/REPORT/reportTable.php?ID_phong=<?php echo ($ID_phong); ?>&ID_banghe=<?php echo $ID_banghe ?>>">
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
        <div class="title--box">
          <span class="title--medium">QUẠT</span>
          <span class="title--mini">Sức chứa: <?php echo $soquatdalap["soquatdalap"] ?> / <?php echo $roomContent['soluongquat']; ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">QUẠT</span>
          <span class="title--mini">Sức chứa: <?php echo $soquatdalap["soquatdalap"] ?> / <?php echo $roomContent['soluongquat']; ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">QUẠT</span>
          <span class="title--mini">Sức chứa: <?php echo $soquatdalap["soquatdalap"] ?> / <?php echo $roomContent['soluongquat']; ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">ĐÈN</span>
          <span class="title--mini">Sức chứa: <?php echo $sodendalap["sodendalap"] ?> / <?php echo $roomContent["soluongden"] ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">ĐÈN</span>
          <span class="title--mini">Sức chứa: <?php echo $sodendalap["sodendalap"] ?> / <?php echo $roomContent["soluongden"] ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">ĐÈN</span>
          <span class="title--mini">Sức chứa: <?php echo $sodendalap["sodendalap"] ?> / <?php echo $roomContent["soluongden"] ?></span>
        </div>
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
    <?php if ($maylanhcheck == 0) { ?>
      <div class="air-conditioner room__content--complement--box status--good">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="maylanh">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <div class="title--box">
          <span class="title--medium">MÁY LẠNH</span>
          <span class="title--mini">Sức chứa: <?php echo $somaylanhdalap["somaylanhdalap"] ?> / <?php echo $roomContent["soluongmaylanh"] ?></span>
        </div>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $somaylanhhoatdong ?></span>
          <span class="detail--complement">/<?php echo $somaylanhdalap['somaylanhdalap'] ?></span>
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
    <?php } elseif ($quatcheck == 1) { ?>
      <div class="air-conditioner room__content--complement--box status--notgood">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="maylanh">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <div class="title--box">
          <span class="title--medium">MÁY LẠNH</span>
          <span class="title--mini">Sức chứa: <?php echo $somaylanhdalap["somaylanhdalap"] ?> / <?php echo $roomContent["soluongmaylanh"] ?></span>
        </div>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $somaylanhhoatdong ?></span>
          <span class="detail--complement">/<?php echo $somaylanhdalap['somaylanhdalap'] ?></span>
          <span class="status--text"> Có hư hại </span>
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
    <?php } elseif ($quatcheck > 1) { ?>
      <div class="air-conditioner room__content--complement--box status--damage">
        <bottom class="modal__btn--seemore" data-modal="seemore" roomId="<?php echo ($ID_phong); ?>" queryTable="maylanh">
          <i class="fa-regular fa-eye"></i>
        </bottom>
        <div class="title--box">
          <span class="title--medium">MÁY LẠNH</span>
          <span class="title--mini">Sức chứa: <?php echo $somaylanhdalap["somaylanhdalap"] ?> / <?php echo $roomContent["soluongmaylanh"] ?></span>
        </div>
        <div class="amount">
          <span class="detail--complement" style="font-weight: 600; font-size: 40px"><?php echo $somaylanhhoatdong ?></span>
          <span class="detail--complement">/<?php echo $somaylanhdalap['somaylanhdalap'] ?></span>
          <span class="status--text"> Hư hại nhiều </span>
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
    <?php } ?>
  </div>

  <!-- PHÒNG TIVI -->

<?php } elseif ($ID_loaiphong == 2) { ?>

  <?php
  $room = $conn->query("SELECT * FROM phong WHERE phong.ID_phong = $ID_phong");
  $roomContent = $room->fetch(PDO::FETCH_ASSOC);
  ?>

  <!-- QUERY BÀN GHẾ -->
  <?php
  include("../Query/tableQuery.php")
  ?>

  <!-- QUERY QUẠT -->
  <?php
  include("../Query/fanQuery.php")
  ?>

  <!-- QUERY ĐÈN -->
  <?php
  include("../Query/lampQuery.php")
  ?>

  <!-- QUERY TIVI -->
  <?php
  include("../Query/tiviQuery.php")
  ?>

  <!-- QUERY LOA -->
  <?php
  include("../Query/speakerQuery.php")
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
            <a class="a__btn a__btn--report" href="./APP/REPORT/reportTable.php?ID_phong=<?php echo ($ID_phong); ?>&ID_banghe=<?php echo $ID_banghe ?>">
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
        <div class="title--box">
          <span class="title--medium">QUẠT</span>
          <span class="title--mini">Sức chứa: <?php echo $soquatdalap["soquatdalap"] ?> / <?php echo $roomContent['soluongquat']; ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">QUẠT</span>
          <span class="title--mini">Sức chứa: <?php echo $soquatdalap["soquatdalap"] ?> / <?php echo $roomContent['soluongquat']; ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">QUẠT</span>
          <span class="title--mini">Sức chứa: <?php echo $soquatdalap["soquatdalap"] ?> / <?php echo $roomContent['soluongquat']; ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">ĐÈN</span>
          <span class="title--mini">Sức chứa: <?php echo $sodendalap["sodendalap"] ?> / <?php echo $roomContent["soluongden"] ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">ĐÈN</span>
          <span class="title--mini">Sức chứa: <?php echo $sodendalap["sodendalap"] ?> / <?php echo $roomContent["soluongden"] ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">ĐÈN</span>
          <span class="title--mini">Sức chứa: <?php echo $sodendalap["sodendalap"] ?> / <?php echo $roomContent["soluongden"] ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">LOA</span>
          <span class="title--mini">Sức chứa: <?php echo $soloadalap["soloadalap"] ?> / <?php echo $roomContent["soluongloa"] ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">LOA</span>
          <span class="title--mini">Sức chứa: <?php echo $soloadalap["soloadalap"] ?> / <?php echo $roomContent["soluongloa"] ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">LOA</span>
          <span class="title--mini">Sức chứa: <?php echo $soloadalap["soloadalap"] ?> / <?php echo $roomContent["soluongloa"] ?></span>
        </div>
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

  <!-- QUERY BÀN GHẾ -->

  <?php
  include("../Query/tableQuery.php")
  ?>

  <!-- QUERY QUẠT -->
  <?php
  include("../Query/fanQuery.php")
  ?>

  <!-- QUERY ĐÈN -->
  <?php
  include("../Query/lampQuery.php")
  ?>

  <!-- QUERY LOA -->
  <?php
  include("../Query/speakerQuery.php")
  ?>

  <!-- QUERY MÁY CHIẾU -->
  <?php
  include("../Query/projectorQuery.php")
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
            <a class="a__btn a__btn--report" href="./APP/REPORT/reportTable.php?ID_phong=<?php echo ($ID_phong); ?>&ID_banghe=<?php echo $ID_banghe ?>">
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
        <div class="title--box">
          <span class="title--medium">QUẠT</span>
          <span class="title--mini">Sức chứa: <?php echo $soquatdalap["soquatdalap"] ?> / <?php echo $roomContent['soluongquat']; ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">QUẠT</span>
          <span class="title--mini">Sức chứa: <?php echo $soquatdalap["soquatdalap"] ?> / <?php echo $roomContent['soluongquat']; ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">QUẠT</span>
          <span class="title--mini">Sức chứa: <?php echo $soquatdalap["soquatdalap"] ?> / <?php echo $roomContent['soluongquat']; ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">ĐÈN</span>
          <span class="title--mini">Sức chứa: <?php echo $sodendalap["sodendalap"] ?> / <?php echo $roomContent["soluongden"] ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">ĐÈN</span>
          <span class="title--mini">Sức chứa: <?php echo $sodendalap["sodendalap"] ?> / <?php echo $roomContent["soluongden"] ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">ĐÈN</span>
          <span class="title--mini">Sức chứa: <?php echo $sodendalap["sodendalap"] ?> / <?php echo $roomContent["soluongden"] ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">LOA</span>
          <span class="title--mini">Sức chứa: <?php echo $soloadalap["soloadalap"] ?> / <?php echo $roomContent["soluongloa"] ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">LOA</span>
          <span class="title--mini">Sức chứa: <?php echo $soloadalap["soloadalap"] ?> / <?php echo $roomContent["soluongloa"] ?></span>
        </div>
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
        <div class="title--box">
          <span class="title--medium">LOA</span>
          <span class="title--mini">Sức chứa: <?php echo $soloadalap["soloadalap"] ?> / <?php echo $roomContent["soluongloa"] ?></span>
        </div>
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
            <a class="a__btn a__btn--report" href="./APP/REPORT/reportTable.php?ID_phong=<?php echo ($ID_phong); ?>&ID_banghe=<?php echo $ID_banghe ?>">
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
      <div class="title--box">
        <span class="title--medium">QUẠT</span>
        <span class="title--mini">Sức chứa: <?php echo $soquatdalap["soquatdalap"] ?> / <?php echo $roomContent['soluongquat']; ?></span>
      </div>
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
      <div class="title--box">
        <span class="title--medium">ĐÈN</span>
        <span class="title--mini">Sức chứa: <?php echo $sodendalap["sodendalap"] ?> / <?php echo $roomContent["soluongden"] ?></span>
      </div>
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
      <div class="title--box">
        <span class="title--medium">MÁY LẠNH</span>
        <span class="title--mini">Sức chứa: <?php echo $somaylanhdalap["somaylanhdalap"] ?> / <?php echo $roomContent["soluongmaylanh"] ?></span>
      </div>
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