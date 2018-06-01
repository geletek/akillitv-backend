//== Class definition
var Default = function() {

    var SweetAlert2Demo = function() {

        $(".sweet_delete_button").click(function(e) {
          event.preventDefault();

          var method = $(this).data("method");
          var button_cancel = $(this).data("trans-button-cancel");
          var button_confirm = $(this).data("trans-button-confirm");
          var title = $(this).data("trans-title");
          var href = $(this).attr("href");
          var csrf = $('meta[name=csrf-token]').attr("content");

          swal({
            title: title,
            type: "warning",
            showCancelButton: true,
            confirmButtonText: button_confirm,
            cancelButtonText: button_cancel
          }).then(function(e) {
            if (e.value) {
              var form = $("<form/>",
                 { action:href, method:'post', id:'delete_form' }
              );

              form.append(
                  $("<input>",
                       {
                           type:'hidden',
                           name:'_token',
                           value: csrf
                       }
                   )
              );

              form.append(
                  $("<input>",
                       {
                           type:'hidden',
                           name:'_method',
                           value:'delete'
                       }
                   )
              );

              form.append(
                   $("<input>",
                        {
                            type:'submit',
                            value:'submit',
                            style:'display:none'
                        }
                     )
              );
              $("body").append(form);

              $( "#delete_form" ).submit();
            }

          });
        });

    };


    return {

        init: function() {

            SweetAlert2Demo();

        }
    };
}();

$(document).ready(function() {
    Default.init();
});
