$(document).ready(function () {

    (function ($) {

        $('.filtrar').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');

            $('.buscar').hide();

            $('.buscar').filter(function () {

                return rex.test($(this).text());

            }).show();

        })

    }(jQuery));

}); 
// size logo
// $(window).scroll(function() {
//     if($(this).scrollTop() > 90) {
//         $("#logo").addClass("logomenu");
//     }else{
//       $("#logo").removeClass("logomenu");
//     }
// });

// hiden headersup
//$(window).scroll(function() {
//    if($(this).scrollTop() > 90) {
//        $(".headersup").hide(0);
//    }else{
//      $(".headersup").show(0);
//    }
//});

//hiden boton de iniciar sesion
// $(window).scroll(function() {
//     if($(this).scrollTop() > 90) {
//         $(".hidde").hide(0);
//     }else{
//       $(".hidde").show(0);
//     }
// });

// import text efect
var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) { delta /= 2; }

        if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
        }

        setTimeout(function() {
        that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i=0; i<elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
              new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid transparent}";
        document.body.appendChild(css);
    };


$(function () {
    "use strict";
              // filter items on button click
                $('.filterby').on('click', 'a', function() {
                    var filterValue = $(this).attr('data-filter');
                    $grid.isotope({
                        filter: filterValue
                    });
                });
                // init Isotope
                var $grid = $('.portfolio-box').isotope({
                    itemSelector: '.filter',
                    percentPosition: true,
                    masonry: {
                        // use outer width of grid-sizer for columnWidth
                        columnWidth: '.filter',
                    }
                });
                //****************************
                  // Isotope Load more button
                  //****************************
                  var initShow = 6; //number of images loaded on init & onclick load more button
                  var counter = initShow; //counter for load more button
                  var iso = $grid.data('isotope'); // get Isotope instance

                  loadMore(initShow); //execute function onload

                  function loadMore(toShow) {
                    $grid.find(".hidden").removeClass("hidden");

                    var hiddenElems = iso.filteredItems.slice(toShow, iso.filteredItems.length).map(function(item) {
                      return item.element;
                    });
                    $(hiddenElems).addClass('hidden');
                    $grid.isotope('layout');

                    //when no more to load, hide show more button
                    if (hiddenElems.length == 0) {
                      $("#load-more").hide();
                    } 
                    else {
                      $("#load-more").show();
                    };

                  }

                  //append load more button
                  $grid.after('<div class="text-center"><a id="load-more" class="btn btn-outline-secondary btn-md btn-arrow m-t-20" href="javascript:void(0)"> <span>Cargar Mas <i class="ti-arrow-right"></i></span></a></div>');

                  //when load more button clicked
                  $("#load-more").click(function() {
                    if ($('#filters').data('clicked')) {
                      //when filter button clicked, set initial value for counter
                      counter = initShow;
                      j$('#filters').data('clicked', false);
                    } else {
                      counter = counter;
                    };

                    counter = counter + initShow;

                    loadMore(counter);
                  });
            });