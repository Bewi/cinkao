(function(window) {
  if (window.Package)
    Transitions = {};
  else
    window.Transitions = {};
})(window);

Transitions.showCards = function(selector) {
  var time = 0;
  $(selector).find('.card').velocity(
      { translateY: "200px"},
      { duration: 0 });

  $(selector).find('.card').each(function() {
    $(this).velocity(
      { opacity: "1", translateY: "0"},
      { duration: 800, delay: time, easing: [60, 10] });
    time += 120;
  });
};
