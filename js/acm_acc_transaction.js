$().ready(function() {
  
 $("#frm_account_trn_add").validate({
    errorElement: "em",
    rules: {
      amount: {
        required : true,
        number: true
      },
      owner: {
        required : true
      }
    },
    messages: {
      amount: {
        required : "Enter Amount"
      },
      owner: {
        required : "Select Owner"
      }
    },
    success: function(label) {
      label.text("").addClass("success");
    }
  })

})