$().ready(function() {

  $("#frm_customer_add").validate({
    errorElement: "em",
    rules: {
      txt_customer_id: {
        required : true
      },
      txt_f_name: {
        required : true
      },
      txt_l_name: {
        required : true
      },
      txt_nick_name: "required",
      txt_nic_no: {
        required : true
      },
      txt_address: {
        required : true
      }
    },
    messages: {
      txt_customer_id: {
        required : "Enter Customer ID"
      },
      txt_f_name: {
        required : "Enter First name"
      },
      txt_l_name: {
        required : "Enter Last name"
      },
      txt_nick_name: {
        required : "Enter Nick name"
      },
      txt_nic_no: {
        required : "Enter NIC number"
      },
      txt_address: {
        required : "Enter Address"
      }
    },
    success: function(label) {
      label.text("").addClass("success");
    }
  });

})

