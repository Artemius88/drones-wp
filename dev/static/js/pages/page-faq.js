jQuery(document).ready(function () {
  const allFAQs = document.querySelectorAll(".single-faq-wrap");

  allFAQs.forEach(function (wrap) {
    const answer = jQuery(wrap).find(jQuery(".answer")).hide();

    wrap.querySelector(".question").addEventListener("click", function (e) {
      answer.slideToggle(200);
      wrap.classList.toggle("opened");
    });
  });
});
