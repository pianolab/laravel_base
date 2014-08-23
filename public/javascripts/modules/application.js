Application = {
    init: function () {
    },

    translate: function (key, hashes) {
        message = Language[key]
        $.each(hashes, function (value, name) {
            message = message.replace(name[0], name[1]);
        });
        return message != '' ? key : message;
    },

    hide_loading: function () {
        $('#loading').fadeOut();
    },

    show_loading: function (selector) {
        $('#loading').show();
    }
};

function t(key, value, name) {
    return Application.translate(key, value || '', name || '');
}

$(document).on("ready", function () { Application.init(); });
