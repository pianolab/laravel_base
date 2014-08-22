var Uploadifive = {
    wrap: '#new-attachments',

    selector: '.uploadifive',

    init: function () {
        this.main();
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
            $(this).find('.actions').fadeOut();
        });
    },

    params: {
        auto: true,
        debug: false,
        multi: true,
        width: 'auto',
        height: 'auto',
        buttonText: 'Selecione arquivos...',
        uploadScript: base_url + 'attachments',
        buttonClass: 'btn btn-success',
        onUploadComplete: function(file, response) {
            $(Uploadifive.wrap).prepend(response);
        },
        onError: function(message, file) {
            alert = $('<span>', { class: 'text-danger', text: file.xhr.statusText });
            $(file.queueItem).find('.fileinfo').html(alert)
        }
    },

    upload: function (selector) {
        button = $(selector || this.selector);
        this.params['formData'] = {
            parent_id: button.data('parent-id'),
            parent_name: button.data('parent-name')
        };
        $(selector).uploadifive(this.params);
    },

    update: function (id, ajaxData) {
        element = $(this.selector);
        request_url = element.data('parent-name') + '/' + element.data('parent-id') +
            '/attachments/' + currentSelector.closest('.actions').data('id');

        Application.show_loading();
        $.ajax({
            type: "put",
            data: ajaxData,
            url: base_url + request_url,
            success: function (response) {
                // return response;
            }
        })
        .always( function () {
            Application.hide_loading();
        });
    },

    destroy: function () {
        button = $(this.selector);

        $(document).on('click', '.attachment-remove', function () {
            confirmation = confirm('Are you sure?');
            attachment = $(this).closest('.actions');

            if (confirmation) {
                request_url = button.data('parent-name') + '/' + button.data('parent-id') + '/attachments/' + attachment.data('id') + '/destroy';
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
