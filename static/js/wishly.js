$(function() {
    // Attach a submit handler to the form
    $( "#editForm" ).submit(function( event ) {

      // Stop form from submitting normally
      event.preventDefault();

      // Get some values from elements on the page:
      var $form = $( this ),
          datastring = $form.serialize(),
          itemId = $form.attr("data-request-id");
          url = $form.attr( "action" )+itemId;

      $.ajax({
        url: url,
        data: $form.serialize(),
        type: 'POST',
        success: function(data){
            console.log(data);
        }
      });

    });


    $(".date-picker").datepicker({ dateFormat: 'yy-mm-dd' });

    $(".date-picker").on("change", function () {
        var id = $(this).attr("id");
        var val = $("label[for='" + id + "']").text();
        $("#msg").text(val + " changed");
    });

});