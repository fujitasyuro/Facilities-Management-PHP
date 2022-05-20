var buildingBtns = document.querySelectorAll(".modal__btn--seemore");

buildingBtns.forEach(function(btn) {
   btn.onclick = function() {
      var seeMore = btn.getAttribute("data-modal");
      document.getElementById(seeMore).classList.add("active");
   };
});

var buildingClose = document.querySelectorAll(".seemore--close");

buildingClose.forEach(function(btn) {
   btn.onclick = function() {
      var room = (btn.closest(".seemore").classList.remove("active"));
      
   };
});
