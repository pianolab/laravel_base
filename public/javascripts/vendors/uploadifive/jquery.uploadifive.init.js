var Uploadifive = {
    wrap: '#new-attachments',
    selector: '.uploadifive',
    element: '.attachment',

    init: function () {
        this.destroy();
        this.show_actions();
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
            uploadScript: base_url + 'attachments',
            buttonText: element.data('text') || 'Selecione arquivos...',
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
        request_url = element.data('parent-name') + '/' +
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
            confirmation = confirm('Do you really want to delete this file?');
            attachment = $(this).closest('.actions');

            if (confirmation) {
                request_url = element.data('parent-name') + '/' + element.data('parent-id') +
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
    }
};

$(document).on("ready", function () { Uploadifive.init(); });
