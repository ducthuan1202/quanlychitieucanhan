$(document).ready(() => {

  $("#used_date").daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    maxYear: parseInt(moment().format('YYYY'), 10),
    locale: {
      format: "YYYY-MM-DD HH:mm",
    },
    timePicker24Hour: true,
    timePicker: true,
    autoApply: true,
    autoUpdateInput: true,
  });

  $('.table tr td').on('click', 'a.btn-delete-spending', function (event) {
    event.preventDefault();

    const form = $(this).next('form');
    form.trigger('submit');
  });

});
