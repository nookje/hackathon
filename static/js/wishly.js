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
          btn = $('#edit-request-btn');

      btn.button('loading');
      $.ajax({
        url: url,
        data: $form.serialize(),
        type: 'POST',
        success: function(data){
            console.log(data);
        }
      }).always(function () {
        btn.button('reset')
      });

    });

    $('.offer-btn').click(function ( event ) {
      console.log('Button clicked')

      // Stop form from submitting normally
      event.preventDefault();

      var btn = $(this)

      btn.button('loading');
      $.ajax({
        url: '/offers/'+btn.attr('data-status')+'/'+btn.attr('data-hash'),
        data: '',
        type: 'POST'
      }).always(function () {
        btn.button('reset')
      });

    });


    $(".date-picker").datepicker({ dateFormat: 'yy-mm-dd' });

    $(".date-picker").on("change", function () {
        var id = $(this).attr("id");
        var val = $("label[for='" + id + "']").text();
        $("#msg").text(val + " changed");
    });

});