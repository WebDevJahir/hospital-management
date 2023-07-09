
$(document).ready(function(){

	$("#current_password").keyup(function(){
		var current_password = $("#current_password").val();
		$.ajax({
			type:'get',
			url:'/admin/check-password',
			data:{current_password:current_password},
			success:function(resp){
				if(resp=="false"){
					$("#check").html("<font color='red'>Current Password is Incorrect</font>");
				}else if(resp=="true"){
					$('#check').html("<font color='green'>Current Password is Correct</font>");
				}
			},error:function(){
				alert('Error');
			}
		});
	});
	
	$('input[type=checkbox],input[type=radio],input[type=file]').uniform();
	
	$('select').select2();
	
	// Form Validation
    $("#basic_validate").validate({
		rules:{
			required:{
				required:true
			},
			email:{
				required:true,
				email: true
			},
			date:{
				required:true,
				date: true
			},
			url:{
				required:true,
				url: true
			}
		},

		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	    $("#add_category").validate({
		rules:{
			category_name:{
				required:true
			},
			description:{
				required:true,
			},
			url:{
				required:true,
			}
		},
		
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	     $("#add_product").validate({
		rules:{
			parent_id:{
				required:true
			},
			product_name:{
				required:true,
			},
			product_code:{
				required:true,
			},
			product_color:{
				required:true,
			},
			description:{
				required:true,
			},
			care:{
				required:true,
			},
			price:{
				required:true,
			},
			image:{
				required:true,
			},
			
		},
		
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	      $("#add_page").validate({
		rules:{
			title:{
				required:true,
			},
			url:{
				required:true,
			},
			description:{
				required:true,
			},
		},
		
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});


	     $("#edit_product").validate({
		rules:{
			parent_id:{
				required:true
			},
			product_name:{
				required:true,
			},
			product_code:{
				required:true,
			},
			product_color:{
				required:true,
			},
			description:{
				required:true,
			},
			care:{
				required:true,
			},
			price:{
				required:true,
			},
			
			
		},
		
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	    $("#add_banner").validate({
		rules:{
			title:{
				required:true,
			},
			link:{
				required:true,
			},
			image:{
				required:true,
			},
			status:{
				required:true,
			}	
		},
		
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#number_validate").validate({
		rules:{
			min:{
				required: true,
				min:10
			},
			max:{
				required:true,
				max:24
			},
			number:{
				required:true,
				number:true
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
	
	$("#password_validate").validate({
		rules:{
			current_password:{
				required: true,
				minlength:6,
				maxlength:20
			},
			new_password:{
				required: true,
				minlength:6,
				maxlength:20
			},
			confirm_password:{
				required:true,
				minlength:6,
				maxlength:20,
				equalTo:"#new_password"
			}
		},
		errorClass: "help-inline",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});

	$("#catid").click(function(){
		if(confirm('Are you sure to delete this category?')){
			return true;
		}
		return false;
	});

	//  $("#add_coupon").validate({
	// 	rules:{
	// 		coupon_code:{
	// 			required:true
	// 		},
	// 		amount:{
	// 			required:true,
	// 		},
	// 		amount_type:{
	// 			required:true,
	// 		},
	// 		datepicker:{
	// 			required:true,
	// 		}	
			
	// 	},
		
	// 	errorClass: "help-inline",
	// 	errorElement: "span",
	// 	highlight:function(element, errorClass, validClass) {
	// 		$(element).parents('.control-group').addClass('error');
	// 	},
	// 	unhighlight: function(element, errorClass, validClass) {
	// 		$(element).parents('.control-group').removeClass('error');
	// 		$(element).parents('.control-group').addClass('success');
	// 	}
	// });
	// $("#productId").click(function(){
	// 	if(confirm('Are you sure to delete this Product?')){
	// 		return true;
	// 	}
	// 	return false;
	// });
// 	$(".deleteRecord").click(function(){
// 		var id = $(this).attr('rel');
// 		var deleteFunction = $(this).attr('rel1');
// Swal({
//   title: 'Are you sure?',
//   text: "You will not be able to recover this record again!",
//   type: "warning",
//   showCancelButton: true,
//   confirmButtonClass:"btn-danger",
//   confirmButtonText:"Yes, Delete it!"
// },
// function(){
// 	window.loaction.href="/admin"+deleteFunction+"/"+id;
// 	});

$(".deleteRecord").click(function(){
	var id = $(this).attr('rel');
	var deleteFunction = $(this).attr('rel1');
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
   window.location.href="/admin/"+deleteFunction+"/"+id;
  }
})
});
$(".deleteBanner").click(function(){
	var id = $(this).attr('rel');
	var deleteFunction = $(this).attr('rel1');
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
   window.location.href="/admin/"+deleteFunction+"/"+id;
  }
})
});
$(".deleteCategory").click(function(){
	var id = $(this).attr('rel');
	var deleteFunction = $(this).attr('rel1');
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
   window.location.href="/admin/"+deleteFunction+"/"+id;
  }
});
});
$(".deleteConpon").click(function(){
	var id = $(this).attr('rel');
	var deleteFunction = $(this).attr('rel1');
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
   window.location.href="/admin/"+deleteFunction+"/"+id;
  }
});
});

$(".delete-page").click(function(){
	var id = $(this).attr('rel');
	var deleteFunction = $(this).attr('rel1');
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
   window.location.href="/admin/"+deleteFunction+"/"+id;
  }
});
});

$(".deleteAttributes").click(function(){
	var id = $(this).attr('rel');
	var deleteFunction = $(this).attr('rel1');
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
   window.location.href="/admin/"+deleteFunction+"/"+id;
  }
});
});
$(".deleteImages").click(function(){
	var id = $(this).attr('rel');
	var deleteFunction = $(this).attr('rel1');
Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
   window.location.href="/admin/"+deleteFunction+"/"+id;
  }
});
});
$(document).ready(function(){
    var maxField = 50; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="field_wrapper" style="margin-left:180px"><input type="text" name="sku[]" placeholder="SKU" style="width:120px; margin-right:3px" /><input type="text" name="size[]" placeholder="Size" style="width:120px; margin-right:3px;" /><input type="text" name="price[]" placeholder="Price" style="width:120px;margin-right:3px;" /><input type="text" name="stock[]" placeholder="Stock" style="width:120px;margin-right:3px;" /><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

});

$(document).ready(function(){
   $('#type').change(function(){
        var type = $('#type').val();
        if(type == 'Admin'){
            $('#access').hide();
        }else{
            $('#access').show();
        }
    });
});
