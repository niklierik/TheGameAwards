tagsToFadeIn = "p, h2, table, li, form, iframe, img, h4";

duration = 500;
var path = window.location.pathname;
var page = path.split("/").pop();

$(document).ready(
    function() {
        $(tagsToFadeIn).hide();
        if (!page.startsWith("game_")) {
            $(".navelement.game").hide();
        }
        if (!page.startsWith("editor")) {
            $(".navelement.editor").hide();
        }
        $(tagsToFadeIn).each(
            function(i) {
                $(this).delay(i * (duration / 2.0)).fadeIn(duration);
            }
        );
        $("#showgames").click(
            function() {
                $(".navelement.game").slideToggle(500);
            }
        );
        $("#showeditor").click(
            function() {
                $(".navelement.editor").slideToggle(500);
            }
        );
        $(".navelement").each(
            function(i) {
                var attr = $(this).attr("href");
                if (attr == page) {
                    $(this).addClass("active");
                }
            }
        );
    }
);