$(".slider-for").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: ".slider-nav",
});
$(".slider-nav").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".slider-for",
    focusOnSelect: true,
    prevArrow:
        '<div class="prev-arrow "><i class="fas fa-chevron-left"></i></div>',
    nextArrow:
        '<div class="next-arrow "><i class="fas fa-chevron-right"></i></div>',
});

(function () {
    window.inputNumber = function (el) {
        var min = el.attr("min") || false;
        var max = el.attr("max") || false;

        var els = {};

        els.dec = el.prev();
        els.inc = el.next();

        el.each(function () {
            init($(this));
        });

        function init(el) {
            els.dec.on("click", decrement);
            els.inc.on("click", increment);

            function decrement() {
                var value = el[0].value;
                value--;
                if (!min || value >= min) {
                    el[0].value = value;
                }
            }

            function increment() {
                var value = el[0].value;
                value++;
                if (!max || value <= max) {
                    el[0].value = value++;
                }
            }
        }
    };
})();

inputNumber($(".input-number"));
