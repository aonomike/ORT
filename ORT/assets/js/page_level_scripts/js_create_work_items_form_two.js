$(document).ready(function(){
	var _work_type_value=$('#work-item-type').val();
	display_relate_to_checkboxes(_work_type_value);
	display_deadline_date_control(_work_type_value);
	
	//hide or show relation divs
	hide_or_show_enable_relation(_work_type_value);

	// change function work item type
	$('#work-item-type').change(function(){
		var work_item_type = $(this).val();

		if (work_item_type==1)
		{
			$('#div-relations').show();
			$('#enable_relation').attr("checked",false);
			$('#relate_to').hide();
			$('#relate_to_work_item').hide();
			hide_or_show_enable_relation(work_item_type);

		}
		else if (work_item_type==2){
			$('#div-relations').show();
			$('#enable_relation').attr("checked",false);
			$('#relate_to').hide();
			$('#relate_to_work_item').hide();
			hide_or_show_enable_relation(work_item_type);
		}
		else if (work_item_type==3){
			$('#div-relations').show();
			$('#enable_relation').attr("checked",false);
			$('#relate_to').hide();
			$('#relate_to_work_item').hide();
			hide_or_show_enable_relation(work_item_type);
		}
		else if (work_item_type==4){
			$('#div-relations').show();
			$('#enable_relation').attr("checked",false);
			$('#relate_to').hide();
			$('#relate_to_work_item').hide();
			hide_or_show_enable_relation(work_item_type);
		}
		else if (work_item_type==5){
			$('#div-relations').show();
			$('#enable_relation').attr("checked",false);
			$('#relate_to').hide();
			$('#relate_to_work_item').hide();
			hide_or_show_enable_relation(work_item_type);
		}
		else if (work_item_type==6){
			$('#div-relations').show();
			$('#enable_relation').attr("checked",false);
			$('#relate_to').hide();
			$('#relate_to_work_item').hide();
			hide_or_show_enable_relation(work_item_type);
		}
		else 
		{
			$('#div-relations').hide();
			$('#relate_to').hide();
			$('#relate_to_work_item').hide();
		}

		display_deadline_date_control(work_item_type);

		
	});


	var enable_relation=$('#enable_relation').is(':checked') ;
	
	function enable_or_disable_relation_divs(enable_relation)
	{
		if(enable_relation)
		{
			$('#relate_to_work_item').show();
			$('#relate_to').show();
		}
		else
		{
			$('#relate_to_work_item').hide();
			$('#relate_to').hide();
			$('.relation_radio').prop('checked',false);
			$('#related-work-item').val(-1);
		}

	}
	
	$(document).on("click",".relation_radio",function(){
		var type=$(this).val();
		get_work_item_by_type(type);
	});

	//call function to enable or disable relation to div
	enable_or_disable_relation_divs(enable_relation);	

	

	//click event on enable relation checkbox
	$('#enable_relation').click(function(){
			enable_relation=$(this).is(':checked');
			var work_type = $("#work-item-type").val();
			display_relate_to_checkboxes(work_type);			
			enable_or_disable_relation_divs(enable_relation);
	});

});

//function to get work item based on work item type
	function get_work_item_by_type(work_item_type)
	{
		var url='/ORT/Work_item/get_work_item_by_type';
		$.post(url,{'work_item_type':work_item_type},function(returned_data){
			var html='';
			$('#related-work-item').html('');
			$.each(returned_data,function(){
				
				html+= '<option value="'+this.work_item_id+'">';
				html+=this.description;
				html+='</option>';

			});
			$('#related-work-item').html(html);
			$('#related-work-item').val(-1);
		},'json');
	}
	

function display_relate_to_checkboxes(work_type)
{
	if($('#enable_relation').is(':checked'))
			{
				var url = "/ORT/Work_item/get_work_type_parent_child_relationship";
				$.post(url,{'work_type':work_type},function(returned_data){
					if(returned_data==false)
					{
						//$('#enable_relation').hide();
					}
					else
					{
						var html='<label for="relation_item_type" class="control-label col-lg-4"> Relation Item Type</label>';
						$.each(returned_data,function(){
							html+='<input type="radio" name="relation_item_type"  value="'+this.parent_type+'" class="relation_radio"/> '+this.Parent+'    ';
						});
						console.log(html);
						$('#relate_to').html('');
						$('#relate_to').html(html);
					}
				},'json');
			}
			else if(!$('#enable_relation').is(':checked'))
			{
				$('#div-relations').show();
				$('#relate_to').hide();
				$('#relate_to_work_item').hide();
			}
			else
			{
				$('#div-relations').hide();
				$('#relate_to').hide();
				$('#relate_to_work_item').hide();
			}
}

function display_deadline_date_control(work_type)
{
	if (work_type=='')
	{
		$('#crucial-date').hide();
	}
	else 
	{

		var url = "/ORT/Work_item_type/get_label_for_work_item_type_crucial_dates";
		$.post(url,{'work_type':work_type},function(returned_data){
			if(returned_data==false)
			{
				$('#crucial-date').hide();
				
			}
			else
			{	
				$('#crucial-date-label').html('');
				$('#crucial-date-label').html(returned_data.caption);	
				$('#crucial-date').show();		
				//$('#div-relations').show();
			}
		},'json');
	}
}

function hide_or_show_enable_relation(work_type)
{
	if (work_type>0)
	{
	var url = "/ORT/Work_item/get_work_type_parent_child_relationship";
				$.post(url,{'work_type':work_type},function(returned_data){
					if(returned_data==false)
					{
						$('#div-relations').hide();
						$('#relate_to').hide();
						$('#relate_to_work_item').hide();
						
					}
					else
					{						
						$('#div-relations').show();
					}
				},'json');
	}
	else{
			$('#div-relations').hide();
			$('#relate_to').hide();
			$('#relate_to_work_item').hide();
	}
}