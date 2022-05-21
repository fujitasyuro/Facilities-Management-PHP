<?php
$ID_phong = $_GET["ID_phong"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thêm máy tính</title>
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
    <h1>THÊM MÁY TÍNH</h1>

    <div class="add--minibox">
      <label for="cpu-add">
        <span class="input--title">CPU:</span>
        <input type="text" id="cpu-add" class="input--text" placeholder="Nhập CPU" />
      </label>
    </div>

    <div class="add--minibox">
      <label for="gpu-add">
        <span class="input--title">GPU:</span>
        <input type="text" id="gpu-add" class="input--text" placeholder="Nhập GPU" />
      </label>
    </div>

    <div class="add--minibox">
      <label for="ram-add">
        <span class="input--title">RAM:</span>
        <input type="text" id="ram-add" class="input--text" placeholder="Nhập RAM" />
      </label>
    </div>

    <div class="add--minibox">
      <label for="disk-add">
        <span class="input--title">Lưu trữ:</span>
        <input type="text" id="disk-add" class="input--text" placeholder="Nhập loại ổ cứng và dung lượng" />
      </label>
    </div>

    <div class="add--minibox">
      <label for="mainboard-add">
        <span class="input--title">Mainboard:</span>
        <input type="text" id="mainboard-add" class="input--text" placeholder="Nhập tên mainboard" />
      </label>
    </div>

    <div class="add--minibox">
      <label for="os-add">
        <span class="input--title">Hệ điều hành:</span>
        <input type="text" id="os-add" class="input--text" placeholder="Nhập hệ điều hành của thiết bị" />
      </label>
    </div>

    <div class="add--minibox">
      <label for="display-add">
        <span class="input--title">Màn hình:</span>
        <input type="text" id="display-add" class="input--text" placeholder="Nhập kích thước và độ phân giải màn hình" />
      </label>
    </div>

    <div class="add--minibox">
      <label for="mouse-add">
        <span class="input--title">Chuột:</span>
        <input type="text" id="mouse-add" class="input--text" placeholder="Nhập tên chuột" />
      </label>
    </div>

    <div class="add--minibox">
      <label for="keyboard-add">
        <span class="input--title">Bàn phím:</span>
        <input type="text" id="keyboard-add" class="input--text" placeholder="Nhập tên bàn phím" />
      </label>
    </div>

    <div class="add--minibox">
      <label for="numberOfComputer">
        <span class="input--title">Số máy:</span>
        <input type="text" id="numberOfComputer" class="input--text" placeholder="Nhập số máy" />
      </label>
    </div>

    <div class="add--minibox">
      <label for="date-add">
        <span class="input--title">Ngày thêm:</span>
        <input type="date" id="date-add" class="input--text" />
      </label>
    </div>

    <input type="text" id="ID_phong" value="<?php echo ($ID_phong) ?>" style="display: none;">
    <input type="text" id="themmaytinh-btn" value="themmaytinh" style="display: none;">

    <div class="btn__box">
      <button class="btn btn__submit" id="addcomputerbtn">Thêm</button>
      <input type="reset" class="btn btn__reset" />
    </div>
  </main>

  <script>
    $(document).ready(function() {
      $("#addcomputerbtn").click(function() {
        var ID_phong = $("#ID_phong").val();
        var process = $("#themmaytinh-btn").val();
        var cpuAdd = $("#cpu-add").val();
        var gpuAdd = $("#gpu-add").val();
        var ramAdd = $("#ram-add").val();
        var osAdd = $("#os-add").val();
        var diskAdd = $("#disk-add").val();
        var mainboardAdd = $("#mainboard-add").val();
        var displayAdd = $("#display-add").val();
        var mouseAdd = $("#mouse-add").val();
        var keyboardAdd = $("#keyboard-add").val();
        var numberOfComputer = $("#numberOfComputer").val();
        var dateAdd = $("#date-add").val();

        console.log(ID_phong);

        $.get(
          "../../PROCESSING/add.php", {
            process: process,
            ID_phong: ID_phong,
            cpuAdd: cpuAdd,
            gpuAdd: gpuAdd,
            ramAdd: ramAdd,
            osAdd: osAdd,
            diskAdd: diskAdd,
            mainboardAdd: mainboardAdd,
            displayAdd: displayAdd,
            mouseAdd: mouseAdd,
            keyboardAdd: keyboardAdd,
            numberOfComputer: numberOfComputer,
            dateAdd: dateAdd
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