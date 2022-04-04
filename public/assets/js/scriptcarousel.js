$(document).ready(function() {
    var owl = $("#slider-carousel");
    owl.owlCarousel({
      items: 4,
      itemsDesktop: [1000, 4],
      itemsDesktopSmall: [900, 2],
      itemsTablet: [600, 1],
      itemsMobile: false,
      pagination: true,
      autoPlay: true
    });
  });

  $(document).ready(function() {
    var owl = $("#slider-carousel-blog");
    owl.owlCarousel({
      items: 3,
      itemsDesktop: [1000, 2],
      itemsDesktopSmall: [900, 2],
      itemsTablet: [600, 1],
      itemsMobile: false,
      pagination: true,
      autoPlay: true
    });
  });
  $(document).ready(function() {
    var owl = $("#slider-carousel-publ");
    owl.owlCarousel({
      items: 3,
      itemsDesktop: [1199, 2],
      itemsDesktopSmall: [900, 2],
      itemsTablet: [600, 1],
      itemsMobile: false,
      pagination: true,
      autoPlay: true
    })
});

const select = (el, all = false) => {
  el = el.trim()
  if (all) {
    return [...document.querySelectorAll(el)]
  } else {
    return document.querySelector(el)
  }
}
const on = (type, el, listener, all = false) => {
  let selectEl = select(el, all)
  if (selectEl) {
    if (all) {
      selectEl.forEach(e => e.addEventListener(type, listener))
    } else {
      selectEl.addEventListener(type, listener)
    }
  }
}
window.addEventListener('load', () => {
  let portfolioContainer = select('.pub-container');
  if (portfolioContainer) {
    let portfolioIsotope = new Isotope(portfolioContainer, {
      itemSelector: '.portfolio-item'
    });

    let portfolioFilters = select('#portfolio-flters li', true);

    on('click', '#portfolio-flters li', function(e) {
      e.preventDefault();
      portfolioFilters.forEach(function(el) {
        el.classList.remove('filter-active');
      });
      this.classList.add('filter-active');

      portfolioIsotope.arrange({
        filter: this.getAttribute('data-filter')
      });
      portfolioIsotope.on('arrangeComplete', function() {
        AOS.refresh()
      });
    }, true);
  }
});
window.addEventListener('load', () => {
  AOS.init({
    duration: 1000,
    easing: 'ease-in-out',
    once: true,
    mirror: false
  })
});
