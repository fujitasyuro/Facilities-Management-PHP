var buildingBtns = document.querySelectorAll(".miniroom");

buildingBtns.forEach(function (btn) {
  btn.onclick = function () {
    var floor = btn.getAttribute("data-modal");
    document.getElementById(floor).classList.add("active");
    var ID_phong = btn.getAttribute("IDPhong");
    var ID_loaiphong = btn.getAttribute("IDLoai");

    jQuery.get(
      "./Modules/rooms.php",
      { ID_phong: ID_phong, ID_loaiphong: ID_loaiphong },
      function (roomdata) {
        jQuery("#rooms--box").html(roomdata);
      }
    );

    document.getElementById(floor).classList.add("active");
  };
});

var buildingClose = document.querySelectorAll(".room--close");

buildingClose.forEach(function (btn) {
  btn.onclick = function () {
    var room = btn.closest(".room").classList.remove("active");
  };
});
