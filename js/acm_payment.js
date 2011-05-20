$().ready(function() {

  //validate ad rate info form
  $("#frm_payment_add").validate({
    errorElement: "em",
    rules: {
      account_id: {
        required : true
      },
      payment_amount: {
        required : true,
        number: true
      },
      extra_amount: {
        required : true,
        number: true
      },
      payment_date : {
        required : true,
        date: true
      }
    },
    messages: {
      account_id: {
        required : "Select Account Number"
      },
      payment_amount: {
        required : "Enter Payment Amount"
      },
      extra_amount: {
        required : "Enter Amount"
      },
      payment_date : {
        required : "Enter Payment date"
      }
    },
    success: function(label) {
      label.text("").addClass("success");
    }
  })

})

