(function ($) {  
  $.fn.spin = function(opts) {
  this.each(function() {
    var $this = $(this),
        data = $this.data();

    if (data.spinner) {
      data.spinner.stop();
      delete data.spinner;
    }
    if (opts !== false) {
      data.spinner = new Spinner($.extend({color: $this.css('color')}, opts)).spin(this);
    }
  });
  return this;
  };
    
  var GivingTree = {};
  GivingTree.setInitialStickyNavOffset = function(idx,el) {
    $(el).data("offset-top", $(el).offset().top);
  };
  GivingTree.updateStickyNav = function(event){
    var windowTopOffset = $(event.currentTarget).scrollTop();
    $("[data-sticky]").each(function(idx,el){
      var $el = $(el),
          $footer = $("footer");
      
      // var limit = $("footer").offset().top - $el.outerHeight();
      // if (windowTopOffset > limit) {
      //   console.info("IN FOOTER");
      // }
      
      var limit = false;
      if ($footer.length > 0) {
        limit = $footer.offset().top - $el.outerHeight();
      }
        
      if (limit && (windowTopOffset > limit)) {
        var newLimit = limit - $footer.outerHeight() - $el.outerHeight() - 30;
        $el.css({position:"absolute",top:newLimit+"px"});
        
      // Top position of side-nav is above viewport 
      } else if (windowTopOffset > $(el).data("offset-top")) {
        $el.css({position:"fixed", top:"10px"});
      } else {
        // $el.removeClass("sticky");
        $el.css({position:"", top:""});
      }
    });
  };
  
  $(function(){
    $(document).foundationAlerts();
    $(document).foundationButtons();
    $(document).foundationAccordion();
    $(document).foundationNavigation();
    $(document).foundationCustomForms();
    $(document).foundationTabs({callback:$.foundation.customForms.appendCustomMarkup});
    
    $(document).tooltips();
    $("input, textarea").placeholder();
    
    // UNCOMMENT THE LINE YOU WANT BELOW IF YOU WANT IE8 SUPPORT AND ARE USING .block-grids
    // $('.block-grid.two-up>li:nth-child(2n+1)').css({clear: 'left'});
    // $('.block-grid.three-up>li:nth-child(3n+1)').css({clear: 'left'});
    // $('.block-grid.four-up>li:nth-child(4n+1)').css({clear: 'left'});
    // $('.block-grid.five-up>li:nth-child(5n+1)').css({clear: 'left'});
  });
  
  $(window).load(function() {
    $("body").raptorize({
      "enterOn" : "konami-code"
    });
    $("[data-sticky]").each(GivingTree.setInitialStickyNavOffset);
  });
  // Uncomment to support sticky nav updates on page resize
  // $(window).resize(GivingTree.setInitialStickyNavOffset);
  
  $(window).scroll(GivingTree.updateStickyNav);
  $("[data-sticky]").each(GivingTree.setInitialStickyNavOffset);
  $(window).on("scroll.sticky-nav",GivingTree.updateStickyNav);
  
  $('ul.orbit-buttons li').on("click", function (event) {
    $this = $(this);
    $('#featured')
      .trigger('orbit.goto', [$this.data('orbit-index')])
      .trigger('orbit.stop');
  });
  
})(jQuery);
