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

  <?php
  $table = $conn->query("SELECT tinhtrangbanghe.tinhtrang, tinhtrangbanghe.soluonghuhai as soluonghuhai FROM tinhtrangbanghe, banghe WHERE tinhtrangbanghe.ID_banghe = banghe.ID_banghe AND banghe.ID_phong = $ID_phong");
  $tableContent = $table->fetch(PDO::FETCH_ASSOC);
  ?>

  <?php
  $sobanghe = $roomContent['soluongbanghe'];
  $sobanghehu = $tableContent['soluonghuhai'];

  $sobanghedungduoc = $sobanghe - $sobanghehu;
  ?>

  <div class="room__content" id="rooms__room__content">
    <div class="room__content--main">
      <!-- MÁY TÍNH -->
      <div class="computer">
        <div class="computer--box">
          <bottom class="modal__btn--seemore" data-modal="ha1-2-302-computer">
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
              <span class="detail--content"> <?php echo $roomContent['soluongmaytinh']; ?> </span>
            </div>
            <div class="detail__work">
              <span class="detail--title"> Số máy hoạt động: </span>
              <span class="detail--content"> 33 </span>
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
        <span class="detail--complement">/<?php echo $roomContent['soluongquat']; ?></span>
        <span class="status--text"> Hư hại nhiều </span>
      </div>
      <bottom class="modal__btn--add">
        <i class="fa-solid fa-plus"></i>
        <div class="complement__add__option">
          <ul>
            <li>
              <a href="./APP/ADD/addNewFan.html" class="add--option">Thêm quạt mới</a>
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
        <span class="detail--complement">/<?php echo $roomContent['soluongden']; ?></span>
        <span class="status--text"> Có hư hại </span>
      </div>
      <bottom class="modal__btn--add">
        <i class="fa-solid fa-plus"></i>
        <div class="complement__add__option">
          <ul>
            <li>
              <a href="#" class="add--option">Thêm quạt mới</a>
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
        <span class="detail--complement" style="font-weight: 600; font-size: 40px">2</span>
        <span class="detail--complement">/2</span>
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

  <!-- PHÒNG TIVI -->

<?php } elseif ($ID_loaiphong == 2) { ?>

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

  <div class="room__content" id="rooms__room__content">
    <div class="room__content--main">
      <!-- MÁY TÍNH -->
      <div class="computer">
        <div class="computer--box">
          <bottom class="modal__btn--seemore" data-modal="ha1-2-302-computer">
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
          <h1 class="title--large">TIVI</h1>
          <div class="detail">
            <div class="detail__amount">
              <span class="detail--title"> Số lượng tivi: </span>
              <span class="detail--content"> <?php echo $roomContent['soluongtivi']; ?> </span>
            </div>
            <div class="detail__work">
              <span class="detail--title"> Số tivi hoạt động: </span>
              <span class="detail--content"> 1 </span>
            </div>
            <div class="detail__broken">
              <span class="detail--title">
                Số tivi không hoạt động:
              </span>
              <span class="detail--content"> 0 </span>
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
        <span class="detail--complement">/<?php echo $roomContent['soluongquat']; ?></span>
        <span class="status--text"> Hư hại nhiều </span>
      </div>
      <bottom class="modal__btn--add">
        <i class="fa-solid fa-plus"></i>
        <div class="complement__add__option">
          <ul>
            <li>
              <a href="./APP/ADD/addNewFan.html" class="add--option">Thêm quạt mới</a>
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
        <span class="detail--complement">/<?php echo $roomContent['soluongden']; ?></span>
        <span class="status--text"> Có hư hại </span>
      </div>
      <bottom class="modal__btn--add">
        <i class="fa-solid fa-plus"></i>
        <div class="complement__add__option">
          <ul>
            <li>
              <a href="#" class="add--option">Thêm quạt mới</a>
            </li>
            <li>
              <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
            </li>
          </ul>
        </div>
      </bottom>
    </div>
    <!-- Loa -->
    <div class="air-conditioner room__content--complement--box status--good">
      <bottom class="modal__btn--seemore">
        <i class="fa-regular fa-eye"></i>
      </bottom>
      <h1 class="title--medium">LOA</h1>
      <div class="amount">
        <span class="detail--complement" style="font-weight: 600; font-size: 40px">6</span>
        <span class="detail--complement">/<?php echo $roomContent['soluongloa']; ?></span>
        <span class="status--text"> Tốt </span>
      </div>
      <bottom class="modal__btn--add">
        <i class="fa-solid fa-plus"></i>
        <div class="complement__add__option">
          <ul>
            <li>
              <a href="#" class="add--option">Thêm loa mới</a>
            </li>
            <li>
              <a href="./Modules/pageUpdate.php" class="add--option">Thêm từ kho</a>
            </li>
          </ul>
        </div>
      </bottom>
    </div>
  </div>

  <!-- PHÒNG MÁY CHIẾU -->
<?php } elseif ($ID_loaiphong == 3) { ?>

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

  <div class="room__content" id="rooms__room__content">
    <div class="room__content--main">
      <!-- MÁY TÍNH -->
      <div class="computer">
        <div class="computer--box">
          <bottom class="modal__btn--seemore" data-modal="ha1-2-302-computer">
            <i class="fa-regular fa-eye"></i>
          </bottom>
          <!-- THÊM MÁY CHIẾU -->
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
          <h1 class="title--large">MÁY CHIẾU</h1>
          <div class="detail">
            <div class="detail__amount">
              <span class="detail--title"> Số lượng máy: </span>
              <span class="detail--content"> <?php echo $roomContent['soluongmaychieu']; ?> </span>
            </div>
            <div class="detail__work">
              <span class="detail--title"> Số máy hoạt động: </span>
              <span class="detail--content"> 1 </span>
            </div>
            <div class="detail__broken">
              <span class="detail--title">
                Số máy không hoạt động:
              </span>
              <span class="detail--content"> 0 </span>
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
        <span class="detail--complement">/<?php echo $roomContent['soluongquat']; ?></span>
        <span class="status--text"> Hư hại nhiều </span>
      </div>
      <bottom class="modal__btn--add">
        <i class="fa-solid fa-plus"></i>
        <div class="complement__add__option">
          <ul>
            <li>
              <a href="./APP/ADD/addNewFan.html" class="add--option">Thêm quạt mới</a>
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
        <span class="detail--complement">/<?php echo $roomContent['soluongden']; ?></span>
        <span class="status--text"> Có hư hại </span>
      </div>
      <bottom class="modal__btn--add">
        <i class="fa-solid fa-plus"></i>
        <div class="complement__add__option">
          <ul>
            <li>
              <a href="#" class="add--option">Thêm quạt mới</a>
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
      <h1 class="title--medium">LOA</h1>
      <div class="amount">
        <span class="detail--complement" style="font-weight: 600; font-size: 40px">6</span>
        <span class="detail--complement">/<?php echo $roomContent['soluongloa']; ?></span>
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

  <div class="room__content" id="rooms__room__content">
    <div class="room__content--main">
      <!-- MÁY TÍNH -->
      <div class="computer">
        <div class="computer--box">
          <bottom class="modal__btn--seemore" data-modal="ha1-2-302-computer">
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
              <a href="./APP/ADD/addNewFan.html" class="add--option">Thêm quạt mới</a>
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
              <a href="#" class="add--option">Thêm quạt mới</a>
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