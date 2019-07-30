$(document).ready(function() {
	//NUMBER ONLY CLASS
	$('.number_only').bind('keyup paste', function(){
	    this.value = this.value.replace(/[^0-9]/g, '');
	 });

	$('.currency_number_only').bind('keyup paste', function(){
	    this.value = this.value.replace(/[^0-9\.]/g, '');
	 });

	//LETTERS ONLY
	jQuery.validator.addMethod("lettersonlys", function(value, element) {
	  return this.optional(element) || /^[a-zA-Z ]*$/.test(value);
	}, "Letters only please");

	//GREATER THAN
	$.validator.addMethod("greaterThan",
	    function (value, element, param) {
			var $otherElement = $(param);
			return parseInt(value, 10) > parseInt($otherElement.val(), 10);
		}, "This field should be greater!"
	);

	//Login Form validation
	$("#user-login-form").validate({ 
		errorElement: 'span',
		rules: {
			email: {
			  required: true, 
			  email: true 
			}, 
			password:{
				required:true,
				minlength:6
			}
		},
	    messages: { 
	      
	    } 
	});

	//ADD BLOCK FORM VALIDATION
	$("#add-block-frm").validate({ 
		errorElement: 'span',
		rules: {
			name: {
			  required: true, 
			},
		},
	    messages: { 
	      
	    } 
	});

	//EDIT BLOCK FORM VALIDATION
	$("#edit-block-frm").validate({ 
		errorElement: 'span',
		rules: {
			name: {
			  required: true, 
			},
		},
	    messages: { 
	      
	    } 
	});

	//ADD TOWER FORM VALIDATION
	$("#add-tower-frm").validate({ 
		errorElement: 'span',
		rules: {
			tower_name:"required", 
			block_id:"required", 
			no_of_floors:"required", 
			flats_per_floor:"required", 		
		},
	    messages: { 
	      
	    } 
	});

	//ADD TOWER FORM VALIDATION
	$("#edit-tower-frm").validate({ 
		errorElement: 'span',
		rules: {
			tower_name:"required", 
			block_id:"required", 
			no_of_floors:"required", 
			flats_per_floor:"required", 		
		},
	    messages: { 
	      
	    } 
	});

	//ADD FLAT TYPE FORM VALIDATION
	$("#add-flat-type-frm").validate({ 
		errorElement: 'span',
		rules: {
			name:"required", 
			total_bedroom:"required", 
			total_bathroom:"required", 
			area_type:"required",
			flat_area:"required",		
			servent_room:"required",		
		},
	    messages: { 
	      
	    } 
	});

	//ADD FLAT TYPE FORM VALIDATION
	$("#edit-flat-type-frm").validate({ 
		errorElement: 'span',
		rules: {
			name:"required", 
			total_bedroom:"required", 
			total_bathroom:"required", 
			area_type:"required",
			flat_area:"required",		
			servent_room:"required",		
		},
	    messages: { 
	      
	    } 
	});

	//ADD FLAT FORM VALIDATION
	$("#add-flat-frm").validate({ 
		errorElement: 'span',
		rules: {
			flat_no:"required", 
			tower_id:"required", 						
			flat_type_id:"required", 						
									
		},
	    messages: { 
	      
	    }
	});	

	//ADD FLAT FORM VALIDATION
	$("#edit-flat-frm").validate({ 
		errorElement: 'span',
		rules: {
			flat_no:"required", 
			tower_id:"required", 						
			flat_type_id:"required", 					
		},
	    messages: { 
	      
	    } 
	});

	//ADD NEW MEMBER Form validation
	$("#add-owner-frm").validate({ 
		errorElement: 'span',
		rules: {
			name: {
				required:true,
				lettersonlys:true
			},
			member_type_id: "required",
			//tower_id: "required",
			//flat_id: "required",
			email: {
			  required: true, 
			  email: true 
			}, 
			phone_no:{
				required:true,
				minlength:10,
				maxlength:10
			},
			/*owner_id:{
				required: function(element) {
					//console.log("member value =", $('.selectMemberType').val());
		        return ($('.selectMemberType').val() == 2) ? true : false;
		        
		      }
			}*/
		},
	    messages: { 
	      
	    } 
	});

	//ADD NEW MEMBER Form validation
	$("#add-tenant-frm").validate({ 
		errorElement: 'span',
		rules: {
			name: {
				required:true,
				lettersonlys:true
			},
			email: {
			  required: true, 
			  email: true 
			}, 
			phone_no:{
				required:true,
				minlength:10,
				maxlength:10
			}
		},
	    messages: { 
	      
	    } 
	});

	//CHANGE PASSWORD FORM VALIDATION
	$("#change-password-frm").validate({ 
		errorElement: 'span',
		rules: {
			old_password:{
					required:true,
					minlength:6
				}, 
			new_password:{
					required:true,
					minlength:6
				}, 
			confirm_password:{
					required:true,
					equalTo: "#new_password",
					minlength:6,

				},	
		},
	    messages: { 
	      confirm_password: {
	      	equalTo : 'confirm password and new password should be same!'
	      },
	    } 
	});

	//UPDATE BILL FORM VALIDATION
	$("#update-setting-frm").validate({ 
		errorElement: 'span',
		rules: {
			maintenance_charges: "required",
			electricity_per_unit: "required",
			dge_per_unit: "required",
			gst_tax: "required",
			state_gst_tax: "required",
			payment_duration: "required",
			name: "required",
			email: "required",
			phone: "required",
			registration_number: "required",
			pan_number: "required",
			gst_number: "required",
			registered_address: "required",
			due_date_penalty: "required",
		},
	    messages: { 
	      
	    } 
	});

	//Update Bill Form validation
	$("#add-bill-frm").validate({ 
		errorElement: 'span',
		rules: {
			due_date: {
			  required: true
			},
			flat_id:"required",			 
			description:{
				required:true,				
				minlength:10,				
			},
			amount:"required"
		},
	    messages: { 
	      
	    } 
	});

	//Update Bill Form validation
	$("#edit-bill-frm").validate({ 
		errorElement: 'span',
		rules: {
			from_date: {
			  required: true, 
			  date: true 
			},
			to_date: {
			  required: true, 
			  date: true 
			},
			due_date: {
			  required: true, 
			  date: true 
			},
			bill_status:"required" ,
			previous_reading:{
				required:true
			}, 
			current_reading:{
				required:true,
				greaterThan:'#previous_reading'
			},
			amount:"required",
			payment_duration:"required"
		},
	    messages: { 
	      current_reading:{
				greaterThan: "Current Reading should be greater then Previous Reading."
			},
	    } 
	});


	//UPDATE USER FORM VALIDATION
	$("#update-user-frm").validate({ 
		errorElement: 'span',
		rules: {
			name: "required",
			email: {
				required:true,
				email:true
			},
			phone_no: {
				required:true,
				minlength:10,
				maxlength:10,
			},
		},
	    messages: { 
	      
	    } 
	});

	//UPDATE USER FORM VALIDATION
	$("#add-category-frm").validate({ 
		errorElement: 'span',
		rules: {
			name: "required",
			"staff_type_id[]": "required",
		},
	    messages: { 
	      
	    } 
	});

	$("#edit-category-frm").validate({ 
		errorElement: 'span',
		rules: {
			name: "required",
			"staff_type_id[]": "required",
		},
	    messages: { 
	      
	    } 
	});

	//UPDATE USER FORM VALIDATION
	$("#add-complaint-frm").validate({ 
		errorElement: 'span',
		rules: {
			category_id: "required",
			flat_id: "required",
			description: "required",
			complaint_type: "required",
			open_date: {
				required : function(){
					$(".complaint-type-dropdown").val() == 2 ? true :false;
				}
			},
		},
	    messages: { 
	      
	    } 
	});

	//UPDATE COMPLAINT FORM VALIDATION
	$("#edit-complaint-frm").validate({ 
		errorElement: 'span',
		rules: {
			category_id: "required",
			open_date: "required",
			last_update: "required",
			is_owner_completed: "required",
			flat_id: "required",
			description: "required",
			
		},
	    messages: { 
	      
	    } 
	});

	//ADD STAFF FORM VALIDATION
	$("#add-staff-frm").validate({ 
		errorElement: 'span',
		rules: {
			name: "required",
			email: {
				required:true,
				email:true
			},
			member_type_id: "required",
			gender: "required",
			phone_no: {
				required:true,
				minlength:10,
				maxlength:10,
			},
			password:{
					required:true,
					minlength:6
				}, 
			confirm_password:{
					required:true,
					equalTo: "#new_password",
					minlength:6, 
			}
		},
	    messages: { 
	      
	    } 
	});

	//ADD STAFF FORM VALIDATION
	$("#edit-staff-frm").validate({ 
		errorElement: 'span',
		rules: {
			name: "required",
			email: {
				required:true,
				email:true
			},
			member_type_id: "required",
			gender: "required",
			phone_no: {
				required:true,
				minlength:10,
				maxlength:10,
			},
		},
	    messages: { 
	      
	    } 
	});

	$("#search-bill-frm").validate({ 
		errorElement: 'span',
		rules: {
			 
			to:{
				required:function() {
					return ($(".from-date").val() != "") ? true : false ;
				}
			}
		},
	    messages: { 
	      
	    } 
	});

	$("#sbmitEditBillBtn").click(function (e) { 
		var validForm = true;
		$("input.amount").each(function() {
    		if($(this).val() == "" && $(this).val().length < 1) {
		  			$(this).next('span.error').html("This field is required");   
		  			validForm = false;  
		    }  else {
		    	$(this).next('span.error').html("");
		    }
		});

		$("textarea.description").each(function() {
    		if($(this).val() == "" && $(this).val().length < 1) {
		  			$(this).next('span.error').html("This field is required"); 
		  			validForm = false;
		    }  else {
		    	$(this).next('span.error').html("");
		    }
		});

		$("input.due_date").each(function() {
    		if($(this).val() == "" && $(this).val().length < 1) {
		  			$(this).parent('div').siblings("span.error").html("This field is required");
		  			validForm = false;
		    }  else {
		    	$(this).next('span.error').html("");
		    }
		});

		if(validForm) {
			$("#edit-other-bill-frm").submit();
		}

	});

	$("#add-staff-type-frm").validate({ 
		errorElement: 'span',
		rules: {
			name: "required",
			is_supervisor: "required",
		},
	});


	$("#edit-staff-type-frm").validate({ 
		errorElement: 'span',
		rules: {
			name: "required",
			is_supervisor: "required",
		},
	});

	$("#assign-worker-frm").validate({ 
		errorElement: 'span',
		rules: {
			worker_id: "required",
		},
	});

	//ADD gatekeepr FORM VALIDATION
	$("#add-gatekeepr-frm").validate({ 
		errorElement: 'span',
		rules: {
			name: "required",
			email: {
				required:true,
				email:true
			},
			gender: "required",
			phone_no: {
				required:true,
				minlength:10,
				maxlength:10,
			},
			tower_id :"required",
			password:{
					required:true,
					minlength:6
				}, 
			confirm_password:{
					required:true,
					equalTo: "#new_password",
					minlength:6, 
			}
		}
	});

	$("#edit-gatekeeper-frm").validate({ 
		errorElement: 'span',
		rules: {
			name: "required",
			email: {
				required:true,
				email:true
			},
			gender: "required",
			phone_no: {
				required:true,
				minlength:10,
				maxlength:10,
			},
			tower_id :"required",
		}
	});

	$("#unassgin-worker-frm").validate({ 
		errorElement: 'span',
		rules: {
			message: {
				required:true,
				minlength:10,
			}
		}
	});


	$("#edit-staff-complaint-frm").validate({ 
		errorElement: 'span',
		rules: {
			is_worker_completed:"required",
		}
	});

	$("#add-visitor-type-frm").validate({ 
		errorElement: 'span',
		rules: {
			visitor_type_name:"required",
		}
	});

	$("#edit-visitor-type-frm").validate({ 
		errorElement: 'span',
		rules: {
			visitor_type_name:"required",
		}
	});

	$("#add-visitor-company-frm").validate({ 
		errorElement: 'span',
		rules: {
			name:"required",
		}
	});

	$("#edit-visitor-company-frm").validate({ 
		errorElement: 'span',
		rules: {
			name:"required",
		}
	});

	$("#add-visitor-in-frm").validate({ 
		errorElement: 'span',
		rules: {
			visitor_name: "required",
			"flat_ids[]" : "required",
			phone_no:{
				required:true,
				minlength:10,
				maxlength:10
			},
			vistor_type_id: "required",
			visiting_date: "required",
			purpose: "required",
			vehicle_no: {
				maxlength:4
			}
		}
	});

	$("#add-visitor-out-frm").validate({ 
		errorElement: 'span',
		rules: {
			visitor_code: "required",
			visitor_name: "required",
			"flat_ids[]" : "required",
			phone_no:{
				required:true,
				minlength:10,
				maxlength:10
			},
			vistor_type_id: "required",
			visiting_date: "required",
			purpose: "required",
			vehicle_no: {
				maxlength:4
			}
		}
	});


	$("#make-bill-payment").validate({ 
		errorElement: 'span',
		rules: {
			transaction_id: "required",
		}
	});
	 
});