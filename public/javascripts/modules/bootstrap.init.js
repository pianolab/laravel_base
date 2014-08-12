var Twbs = {
    init: function () {
        this.datepicker();
        this.tooltip();
    },

    tooltip: function () {
        $('[data-title]').tooltip();
    },

    datepicker: function () {
        $('.datepicker').datepicker({ format: 'yyyy-mm-dd' });
    },
};

$(document).on('ready page:load', function () { Twbs.init(); });
