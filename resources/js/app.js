import "./bootstrap";
import "./sidebarmenu.js";
import "./dashboard.js";

$(function () {
    // Admin Panel settings

    //****************************
    /* This is for the mini-sidebar if width is less then 1170*/
    //****************************
    var setsidebartype = function () {
        var width =
            window.innerWidth > 0 ? window.innerWidth : this.screen.width;
        if (width < 1199) {
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
            $("#main-wrapper").addClass("mini-sidebar");
        } else {
            $("#main-wrapper").attr("data-sidebartype", "full");
            $("#main-wrapper").removeClass("mini-sidebar");
        }
    };
    $(window).ready(setsidebartype);
    $(window).on("resize", setsidebartype);
    //****************************
    /* This is for sidebartoggler*/
    //****************************
    $(".sidebartoggler").on("click", function () {
        $("#main-wrapper").toggleClass("mini-sidebar");
        if ($("#main-wrapper").hasClass("mini-sidebar")) {
            $(".sidebartoggler").prop("checked", !0);
            $("#main-wrapper").attr("data-sidebartype", "mini-sidebar");
        } else {
            $(".sidebartoggler").prop("checked", !1);
            $("#main-wrapper").attr("data-sidebartype", "full");
        }
    });
    $(".sidebartoggler").on("click", function () {
        $("#main-wrapper").toggleClass("show-sidebar");
    });

    $("#togglePassword").click(function () {
        console.log("Keklik");
        let passwordInput = $("#password");

        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
            $("#togglePassword").html("<i class='ti ti-eye'>");
        } else {
            passwordInput.attr("type", "password");
            $("#togglePassword").html("<i class='ti ti-eye-off'>");
        }
        console.log(passwordInput.attr("type"));

        // if (passwordInput.attr("type") === "password") {
        //     passwordInput.attr("type", "text");
        //     buttonText.text("Hide");
        // } else {
        //     passwordInput.attr("type", "password");
        //     buttonText.text("Show");
        // }
    });
});
// console.log('Tes');
