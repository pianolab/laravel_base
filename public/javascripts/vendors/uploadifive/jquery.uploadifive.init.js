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

    main: function () {
        $(Uploadifive.wrap).on('click', '.attachment-main', function () {
            test = Uploadifive.update($(this));

            console.log(test)
        });
    },

    update: function (currentSelector) {
        button = $(this.selector);
        request_url = button.data('parent-name') + '/' + button.data('parent-id') +
            '/attachments/' + currentSelector.closest('.actions').data('id');

        ajaxData = {};
        ajaxData[currentSelector.data('column')] = currentSelector.data('value');
        $.ajax({
            type: "put",
            data: ajaxData,
            url: base_url + request_url,
            success: function (response) {
                // return response;
            }
        });
    },

    destroy: function () {
        button = $(this.selector);

        $(document).on('click', '.attachment-remove', function () {
            confirmation = confirm('Are you sure?');
            attachment = $(this).closest('.actions');

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
