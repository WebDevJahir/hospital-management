$(document).ready(function () {
  /*====FOR THE STICKY NAVIGATION========*/

  stickyMan('.js-sticky-features', '.stickyman', 'sticky-top', '50px');
  stickyMan('.js-sticky-features-2', '.stickyman-2', 'sticky-top', '50px');
  stickyMan('.js-sticky-features-3', '.sticky-ch', 'd-sticky-n', '520px');

  $('.navbar-toggler-main').click(function () {
    $('#nav-icon').toggleClass('close');
  });

  $('#share-btn').click(function () {
    $('.share-reactions-btn-content').toggle();
  });

  $('#write-rev').click(function () {
    $('.write-review-main-sec').slideToggle();
  });

  $('.js-sticky-features-3').waypoint(
    function (direction) {
      if (direction == 'down') {
        $('#side-nav-lift').addClass('side-lift');
      } else {
        $('#side-nav-lift').removeClass('side-lift');
      }
    },
    {
      offset: '30px',
    }
  );
});

$(document).ready(function () {
  $(window).scroll(function () {
    if ($(this).scrollTop() > 50) {
      $('#back-to-top').fadeIn();
    } else {
      $('#back-to-top').fadeOut();
    }
  });
  // scroll body to 0px on click
  $('#back-to-top').click(function () {
    $('#back-to-top').tooltip('hide');
    $('body,html').animate(
      {
        scrollTop: 0,
      },
      800
    );
    return false;
  });

  $('#back-to-top').tooltip('show');
});

const stickyMan = (
  kothayAnimationKorbe,
  kothayClassDibe,
  konClassDibe,
  offset
) => {
  $(kothayAnimationKorbe).waypoint(
    function (direction) {
      if (direction == 'down') {
        $(kothayClassDibe).addClass(konClassDibe);
      } else {
        $(kothayClassDibe).removeClass(konClassDibe);
      }
    },
    {
      offset,
    }
  );
};

// side-nav-lift
function initOwlCarousel() {
  $('.category-main-carousel').owlCarousel({
    loop: true,
    margin: 0,
    autoplay: true,
    autoHeight: true,
    autoplayTimeout: 4000,
    smartSpeed: 800,
    nav: false,
    dots: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  });
}

initOwlCarousel();

function diffCategoryCarousel() {
  $('.diff-category-carousel').owlCarousel({
    loop: true,
    margin: 0,
    autoplay: true,
    autoHeight: true,
    autoplayTimeout: 2000,
    smartSpeed: 800,
    nav: false,
    dots: true,
    responsive: {
      0: {
        items: 3,
      },
      600: {
        items: 5,
      },
      1000: {
        items: 6,
      },
    },
  });
}

diffCategoryCarousel();

function groceryCarousel() {
  $('.grocery-main-carousel').owlCarousel({
    loop: true,
    margin: 0,
    autoplay: true,
    autoHeight: true,
    autoplayTimeout: 4000,
    smartSpeed: 800,
    nav: false,
    dots: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 1,
      },
      1000: {
        items: 1,
      },
    },
  });
}

groceryCarousel();
$('.owl_1').owlCarousel({
  loop: false,
  margin: 0,
  autoplay: true,
  autoHeight: false,

  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: true,
  dots: false,
  responsiveClass: true,
  responsive: {
    0: {
      items: 3,
    },
    600: {
      items: 6,
    },
    1000: {
      items: 8,
    },
  },
});

$('.discount-offer-carousel').owlCarousel({
  loop: false,
  margin: 0,
  autoplay: false,
  autoHeight: false,

  nav: true,
  dots: false,
  responsiveClass: true,
  responsive: {
    0: {
      items: 3,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 6,
    },
  },
});

$(document).ready(function () {
  var li = $('.nav-item a ');
  $('.nav-item a').click(function () {
    li.removeClass('active');
  });
});

$('.top-seller-carousel').owlCarousel({
  loop: true,
  margin: 0,
  autoplay: true,
  autoHeight: true,
  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

$('.best-deals-carousel').owlCarousel({
  loop: false,
  margin: 10,
  autoplay: true,
  autoHeight: false,

  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: true,
  dots: false,
  responsive: {
    0: {
      items: 2,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 8,
    },
  },
});

$('.product-flash-deal-carousel').owlCarousel({
  loop: true,
  margin: 10,
  autoplay: true,
  autoHeight: true,
  mouseDrag: true,
  touchDrag: true,
  pullDrag: true,
  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 3,
    },
    600: {
      items: 4,
    },
    1000: {
      items: 6,
    },
  },
});

$('.indiv-carousel').owlCarousel({
  loop: true,
  margin: 10,
  autoplay: true,
  autoHeight: false,

  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});
$('.product-hospice-mall-carousel').owlCarousel({
  loop: true,
  margin: 10,
  autoplay: true,
  autoHeight: false,

  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 2,
    },
    600: {
      items: 4,
    },
    1000: {
      items: 6,
    },
  },
});

