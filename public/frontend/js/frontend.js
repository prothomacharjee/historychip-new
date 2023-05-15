$(document).ready(function () {
    let preloader = $(".softsource-preloader-container");
    let logo = $(".softsource-preloader-container img");

    $(".summernote").summernote({
        placeholder: "Enter text here...",
        height: 200,
        fullscreen: true,
    });

    $(".note-icon-caret").hide();
    $(".note-view button:last").hide();

    $(".softsource-select2").select2({
        placeholder: "== Please Select ==",
    });

    $(".softsource-tag-input").tagsinput({
        confirmKeys: [13, 188], // optional: specify which keys trigger tag creation (enter key and comma key by default)
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

    $(".captcha-form").submit(function (event) {
        let form = $(this);
        let submitButton = form.find('button[type="submit"]');

        if (grecaptcha && !grecaptcha.getResponse()) {
            event.preventDefault();
            submitButton.attr("disabled", true);
            $(".captcha-validation").html(
                "<strong>Please complete the reCAPTCHA to submit the form.</strong>"
            );
        }
    });

    var popoverTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="popover"]')
    );
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
});

windows.on("scroll", function () {
    let scroll = windows.scrollTop();
    let headerHeight = $(".softsource-header-sticky").height();

    if (screenSize >= 320) {
        if (scroll < headerHeight) {
            $(".softsource-header-sticky").removeClass("softsource-is-sticky");
        } else {
            $(".softsource-header-sticky").addClass("softsource-is-sticky");
        }
    }
});

$(document).on("click", ".softsource-toggle-password", function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    let input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$(document).on("click", ".softsource-only-text", function () {
    $(".softsource-show-action").removeClass("active");
    $(".softsource-only-text").addClass("active");
    $(".softsource-show-text")
        .removeClass("col-md-8")
        .addClass("col-md-12")
        .css("display", "block");
    $(".softsource-show-audio").css("display", "none");
    $("input[name=context_type]").val("1");
});

$(document).on("click", ".softsource-only-audio", function () {
    $(".softsource-show-action").removeClass("active");
    $(".softsource-only-audio").addClass("active");
    $(".softsource-show-text").css("display", "none");
    $(".softsource-show-audio")
        .removeClass("col-md-4")
        .addClass("col-md-12")
        .css("display", "block");
    $("input[name=context_type]").val("2");
});

$(document).on("click", ".softsource-audio-text", function () {
    $(".softsource-show-action").removeClass("active");
    $(".softsource-audio-text").addClass("active");
    $(".softsource-show-text")
        .removeClass("col-md-12")
        .addClass("col-md-8")
        .css("display", "block");
    $(".softsource-show-audio")
        .removeClass("col-md-12")
        .addClass("col-md-4")
        .css("display", "block");
    $("input[name=context_type]").val("3");
});
