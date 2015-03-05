$(document).ready(function(){
	$('#btn-submit-staff_modal').click(function(e){
		e.preventDefault();
		$(".error").css("color", "red");
		var first_name=$('#first-name').val();
		var second_name=$('#second-name').val();
		var telephone=$('#telephone').val();
		var email=$('#email').val();
		var title=$('#title').val();
		
		if(title==""||first_name==""||second_name==""||telephone==""||email=="")
			{
				if(title=="")
				{
					$('#title').css('border-color','red');
					$('#title').focus();
				}
				if(first_name=="")
				{
					$('#first-name').css('border-color','red');
					$('#first-name').focus();
				}
				if(second_name=="")
				{
					//$('#second-name-error').html('second name required');
					$('#second-name').css('border-color','red');
					$('#second-name').focus();
				}
				if(telephone=="")
				{
					$('#telephone').css('border-color','red');
					$('#telephone').focus();
				}
				if(email=="")
				{
					$('#email').css('border-color','red');
					$('#email').focus();
				}
				
				
				return false;
			}

			else
			{
				var work_item_id=$('#work-items-id').val();
				var post_url="/ORT/Authors/Create_missing_authors";
				var new_author_id;
				$.post(post_url,{'title':title,'first_name':first_name, 'second_name':second_name,
									'telephone':telephone,'email':email},function(returned_data){
										new_author_id=returned_data
										var authors_url="/ORT/Authors/get_author_list";
										var author_option_string= '<option></option>';

										$.post(authors_url, {'work_item_id':work_item_id},function(data){
												
											$.each(data,function(){
												author_option_string+='<option value="'+this.author_id+'">';
												author_option_string+=this.first_name+' '+this.second_name+' '+this.last_name;
												author_option_string+='</option>';
											});
											console.log(author_option_string);
											$('#author').html('');
											$('#author').html(author_option_string);
											$('#author').val(new_author_id);
											$('#author').selectedIndex(new_author_id);

										},'json');
									},'json');
				
										$('#title').val(-1);
										$('#first-name').val('');
										$('#second-name').val('');
										$('#telephone').val('');
										$('#email').val('');
				
			}
		
	});


	$('#title').change(function(){
		change_border_color('#title');

	});
	$('#first-name').keypress(function(){
		change_border_color('#first-name');

	});
	$('#telephone').keypress(function(){
		change_border_color('#last-name');

	});

	$('#second-name').keypress(function(){
		change_border_color('#second-name');

	});
	$('#email').keypress(function(){
		change_border_color('#email');

	});
	
	
	
	function change_border_color(object_id)
	{
		
			if($(object_id).val()=="")
			{
				$(object_id).css('border-color','red');	
			}
			else
			{
				$(object_id).css('border-color','green');
			}
	}

	
});

