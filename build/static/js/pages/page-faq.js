"use strict";

jQuery(document).ready(function () {
  var allFAQs = document.querySelectorAll(".single-faq-wrap");
  allFAQs.forEach(function (wrap) {
    var answer = jQuery(wrap).find(jQuery(".answer")).hide();
    wrap.querySelector(".question").addEventListener("click", function (e) {
      answer.slideToggle(200);
      wrap.classList.toggle("opened");
    });
  });
});