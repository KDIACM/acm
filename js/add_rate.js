$().ready(function() {
	
	//validate ad rate info form
	$("#rate_add_form").validate({
		errorElement: "em",
		rules: {
			super_seller: {
				required : true
			},
			regular: "required",
			photo_15: {
				required : true
				},
			photo_20 : {
				required : true
				},	
			photo_25 : {
				required : true
			},
			e_edition : {
				required : true
			},
			cls_initial_words : {
				required : true
			},
			cls_initial : {
				required : true
			},
			extra_word : {
				required : true	
			},
			max_word : {
				required : true	
			},
			co_boxad : {
				required : true	
			},
			co_photo : {
				required : true	
			},
			co_cls : {
				required : true	
			}
		},
		success: function(label) {
				label.text("").addClass("success");
		}
	
	    } 
	)

})

