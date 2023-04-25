$(document).ready(function () {
    $(".summernote").summernote({
        placeholder: "Enter text here...",
        height: 200,
        fullscreen: true,
    });
    $(".note-icon-caret").hide();
    $(".note-view button:last").hide();

    $(".tag-input").tagsinput({
        confirmKeys: [13, 188], // optional: specify which keys trigger tag creation (enter key and comma key by default)
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
        form.attr("action", `/delete-${url}/${id}`);

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
    image_view_width = 50
) {
    const file = that.files[0];
    const reader = new FileReader();
    const fileError = $("#file-error");
    const selected_file = $(".selected-file");

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
