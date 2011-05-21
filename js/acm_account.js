$().ready(function() {

  //validate ad rate info form
  $("#frm_account_add").validate({
    errorElement: "em",
    rules: {
      customer_id: {
        required : true
      },
      account_number: {
        required : true,
        number: true
      },
      amount: {
        required : true,
        number: true
      },
      rate : {
        required : true,
        number: true
      },
      open_date : {
        required : true,
        date: true
      }
    },
    messages: {
      cutomer_id: {
        required : "Select Customer"
      },
      account_number: {
        required : "Enter Account number"
      },
      amount: {
        required : "Enter Amount"
      },
      rate : {
        required : "Enter Rate"
      },
      open_date : {
        required : "Enter Open date"
      }
    },
    success: function(label) {
      label.text("").addClass("success");
    }
  })
 
})

