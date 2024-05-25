"use strict";

var swiper = new Swiper(".swiper", {
  slidesPerView: 1,
  spaceBetween: 0,
  autoplay: {
    delay: 3000
  },
  speed: 1200,
  pagination: {
    el: ".swiper-pagination",
    clickable: true
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev"
  }
});