$().ready(function() {
$().ajaxStart($.blockUI).ajaxStop($.unblockUI);
	
/*function co_info_show() {
	
	if ($('#main_cat').val() != $('#marrage_cat').val()) {
		$('#co_information').show();
		
		if ($("#co_active").is(":checked")) {
		   $("#co_details").show();
		}
	} else {
		$('#co_information').hide();
		$("#co_details").show();
	}
	
}

co_info_show();
*/
	$.get('tachonite/replacement_cat.php',
		  {
				  cat_id:$('#main_cat').val(),
				  sub_cat_1:$('#default_sub_cat1').val(),
				  sub_cat_2:$('#default_sub_cat2').val(),
				  other_box:$('#default_custom_cat').val()
		  }
	); 
	
	/*//load previous data
	function loadCategory(main_cat,sub_c_1,sub_c_2)  {
		alert('a');
		$.get('tachonite/replacement_cat.php',
			  {
					  cat_id:main_cat,
					  other_box:1,
					  sub_cat_1:sub_c_1,
					  sub_cat_2:sub_c_2
			  })
	}*/
	
	//load category listing on main category change
	$('#sub_cat_2').change(function() { 
									
		$.get('tachonite/replacement_cat.php',
			  {
					  cat_id:$('#main_cat').val(),
					  sub_cat_1:$('#sub_cat_1').val(),
					  sub_cat_2:$('#sub_cat_2').val()
			  }
			 ); 
	});
	
	
	//load category listing on main category change
	$('#main_cat').change(function() { 
		//show/hide co infomation check box
		//co_info_show();
		
			$.get('tachonite/replacement_cat.php',
				  {
						  cat_id:$('#main_cat').val()
				  }
			); 
	});
	
	
/*	//load category listing on main category change
	$('#co_active').click(function() { 
								   
      if ($("#co_active").is(":checked")) {
         $("#co_details").show();
      } else {
         $("#co_details").hide();
      }
	  
	});


	//copy member info to CO details
	$('#copy_info').click(function() { 
								   
      if ($("#copy_info").is(":checked")) {
		  
         document.getElementById("co_name").value = $("#name").val();
		 document.getElementById("co_address").value = $("#address").val();
		 
      } else {
		  
         document.getElementById("co_name").value = "";
		 document.getElementById("co_address").value =  "";
		 
      }
	  
	});
*/

})

