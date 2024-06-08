$(function() {
    $('#reset-inputs').on('click', function(event){
        $('form input[type=text]').val('');
        $('#filters #submit').trigger('click');
    });
});