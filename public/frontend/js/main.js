// zoom master plugin javascript

(function ($) {
  $(document).ready(function () {
    $('.xzoom, .xzoom-gallery').xzoom({
      zoomWidth: 400,
      title: true,
      tint: '#333',
      Xoffset: 15,
    });
    $('.xzoom2, .xzoom-gallery2').xzoom({
      position: '#xzoom2-id',
      tint: '#ffa200',
    });
    $('.xzoom3, .xzoom-gallery3').xzoom({
      position: 'lens',
      lensShape: 'circle',
      sourceClass: 'xzoom-hidden',
    });
    $('.xzoom4, .xzoom-gallery4').xzoom({ tint: '#006699', Xoffset: 15 });
    $('.xzoom5, .xzoom-gallery5').xzoom({ tint: '#006699', Xoffset: 15 });

    //Integration with hammer.js
    var isTouchSupported = 'ontouchstart' in window;

    if (isTouchSupported) {
      //If touch device
      $('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function () {
        var xzoom = $(this).data('xzoom');
        xzoom.eventunbind();
      });

      $('.xzoom, .xzoom2, .xzoom3').each(function () {
        var xzoom = $(this).data('xzoom');
        $(this)
          .hammer()
          .on('tap', function (event) {
            event.pageX = event.gesture.center.pageX;
            event.pageY = event.gesture.center.pageY;
            var s = 1,
              ls;

            xzoom.eventmove = function (element) {
              element.hammer().on('drag', function (event) {
                event.pageX = event.gesture.center.pageX;
                event.pageY = event.gesture.center.pageY;
                xzoom.movezoom(event);
                event.gesture.preventDefault();
              });
            };

            xzoom.eventleave = function (element) {
              element.hammer().on('tap', function (event) {
                xzoom.closezoom();
              });
            };
            xzoom.openzoom(event);
          });
      });

      $('.xzoom4').each(function () {
        var xzoom = $(this).data('xzoom');
        $(this)
          .hammer()
          .on('tap', function (event) {
            event.pageX = event.gesture.center.pageX;
            event.pageY = event.gesture.center.pageY;
            var s = 1,
              ls;

            xzoom.eventmove = function (element) {
              element.hammer().on('drag', function (event) {
                event.pageX = event.gesture.center.pageX;
                event.pageY = event.gesture.center.pageY;
                xzoom.movezoom(event);
                event.gesture.preventDefault();
              });
            };

            var counter = 0;
            xzoom.eventclick = function (element) {
              element.hammer().on('tap', function () {
                counter++;
                if (counter == 1) setTimeout(openfancy, 300);
                event.gesture.preventDefault();
              });
            };

            function openfancy() {
              if (counter == 2) {
                xzoom.closezoom();
                $.fancybox.open(xzoom.gallery().cgallery);
              } else {
                xzoom.closezoom();
              }
              counter = 0;
            }
            xzoom.openzoom(event);
          });
      });

      $('.xzoom5').each(function () {
        var xzoom = $(this).data('xzoom');
        $(this)
          .hammer()
          .on('tap', function (event) {
            event.pageX = event.gesture.center.pageX;
            event.pageY = event.gesture.center.pageY;
            var s = 1,
              ls;

            xzoom.eventmove = function (element) {
              element.hammer().on('drag', function (event) {
                event.pageX = event.gesture.center.pageX;
                event.pageY = event.gesture.center.pageY;
                xzoom.movezoom(event);
                event.gesture.preventDefault();
              });
            };

            var counter = 0;
            xzoom.eventclick = function (element) {
              element.hammer().on('tap', function () {
                counter++;
                if (counter == 1) setTimeout(openmagnific, 300);
                event.gesture.preventDefault();
              });
            };

            function openmagnific() {
              if (counter == 2) {
                xzoom.closezoom();
                var gallery = xzoom.gallery().cgallery;
                var i,
                  images = new Array();
                for (i in gallery) {
                  images[i] = { src: gallery[i] };
                }
                $.magnificPopup.open({
                  items: images,
                  type: 'image',
                  gallery: { enabled: true },
                });
              } else {
                xzoom.closezoom();
              }
              counter = 0;
            }
            xzoom.openzoom(event);
          });
      });
    } else {
      //If not touch device

      //Integration with fancybox plugin
      $('#xzoom-fancy').bind('click', function (event) {
        var xzoom = $(this).data('xzoom');
        xzoom.closezoom();
        $.fancybox.open(xzoom.gallery().cgallery, {
          padding: 0,
          helpers: { overlay: { locked: false } },
        });
        event.preventDefault();
      });

      //Integration with magnific popup plugin
      $('#xzoom-magnific').bind('click', function (event) {
        var xzoom = $(this).data('xzoom');
        xzoom.closezoom();
        var gallery = xzoom.gallery().cgallery;
        var i,
          images = new Array();
        for (i in gallery) {
          images[i] = { src: gallery[i] };
        }
        $.magnificPopup.open({
          items: images,
          type: 'image',
          gallery: { enabled: true },
        });
        event.preventDefault();
      });
    }
  });
})(jQuery);

