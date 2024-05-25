window.addEventListener("DOMContentLoaded", function () {
  const mainEl = document.getElementById("main-wrap");
  const header = document.getElementById("header");
  const navMenuToggler = document.querySelector("#menu-toggler");
  const navSidebar = document.querySelector("#nav-sidebar");

  // // Disable redirect on product click
  const allProductLinks = [...document.querySelectorAll("a")].filter((link) =>
    link.getAttribute("href").includes("/product/")
  );

  allProductLinks.forEach((link) => {
    link.onclick = (e) => e.preventDefault();
  });

  const setMainTopMargin = () => {
    if (header.classList.contains("header-scrolled")) {
      mainEl.classList.remove("in-full-header");
    } else {
      mainEl.classList.add("in-full-header");
    }
  };

  navMenuToggler.addEventListener("click", () => {
    navMenuToggler.classList.toggle("open");
    navSidebar.classList.toggle("open");
  });

  const setHeaderFullSize = (isFullSize) => {
    if (isFullSize) {
      header.classList.remove("header-scrolled");
    } else {
      header.classList.add("header-scrolled");
    }
  };

  window.onscroll = () => {
    const scrollTop = window.scrollY || document.documentElement.scrollTop;
    setMainTopMargin();

    if (scrollTop < 70) {
      setHeaderFullSize(true);
    } else {
      setHeaderFullSize(false);
    }
  };

  jQuery(function ($) {
    function updateCartCount() {
      $.ajax({
        url: ajax_object.ajax_url,
        type: "GET",
        data: { action: "get_cart_count" },
        success: function (response) {
          $(".cart-icon .count").text(response);
        },
      });
    }

    updateCartCount();

    $(document).on(
      "added_to_cart",
      function (event, fragments, cart_hash, button) {
        updateCartCount();
      }
    );
  });

  function smoothScrollToAnchor(event) {
    event.preventDefault();
    const targetId = this.getAttribute("href").substring(1);
    const targetElement = document.getElementById(targetId);

    if (navSidebar && navSidebar.classList.contains("open")) {
      navMenuToggler.classList.remove("open");
      navSidebar.classList.remove("open");
    }

    if (targetElement) {
      const offsetTop =
        targetElement.getBoundingClientRect().top + window.pageYOffset;

      window.scrollTo({
        top: offsetTop,
        behavior: "smooth",
      });
    }
  }

  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", smoothScrollToAnchor);
  });

  // translates
  const translateStrings = [
    {
      selectorType: "class",
      selector: ".wc-block-components-totals-shipping__change-address__link",
      text: "Change address",
      changeTo: "Змінити адресу",
    },
    {
      selectorType: "class",
      selector:
        ".wp-block-woocommerce-cart-order-summary-heading-block.wc-block-cart__totals-title",
      text: "Change address",
      changeTo: "Підсумки кошика",
    },
    {
      selectorType: "class",
      selector:
        ".components-button.wc-block-components-button.wp-element-button.wc-block-cart__submit-button contained",
      text: "Change address",
      changeTo: "Підсумки кошика",
    },
  ];

  const translateElements = async (arr) => {
    arr.forEach((item) => {
      if (
        item.selectorType === "class" &&
        document.querySelector(item.selector)
      ) {
        document.querySelector(item.selector).textContent = item.changeTo;
      }
      if (
        item.selectorType === "id" ??
        document.getElementById(item.selector)
      ) {
        document.getElementById(item.selector).textContent = item.changeTo;
      }
    });
  };

  setTimeout(() => {
    translateElements(translateStrings);
  }, 1500);
});
