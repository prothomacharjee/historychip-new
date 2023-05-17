function page_loader() {
    $(".preloader-activate").addClass("preloader-active");
    $(".preloader-activate").removeClass("loaded");
}


function close_loader() {
    $(".open_tm_preloader").addClass("loaded");
    $(".open_tm_preloader").removeClass("preloader-active");
}
$(document).ready(function () {
    $('input[name="story_header_image"]').fileuploader({
        limit: 1,
        maxSize: 10,
        extensions: ['image/*'],
        addMore: false,
        sorter: false,
        changeInput: '<div class="fileuploader-input">' +
                '<div class="fileuploader-input-inner">' +
                '<div class="fileuploader-icon-main"></div>' +
                '<h3 class="fileuploader-input-caption"><p>choose photo to upload</p></h3>' +
                '<p>${captions.or}</p>' +
                '<button type="button" class="fileuploader-input-button"><span>${captions.button}</span></button>' +
                '<br><br><h6 class="banner-photo-place">Add Banner photo here</h6><span><span class="required">*</span> Note: Photograph should be under 10 MB and Allowed Formats : "JPG", "PNG", "GIF", "JPEG","JFIF"</span>' +
                '</div>' +
                '</div>',
        theme: 'dragdrop',
        enableApi: true,
        thumbnails: {
            onImageLoaded: function (item, listEl, parentEl, newInputEl, inputEl) {
                if (item.choosed && !item.isSaving) {
//                    if (item.reader.node && item.reader.width >= 256 && item.reader.height >= 256) {
                    //item.image.hide();
                    item.popup.open();
                    item.editor.cropper();
//                    } else {
//                        item.remove();
//                        alert('The image is too small!');
//                    }
                }
                $(".image-upload-banner .fileuploader-action-remove").on("click", function (e)
                {
                    item.remove();
                    $('#photo_credit').prop('required', false);
                    $('.photo_credit_div').fadeOut(500);
                })
                $(".form-md-floating-label .fileuploader-input").css("background", "url('" + item.local + "') center center / cover no-repeat");
                $(".form-md-floating-label .fileuploader-input").addClass("disabled");
            },
            popup: {
                arrows: false,
                onShow: function (item) {
                    item.editor.cropper();
                    item.popup.html.on('click', '[data-action="remove"]', function (e) {
                        item.popup.close();
                        item.remove();
                    }).on('click', '[data-action="cancel"]', function (e) {
                        item.popup.close();
                        // console.log("closed");
                        if (!item.isSaving) {
                            item.popup.close = null;
                            item.remove();

                        }
                    }).on('click', '[data-action="save"]', function (e) {
                        if (item.editor && !item.isSaving) {
                            item.isSaving = true;
                            item.editor.save();
                            item.image.show();
                        }
                        if (item.popup.close)
                            item.popup.close();
                    });

                },
                onHide: function (item) {
                    if (!item.isSaving && !item.uploaded && !item.appended) {
                        item.popup.close = null;
                        item.remove();
                        // console.log("closed");
                    }
                }
            },
        },

        afterRender: function (listEl, parentEl, newInputEl, inputEl) {
            var api = $.fileuploader.getInstance(inputEl),
                    $plusInput = listEl.find('.fileuploader-input');

            // bind input click
            $plusInput.on('click', function () {
                api.open();
            });

            // set drop container
            api.getOptions().dragDrop.container = $plusInput;

            // bind dropdown buttons
            $('body').on('click', function (e) {
                var $target = $(e.target),
                        $item = $target.closest('.fileuploader-item'),
                        item = api.findFile($item);

                // toggle dropdown
                $('.gallery-item-dropdown').hide();
                if ($target.is('.fileuploader-action-settings') || $target.parent().is('.fileuploader-action-settings')) {
                    $item.find('.gallery-item-dropdown').show(150);
                }
            });

        },
        onRemove: function (list, listEl, parentEl, newInputEl, inputEl) {
            // console.log("De");
            $.post(inputEl[0].dataset.id, {
                file: list.name,
                "_token": $('meta[name="csrf-token"]').attr('content'),
            })
            $('.form-md-floating-label .fileuploader-input').css("background", "");
            $('#header_image_path').val("");
            $(".form-md-floating-label .fileuploader-input").removeClass("disabled");
            $('.pcreditRequired').hide();
        },
        editor: {
            maxWidth: 1110,
            maxHeight: 690,
            quality: 95,
            cropper: {
                showGrid: false,
                ratio: '37:23',
                minWidth: 370,
                minHeight: 230,
            },
            onSave: function (base64, item, listEl, parentEl, newInputEl, inputEl) {
                var api = $.fileuploader.getInstance(inputEl);

                if (!base64)
                    return;

                // blob
                item.editor._blob = api.assets.dataURItoBlob(base64, item.type);
                $('.form-md-floating-label .fileuploader-input').css("background", "url('" + base64 + "') center center / cover no-repeat");
                var form = new FormData();

                // hide current thumbnail (this is only animation)
                item.image.addClass('fileuploader-loading').html('');
                item.html.find('.fileuploader-action-popup').hide();
                parentEl.find('[data-action="fileuploader-edit"]').hide();

                $('.pcreditRequired').show();

                // send ajax
                form.append(inputEl.attr('name'), item.editor._blob);
                form.append('fileuploader', true);
                form.append('name', item.name);
                form.append('editing', true);
                form.append('_token', $('meta[name="csrf-token"]').attr('content'));
                page_loader()
                $.ajax({
                    url: $('input[name="story_header_image"]').attr("data-url"),
                    data: form,
                    type: 'POST',
                    processData: false,
                    contentType: false
                }).always(function (data) {

                    item.reader.read(function () {
                        var filename = JSON.parse(data);
                        close_loader();
                        if (filename.name)
                        {
                            item.html.find('.fileuploader-action-remove').addClass('fileuploader-action-success');
                            setTimeout(function () {
                                item.html.find('.fileuploader-loading').hide();
                                //  item.renderThumbnail();
                                item.html.find('.fileuploader-action-popup').removeClass('fileuploader-action-popup');
                            }, 400)
                            $('#header_image_path').val(filename.path);
                            $('.photo_credit_div').fadeIn(1000);
                            $('#photo_credit').prop('required', true);
                            item.name = filename.name;
                            // console.log(filename.name);
                            $(".form-md-floating-label .fileuploader-input").addClass("disabled");
                            $("#" + $('input[name="story_header_image"]').attr("data-name") + "-error").text("");
                        }
                        else
                        {
                            alert(filename.warnings[0]);
                            $('.photo_credit_div').fadeOut(500);
                            $('#photo_credit').prop('required', false);
                            item.remove();
                        }


                    }, null, true);
                });

            }
        },
        button: 'Browse Banner Image',
    });

    $('input[name="story_audio_video"]').fileuploader({
        limit: 1,
        maxSize: 100000,
        extensions: ['audio/*', 'video/*'],
        enableApi: true,
        addMore: false,
        onItemShow: true,
        changeInput: '<div class="fileuploader-input">' +
                '<div class="fileuploader-input-inner">' +
                '<div class="fileuploader-icon-main"></div>' +
                '<h3 class="fileuploader-input-caption"><span>Choose photo to upload</span></h3>' +
                '<p>${captions.or}</p>' +
                '<button type="button" class="fileuploader-input-button"><span>${captions.button}</span></button>' +
                '<br><br><span><span class="required">*</span> Note: Audio or video ( MP3 or MP4 can be added) files can be uploaded here. </span>' +
                '</div>' +
                '</div>',
        theme: 'dragdrop',
        upload: {
            url: $('input[name="story_audio_video"]').attr("data-url"),
            data: {'_token': $('meta[name="csrf-token"]').attr('content')},
            type: 'POST',
            enctype: 'multipart/form-data',
            start: true,
            synchron: true,
            beforeSend: function () {
                page_loader();
            },
            onSuccess: function (data, item) {
                var filename = JSON.parse(data);
                close_loader();
                // console.log(attr_name);
                if (filename.filename)
                {
                    item.html.find('.fileuploader-action-remove').addClass('fileuploader-action-success');
                    item.html.find('.fileuploader-action-remove').addClass('audio-remove');

                    var attr_name = (item.input.attr("data-attr-name")) ? item.input.attr("data-attr-name") : 'file-saver';
                    setTimeout(function () {
                        item.html.find('.progress-holder').hide();
                        $(".softsource-show-audio .fileuploader-input").addClass("disabled");
                        item.html.find('.fileuploader-action-popup, .fileuploader-item-image').show();
                        item.html.find('.softsource-show-audio .fileuploader-action-remove').before('<button type="button" class="fileuploader-action fileuploader-action-sort" title="Sort"><i class="fileuploader-icon-sort"></i></button>');
                    }, 400);
                    $('.' + attr_name).val(filename.filename);
                    item.popup.open();

                    $('#audio_video_path').val(filename.path);
                    $('.audioconvert_div,.audio_video_credit_div').fadeIn(1000);
                    $('#audio_video_credit').prop('required', true);

                }
                else
                {
                    $('.audio-upload-error-show').html(filename.warnings[0]);
                    $('#audio_video_path').val('');
                    $('.audioconvert_div,.audio_video_credit_div').fadeOut(500);
                    $('#audio_video_credit').prop('required', false);
                    item.remove();
                }

            },
            onError: function (data, item) {
                if (data.size > (1000 * (1024 * 1024))) {
                    $('.audio-upload-error-show').html('The maximum file size allowed 1 GB');
                    // alert('The maximum file size allowed 1 GB');
                    $('.softsource-show-audio .fileuploader-action-remove').trigger("click");
                } else {
                    $('.audio-upload-error-show').html('Failed to upload File!!!');

                    // alert('Failed to upload File!!!');
                    $('.softsource-show-audio .fileuploader-action-remove').trigger("click");
                }
            },
            onProgress: function (data, item) {

                var progressBar = item.html.find('.progress-holder');
                if (progressBar.length > 0) {
                    progressBar.show();
                    progressBar.find('.fileuploader-progressbar .bar').width(data.percentage + "%");
                }
                item.html.find('.fileuploader-action-popup, .fileuploader-item-image').hide();
            }
        },
        thumbnails: {
            onImageLoaded: function (item, listEl, parentEl, newInputEl, inputEl) {
                $(".softsource-show-audio .fileuploader-action-remove").on("click", function (e)
                {
                    item.remove(e);

                })
                $(".softsource-show-audio .fileuploader-input").addClass("disabled");

            },
            popup: {
                arrows: false,
                onShow: function (item) {
                    $('[data-action="cancel"]').text("Close");
                    item.popup.html.on('click', '[data-action="remove"]', function (e) {
                        item.popup.close();
                        item.remove();
                    }).on('click', '[data-action="cancel"]', function (e) {
                        item.popup.close();
                    }).on('click', '[data-action="save"]', function (e) {
                        if (item.editor && !item.isSaving) {
                            item.isSaving = true;
                            item.editor.save();
                            item.image.show();
                        }
                        if (item.popup.close)
                            item.popup.close();
                    });

                },
                onHide: function (item) {
                    if (!item.isSaving && !item.uploaded && !item.appended) {
                        item.popup.close = null;
                        item.remove();
                        // console.log("closed");
                    }
                }
            },
        },
        onRemove: function (list, listEl, parentEl, newInputEl, inputEl, e) {
            //var attr_name = (inputEl.attr("data-attr-name")) ? inputEl.attr("data-attr-name") : 'file-saver';
            // console.log($('.' + attr_name).val());
            // $.post(inputEl[0].dataset.id, {
            //     'file': $('.' + attr_name).val(),
            //     '_token': $('meta[name="csrf-token"]').attr('content')
            // });

            $.post(inputEl[0].dataset.id, {
                file: list.name,
                "_token": $('meta[name="csrf-token"]').attr('content'),
            })



            $('.' + attr_name).val("");
            $(".softsource-show-audio .fileuploader-input").removeClass("disabled");

            $('#audio_video_path').val('');
            $('.audioconvert_div,.audio_video_credit_div').fadeOut(500);
            $('#audio_video_credit').prop('required', false);
        }
    });
});
