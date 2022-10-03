

$("#btnAsignarLtd").click(function(e) {
    console.log("btnAsignarLtd")
    e.preventDefault();

    var form = $('#generalForm').parsley().refresh();
    var action = $('#generalForm').attr("action");

    if ( form.validate() ){ 

         $.ajax({
            /* Usar el route  */
            url: action,
            type: 'GET',
            /* send the csrf-token and the input to the controller */
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: $('#generalForm').serialize()
            
            /* remind that 'data' is the response of the AjaxController */
            }).done(function( response) {

                alert("ok");

            }).fail( function( data,jqXHR, textStatus, errorThrown ) {
                console.log( "fail" );
                console.log(textStatus);
                
                alert( data.responseJSON.message);

            }).always(function() {
                console.log( "complete" );
            });

    } else {
        console.log( "enviosForm con errores" );
        return false;
    }
    
});
