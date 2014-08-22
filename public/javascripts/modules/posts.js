var Post = {

    init: function () {
        this.validations();
        this.uploadify();
    },

    uploadify: function () {
        Uploadifive.upload('#attachment_post');
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
            test = Uploadifive.update($(this));

            console.log(test)
        });
    },
};

$(document).on('ready', function () { Post.init(); });
