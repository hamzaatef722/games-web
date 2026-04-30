$(".nav-category").on("click", function (e) {
  $(".nav-category").removeClass("active-category");
  $(e.target).addClass("active-category");
});

import { Game } from "./games.module.js";
if (document.querySelector("#games-display")) {
  new Game();
}

$(document).ready(function () {
  $("#loader span").fadeOut(500, function () {
    $("#loader").fadeOut(500, function () {
      $("#loader").addClass("d-none");
      $("#loader span").show();
    });
  });
});
