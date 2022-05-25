<?php
include("../../db_conn.php");
$ID_maytinh = $_GET["ID_maytinh"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Xóa máy tính</title>
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
    <div id="notiAdd" style="align-items: center;"></div>
    <h1>XÓA MÁY TÍNH</h1>

    <h2 style="text-align: center; color:red">BẠN CÓ CHẮC MUỐN XÓA MÁY TÍNH NÀY?</h2>

    <input type="text" id="ID_maytinh" value="<?php echo ($ID_maytinh) ?>" style="display: none;">
    <input type="text" id="xoamaytinh-btn" value="xoamaytinh" style="display: none;">

    <div class="btn__box">
      <button class="btn btn__delete" id="deleteCom">Xóa</button>
    </div>
  </main>

  <script>
    $(document).ready(function() {
      $("#deleteCom").click(function() {
        var ID_maytinh = $("#ID_maytinh").val();
        var process = $("#xoamaytinh-btn").val();

        $.get(
          "../../PROCESSING/delete.php", {
            process: process,
            ID_maytinh: ID_maytinh,
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