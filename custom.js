document.addEventListener("DOMContentLoaded", function (e) {
  (function () {
    const triggerClassName = "sh8der-external-flatsome-slider-toggler";
    var $triggerNodeList = jQuery("." + triggerClassName);
    $triggerNodeList.on("click", function (event) {
      // event.preventDefault();
      var $self = jQuery(this);
      var slideId = $self.data("slide-id");
      var targetSliderClass = $self.data("target-slider-class");
      var sliderSelector = targetSliderClass + " .slider";
      if (sliderSelector[0] != ".") sliderSelector = "." + sliderSelector;

      $triggerNodeList
        .filter(function (i) {
          return jQuery(this).data("target-slider-class") == targetSliderClass;
        })
        .removeClass(triggerClassName + "--active");
      $self.addClass(triggerClassName + "--active");

      try {
        jQuery(sliderSelector).flickity("select", slideId);
      } catch (e) {
        // statements
        console.log(e);
      }
    });
  })();

  (function () {
    var $sliders = jQuery(".slider");
    $sliders.on("ready.flickity", function () {
      jQuery(this).find(".flickity-button-icon").remove();
    });
  })();

  (function () {
    setTimeout(() => {
      jQuery(".tabbed-content.slider .nav-line").flickity({
        adaptiveHeight: false,
        cellAlign: "left",
        pageDots: false
      });
      setTimeout(() => {
       jQuery(".tabbed-content.slider .nav-line").on("ready.flickity", function () {
         jQuery(this).find(".flickity-button-icon").remove();
       }); 
      }, 500);
    }, 1000);
  })();
});
