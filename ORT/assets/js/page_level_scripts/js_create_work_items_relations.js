$(document).ready(function() {
	// body...
	var relate = $('#relation-radio-1').val();
	var relate1 = $('#relation-radio-2').val();
	if($('#relation-radio-1').is(':checked'))
	{
		
		$('#relation-container').show();
	}
	else
	{
		$('#relation-container').hide();
		$('#link-add-another').hide();
		$('#work-item-type-filter').val(-1);
		$('#work-item').val(-1);
		$('#relation-type').val(-1);
	}

	$('#relation-radio-1').click(function(){
		$('#relation-container').show();
		$('#link-add-another').show();
		
	});
	$('#relation-radio-2').click(function(){
		$('#work-item-type-filter').val(-1);
		$('#work-item').val(-1);
		$('#relation-type').val(-1);
		$('#relation-container').hide();
		$('#link-add-another').hide();
	});

	$('#link-add-another').click(function(event){
		event.preventDefault();
		var current_work_item = $('#current-work-item').val();
		var related_work_item = $('#work-item').val();
		var relation_type = $('#relation-type').val();
		var work_item_type = $('#work-item-type-filter').val();

		if(related_work_item==null||relation_type==null||work_item_type==null)
		{
			if(relation_type==null)
			{
				$('#relation-type').css('border-color','red');
				$('#relation-type').focus();
			}
			if(related_work_item==null)
			{
				$('#work-item').css('border-color','red');
				$('#work-item').focus();
			}
			if(work_item_type==null)
			{
				$('#work-item-type-filter').css('border-color','red');
				$('#work-item-type-filter').focus();
			}
		}
		else if(related_work_item==""||relation_type==""||work_item_type=="")
		{
			if(relation_type=="")
			{
				$('#relation-type').css('border-color','red');
				$('#relation-type').focus();
			}
			if(related_work_item=="")
			{
				$('#work-item').css('border-color','red');
				$('#work-item').focus();
			}
			if(work_item_type=="")
			{
				$('#work-item-type-filter').css('border-color','red');
				$('#work-item-type-filter').focus();
			}
			
		}

		else
		{
			var post_url="/ORT/Relate_work_items/create_work_item_relations_with_jpost";
			var new_author_id;
			$.post(post_url,{'current_work_item':current_work_item,'related_work_item':related_work_item, 
							'relation_type':relation_type	},function(returned_data){
									alert('mike');
								},'json');
			
								$('#work-item-type-filter').val(-1);
								$('#work-item').val(-1);
								$('#relation-type').val(-1);
			
		}

		$('#work-item-type-filter').change(function(){
				change_border_colour('#work-item-type-filter');
		});
		$('#work-item').change(function(){
			change_border_colour('#work-item');

		});
		$('#relation-type').change(function(){
			change_border_colour('#relation-type');
		});

	});

});

function change_border_colour(object_id)
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
