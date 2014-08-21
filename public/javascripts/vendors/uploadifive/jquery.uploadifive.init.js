var Uploadifive = {
    wrap: '#new-attachments',

    selector: '.uploadifive',

    init: function () {
        this.destroy();
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
            alert = $('<span>', { class: 'text-danger', text: 'File upload can not be done' });
            $(file.queueItem).find('.fileinfo').html(alert)
        }
    },

    upload: function (selector) {
        button_upload = $(selector || this.selector);
        this.params['formData'] = {
            parent_id: button_upload.data('parent-id'),
            parent_name: button_upload.data('parent-name')
        };
        $(selector).uploadifive(this.params);
    },

    destroy: function () {
        button = $(this.selector);

        $(document).on('click', '.attachment-remove', function () {
            confirmation = confirm('Are you sure?');
            attachment = $(this);

            if (confirmation) {
                request_url = button.data('parent-name') + '/' + button.data('parent-id') + '/attachments/' + attachment.data('id') + '/destroy';
                $.ajax({
                    type: "delete",
                    url: base_url + request_url,
                    success: function (response) {
                        if (response.success) {
                            parent = attachment.closest('#attachment-' + attachment.data('id')).fadeOut('slow');
                            setTimeout( function () { parent.remove(); }, 1000);
                        };
                    }
                });
            };
        });
    }
};

$(document).on("ready", function () { Uploadifive.init(); });
