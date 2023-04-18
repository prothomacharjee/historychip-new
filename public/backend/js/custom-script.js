$(document).ready(function () {
    $(".summernote").summernote({
        placeholder: "Enter text here...",
        height: 200,
        fullscreen: true,

        callbacks: {
            onImageUpload: function(files) {
                var file = files[0];
                var reader = new FileReader();
                reader.onloadend = function() {
                    if (reader.error) {
                        console.error('Error reading file:', reader.error);
                        return;
                    }
                    var dataUrl = reader.result;
                    var $img = $('<img>').attr('src', dataUrl).attr('alt', 'image description');
                    $('#summernote').summernote('editor.insertImage', $img[0]);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    $(".note-icon-caret").hide();
    $(".note-view button:last").hide();
});

$(".date-time-material").bootstrapMaterialDatePicker({
    format: "YYYY-MM-DD HH:mm",
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
function FileUploaderValidation(that, filesize_mb, accepted_files) {
    const file = that.files[0];
    const reader = new FileReader();
    const fileError = $("#file-error");

    const fileType = file.type;
    const fileSize = file.size / 1024 / 1024; // convert to MB
    let readershow = true;
    if (!file) {
        fileError.text("No file selected");
        readershow = false;
        return;
    }

    if (!accepted_files.includes(fileType)) {
        fileError.text("Invalid file type");
        that.value = ""; // clear the file input
        readershow = false;
        return;
    }

    if (fileSize > filesize_mb) {
        fileError.text("File size exceeds 1MB");
        that.value = ""; // clear the file input
        readershow = false;
        return;
    }

    fileError.text(""); // clear any previous errors

    if (readershow) {
        reader.onload = function (event) {
            const imageUrl = event.target.result;
            $(".selected-file").html(
                '<img src="' + imageUrl + '" alt="Selected File" class="w-50">'
            );
        };

        reader.readAsDataURL(file);
    }
}