// navbar fixed js goes here

$(document).ready(function () {
  $(window).scroll(function () {
    console.log($(window).scrollTop());

    if ($(window).scrollTop() > 500) {
      $('.fixed').addClass('fixed-top');
    }

    if ($(window).scrollTop() < 551) {
      $('.fixed').removeClass('fixed-top');
    }
  });
});

// add to cart js
$(function () {
  var goToCartIcon = function ($addTocartBtn) {
    var $cartIcon = $('.my-cart-icon');
    var $image = $(
      '<img width="30px" height="30px" src="' +
        $addTocartBtn.data('image') +
        '"/>'
    ).css({ position: 'fixed', 'z-index': '999' });
    $addTocartBtn.prepend($image);
    var position = $cartIcon.position();
    $image.animate(
      {
        top: position.top,
        left: position.left,
      },
      500,
      'linear',
      function () {
        $image.remove();
      }
    );
  };

  $('.my-cart-btn').myCart({
    currencySymbol: '$',
    classCartIcon: 'my-cart-icon',
    classCartBadge: 'my-cart-badge',
    classProductQuantity: 'my-product-quantity',
    classProductRemove: 'my-product-remove',
    classCheckoutCart: 'my-cart-checkout',
    affixCartIcon: true,
    showCheckoutModal: true,
    numberOfDecimals: 2,
    cartItems: [
      {
        id: 1,
        name: 'product 1',
        summary: 'summary 1',
        price: 10,
        quantity: 1,
        image: 'images/img_1.png',
      },
      {
        id: 2,
        name: 'product 2',
        summary: 'summary 2',
        price: 20,
        quantity: 2,
        image: 'images/img_2.png',
      },
      {
        id: 3,
        name: 'product 3',
        summary: 'summary 3',
        price: 30,
        quantity: 1,
        image: 'images/img_3.png',
      },
    ],
    clickOnAddToCart: function ($addTocart) {
      goToCartIcon($addTocart);
    },
    afterAddOnCart: function (products, totalPrice, totalQuantity) {
      console.log('afterAddOnCart', products, totalPrice, totalQuantity);
    },
    clickOnCartIcon: function ($cartIcon, products, totalPrice, totalQuantity) {
      console.log(
        'cart icon clicked',
        $cartIcon,
        products,
        totalPrice,
        totalQuantity
      );
    },
    checkoutCart: function (products, totalPrice, totalQuantity) {
      var checkoutString =
        'Total Price: ' + totalPrice + '\nTotal Quantity: ' + totalQuantity;
      checkoutString +=
        '\n\n id \t name \t summary \t price \t quantity \t image path';
      $.each(products, function () {
        checkoutString +=
          '\n ' +
          this.id +
          ' \t ' +
          this.name +
          ' \t ' +
          this.summary +
          ' \t ' +
          this.price +
          ' \t ' +
          this.quantity +
          ' \t ' +
          this.image;
      });
      alert(checkoutString);
      console.log('checking out', products, totalPrice, totalQuantity);
    },
    getDiscountPrice: function (products, totalPrice, totalQuantity) {
      console.log('calculating discount', products, totalPrice, totalQuantity);
      return totalPrice * 0.5;
    },
  });

  $('#addNewProduct').click(function (event) {
    var currentElementNo = $('.row').children().length + 1;
    $('.row').append(
      '<div class="col-md-3 text-center"><img src="images/img_empty.png" width="150px" height="150px"><br>product ' +
        currentElementNo +
        ' - <strong>$' +
        currentElementNo +
        '</strong><br><button class="btn btn-danger my-cart-btn" data-id="' +
        currentElementNo +
        '" data-name="product ' +
        currentElementNo +
        '" data-summary="summary ' +
        currentElementNo +
        '" data-price="' +
        currentElementNo +
        '" data-quantity="1" data-image="images/img_empty.png">Add to Cart</button><a href="#" class="btn btn-info">Details</a></div>'
    );
  });
});
// js for list view and grid view

$('.simple-list-grid').simpleListGrid();

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-36251023-1']);
_gaq.push(['_setDomainName', 'jqueryscript.net']);
_gaq.push(['_trackPageview']);

(function () {
  var ga = document.createElement('script');
  ga.type = 'text/javascript';
  ga.async = true;
  ga.src =
    ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
    '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0];
  s.parentNode.insertBefore(ga, s);
})();
