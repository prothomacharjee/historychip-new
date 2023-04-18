$(document).ready(function () {
    let preloader = $(".softsource-preloader-container");
    let logo = $(".softsource-preloader-container img");

    $(".softsource-select2").select2({
        placeholder: "Select a Category",
    });

    // Blink logo for 5 seconds or until process is complete
    let intervalId = setInterval(function () {
        logo.toggle();
    }, 500);

    // Hide preloader container and stop blinking on window load event
    $(window).on("load", function () {
        clearInterval(intervalId);
        preloader.fadeOut(5000, function () {
            $("body").css("overflow", "auto");
        });
    });
});

windows.on("scroll", function () {
    var scroll = windows.scrollTop();
    var headerHeight = $(".softsource-header-sticky").height();

    if (screenSize >= 320) {
        if (scroll < headerHeight) {
            $(".softsource-header-sticky").removeClass("softsource-is-sticky");
        } else {
            $(".softsource-header-sticky").addClass("softsource-is-sticky");
        }
    }
});

$(document).on("click", ".softsource-toggle-password", function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});



// $(document).on("change", "#category", function () {
//     $("#sub_category").html("");
//     if ($(this).val() !== "") {
//         var js = {
//             id: $("select[name=category]")
//                 .children("option:selected")
//                 .data("id"),
//             _token: $('meta[name="csrf-token"]').attr("content"),
//         };
//         $.post(
//             url + "/get_level_1_by_category",
//             js,
//             function (data) {
//                 var obj = JSON.parse(JSON.stringify(data));
//                 if (obj.count > 0) {
//                     $("[name=sub_category]").select2("destroy");
//                     $("#sub_category").html(obj.result);
//                     $("[name=sub_category]").select2();
//                 }
//             },
//             "json"
//         );
//     }
// });
