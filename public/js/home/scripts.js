$(function() {
    // $('form').submit(function(event){
    //     // event.stopPropagation();
    //     event.preventDefault();
    //
    //     $.ajax({
    //         type: "POST",
    //         url: "/search",
    //         data: $(this).serialize(),
    //         dataType: "json",
    //         encode: true,
    //         success: function($data) {
    //             console.log(JSON.stringify($data));
    //         },
    //         error: function(error) {
    //             // alert(JSON.stringify(error));
    //         }
    //     });
    // });

    $('#clear').on('click', function(event){
        // $('form').trigger("reset");
        $('form')[0].reset();
    });
});