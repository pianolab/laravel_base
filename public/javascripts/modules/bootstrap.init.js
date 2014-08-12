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
        $("textarea.markdown-editor, .markdown-editor textarea").pagedownBootstrap({
            'sanitize': false,
            'help': function () { alert("Do you need help?"); },
            'hooks': [
                {
                    'event': 'preConversion',
                    'callback': function (text) {
                        return text.replace(/\b(a\w*)/gi, "*$1*");
                    }
                },
                {
                    'event': 'plainLinkText',
                    'callback': function (url) {
                        return url.replace(/^https?:\/\//, "");
                    }
                }
            ]
        });

        $('.wmd-preview').addClass('well');
    },
};

$(document).on('ready page:load', function () { Twbs.init(); });
