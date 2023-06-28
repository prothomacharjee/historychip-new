$(document).ready(function () {
    let preloader = $(".softsource-preloader-container");
    let logo = $(".softsource-preloader-container img");

    $(".softsource-summernote").summernote({
        placeholder: "Enter content here...",
        height: 300,
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

    // Blink logo for 2.5 seconds or until process is complete
    let intervalId = setInterval(function () {
        logo.toggle();
    }, 250);

    // Hide preloader container and stop blinking on window load event
    $(window).on("load", function () {
        clearInterval(intervalId);
        preloader.fadeOut(2500, function () {
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

//Story Categories
$(document).on("change", "#category_id", function () {
    $('#sub_category_id_level_1, #sub_category_id_level_2, #sub_category_id_level_3').html("").attr("disabled", true);
    var js = {
        "id": $(this).val(),
        'level': 1,
        "_token": $('meta[name="csrf-token"]').attr('content'),
    };
    $.post("/subcat-by-parentcat", js, function (data) {
        if(data.count>0){
            $('#sub_category_id_level_1').html(data.result).attr("disabled", false);
        }
    }, "json");
});

$(document).on("change", "#sub_category_id_level_1", function () {
    if ($(this).val() !== '') {
        $('#sub_category_id_level_2, #sub_category_id_level_3').html("").attr("disabled", true);
        var js = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "id": $(this).val(),
            'level': 2,
        };
        $.post("/subcat-by-parentcat", js, function (data) {
            if(data.count>0){
                $('#sub_category_id_level_2').html(data.result).attr("disabled", false);
            }
        }, "json");
    } else {
        $('#sub_category_id_level_2, #sub_category_id_level_3').attr("disabled", true);
    }
});

$(document).on("change", "#sub_category_id_level_2", function () {
    if ($(this).val() !== '') {
        $('#sub_category_id_level_2, #sub_category_id_level_3').html("").attr("disabled", true);
        var js = {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            "id": $(this).val(),
            'level': 3,
        };
        $.post("/subcat-by-parentcat", js, function (data) {
            if(data.count>0){
                $('#sub_category_id_level_3').html(data.result).attr("disabled", false);
            }
        }, "json");
    } else {
        $('#sub_category_id_level_2, #sub_category_id_level_3').attr("disabled", true);
    }
});


$(document).on("click keydown", ".softsource-nav-toggle-btn", function () {
    $('.softsource-nav-toggle-btn').toggleClass('active');
    $('.softsource-responsive-nav').toggleClass('active');
})


$(document).on("click", ".softsource-responsive-has-children", function() {
    $('.softsource-responsive-has-children').not(this).removeClass('active');
    $(this).toggleClass('active');


    var $submenu = $(this).children('.softsource-submenu');

    // Hide other elements with the same class
    $('.softsource-responsive-has-children').not(this).children('.softsource-submenu').addClass('hidden');

    // Toggle class on the clicked element's children
    $submenu.toggleClass('hidden');
  });




