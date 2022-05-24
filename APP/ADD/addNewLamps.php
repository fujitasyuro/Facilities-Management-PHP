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
  <title>Thêm đèn</title>
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
    <h1>THÊM ĐÈN</h1>

    <div class="add--minibox">
      <label for="lamp-name">
        <span class="input--title">Tên đèn:</span>
        <input type="text" id="lamp-name" class="input--text" placeholder="Nhập tên đèn" />
      </label>
    </div>

    <div class="add--minibox">
      <label for="date-add">
        <span class="input--title">Ngày thêm:</span>
        <input type="date" id="date-add" class="input--text" />
      </label>
    </div>

    <input type="text" id="ID_phong" value="<?php echo ($ID_phong) ?>" style="display: none;">
    <input type="text" id="themden-btn" value="themden" style="display: none;">

    <div class="btn__box">
      <button class="btn btn__submit" id="addlamps">Thêm</button>
      <input type="reset" class="btn btn__reset" />
    </div>
  </main>

  <script>
    $(document).ready(function() {
      $("#addlamps").click(function() {
        var ID_phong = $("#ID_phong").val();
        var process = $("#themden-btn").val();
        var tenden = $("#lamp-name").val();
        var ngaymua = $("#date-add").val();

        $.get(
          "../../PROCESSING/add.php", {
            process: process,
            ID_phong: ID_phong,
            tenden: tenden,
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