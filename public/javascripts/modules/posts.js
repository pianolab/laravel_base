var Post = {

    init: function () {
        this.validations();
        this.uploadifive();
    },

    uploadifive: function () {
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
};

$(document).on('ready', function () { Post.init(); });
