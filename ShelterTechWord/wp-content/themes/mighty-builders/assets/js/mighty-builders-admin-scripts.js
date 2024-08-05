(function ($) {
  "use strict";
  $("#mighty-builders-dismiss-notice").on("click", ".notice-dismiss", function () {
    $.ajax({
      url: ajaxurl,
      data: {
        action: "mighty-builders_dismissble_notice",
      },
    });
  });
  $("#mighty-builders-dashboard-tabs-nav li:first-child").addClass("active");
  $(".tab-content").hide();
  $(".tab-content:first").show();
  $("#mighty-builders-dashboard-tabs-nav li").click(function () {
    $("#mighty-builders-dashboard-tabs-nav li").removeClass("active");
    $(this).addClass("active");
    $(".tab-content").hide();
    var activeTab = $(this).find("a").attr("href");
    $(activeTab).fadeIn();
    return false;
  });
})(jQuery);
