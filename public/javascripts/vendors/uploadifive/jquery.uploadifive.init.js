var Uploadifive = {
    params: {
        auto: true,
        debug: false,
        multi: true,
        width: 'auto',
        height: 'auto',
        buttonText: 'Selecione arquivos...',
        uploadScript: base_url + 'attachments',
        buttonClass: 'btn btn-success',
        onUploadComplete: function(file, data) {
            $('#new-attachments').append(data);

            $('.loading-type').hide();
            $('.attachment-award-type').show();
        },
        onUploadError: function(file, errorCode, errorMsg, errorString) {
            alert('Só serão aceitos:<br /> - Arquivos de texto nos formatos (doc, docx, pdf, rtf, txt)<br /> - Imagens nos formatos (png, jpg, jpeg, bmp, gif)<br /> - Arquivos e imagens com no máximo 2MB. <br />Por favor tente outro arquivo');
        }
    },

    upload: function (selector) {
        button_upload = $(selector);
        this.params['formData'] = {
            parent_id: button_upload.data('parent-id'),
            parent_name: button_upload.data('parent-name')
        };
        $(selector).uploadifive(this.params);
    }
};
