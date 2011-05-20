$().ready(function() {

  $("#frm_user_add").validate({
    errorElement: "em",
    rules: {
      txt_name: {
        required : true
      },
      txt_password: "required",
      conf_password: {
        equalTo : '#txt_password'
      }
    },
    messages: {
      txt_name: {
        required : "Enter Username"
      },
      txt_password: {
        required : "Enter Password"
      },
      conf_password: {
        equalTo : "Confirm password missed match"
      }
    },
    success: function(label) {
      label.text("").addClass("success");
    }
  });

})

