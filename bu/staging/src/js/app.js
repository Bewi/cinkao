$(function () {
    $('.button-collapse').sideNav({ closeOnClick: true });
    $(".parallax").parallax();
    $('.scrollspy').scrollSpy();

    $(".timeline-img, .timeline-content, #members-cards .row .col")
        .addClass("hidden")
        .filter(".hidden")
        .inViewport(function (px) {
            if (px > 100) {
                $(this).removeClass('hidden').addClass("bounce-in");
                $(this).off("inViewport");
            }
        });
});

// Used to detect if element is in viewport and return pixel in
; (function ($, win) {
    $.fn.inViewport = function (cb) {
        return this.each(function (i, el) {
            function visPx() {
                var H = $(this).height(),
                    r = el.getBoundingClientRect(), t = r.top, b = r.bottom;
                return cb.call(el, Math.max(0, t > 0 ? H - t : (b < H ? b : H)));
            } visPx();
            $(win).on("resize scroll", visPx);
        });
    };
} (jQuery, window));