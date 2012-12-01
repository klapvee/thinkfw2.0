
function checkForm(form) {

    var submitForm = true;

    $('#' + form.id).find('[data-required]').each(function(index) {
        if (this.value === '') {
            submitForm = false;
            $(this).closest('.control-group').addClass('error');
        } else {
            $(this).closest('.control-group').removeClass('error');
            $(this).closest('.control-group').addClass('success');

        }

    });

    return submitForm;
}