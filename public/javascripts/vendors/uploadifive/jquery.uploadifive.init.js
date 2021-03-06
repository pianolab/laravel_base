var Uploadifive = {
    wrap: '#new-attachments',
    selector: '.uploadifive',
    element: '.attachment',

    init: function () {
        this.destroy();
        this.show_actions();
        this.set_label();
        this.main();
    },

    show_actions: function () {
        wrap = $(Uploadifive.wrap);
        wrap.find('.actions').hide();
        wrap.on('mouseenter', '.attachment', function () {
            $(this).find('.actions').show();
        })
        .on('mouseleave', '.attachment', function () {
            $(this).find('.actions').hide(); // fadeOut
        });
    },

    hide_button: function() {
        if (Uploadifive.params.multi == false) {
            $(Uploadifive.selector).closest('#wrap-uploadifive').slideUp();
        };
    },

    set_params: function (selector) {
        this.selector = selector || this.selector;
        element = $(selector);

        this.params = {
            width: 'auto',
            height: 'auto',
            auto: true,
            debug: false,
            multi: true,
            uploadScript: base_url + 'admin/attachments',
            buttonText: _t(element.data('text')) || _t('choose files') + '...',
            buttonClass: element.data('class') || 'btn btn-success',
            formData: {
                parent_id: element.data('parent-id'),
                parent_name: element.data('parent-name')
            }
        };

        this.params.onUploadComplete = function(file, response) {
            Uploadifive.hide_button();
            return $(Uploadifive.wrap).prepend(response);
        };

        this.params.onError = function(message, file) {
            alert = $('<span>', { class: 'text-danger', text: file.xhr.statusText });
            return $(file.queueItem).find('.fileinfo').html(alert)
        };

        return this.params;
    },

    one: function (selector) {
        this.set_params(selector);
        this.params.multi = false;
        $(selector).uploadifive(this.params);
    },

    many: function (selector) {
        this.set_params(selector);
        $(selector).uploadifive(this.params);
    },

    update: function (id, ajaxData) {
        element = $(this.selector);
        request_url = 'admin/' + element.data('parent-name') + '/' +
            element.data('parent-id') + '/attachments/' + id;

        Application.show_loading();

        return $.ajax({
            type: 'put',
            data: ajaxData,
            url: base_url + request_url
        })
        .always( function () {
            Application.hide_loading();
        });
    },

    destroy: function () {
        element = $(this.selector);

        $(document).on('click', '.attachment-remove', function () {
            attachment = $(this).closest('.actions');
            confirmation = confirm( t('confirm_remove_image', [ [ ':image', attachment.siblings('.caption').text() ] ]) );

            if (confirmation) {
                request_url = 'admin/' + element.data('parent-name') + '/' + element.data('parent-id') +
                    '/attachments/' + attachment.data('id') + '/destroy';

                Application.show_loading();

                $.ajax({
                    type: "delete",
                    url: base_url + request_url,
                    success: function (response) {
                        if (response.success) {
                            parent = attachment.closest('#attachment-' + attachment.data('id')).fadeOut('slow');
                            setTimeout( function () {
                                parent.remove();
                                if (Uploadifive.params.multi == false) {
                                    if ($(Uploadifive.wrap).find(Uploadifive.wrap).length == 0) {
                                        wrap = $(Uploadifive.selector).closest('#wrap-uploadifive').show();
                                        wrap.find('.uploadifive-queue').html('');
                                    };
                                };
                            }, 1000);
                        };
                    }
                })
                .always( function () {
                    Application.hide_loading();
                });
            };
        });
    },

    set_label: function () {
        $(Uploadifive.wrap).on('blur', '.attachment-label', function () {
            var element = $(this);

            Uploadifive.update( element.closest('.fields').data('id'), {
                label: element.val()
            })
            .success( function (response) {
                if (response.success) {};
            });
        });
    },

    main: function () {
        $(Uploadifive.wrap).on('click', '.attachment-main', function () {
            var element = $(this);
            var current_value = element.attr('data-current-value');

            Uploadifive.update( element.closest('.actions').data('id'), {
                is_main: current_value == 1 ? 0 : 1
            })
            .success( function (response) {
                if (response.success) {
                    element.attr('data-current-value', response.attachment_is_main);

                    if (response.attachment_is_main == 1) {
                        element.find('i')
                            .removeClass('fa-times').removeClass('text-danger')
                            .addClass('fa-check').addClass('text-success');
                    }
                    else {
                        element.find('i')
                            .removeClass('fa-check').removeClass('text-success')
                            .addClass('fa-times').addClass('text-danger');
                    };
                };
            });
        });
    },
};

$(document).on("ready", function () { Uploadifive.init(); });
