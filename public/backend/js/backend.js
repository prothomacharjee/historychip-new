$(document).ready(function () {
    $(".softsource-summernote").summernote({
        placeholder: "Enter content here...",
        height: 300,
        fullscreen: true,
    });
    $(".note-icon-caret").hide();
    $(".note-view button:last").hide();

    $(".softsource-tag-input").tagsinput({
        confirmKeys: [13, 188], // optional: specify which keys trigger tag creation (enter key and comma key by default)
    });

    $(".softsource-select2").select2({
        placeholder: "== Please Select ==",
    });

    
});

$(".date-time-material").bootstrapMaterialDatePicker({
    format: "YYYY-MM-DD HH:mm",
});

$(".date-material").bootstrapMaterialDatePicker({
    time: false,
});

$(".time-material").bootstrapMaterialDatePicker({
    date: false,
    format: "HH:mm",
});

// delete functions
function remove_function(id, url) {
    if (id) {
        var form = $("#removeForm");
        form.attr("action", `/powerhouse/delete-${url}/${id}`);

        $(".delete-confirm").on("click", function (e) {
            form.submit();
        });
    }
}

//file upload validations
function FileUploaderValidation(
    that,
    filesize_mb,
    accepted_files,
    selector_class,
    image_view_width = 50
) {
    const file = that.files[0];
    const reader = new FileReader();
    const fileError = $(`#file-error-${selector_class}`);
    const selected_file = $(`.selected-file-${selector_class}`);

    const fileType = file.type;
    const fileSize = file.size / 1024 / 1024; // convert to MB
    let readershow = true;
    if (!file) {
        fileError.text("No file selected");
        readershow = false;
        selected_file.html("");
        return;
    }

    if (!accepted_files.includes(fileType)) {
        fileError.text("Invalid file type");
        that.value = ""; // clear the file input
        readershow = false;
        selected_file.html("");
        return;
    }

    if (fileSize > filesize_mb) {
        fileError.text(`File size exceeds ${filesize_mb}MB`);
        that.value = ""; // clear the file input
        readershow = false;
        selected_file.html("");
        return;
    }

    fileError.text(""); // clear any previous errors

    if (readershow) {
        reader.onload = function (event) {
            const imageUrl = event.target.result;
            selected_file.html(
                `<img src="${imageUrl}" alt="Selected File" class="w-${image_view_width}">`
            );
        };

        reader.readAsDataURL(file);
    }
}

function MultipleFileUploaderValidation(
    that,
    filesize_mb,
    accepted_files,
    selector_class,
    image_alt_text_selector,
    image_view_width = 50
) {
    const files = that.files;

    const maxFiles = that.max;

    const fileError = $(`#file-error-${selector_class}`);
    const selected_file = $(`.selected-file-${selector_class}`);

    let readershow = true;

    if (files.length > maxFiles) {
        fileError.text(`You can only upload maximum of ${maxFiles} files`);
    } else {
        for (var i = 0; i < files.length; i++) {
            let file = files[i];
            const fileType = file.type;
            const fileSize = file.size / 1024 / 1024; // convert to MB

            if (!file) {
                fileError.text("No file selected");
                readershow = false;
                selected_file.html("");
                return;
            }

            if (!accepted_files.includes(fileType)) {
                fileError.text("Invalid file type");
                that.value = ""; // clear the file input
                readershow = false;
                selected_file.html("");
                return;
            }

            if (fileSize > filesize_mb) {
                fileError.text(`File size exceeds ${filesize_mb}MB`);
                that.value = ""; // clear the file input
                readershow = false;
                selected_file.html("");
                return;
            }

            fileError.text(""); // clear any previous errors

            if (readershow) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const imageUrl = e.target.result;
                    selected_file.html(
                        `<div class="col-md-2">
                            <div class="softsource-image-wrapper text-center">
                                <img src="${imageUrl}" alt="Selected File ${
                            i + 1
                        }" class="img-thumbnail w-${image_view_width}">
                                <button type="button" class="softsource-close-button"><i class="bx bx-x-circle"></i></button>
                                <input class="form-control mt-3" name="${image_alt_text_selector}[image_alt_text][]" />
                            </div>
                        </div>`
                    );
                };
                reader.readAsDataURL(file);
            }
        }
    }
}

//Slugify A Text
function Slugify(text) {
    return text
        .toLowerCase() // Convert to lowercase
        .replace(/ /g, "-") // Replace spaces with hyphens
        .replace(/[^\w-]+/g, "") // Remove non-word characters
        .replace(/--+/g, "-") // Replace multiple hyphens with a single hyphen
        .replace(/^-+|-+$/g, ""); // Remove hyphens from the beginning and end of the string
}

//CamelCase A Text
function CamelCase(text) {
    return text
        .toLowerCase()
        .replace(/[^a-zA-Z0-9]+(.)/g, function (match, chr) {
            return chr.toUpperCase();
        });
}


