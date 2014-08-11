$.validator.setDefaults({
  errorElement: 'span',
  errorClass: "error",
  validClass: "valid",

  onkeyup: false,
  // onclick: true,

  ignore: [],

  errorPlacement: function(error, element) {
    var icon = $('<i>', { 'class': 'fa fa-times' });
    error.attr('data-placement', 'left').attr('data-content', error.text());
    error.insertAfter(element).text('').html(icon).popover({ trigger: 'hover' }).popover('show');

    setTimeout( function() { error.popover('hide'); }, 2000);
  },

  highlight: function(element, errorClass, validClass) {
    $(element).removeClass(validClass).addClass(errorClass)
      .closest('.control-group,.form-group')
      .removeClass('has-success').addClass('has-error');
  },

  unhighlight: function(element, errorClass, validClass) {
    $(element).removeClass(errorClass).addClass(validClass)
      .closest('.control-group,.form-group')
      .removeClass('has-error').addClass('has-success');
  },

  success: function(element) {
    $(element).addClass('valid').attr('data-content', '').html('<i class="fa fa-check" />').popover('destroy');
  },
});

$.validator.addMethod(
  'dateBR', function(value, element) {
    return value.match(/^(0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)\d\d$/);
  },
  "Invalid date. Eg: dd/mm/yyyy."
);

$(document).on('ready page:load', function () {
  $('.form-group').on('click', '.popover', function () {
    $(this).fadeOut();
  });

  var input_group = $('.input-group').find('.error').siblings('.input-group-btn');
  var input_group_width = input_group.width() + parseInt(input_group.siblings('.error').css('right'));
  input_group.siblings('.error').css({ 'right': input_group_width + 'px' });
});
