<script>
$(document).ready(function(){	
	$("#continuebtn").click(function(){
		var answer1_text_360 = $(".quoteForm .step1 input[name='answer1_text_360']:checked").val();	
		var answer2_text_360 = $(".quoteForm .step2 input[name='answer2_text_360']:checked").val();	
		
		 var reg = /^[0-9]+$/;
		var zipcode = $("#inpZipCode").val();
		$("#inpZipCode").parents("div").find('.error').remove();	
		if(answer1_text_360===undefined){
			$(".quoteForm .step1 input[name='answer1_text_360']").parents('.radio').find('p').addClass("validation_error");
		}else if(answer2_text_360===undefined){	
			$(".quoteForm .step2 input[name='answer2_text_360']").parents('.radio').find('p').addClass("validation_error");
		}else if(zipcode==""){
			$("#inpZipCode").after("<div class='error'><p class='validation_error'>This field is required.</p></div>");
		}else if (!reg.test(zipcode)){
			$("#inpZipCode").after("<div class='error'><p class='validation_error'>zipcode should be numbers only</p></div>"); 
		}	else if(zipcode!=""){
			$(".postalcode").val(zipcode);
			$('#divZipCode').hide('slow'); 
			$('#divContactInfo').show('slow'); 
			$('#continuebtn').hide(); 
			$('#btnGetQuote').show(); 
		}
		else{	
		
	}
	});
	$(".quoteForm .step1 input[name='answer1_text_360']").change(function(){
	$(".quoteForm .radio input").parents('.radio').find('p').removeClass("validation_error");	
	$('.step1').hide('slow'); 
	$('.step2').show('slow'); 
	});
	$(".quoteForm .step2 input[name='answer2_text_360']").change(function(){
	$(".quoteForm .radio input").parents('.radio').find('p').removeClass("validation_error");	
	$('.step2').hide('slow'); 
	$('.step3').show('slow'); 
	$("#continuebtn").attr("id","btnstep3");
	});
	$(".quoteForm .step3 input[name='answer3_text_360']").change(function(){
	$(".quoteForm .radio input").parents('.radio').find('p').removeClass("validation_error");		
	$('.step3').hide('slow'); 
	$('#divZipCode').show('slow'); 
	});
	$(document).on("click","#btnstep3", function(){	
		 
		var building_dim_length_360 = $(".quoteForm .step3 input[name='building_dim_length_360']").val();	
		var building_dim_height_360 = $(".quoteForm .step3 input[name='building_dim_height_360']").val();
		var building_dim_width_360 = $(".quoteForm .step3 input[name='building_dim_width_360']").val();
		var building_dim_sqf_360 = $(".quoteForm .step3 input[name='building_dim_sqf_360']").val();
		var reg = /^[0-9]+$/;	
		var finalval = false;
		$("#inpZipCode").parents("div").find('.error').remove();		
		if(building_dim_length_360==""){		
			$(".quoteForm .step3 input[name='building_dim_length_360']").parents('.radio').find('input').after("<div class='error'><p class='validation_error'>This field is required.</p></div>");
			finalval = true; 
		}else if(!reg.test(building_dim_length_360)){		
			$(".quoteForm .step3 input[name='building_dim_length_360']").parents('.radio').find('input').after("<div class='error'><p class='validation_error'>enter numbers only</p></div>"); 
			finalval = true;
		}else if(building_dim_height_360==""){	
			$(".quoteForm .step3 input[name='building_dim_height_360']").parents('.radio').find('input').after("<div class='error'><p class='validation_error'>This field is required.</p></div>"); 
			finalval = true;
		}else if(!reg.test(building_dim_height_360)){			
			$(".quoteForm .step3 input[name='building_dim_height_360']").parents('.radio').find('input').after("<div class='error'><p class='validation_error'>enter numbers only</p></div>"); 
			finalval = true;
		}else if(building_dim_width_360==""){		
			$(".quoteForm .step3 input[name='building_dim_width_360']").parents('.radio').find('input').after("<div class='error'><p class='validation_error'>This field is required.</p></div>"); 
			finalval = true;
		}else if(!reg.test(building_dim_width_360)){		
			$(".quoteForm .step3 input[name='building_dim_width_360']").parents('.radio').find('input').after("<div class='error'><p class='validation_error'>enter numbers only</p></div>"); 
			finalval = true;
		}
		else if(building_dim_sqf_360==""){		
			$(".quoteForm .step3 input[name='building_dim_sqf_360']").parents('.radio').find('input').after("<div class='error'><p class='validation_error'>This field is required.</p></div>"); 
			finalval = true;
		}/*else if(!reg.test(building_dim_sqf_360)){		
			$(".quoteForm .step3 input[name='building_dim_sqf_360']").parents('.radio').find('input').after("<div class='error'><p class='validation_error'>enter numbers only</p></div>"); 
		}*/else{
			
			$('.step3').hide('slow'); 
			$('#divZipCode').show('slow'); 
			$("#btnstep3").attr("id","continuebtn");
		}
		return finalval;
	});	
	$("#btnGetQuote").click(function(){		
		jQuery('.quoteForm').find('.error').remove(); 
        var inputs = jQuery('.quoteForm').find('input.cf_required'); 
        var PostalCode = $("input[name='PostalCode']").val();
		var Email = $("input[name='Email']").val();
		var Phone = $("input[name='Phone']").val();
		var reg = /^[0-9]+$/;
		var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
      
         var j = 0;        
           jQuery.each(inputs,function(i,item){           
            if(jQuery(item).val() == ""){      	     
                jQuery(item).parents('.col-sm-6').find('.cf_required').after(jQuery('<div class="error"><p>This field is required.</p></div>'));
           j++; }else{
           if(item.name=="Email"){
           if (!filter.test(Email)) {
					$("input[name='Email']").after("<div class='error'><p class='validation_error'>enter valid email</p></div>"); 
				}            
			}
			if(item.name=="Phone"){
           	if (!reg.test(Phone)) {
					$("input[name='Phone']").after("<div class='error'><p class='validation_error'>enter valid number</p></div>"); 
				}            
			}
			if(item.name=="PostalCode"){
           	if (!reg.test(PostalCode)) {
					$("input[name='PostalCode']").after("<div class='error'><p class='validation_error'>enter only number</p></div>"); 
				}            
			}	
			}
          });
          if(j>0){
            	return false;
            }else{
				var formdata = jQuery('.quoteForm').serialize();		
			    jQuery.ajax(
			      { 
			        url: "<?php echo admin_url('admin-ajax.php'); ?>",
			        type: 'POST',
			        data:{action:'ajax_form_submit',formdata:formdata},
			        success: function(data){			         
			          alert(data);  
			        }
			    });
				 
            }   
	});	
});
</script>
