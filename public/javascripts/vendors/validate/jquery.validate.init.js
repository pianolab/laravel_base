$.validator.setDefaults({
  errorElement: 'span',
  errorClass: "error",
  validClass: "valid",

  onkeyup: false,
  // onclick: true,

  ignore: [],

  errorPlacement: function(error, element) {
    error.insertAfter(element);
  },

  highlight: function(element, errorClass, validClass) {
    $(element).removeClass(validClass).addClass(errorClass)
      .closest('div')
      .removeClass('has-success').addClass('has-error');
  },

  unhighlight: function(element, errorClass, validClass) {
    $(element).removeClass(errorClass).addClass(validClass)
      .closest('div')
      .removeClass('has-error').addClass('has-success');
  },

  success: function(element) {
    $(element).addClass('valid').html('<i class="fa fa-check"></i>');
  },
});

$.validator.addMethod(
  'dateBR', function(value, element) {
    return value.match(/^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)\d\d$/);
  },
  "Invalid date. Eg: dd/mm/yyyy."
);

$(document).on('ready', function () {
  var input_group = $('.input-group').find('.error').siblings('.input-group-btn');
  var input_group_width = input_group.width() + parseInt(input_group.siblings('.error').css('right'));
  input_group.siblings('.error').css({ 'right': 3 + input_group_width + 'px' });
});
