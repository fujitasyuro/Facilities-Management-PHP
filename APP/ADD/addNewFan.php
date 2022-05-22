<?php
include("../../db_conn.php");
$ID_phong = $_GET["ID_phong"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thêm quạt</title>
  <link rel="shortcut icon" href="../../IMG/logo-ctu.png" type="image/x-icon" />
  <script src="https://kit.fontawesome.com/15d8d80360.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../../CSS/app.css" />
  <script src="../../JS/jquery-3.2.1.min.js"></script>
</head>

<body>
  <header>
    <div class="nav">
      <div class="nav__logo">
        <a href="../../index.php">
          <img src="../../IMG/logo-ctu.png" alt="CTU Logo" class="nav__logo--img" />
        </a>
      </div>
    </div>
  </header>

  <main class="form__container">
    <h2 id="notiAdd"></h2>
    <h1>THÊM QUẠT</h1>

    <div class="add--minibox">
      <label for="fan-name">
        <span class="input--title">Tên quạt:</span>
        <input type="text" id="fan-name" class="input--text" placeholder="Nhập tên quạt" />
      </label>
    </div>

    <div class="add--minibox">
      <label for="fan-type">
        <span class="input--title">Loạt quạt:</span>
        <select id="fan-type" class="input--text">
          <option value="0" disabled selected>
            ----Chọn loại quạt----
          </option>
          <?php
          $loaiquat = $conn->query("SELECT * FROM loaiquat");
          while ($chonloaiquat = $loaiquat->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <option value="<?php echo $chonloaiquat['ID_loaiquat']; ?>"><?php echo $chonloaiquat['Ten_loaiquat']; ?></option>
          <?php } ?>
        </select>
      </label>
    </div>

    <div class="add--minibox">
      <label for="date-add">
        <span class="input--title">Ngày thêm:</span>
        <input type="date" id="date-add" class="input--text" />
      </label>
    </div>

    <input type="text" id="ID_phong" value="<?php echo ($ID_phong) ?>" style="display: none;">
    <input type="text" id="themquat-btn" value="themquat" style="display: none;">

    <div class="btn__box">
      <button class="btn btn__submit" id="addfan">Thêm</button>
      <input type="reset" class="btn btn__reset" />
    </div>
  </main>

  <script>
    $(document).ready(function() {
      $("#addfan").click(function() {
        var ID_phong = $("#ID_phong").val();
        var process = $("#themquat-btn").val();
        var tenquat = $("#fan-name").val();
        var loaiquat = $("#fan-type").val();
        var ngaymua = $("#date-add").val();

        $.get(
          "../../PROCESSING/add.php", {
            process: process,
            ID_phong: ID_phong,
            tenquat: tenquat,
            loaiquat: loaiquat,
            ngaymua: ngaymua
          },
          function(data) {
            $("#notiAdd").html(data);
          }
        );
      });
    });
  </script>
</body>

</html>