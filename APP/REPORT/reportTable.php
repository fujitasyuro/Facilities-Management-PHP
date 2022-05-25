<?php
$ID_phong = $_GET["ID_phong"];
$ID_banghe = $_GET["ID_banghe"];
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
    <h1>BÁO CÁO VẤN ĐỀ BÀN GHẾ</h1>

    <label for="tableReport">
      <h2>Mô tả vấn đề</h2>

      <textarea id="tableReportContent" class="text__box" cols="85" rows="10"></textarea>
    </label>

    <div class="add--minibox">
      <label for="soluonghuhai">
        <span class="input--title">Số lượng hư:</span>
        <input type="text" id="soluonghuhai" class="input--text" placeholder="Nhập số lượng" />
      </label>
    </div>

    <div class="btn__box">
      <button class="btn btn__submit" id="reporttable--btn">Báo cáo</button>
      <input type="reset" class="btn btn__reset" />
    </div>

    <input type="text" id="ID_phong" value="<?php echo ($ID_phong) ?>" style="display: none;">
    <input type="text" id="ID_banghe" value="<?php echo ($ID_banghe) ?>" style="display: none;">
    <input type="text" id="reportTableProcess" value="reporttable" style="display: none;">
  </main>

  <script>
    $(document).ready(function() {
      $("#reporttable--btn").click(function() {
        var ID_phong = $("#ID_phong").val();
        var ID_banghe = $("#ID_banghe").val();
        var process = $("#reportTableProcess").val();
        var content = $("#tableReportContent").val();
        var soluonghuhai = $("#soluonghuhai").val();
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
            soluonghuhai: soluonghuhai,
            ID_banghe: ID_banghe
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