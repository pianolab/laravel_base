Application = {
    init: function () {
    },

    translate: function (key, hashes) {
        message = Language[key]
        $.each(hashes || {}, function (value, name) {
            message = message.replace(name[0], name[1]);
        });
        return message || key;
    },

    hide_loading: function () {
        $('#loading').fadeOut();
    },

    show_loading: function (selector) {
        $('#loading').show();
    }
};

function t(key, hashes) {
    return Application.translate(key, hashes || {});
}

$(document).on("ready", function () { Application.init(); });
