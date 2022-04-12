//tagsToFadeIn = "p, h2, table, li, form, iframe, img, h4";
tagsToFadeIn = "";

duration = 500;
let path = window.location.pathname;
let page = path.split("/").pop();

let notEditorPages = ["index.php", "sources.php","games.php"];

$(document).ready(
    function () {
        $(tagsToFadeIn).hide();
        if (!page.startsWith("game")) {
            $(".navelement.game").hide();
        }
        if (notEditorPages.includes(page)) {
            $(".navelement.editor").hide();
        }
        $(tagsToFadeIn).each(
            function (i) {
                $(this).delay(i * (duration / 2.0)).fadeIn(duration);
            }
        );
        $("#showgames").click(
            function () {
                $(".navelement.game").slideToggle(500);
            }
        );
        $("#showeditor").click(
            function () {
                $(".navelement.editor").slideToggle(500);
            }
        );

        /*$(".navelement").each(
            function (i) {
                var attr = $(this).attr("href");
                if (attr == page) {
                    $(this).addClass("active");
                }
            }
        );*/
    }
);