$('.prod-mbl-photo-caro').owlCarousel({
  loop: true,
  margin: 10,
  autoplay: true,
  autoHeight: false,

  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

$('.people-category-carousel').owlCarousel({
  loop: true,
  margin: 10,
  autoplay: true,
  autoHeight: false,

  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 2,
    },
    600: {
      items: 3,
    },
    1000: {
      items: 6,
    },
  },
});

$('.gpharma-carousel').owlCarousel({
  loop: true,
  margin: 10,
  autoplay: true,
  autoHeight: false,

  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

$('.flash-sale-items-carousel').owlCarousel({
  loop: false,
  margin: 10,
  autoplay: true,
  autoHeight: false,

  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: true,
  dots: false,
  responsive: {
    0: {
      items: 3,
    },
    600: {
      items: 5,
    },
    1000: {
      items: 5,
    },
  },
});

$('.single-cat-carousel').owlCarousel({
  loop: false,
  margin: 10,
  autoplay: true,
  autoHeight: false,

  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: true,
  dots: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

$('.coll-mbl-fo-caro').owlCarousel({
  loop: false,
  margin: 10,
  autoplay: true,
  autoHeight: false,

  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: true,
  dots: false,
  responsive: {
    0: {
      items: 2,
    },
    600: {
      items: 2,
    },
    1000: {
      items: 2,
    },
  },
});

$('.deals-an-m-n-caro').owlCarousel({
  loop: false,
  margin: 0,
  autoplay: false,
  autoHeight: false,
  autoplayTimeout: 4000,
  smartSpeed: 800,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 4,
    },
    600: {
      items: 4,
    },
    1000: {
      items: 5,
    },
  },
});

$('.dg-sh-bn-main-caro').owlCarousel({
  loop: false,
  margin: 0,
  autoplay: false,
  autoHeight: false,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

$('.banner-sl-gds-car').owlCarousel({
  loop: false,
  margin: 0,
  autoplay: false,
  autoHeight: false,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 1,
    },
    600: {
      items: 1,
    },
    1000: {
      items: 1,
    },
  },
});

$('.tp-br-hm-cont-carou').owlCarousel({
  loop: false,
  margin: 0,
  autoplay: false,
  autoHeight: false,
  nav: false,
  dots: false,
  responsive: {
    0: {
      items: 3,
    },
    600: {
      items: 5,
    },
    1000: {
      items: 9,
    },
  },
});

var mybutton = document.getElementById('myBtn');
window.onscroll = function () {
  mainTopFunc();
};

const mainTopFunc = () => {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = 'block';
  } else {
    mybutton.style.display = 'none';
  }
};

function gotoTopFunc() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});



function openNav() {
  document.getElementById('mySidenav').style.width = '100%';
}

function closeNav() {
  document.getElementById('mySidenav').style.width = '0';
}

$(function () {
  var Accordion = function (el, multiple) {
    this.el = el || {};
    this.multiple = multiple || false;

    var links = this.el.find('.article-title');
    links.on(
      'click',
      {
        el: this.el,
        multiple: this.multiple,
      },
      this.dropdown
    );
  };

  Accordion.prototype.dropdown = function (e) {
    var $el = e.data.el;
    ($this = $(this)), ($next = $this.next());

    $next.slideToggle();
    $this.parent().toggleClass('open');

    if (!e.data.multiple) {
      $el
        .find('.accordion-content')
        .not($next)
        .slideUp()
        .parent()
        .removeClass('open');
    }
  };
  var accordion = new Accordion($('.accordion-container'), false);
});

$(document).on('click', function (event) {
  if (!$(event.target).closest('#accordion').length) {
    $this.parent().toggleClass('open');
  }
});

$('#m-mb-acc').click(function () {
  $('.account-mbl-menu-cont').toggle();
});

$('.deals-offer-mbl-close-icon').click(function () {
  $('.deals-offer-mbl-box').hide();
});

$(function () {
  $('.drop-box--1').click(function () {
    $('#ul--1').fadeToggle();
  });

  $('.drop-box--1').click(function () {
    $('.rotate--1').toggleClass('down');
  });

  $('.drop-box--2').click(function () {
    $('#ul--2').fadeToggle();
  });

  $('.drop-box--2').click(function () {
    $('.rotate--2').toggleClass('down');
  });

  $('.drop-box--3').click(function () {
    $('#ul--3').fadeToggle();
  });

  $('.drop-box--3').click(function () {
    $('.rotate--3').toggleClass('down');
  });

  $('.drop-box--4').click(function () {
    $('#ul--4').fadeToggle();
  });

  $('.drop-box--4').click(function () {
    $('.rotate--4').toggleClass('down');
  });

  $('.drop-box--5').click(function () {
    $('#ul--5').fadeToggle();
  });

  $('.drop-box--5').click(function () {
    $('.rotate--5').toggleClass('down');
  });
});

$(document).ready(function () {
  $('.count').prop('disabled', true);
  $(document).on('click', '.plus', function () {
    $('.count').val(parseInt($('.count').val()) + 1);
  });
  $(document).on('click', '.minus', function () {
    $('.count').val(parseInt($('.count').val()) - 1);
    if ($('.count').val() == 0) {
      $('.count').val(1);
    }
  });
});
