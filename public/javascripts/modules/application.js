Application = {
    init: function () {
    },
    hide_loading: function () {
        $('#loading').fadeOut();
    },

    show_loading: function (selector) {
        $('#loading').show();
    }
};

$(document).on("ready", function () { Application.init(); });
