var buildingBtns = document.querySelectorAll(".modal__btn--seemore");

buildingBtns.forEach(function (btn) {
  btn.onclick = function () {
    var seeMore = btn.getAttribute("data-modal");
    var ID_phong = btn.getAttribute("roomId");
    var queryTable = btn.getAttribute("queryTable");

    jQuery.get(
      "./Modules/seemore.php",
      { ID_phong: ID_phong, queryTable: queryTable },
      function (data) {
        jQuery("#seemore--box").html(data);
      }
    );

    document.getElementById(seeMore).classList.add("active");
  };
});

var buildingClose = document.querySelectorAll(".seemore--close");

buildingClose.forEach(function (btn) {
  btn.onclick = function () {
    console.log("click");
    var room = btn.closest("#seemore").classList.remove("active");
  };
});
