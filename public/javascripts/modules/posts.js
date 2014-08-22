var Post = {

    init: function () {
        this.validations();
        this.uploadify();
        this.main();
    },

    uploadify: function () {
        Uploadifive.many('#attachment_post');
    },

    validations: function () {
        var form_post = $('#form-post').validate({
            rules: {
                title: {
                    required: true
                },
                published_at: {
                    required: true,
                    date: true
                },
                content: {
                    required: true
                }
            }
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

$(document).on('ready', function () { Post.init(); });
