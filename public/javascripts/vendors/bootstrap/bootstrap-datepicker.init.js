var TwbsDatepicker = {
    init: function () {
        this.simple();
    },

    simple: function () {
        $('.datepicker').datepicker({ format: 'yyyy-mm-dd' });
    },

};

$(document).on('ready page:load', function () { TwbsDatepicker.init(); });
