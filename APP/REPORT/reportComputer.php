<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Báo cáo vấn đề</title>
    <link
      rel="shortcut icon"
      href="../../IMG/logo-ctu.png"
      type="image/x-icon"
    />
    <link rel="stylesheet" href="../../CSS/app.css" />
    <script
      src="https://kit.fontawesome.com/15d8d80360.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header>
      <div class="nav">
        <div class="nav__logo">
          <a href="../../index.php">
            <img
              src="../../IMG/logo-ctu.png"
              alt="CTU Logo"
              class="nav__logo--img"
            />
          </a>
        </div>
      </div>
    </header>

    <main class="form__container">
      <h1>BÁO CÁO MÁY TÍNH CÓ VẤN ĐỀ</h1>

      <form action="#">
        <label for="tableReport">
          <h2>Mô tả vấn đề</h2>

          <textarea
            name="tableReport"
            id="tableReport"
            class="text__box"
            cols="85"
            rows="10"
          ></textarea>
        </label>

        <div class="btn__box">
          <input
            type="submit"
            value="Báo cáo"
            class="btn btn__submit"
            name="reportcomputer"
          />
          <input type="reset" class="btn btn__reset" />
        </div>
      </form>
    </main>
  </body>
</html>