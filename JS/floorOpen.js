var buildingBtns = document.querySelectorAll(".buildings__building");

buildingBtns.forEach(function (btn) {
  btn.onclick = function () {
    var floor = btn.getAttribute("data-modal");
    var ID_toanha = btn.getAttribute("buildingId");

    jQuery.get(
      "./Modules/floors.php",
      { ID_toanha: ID_toanha },
      function (data) {
        jQuery("#floors--box").html(data);
      }
    );
    document.getElementById(floor).classList.add("active");
  };
});

var buildingClose = document.querySelectorAll(".floor--close");

buildingClose.forEach(function (btn) {
  btn.onclick = function () {
    var floor = btn.closest(".floors").classList.remove("active");
  };
});
