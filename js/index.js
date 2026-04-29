$(".nav-category").on("click", function (e) {
  $(".nav-category").removeClass("active-category");
  $(e.target).addClass("active-category");
});
let infoOfNav = $(".navbar").length ? $(".navbar").offset().top : 0;
let navHeight = $(".navbar").outerHeight() || 0;
let helfNav = navHeight / 2;

console.log(infoOfNav);

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

// $(window).scroll(function () {
//     const scrollPosition = $(window).scrollTop();
//     if ($(".navbar").length) {
//         if (scrollPosition > 50) {
//             $(".navbar").addClass("fixed-top shadow");
//             $(".navbar").css("background-color", "var(--bg-darker)");
//         } else {
//             $(".navbar").removeClass("fixed-top shadow");
//         }
//     }
// })
