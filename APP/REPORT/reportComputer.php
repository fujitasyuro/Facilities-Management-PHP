<?php
$ID_phong = $_GET["ID_phong"];
$ID_maytinh = $_GET["ID_maytinh"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Báo cáo vấn đề</title>
  <link rel="shortcut icon" href="../../IMG/logo-ctu.png" type="image/x-icon" />
  <link rel="stylesheet" href="../../CSS/app.css" />
  <script src="https://kit.fontawesome.com/15d8d80360.js" crossorigin="anonymous"></script>
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
    <h2 id="notiReport"></h2>
    <h1>BÁO CÁO MÁY TÍNH CÓ VẤN ĐỀ</h1>

    <label for="computerReportContent">
      <h2>Mô tả vấn đề</h2>

      <textarea id="computerReportContent" class="text__box" cols="85" rows="10"></textarea>
    </label>

    <div class="btn__box">
      <button class="btn btn__submit" id="reportcomputer--btn">Báo cáo</button>
      <input type="reset" class="btn btn__reset" />
    </div>

    <input type="text" id="ID_phong" value="<?php echo ($ID_phong) ?>" style="display: none;">
    <input type="text" id="ID_maytinh" value="<?php echo ($ID_maytinh) ?>" style="display: none;">
    <input type="text" id="reportComputerProcess" value="reportcomputer" style="display: none;">
  </main>

  <script>
    $(document).ready(function() {
      $("#reportcomputer--btn").click(function() {
        var ID_phong = $("#ID_phong").val();
        var ID_maytinh = $("#ID_maytinh").val();
        var process = $("#reportComputerProcess").val();
        var content = $("#computerReportContent").val();
        var user = 1;
        var currentdate = new Date();

        if (currentdate.getMonth() + 1 < 10) {
          var month = "0" + (currentdate.getMonth() + 1)
        } else {
          var month = (currentdate.getMonth() + 1)
        }
        var datetime = currentdate.getFullYear() + "-" + month + "-" + currentdate.getDate();


        $.get(
          "../../PROCESSING/report.php", {
            process: process,
            ID_phong: ID_phong,
            content: content,
            user: user,
            datetime: datetime,
            ID_maytinh: ID_maytinh
          },
          function(data) {
            $("#notiReport").html(data);
          }
        );
      });
    });
  </script>
</body>

</html>