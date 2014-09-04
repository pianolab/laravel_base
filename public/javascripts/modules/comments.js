var Comment = {

    init: function () {
        this.validations();
        this.setLabel();
    },

    setLabel: function () {
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

    validations: function () {
        var form_comment = $('#form-comment').validate({
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
};

$(document).on('ready', function () { Comment.init(); });
