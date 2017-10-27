$(document).ready(function(){          
			var Element = "#email";          
			var InputText = "Hizkiak+ 3 digitu + “@ikasle.ehu.” + “eus”/“es”";      
			$(Element).val(InputText);
			$(Element).css("color", "grey");             
			$(Element).bind('focus',function(){     
				$(this).addClass('focus');
				$(Element).css("color", "black");
				if($(this).val()==InputText){      
					$(this).val('');              
				}     
			}).bind('blur',function(){       
				if($(this).val()==""){          
					$(this).val(InputText); 
					$(Element).css("color", "grey");
					$(this).removeClass('focus');         
				}       
			});     
		});    