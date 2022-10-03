document.addEventListener('DOMContentLoaded', function () {
  jQuery('.carrousel-content').slick({
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    //adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 4000,

    // centerMode: true,
    // variableWidth: true,
  });
});
