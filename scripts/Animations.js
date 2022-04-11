tagsToFadeIn = "p, h2, table, li, form, iframe, img, h4";

duration = 500;
let path = window.location.pathname;
let page = path.split("/").pop();

let editorPages = ["login.php", "register.php", "logout.php", "profile.php", "upload.php", "avatar.php"];
$(document).ready(
    function () {
        $(tagsToFadeIn).hide();
        if (!page.startsWith("game")) {
            $(".navelement.game").hide();
        }
        if (!editorPages.includes(page)) {
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