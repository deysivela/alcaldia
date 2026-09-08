/**
 * GAM Llallagua — estabiliza navbar/scroll y refinamientos UX.
 * No altera rutas ni lógica de negocio.
 */
(function ($) {
  'use strict';

  function setHeaderState() {
    var $bar = $('.topbar');
    if (!$bar.length) {
      return;
    }
    /* Sin slider/banner oscuro el menú blanco se pierde: fondo siempre sólido */
    var $hero = $('#slider-sec, .banner-innerpage, .gam-page-banner').not('.gam-page-banner--plain');
    var hasHero = $hero.length > 0;
    $bar.toggleClass('gam-topbar-solid', !hasHero);
    var scrolled = $(window).scrollTop() >= 60;
    if (scrolled || !hasHero) {
      $bar.addClass('is-scrolled fixed-header');
      $bar.removeClass('animated slideInDown');
      if (scrolled) {
        $('.bt-top').addClass('visible');
      } else {
        $('.bt-top').removeClass('visible');
      }
    } else {
      $bar.removeClass('is-scrolled fixed-header animated slideInDown');
      $('.bt-top').removeClass('visible');
    }
  }

  function normalizar(texto) {
    return (texto || '')
      .toString()
      .toLowerCase()
      .replace(/[\u0300-\u036f]/g, '');
  }

  /**
   * Buscador en vivo para listados y tablas.
   * Se configura con atributos en el input:
   *   data-gam-search  → selector del contenedor con los elementos
   *   data-gam-item    → selector de cada elemento filtrable
   *   data-gam-count   → selector donde se escribe el total visible (opcional)
   *   data-gam-empty   → selector del mensaje "sin resultados" (opcional)
   *   data-gam-group   → selector de grupo padre a ocultar si queda vacío (opcional)
   */
  function iniciarBuscadores() {
    $('[data-gam-search]').each(function () {
      var $input = $(this);
      var $scope = $($input.attr('data-gam-search'));
      var itemSelector = $input.attr('data-gam-item');
      var groupSelector = $input.attr('data-gam-group');
      var $items = $scope.find(itemSelector);
      var $contador = $($input.attr('data-gam-count'));
      var $vacio = $($input.attr('data-gam-empty'));

      if (!$items.length) {
        return;
      }

      $items.each(function () {
        var $item = $(this);
        var texto = normalizar($item.text().replace(/\s+/g, ' '));
        if (groupSelector) {
          var $group = $item.closest(groupSelector);
          if ($group.length) {
            var cargo = $group.children('.gam-autoridad-cargo').first().text();
            texto += ' ' + normalizar(cargo.replace(/\s+/g, ' '));
          }
        }
        $item.data('gamTexto', texto);
      });

      function filtrar() {
        var termino = normalizar($input.val()).trim();
        var visibles = 0;

        $items.each(function () {
          var $item = $(this);
          var coincide = termino === '' || $item.data('gamTexto').indexOf(termino) !== -1;
          $item.toggle(coincide);
          if (coincide) {
            visibles++;
          }
        });

        if (groupSelector) {
          $scope.find(groupSelector).each(function () {
            var $group = $(this);
            $group.toggle($group.find(itemSelector + ':visible').length > 0);
          });
        }

        if ($contador.length) {
          $contador.text(visibles);
        }
        if ($vacio.length) {
          $vacio.prop('hidden', visibles !== 0);
        }
      }

      $input.on('input keyup search', filtrar);
    });
  }

  $(function () {
    // Evita el "salto" del menú (slideInDown / resize continuo)
    setHeaderState();
    $(window)
      .off('scroll.gamStable')
      .on('scroll.gamStable', setHeaderState);

    // Submenú Subalcaldías (desktop hover + click en móvil)
    $('.dropdown-submenu > a').on('click', function (e) {
      var $parent = $(this).parent('.dropdown-submenu');
      var $menu = $parent.children('.dropdown-menu');
      if ($(window).width() < 992) {
        e.preventDefault();
        e.stopPropagation();
        $parent.siblings('.dropdown-submenu').children('.dropdown-menu').removeClass('show');
        $menu.toggleClass('show');
      }
    });

    // Menú móvil: al elegir un destino real, se cierra el panel
    var $panelMovil = $('#header12a');

    $panelMovil.on('click', 'a:not(.dropdown-toggle)', function () {
      if ($(window).width() < 992) {
        $panelMovil.collapse('hide');
      }
    });

    // El panel ocupa la pantalla: se bloquea el scroll del fondo mientras está abierto
    $panelMovil
      .on('show.bs.collapse', function () {
        if ($(window).width() < 992) {
          $('html, body').addClass('gam-nav-open');
        }
      })
      .on('hidden.bs.collapse', function () {
        $('html, body').removeClass('gam-nav-open');
      });

    $(document).on('keydown', function (e) {
      if (e.key === 'Escape' && $panelMovil.hasClass('show')) {
        $panelMovil.collapse('hide');
        $('.navbar-toggler').focus();
      }
    });

    // Al pasar a escritorio el panel debe cerrarse y devolver el scroll
    $(window).on('resize.gamNav', function () {
      if ($(window).width() >= 992 && $panelMovil.hasClass('show')) {
        $panelMovil.collapse('hide');
      }
    });

    iniciarBuscadores();

    // AOS: animar al cargar (no esperar al primer scroll) y no re-animar
    if (typeof AOS !== 'undefined') {
      AOS.init({
        once: true,
        duration: 450,
        easing: 'ease-out-cubic',
        offset: 12,
        startEvent: 'DOMContentLoaded',
        disableMutationObserver: true
      });
      // Tras cargar imágenes/layout, forzar detección de elementos ya visibles
      $(window).on('load.gamAos', function () {
        AOS.refresh();
      });
      // Por si el evento load ya pasó o el contenido está en viewport
      setTimeout(function () {
        AOS.refresh();
      }, 50);
    }

    // Carrusel del home: el autoplay (cada ~7s) puede hacer que el navegador
    // mueva el scroll al enfocar el slide. Bloqueamos eso y pausamos si ya no se ve.
    var $hero = $('#slider4');
    if ($hero.length) {
      var heroScrollY = 0;
      var heroLocking = false;
      var heroRaf = 0;

      function scrollY() {
        return window.pageYOffset || document.documentElement.scrollTop || 0;
      }

      function keepHeroScroll() {
        if (!heroLocking) {
          return;
        }
        if (scrollY() !== heroScrollY) {
          window.scrollTo(0, heroScrollY);
        }
        heroRaf = window.requestAnimationFrame(keepHeroScroll);
      }

      function blurHeroFocus() {
        var active = document.activeElement;
        if (active && $hero[0].contains(active) && typeof active.blur === 'function') {
          active.blur();
        }
      }

      function heroVisible() {
        var el = document.getElementById('slider-sec') || $hero[0];
        var rect = el.getBoundingClientRect();
        return rect.bottom > 120 && rect.top < window.innerHeight * 0.85;
      }

      function syncHeroAutoplay() {
        $hero.carousel(heroVisible() ? 'cycle' : 'pause');
      }

      $hero
        .attr('data-keyboard', 'false')
        .find('.carousel-item')
        .attr('tabindex', '-1');

      $hero
        .off('slide.bs.carousel.gamHero slid.bs.carousel.gamHero')
        .on('slide.bs.carousel.gamHero', function () {
          heroScrollY = scrollY();
          heroLocking = true;
          blurHeroFocus();
          if (heroRaf) {
            window.cancelAnimationFrame(heroRaf);
          }
          heroRaf = window.requestAnimationFrame(keepHeroScroll);
        })
        .on('slid.bs.carousel.gamHero', function () {
          heroLocking = false;
          if (heroRaf) {
            window.cancelAnimationFrame(heroRaf);
            heroRaf = 0;
          }
          blurHeroFocus();
          if (scrollY() !== heroScrollY) {
            window.scrollTo(0, heroScrollY);
          }
        });

      // Si el usuario ya bajó a leer el contenido, el autoplay no debe seguir
      // disparando cambios (ni posibles saltos) cada ciertos segundos.
      syncHeroAutoplay();
      $(window)
        .off('scroll.gamHeroAutoplay resize.gamHeroAutoplay')
        .on('scroll.gamHeroAutoplay resize.gamHeroAutoplay', syncHeroAutoplay);
    }
  });

  /** Abre la noticia completa en modal (sin navegar a otra página). */
  function iniciarModalNoticias() {
    var $modal = $('#newsDetailModal');
    if (!$modal.length) {
      return;
    }

    $(document).on('click', '.js-news-open', function (e) {
      e.preventDefault();
      var $root = $(this).closest('[data-news-modal]');
      if (!$root.length) {
        return;
      }

      var title = $root.attr('data-title') || '';
      var date = $root.attr('data-date') || '';
      var photo = $root.attr('data-photo') || '';
      var bodyHtml = $root.find('.js-news-full').html() || '';

      $('#newsModalTitle').text(title);
      $('#newsModalDate').text(date);
      $('#newsModalPhoto').attr({ src: photo, alt: title });
      $('#newsModalBody').html(bodyHtml);
      $modal.modal('show');
    });
  }

  /** Abre cronograma / actividad de Cultura en modal. */
  function iniciarModalCultura() {
    var $modal = $('#culturaDetailModal');
    if (!$modal.length) {
      return;
    }

    $(document).on('click', '.js-cultura-open', function (e) {
      e.preventDefault();
      var $root = $(this).closest('[data-cultura-modal]');
      if (!$root.length) {
        return;
      }

      var title = $root.attr('data-title') || '';
      var date = $root.attr('data-date') || '';
      var type = $root.attr('data-type') || '';
      var code = $root.attr('data-code') || '';
      var file = $root.attr('data-file') || '';
      var isImage = $root.attr('data-is-image') === '1';
      var photo = $root.attr('data-photo') || '';
      var bodyText = $.trim($root.find('.js-cultura-full').text() || '');
      var metaParts = [];

      if (date) {
        metaParts.push(date);
      }
      if (type) {
        metaParts.push(type);
      }
      if (code) {
        metaParts.push(code);
      }

      $('#culturaModalTitle').text(title);
      $('#culturaModalMeta').text(metaParts.join(' · '));
      $('#culturaModalBody').html(bodyText ? $('<p/>').text(bodyText) : '');

      if (isImage) {
        $('#culturaModalImageWrap').show();
        $('#culturaModalPdfWrap').attr('hidden', true);
        $('#culturaModalPhoto').attr({ src: file || photo, alt: title });
        $('#culturaModalPdf').attr('data', '');
      } else {
        $('#culturaModalImageWrap').hide();
        $('#culturaModalPdfWrap').removeAttr('hidden');
        $('#culturaModalPhoto').attr({ src: '', alt: '' });
        $('#culturaModalPdf').attr('data', file);
        $('#culturaModalPdfFallback').attr('href', file || '#');
      }

      if (file) {
        $('#culturaModalDownload')
          .attr({ href: file, download: code || title })
          .show();
      } else {
        $('#culturaModalDownload').hide();
      }

      $modal.modal('show');
    });
  }

  /** Filtros y modal de la página Actividades (cursos, seminarios, talleres). */
  function iniciarActividades() {
    if (!$('.js-actividad-filter').length && !$('#actividadDetailModal').length) {
      return;
    }

    $(document).on('click', '.js-actividad-filter', function () {
      var filter = $(this).attr('data-filter') || 'all';
      $('.js-actividad-filter').removeClass('is-active');
      $(this).addClass('is-active');

      var visibleGroups = 0;
      $('[data-actividad-group]').each(function () {
        var tipo = $(this).attr('data-actividad-group');
        var show = filter === 'all' || filter === tipo;
        $(this).toggle(show);
        if (show) {
          visibleGroups += 1;
        }
      });

      $('#actividades-filter-empty').prop('hidden', visibleGroups > 0);
    });

    var $modal = $('#actividadDetailModal');
    if (!$modal.length) {
      return;
    }

    $(document).on('click', '.js-actividad-open', function (e) {
      e.preventDefault();
      var $root = $(this).closest('[data-actividad-modal]');
      if (!$root.length) {
        return;
      }

      var title = $root.attr('data-title') || '';
      var tipoLabel = $root.attr('data-tipo-label') || '';
      var fecha = $root.attr('data-fecha') || '';
      var horario = $root.attr('data-horario') || '';
      var lugar = $root.attr('data-lugar') || '';
      var cupos = $root.attr('data-cupos') || '';
      var photo = $root.attr('data-photo') || '';
      var enlace = $root.attr('data-enlace') || '';
      var enlaceLabel = $root.attr('data-enlace-label') || 'Ir a sección';
      var bodyText = $.trim($root.find('.js-actividad-full').text() || '');
      var metaParts = [];
      var facts = [];

      if (fecha) {
        metaParts.push(fecha);
      }
      if (tipoLabel) {
        metaParts.push(tipoLabel);
      }
      if (horario) {
        facts.push('<li><i class="ti-time" aria-hidden="true"></i><span><strong>Horario</strong><em>' + $('<div/>').text(horario).html() + '</em></span></li>');
      }
      if (lugar) {
        facts.push('<li><i class="ti-location-pin" aria-hidden="true"></i><span><strong>Lugar</strong><em>' + $('<div/>').text(lugar).html() + '</em></span></li>');
      }
      if (cupos) {
        facts.push('<li><i class="ti-user" aria-hidden="true"></i><span><strong>Cupos</strong><em>' + $('<div/>').text(cupos).html() + '</em></span></li>');
      }

      $('#actividadModalTitle').text(title);
      $('#actividadModalMeta').text(metaParts.join(' · '));
      $('#actividadModalPhoto').attr({ src: photo, alt: title });
      $('#actividadModalFacts').html(facts.join(''));
      $('#actividadModalBody').html(bodyText ? $('<p/>').text(bodyText) : '');

      if (enlace) {
        $('#actividadModalLink').attr('href', enlace).text(enlaceLabel).removeAttr('hidden').show();
      } else {
        $('#actividadModalLink').attr('hidden', true).hide();
      }

      $modal.modal('show');
    });
  }

  function iniciarNovedadesCarousel() {
    var $carousels = $('.gam-novedades-carousel');
    if (!$carousels.length || typeof $.fn.owlCarousel !== 'function') {
      return;
    }

    $carousels.each(function () {
      var $carousel = $(this);
      var count = $carousel.children().length;
      var isDocs = $carousel.hasClass('gam-novedades-carousel--docs');

      $carousel.owlCarousel({
        loop: count > 1,
        items: 1,
        margin: 0,
        nav: count > 1,
        dots: count > 1,
        autoplay: count > 1,
        autoplayTimeout: isDocs ? 5500 : 4500,
        autoplayHoverPause: true,
        smartSpeed: 450,
        navText: [
          '<i class="ti-angle-left" aria-hidden="true"></i>',
          '<i class="ti-angle-right" aria-hidden="true"></i>',
        ],
      });
    });
  }

  $(function () {
    iniciarModalNoticias();
    iniciarModalCultura();
    iniciarActividades();
    iniciarNovedadesCarousel();
  });
})(jQuery);
