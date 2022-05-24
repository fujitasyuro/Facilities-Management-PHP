<?php
include("../db_conn.php")
?>

<?php
$ID_phong = $_GET["ID_phong"];
$queryTable = $_GET["queryTable"];
?>

<?php
if ($queryTable == "maytinh") {
?>
  <?php
  $seemore = $conn->query("SELECT * FROM $queryTable WHERE ID_phong = $ID_phong");
  ?>

  <table class="seemore__content">
    <thead>
      <th>ID</th>
      <th>Số máy</th>
      <th>Cấu hình</th>
      <th>Ngày mua</th>
      <th>Tình trạng</th>
      <th>Thao tác</th>
    </thead>

    <tbody>

      <?php while ($seemoreContent = $seemore->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
          <td><?php echo $seemoreContent['ID_maytinh']; ?></td>
          <td>Máy số <?php echo $seemoreContent['somay']; ?></td>
          <td>
            <p>
              <span> CPU: </span>
              <span> <?php echo $seemoreContent['cpu']; ?> </span>
            </p>
            <p>
              <span> RAM: </span>
              <span> <?php echo $seemoreContent['ram']; ?> </span>
            </p>
            <p>
              <span> GPU: </span>
              <span> <?php echo $seemoreContent['gpu']; ?> </span>
            </p>
            <p>
              <span> Ổ cứng: </span>
              <span> <?php echo $seemoreContent['ocung']; ?> </span>
            </p>
            <p>
              <span> Mainboard: </span>
              <span> <?php echo $seemoreContent['mainboard']; ?> </span>
            </p>
            <p>
              <span> Hệ điều hành: </span>
              <span> <?php echo $seemoreContent['os']; ?> </span>
            </p>
            <p>
              <span> Màn hình: </span>
              <span> <?php echo $seemoreContent['manhinh']; ?> </span>
            </p>
            <p>
              <span> Bàn phím: </span>
              <span> <?php echo $seemoreContent['banphim']; ?> </span>
            </p>
            <p>
              <span> Chuột: </span>
              <span> <?php echo $seemoreContent['chuot']; ?> </span>
            </p>
          </td>
          <td><?php echo $seemoreContent['Ngay_mua_maytinh']; ?></td>
          <td>
            <?php

            $ID_maytinh = $seemoreContent["ID_maytinh"];

            $tinhtrangTable = "tinhtrang" . '' . $queryTable;
            $IDtinhtrangTable = "ID_" . '' . $queryTable;
            $tinhtrang = $conn->query("SELECT * FROM $tinhtrangTable WHERE $IDtinhtrangTable = $ID_maytinh");

            $tinhtrangmay = $tinhtrang->fetch(PDO::FETCH_ASSOC);
            if ($tinhtrangmay["tinhtrang"] == 1) {
              echo '<span class="status--good--text">Hoạt động bình thường</span>';
            } else {
              echo '<span class="status--damage--text">Có hư hại</span>';
            }
            ?>
          </td>
          <td>
            <button class="modal__btn--delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
            <button class="modal__btn--edit">
              <i class="fa-regular fa-pen-to-square"></i>
            </button>
            <button class="modal__btn--report">
              <a href="./APP/REPORT/reportComputer.html" class="a__btn a__btn--report">
                <i class="fa-solid fa-circle-exclamation"></i>
              </a>
            </button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

<?php } elseif ($queryTable == "den") { ?>
  <?php
  $seemore = $conn->query("SELECT * FROM $queryTable WHERE ID_phong = $ID_phong");
  ?>

  <table class="seemore__content">
    <thead>
      <th>ID</th>
      <th>Tên đèn</th>
      <th>Ngày mua đèn</th>
      <th>Tình trạng</th>
      <th>Thao tác</th>
    </thead>

    <tbody>

      <?php while ($seemoreContent = $seemore->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
          <td><?php echo $seemoreContent['ID_dem']; ?></td>
          <td><?php echo $seemoreContent['Ten_den']; ?></td>
          <td><?php echo $seemoreContent['Ngay_mua_den']; ?></td>
          <td>
            <?php

            $ID_den = $seemoreContent["ID_den"];

            $tinhtrangTable = "tinhtrang" . '' . $queryTable;
            $IDtinhtrangTable = "ID_" . '' . $queryTable;
            $tinhtrang = $conn->query("SELECT * FROM $tinhtrangTable WHERE $IDtinhtrangTable = $ID_den");

            $tinhtrangmay = $tinhtrang->fetch(PDO::FETCH_ASSOC);
            if ($tinhtrangmay["tinhtrang"] == 0) {
              echo '<span class="status--good--text">Có hư hại</span>';
            } else {
              echo '<span class="status--damage--text">Hoạt động bình thường</span>';
            }
            ?>
          </td>
          <td>
            <button class="modal__btn--delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
            <button class="modal__btn--edit">
              <i class="fa-regular fa-pen-to-square"></i>
            </button>
            <button class="modal__btn--report">
              <a href="./APP/REPORT/reportComputer.html" class="a__btn a__btn--report">
                <i class="fa-solid fa-circle-exclamation"></i>
              </a>
            </button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } elseif ($queryTable == "quat") { ?>
  <?php
  $seemore = $conn->query("SELECT * FROM $queryTable WHERE ID_phong = $ID_phong");
  ?>

  <table class="seemore__content">
    <thead>
      <th>ID</th>
      <th>Tên quạt</th>
      <th>Loại quạt</th>
      <th>Ngày mua quạt</th>
      <th>Tình trạng</th>
      <th>Thao tác</th>
    </thead>

    <tbody>

      <?php while ($seemoreContent = $seemore->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
          <td><?php echo $seemoreContent['ID_quat']; ?></td>
          <td><?php echo $seemoreContent['Ten_quat']; ?></td>
          <td>
            <?php
            $ID_quat = $seemoreContent["ID_quat"];
            $loaiquat = $conn->query("SELECT loaiquat.Ten_loaiquat FROM quat, loaiquat WHERE quat.ID_quat = $ID_quat AND quat.ID_loaiquat = loaiquat.ID_loaiquat");
            $tenloaiquat = $loaiquat->fetch(PDO::FETCH_ASSOC);

            echo ($tenloaiquat["Ten_loaiquat"]);

            ?>
          </td>
          <td><?php echo $seemoreContent['Ngay_mua_quat']; ?></td>
          <td>
            <?php
            $tinhtrangTable = "tinhtrang" . '' . $queryTable;
            $IDtinhtrangTable = "ID_" . '' . $queryTable;
            $tinhtrang = $conn->query("SELECT * FROM $tinhtrangTable WHERE $IDtinhtrangTable = $ID_quat");

            $tinhtrangmay = $tinhtrang->fetch(PDO::FETCH_ASSOC);
            if ($tinhtrangmay["tinhtrang"] == 0) {
              echo '<span class="status--good--text">Có hư hại</span>';
            } else {
              echo '<span class="status--damage--text">Hoạt động bình thường</span>';
            }
            ?>
          </td>
          <td>
            <button class="modal__btn--delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
            <button class="modal__btn--edit">
              <i class="fa-regular fa-pen-to-square"></i>
            </button>
            <button class="modal__btn--report">
              <a href="./APP/REPORT/reportComputer.html" class="a__btn a__btn--report">
                <i class="fa-solid fa-circle-exclamation"></i>
              </a>
            </button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } elseif ($queryTable == "maylanh") { ?>
  <?php
  $seemore = $conn->query("SELECT * FROM $queryTable WHERE ID_phong = $ID_phong");
  ?>

  <table class="seemore__content">
    <thead>
      <th>ID</th>
      <th>Tên máy lạnh</th>
      <th>Ngày mua máy lạnh</th>
      <th>Tình trạng</th>
      <th>Thao tác</th>
    </thead>

    <tbody>

      <?php while ($seemoreContent = $seemore->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
          <td><?php echo $seemoreContent['ID_maylanh']; ?></td>
          <td><?php echo $seemoreContent['Ten_maylanh']; ?></td>
          <td><?php echo $seemoreContent['Ngay_mua_maylanh']; ?></td>
          <td>
            <?php

            $ID_maylanh = $seemoreContent["ID_maylanh"];

            $tinhtrangTable = "tinhtrang" . '' . $queryTable;
            $IDtinhtrangTable = "ID_" . '' . $queryTable;
            $tinhtrang = $conn->query("SELECT * FROM $tinhtrangTable WHERE $IDtinhtrangTable = $ID_maylanh");

            $tinhtrangmay = $tinhtrang->fetch(PDO::FETCH_ASSOC);
            if ($tinhtrangmay["tinhtrang"] == 0) {
              echo '<span class="status--good--text">Có hư hại</span>';
            } else {
              echo '<span class="status--damage--text">Hoạt động bình thường</span>';
            }
            ?>
          </td>
          <td>
            <button class="modal__btn--delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
            <button class="modal__btn--edit">
              <i class="fa-regular fa-pen-to-square"></i>
            </button>
            <button class="modal__btn--report">
              <a href="./APP/REPORT/reportComputer.html" class="a__btn a__btn--report">
                <i class="fa-solid fa-circle-exclamation"></i>
              </a>
            </button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } elseif ($queryTable == "tivi") { ?>
  <?php
  $seemore = $conn->query("SELECT * FROM $queryTable WHERE ID_phong = $ID_phong");
  ?>

  <table class="seemore__content">
    <thead>
      <th>ID</th>
      <th>Tên tivi</th>
      <th>Ngày mua tivi</th>
      <th>Tình trạng</th>
      <th>Thao tác</th>
    </thead>

    <tbody>

      <?php while ($seemoreContent = $seemore->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
          <td><?php echo $seemoreContent['ID_tivi']; ?></td>
          <td><?php echo $seemoreContent['Ten_tivi']; ?></td>
          <td><?php echo $seemoreContent['Ngay_mua_tivi']; ?></td>
          <td>
            <?php

            $ID_tivi = $seemoreContent["ID_tivi"];

            $tinhtrangTable = "tinhtrang" . '' . $queryTable;
            $IDtinhtrangTable = "ID_" . '' . $queryTable;
            $tinhtrang = $conn->query("SELECT * FROM $tinhtrangTable WHERE $IDtinhtrangTable = $ID_tivi");

            $tinhtrangmay = $tinhtrang->fetch(PDO::FETCH_ASSOC);
            if ($tinhtrangmay["tinhtrang"] == 0) {
              echo '<span class="status--good--text">Có hư hại</span>';
            } else {
              echo '<span class="status--damage--text">Hoạt động bình thường</span>';
            }
            ?>
          </td>
          <td>
            <button class="modal__btn--delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
            <button class="modal__btn--edit">
              <i class="fa-regular fa-pen-to-square"></i>
            </button>
            <button class="modal__btn--report">
              <a href="./APP/REPORT/reportComputer.html" class="a__btn a__btn--report">
                <i class="fa-solid fa-circle-exclamation"></i>
              </a>
            </button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } elseif ($queryTable == "loa") { ?>
  <?php
  $seemore = $conn->query("SELECT * FROM $queryTable WHERE ID_phong = $ID_phong");
  ?>

  <table class="seemore__content">
    <thead>
      <th>ID</th>
      <th>Tên loa</th>
      <th>Ngày mua loa</th>
      <th>Tình trạng</th>
      <th>Thao tác</th>
    </thead>

    <tbody>

      <?php while ($seemoreContent = $seemore->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
          <td><?php echo $seemoreContent['ID_loa']; ?></td>
          <td><?php echo $seemoreContent['Ten_loa']; ?></td>
          <td><?php echo $seemoreContent['Ngay_mua_loa']; ?></td>
          <td>
            <?php

            $ID_loa = $seemoreContent["ID_loa"];

            $tinhtrangTable = "tinhtrang" . '' . $queryTable;
            $IDtinhtrangTable = "ID_" . '' . $queryTable;
            $tinhtrang = $conn->query("SELECT * FROM $tinhtrangTable WHERE $IDtinhtrangTable = $ID_loa");

            $tinhtrangmay = $tinhtrang->fetch(PDO::FETCH_ASSOC);
            if ($tinhtrangmay["tinhtrang"] == 0) {
              echo '<span class="status--good--text">Có hư hại</span>';
            } else {
              echo '<span class="status--damage--text">Hoạt động bình thường</span>';
            }
            ?>
          </td>
          <td>
            <button class="modal__btn--delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
            <button class="modal__btn--edit">
              <i class="fa-regular fa-pen-to-square"></i>
            </button>
            <button class="modal__btn--report">
              <a href="./APP/REPORT/reportComputer.html" class="a__btn a__btn--report">
                <i class="fa-solid fa-circle-exclamation"></i>
              </a>
            </button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } elseif ($queryTable == "mic") { ?>
  <?php
  $seemore = $conn->query("SELECT * FROM $queryTable WHERE ID_phong = $ID_phong");
  ?>

  <table class="seemore__content">
    <thead>
      <th>ID</th>
      <th>Tên mic</th>
      <th>Ngày mua mic</th>
      <th>Tình trạng</th>
      <th>Thao tác</th>
    </thead>

    <tbody>

      <?php while ($seemoreContent = $seemore->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
          <td><?php echo $seemoreContent['ID_mic']; ?></td>
          <td><?php echo $seemoreContent['Ten_mic']; ?></td>
          <td><?php echo $seemoreContent['Ngay_mua_mic']; ?></td>
          <td>
            <?php

            $ID_mic = $seemoreContent["ID_mic"];

            $tinhtrangTable = "tinhtrang" . '' . $queryTable;
            $IDtinhtrangTable = "ID_" . '' . $queryTable;
            $tinhtrang = $conn->query("SELECT * FROM $tinhtrangTable WHERE $IDtinhtrangTable = $ID_mic");

            $tinhtrangmay = $tinhtrang->fetch(PDO::FETCH_ASSOC);
            if ($tinhtrangmay["tinhtrang"] == 0) {
              echo '<span class="status--good--text">Có hư hại</span>';
            } else {
              echo '<span class="status--damage--text">Hoạt động bình thường</span>';
            }
            ?>
          </td>
          <td>
            <button class="modal__btn--delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
            <button class="modal__btn--edit">
              <i class="fa-regular fa-pen-to-square"></i>
            </button>
            <button class="modal__btn--report">
              <a href="./APP/REPORT/reportComputer.html" class="a__btn a__btn--report">
                <i class="fa-solid fa-circle-exclamation"></i>
              </a>
            </button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } elseif ($queryTable == "maychieu") { ?>
  <?php
  $seemore = $conn->query("SELECT * FROM $queryTable WHERE ID_phong = $ID_phong");
  ?>

  <table class="seemore__content">
    <thead>
      <th>ID</th>
      <th>Tên máy chiếu</th>
      <th>Ngày mua máy chiếu</th>
      <th>Tình trạng</th>
      <th>Thao tác</th>
    </thead>

    <tbody>

      <?php while ($seemoreContent = $seemore->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
          <td><?php echo $seemoreContent['ID_maychieu']; ?></td>
          <td><?php echo $seemoreContent['Ten_maychieu']; ?></td>
          <td><?php echo $seemoreContent['Ngay_mua_maychieu']; ?></td>
          <td>
            <?php

            $ID_maychieu = $seemoreContent["ID_maychieu"];

            $tinhtrangTable = "tinhtrang" . '' . $queryTable;
            $IDtinhtrangTable = "ID_" . '' . $queryTable;
            $tinhtrang = $conn->query("SELECT * FROM $tinhtrangTable WHERE $IDtinhtrangTable = $ID_maychieu");

            $tinhtrangmay = $tinhtrang->fetch(PDO::FETCH_ASSOC);
            if ($tinhtrangmay["tinhtrang"] == 0) {
              echo '<span class="status--good--text">Có hư hại</span>';
            } else {
              echo '<span class="status--damage--text">Hoạt động bình thường</span>';
            }
            ?>
          </td>
          <td>
            <button class="modal__btn--delete">
              <i class="fa-regular fa-trash-can"></i>
            </button>
            <button class="modal__btn--edit">
              <i class="fa-regular fa-pen-to-square"></i>
            </button>
            <button class="modal__btn--report">
              <a href="./APP/REPORT/reportComputer.html" class="a__btn a__btn--report">
                <i class="fa-solid fa-circle-exclamation"></i>
              </a>
            </button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>
<?php } ?>