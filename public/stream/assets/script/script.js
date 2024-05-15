$(document).ready(function () {

    // toggle navbar mobile
    $(".mobile-menu-button").each(function (_, navToggler) {
        var target = $(navToggler).data("target");
        $(navToggler).on("click", function () {
            $(target).animate({
                height: "toggle",
            })
        })
    })

    // user avatar dropdown
    var dd_btn = $(".dropdown-button")
    var dd_stream = $("#dropdown-stream")
    dd_btn.click(function () {
        dd_btn.each(function () {
            if (dd_stream.hasClass("hidden")) {
                dd_stream.removeClass("hidden").addClass("block");
            } else if (dd_stream.hasClass("block")) {
                dd_stream.removeClass("block").addClass("hidden");
            }
        })
    })
})