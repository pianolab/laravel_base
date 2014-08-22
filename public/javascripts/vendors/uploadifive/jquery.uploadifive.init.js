var Uploadifive = {
    wrap: '#new-attachments',

    selector: '.uploadifive',

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

    params: function (element) {
        return {
            width: 'auto',
            height: 'auto',
            uploadScript: base_url + 'attachments',
            auto: element.data('button-auto') || true,
            debug: element.data('button-debug') || false,
            multi: element.data('button-multi') || true,
            buttonText: element.data('button-text') || 'Selecione arquivos...',
            buttonClass: element.data('button-class') || 'btn btn-success',
            formData: {
                parent_id: element.data('parent-id'),
                parent_name: element.data('parent-name')
            },
            onUploadComplete: function(file, response) {
                $(Uploadifive.wrap).prepend(response);
            },
            onError: function(message, file) {
                alert = $('<span>', { class: 'text-danger', text: file.xhr.statusText });
                $(file.queueItem).find('.fileinfo').html(alert)
            }
        };
    },

    upload: function (selector) {
        element = $(selector || this.selector);
        params = this.params(element);
        $(selector).uploadifive(params);
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
                            setTimeout( function () { parent.remove(); }, 1000);
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
