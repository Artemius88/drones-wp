"use strict";

window.getCatalogueGroups = function (result) {
  var currentSkuId = window.location.hash.replace('#', '');
  var allProducts = [];
  result.forEach(function (group) {
    group.skus.forEach(function (sku) {
      allProducts.push(sku);
    });
  });
  var productName = document.querySelector('.pdp-description-wrap h1');
  var productImage = document.querySelector('.product-image-wrap img');
  var productSize = document.querySelector('.thc-contain .pcs');
  var productThc = document.querySelector('.thc-contain .thc');
  var addBtn = document.querySelector('.add-to-cart');
  var productPrice = document.querySelector('.price');
  var productDescription = document.querySelector('.pdp-description');
  var productIngredients = document.querySelector('.ingredients');
  var productSupplementFacts = document.querySelector('.supplement-facts');
  var quantityController = document.querySelector('.quantity-wrap');
  allProducts.forEach(function (product) {
    if (product.skuId == currentSkuId) {
      productName.innerHTML = product.name;
      productImage.setAttribute('src', product.images[0]);
      productImage.setAttribute('data-magnify-src', product.images[0]);
      productSize.innerHTML = product.unitSize + product.unit;
      productThc.innerHTML = product.THC + product.thcCbdUnit.replace('MILLIGRAM_UNIT', 'mg/unit') + ' THC';
      addBtn.setAttribute('data-sku-id', product.skuId);
      quantityController.querySelector('.added-quantity').setAttribute('data-sku-id', product.skuId);
      quantityController.querySelector('.plus').setAttribute('data-sku-id', product.skuId);
      quantityController.querySelector('.minus').setAttribute('data-sku-id', product.skuId);
      productDescription.innerHTML = product.description;
      productPrice.innerHTML = '$' + (product.price / 100).toFixed(2);
      var ingredientsArray = productDescription.innerHTML.split('INGREDIENTS:');
      var supplementFacts = ingredientsArray[1].split('SUPPLEMENT FACTS:');
      var descriptionArray = [];
      descriptionArray.push(ingredientsArray[0], supplementFacts[0], supplementFacts[1]);
      productDescription.innerHTML = descriptionArray[0];
      productIngredients.innerHTML = 'INGREDIENTS: ' + descriptionArray[1];
      productSupplementFacts.innerHTML = 'SUPPLEMENT FACTS: ' + descriptionArray[2];
    }
  });

  window.orderCallback = function (order) {
    order.skus.forEach(function (orderSku) {
      if (document.querySelector('.added-quantity').getAttribute('data-sku-id') == orderSku.skuId) {
        document.querySelector('.added-quantity').innerHTML = orderSku.quantity;
        document.querySelector('.add-to-cart').classList.add('hidden');
        document.querySelector('.quantity-wrap').classList.remove('hidden');
      }
    });
  };

  document.querySelector('button.add-to-cart').addEventListener('click', function () {
    addBtn.classList.add('hidden');
    quantityController.classList.remove('hidden');
  });
  document.querySelector('.plus').addEventListener('click', function (e) {
    window.addToCart(+e.target.getAttribute('data-sku-id'));
  });
  document.querySelector('.minus').addEventListener('click', function (e) {
    if (+document.querySelector('.added-quantity').innerHTML < 2) {
      document.querySelector('.add-to-cart').classList.remove('hidden');
      document.querySelector('.quantity-wrap').classList.add('hidden');
    }

    window.removeCart(+e.target.getAttribute('data-sku-id'));
  });
};

var zoomImg = document.getElementById('zoom-img-wrap');
zoomImg.addEventListener('mouseleave', function (e) {
  this.querySelector('img').style.transform = 'scale(1)';
});
zoomImg.addEventListener('mousemove', function (e) {
  var img = document.querySelector('.product-image-wrap img'),
      x = e.pageX - this.offsetLeft,
      y = e.pageY - this.offsetTop;
  img.style.position = 'absolute';
  var xx = '-' + x / img.width * 10 + '%';
  var yy = '-' + y / img.height * 10 + '%';
  img.style.transform = "scale(1.65) translate(".concat(xx, ", ").concat(yy, ")");
});