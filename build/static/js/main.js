"use strict";

function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(n); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && Symbol.iterator in Object(iter)) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

window.addEventListener("DOMContentLoaded", function () {
  var mainEl = document.getElementById("main-wrap");
  var header = document.getElementById("header");
  var navMenuToggler = document.querySelector("#menu-toggler");
  var navSidebar = document.querySelector("#nav-sidebar"); // // Disable redirect on product click

  var allProductLinks = _toConsumableArray(document.querySelectorAll("a")).filter(function (link) {
    return link.getAttribute("href").includes("/product/");
  });

  allProductLinks.forEach(function (link) {
    link.onclick = function (e) {
      return e.preventDefault();
    };
  });

  var setMainTopMargin = function setMainTopMargin() {
    if (header.classList.contains("header-scrolled")) {
      mainEl.classList.remove("in-full-header");
    } else {
      mainEl.classList.add("in-full-header");
    }
  };

  navMenuToggler.addEventListener("click", function () {
    navMenuToggler.classList.toggle("open");
    navSidebar.classList.toggle("open");
  });

  var setHeaderFullSize = function setHeaderFullSize(isFullSize) {
    if (isFullSize) {
      header.classList.remove("header-scrolled");
    } else {
      header.classList.add("header-scrolled");
    }
  };

  window.onscroll = function () {
    var scrollTop = window.scrollY || document.documentElement.scrollTop;
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
        data: {
          action: "get_cart_count"
        },
        success: function success(response) {
          $(".cart-icon .count").text(response);
        }
      });
    }

    updateCartCount();
    $(document).on("added_to_cart", function (event, fragments, cart_hash, button) {
      updateCartCount();
    });
  });

  function smoothScrollToAnchor(event) {
    event.preventDefault();
    var targetId = this.getAttribute("href").substring(1);
    var targetElement = document.getElementById(targetId);

    if (navSidebar && navSidebar.classList.contains("open")) {
      navMenuToggler.classList.remove("open");
      navSidebar.classList.remove("open");
    }

    if (targetElement) {
      var offsetTop = targetElement.getBoundingClientRect().top + window.pageYOffset;
      window.scrollTo({
        top: offsetTop,
        behavior: "smooth"
      });
    }
  }

  document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
    anchor.addEventListener("click", smoothScrollToAnchor);
  }); // translates

  var translateStrings = [{
    selectorType: "class",
    selector: ".wc-block-components-totals-shipping__change-address__link",
    text: "Change address",
    changeTo: "Змінити адресу"
  }, {
    selectorType: "class",
    selector: ".wp-block-woocommerce-cart-order-summary-heading-block.wc-block-cart__totals-title",
    text: "Change address",
    changeTo: "Підсумки кошика"
  }, {
    selectorType: "class",
    selector: ".components-button.wc-block-components-button.wp-element-button.wc-block-cart__submit-button contained",
    text: "Change address",
    changeTo: "Підсумки кошика"
  }];

  var translateElements = /*#__PURE__*/function () {
    var _ref = _asyncToGenerator( /*#__PURE__*/regeneratorRuntime.mark(function _callee(arr) {
      return regeneratorRuntime.wrap(function _callee$(_context) {
        while (1) {
          switch (_context.prev = _context.next) {
            case 0:
              arr.forEach(function (item) {
                var _ref2;

                if (item.selectorType === "class" && document.querySelector(item.selector)) {
                  document.querySelector(item.selector).textContent = item.changeTo;
                }

                if ((_ref2 = item.selectorType === "id") !== null && _ref2 !== void 0 ? _ref2 : document.getElementById(item.selector)) {
                  document.getElementById(item.selector).textContent = item.changeTo;
                }
              });

            case 1:
            case "end":
              return _context.stop();
          }
        }
      }, _callee);
    }));

    return function translateElements(_x) {
      return _ref.apply(this, arguments);
    };
  }();

  setTimeout(function () {
    translateElements(translateStrings);
  }, 1500);
});