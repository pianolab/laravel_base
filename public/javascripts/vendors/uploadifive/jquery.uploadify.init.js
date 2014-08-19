var Uploadify = {
    upload: function (element, params) {
        uploadify = $(element);
        paramsDefault = {
            debug: false,
            multi: false,
            width: 173,
            height: 36,
            formData: {
                parent_id: uploadify.data('parent-id'),
                parent_name: uploadify.data('parent-name')
            },
            buttonText: this.valid(params.buttonText) ? params.buttonText : "Selecione o arquivo...",
            buttonClass: this.valid(params.buttonClass) ? params.buttonClass : "btn btn-info",
            upload_url: base_url + (this.valid(params.upload_url) ? params.upload_url : "attachments"),
            flash_url: base_url + "swfs/uploadify/uploadify.swf",
            onUploadSuccess: function(file, data, response) {
                $("#new-attachments").append(data);
                if (!paramsDefault.multi) {
                    uploadify.closest(".wrap-uploadify").slideUp();
                };
            },
            onUploadError: function(file, errorCode, errorMsg, errorString) {

            }
        };

        uploadify.uploadify(paramsDefault);

        $(".uploadify-button").removeAttr("style");
    },

    valid: function (str) {
        return (!(!str || 0 === str.length) && (!str || /^\s*$/.test(str)));
    }
};
