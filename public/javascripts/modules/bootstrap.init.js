var Twbs = {
    init: function () {
        this.datepicker();
        this.tooltip();
        this.pagedown();
    },

    tooltip: function () {
        $('[data-title]').tooltip();
    },

    datepicker: function () {
        $('.datepicker').datepicker({ format: 'yyyy-mm-dd' });
    },

    pagedown: function () {
        $("textarea.markdown-editor, .markdown-editor textarea").pagedownBootstrap();
        $('.wmd-preview').addClass('well');
    },
};

$(document).on('ready page:load', function () { Twbs.init(); });
