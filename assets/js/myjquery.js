$(document).ready(function () {
		// body...
		

		$('#work-item-type-filter').change(function(){
			var combo_option="";
			var options_=""
			var work_item_type= $('#work-item-type-filter').val();
			var url='/ORT/Work_item/get_work_item_by_work_item_type';
			$.post(url,{'work_item_type': $('#work-item-type-filter').val()}, function(returned_data){
				
				for (var i=0; i<returned_data.length;i++) {
					//console.log(returned_data[i].work_item_id+' '+returned_data[i].description);
					combo_option+="<option value='"+returned_data[i].work_item_id+"'> "+returned_data[i].description+"</option> ";
					
				}
				var options_=combo_option;
				document.getElementById('work-item').innerHTML=options_;
				document.getElementById('work-item').selectedIndex=-1;
			},'json');
			
		});

		/*$('#work-item').change(function(){
			var combo_option="";
			var options_=""
			var url='/ORT/Work_item/get_work_item_by_work_item_id';
			$.post(url,{'values':$('#work-item').val() },function(returned_data){
				//console.log(returned_data);
				//document.getElementById('work-item-type-filter').selectedIndex=returned_data.work_type;
				//console.log(returned_data.work_type);
			} ,'json');

			var post_url='/ORT/Work_item_stage/get_work_item_stage_by_work_item_id';
			$.post(post_url,{'values':$('#work-item').val() },function(returned_data){
				//console.log(returned_data);
			
				//document.getElementById('work-item-type-filter').selectedIndex=returned_data.work_type;
			} ,'json');
		//	alert('sdds');

		});*/

		/*function post_to_database(url, values, element_id){
			$.post(url,{'values':values},function(returned_data){
				for (var i = 0; i <= returned_data.length; i++) {
							combo_option+="<option value='"+returned_data[i].id+"'> "+returned_data[i].description+"</option> ";
							},'json');
			}
			document.getElementById(element_id).innerHTML=combo_option;
			document.getElementById(element_id).selectedIndex=-1;
		}*/
		/*function create_options(options_array, select_object_id)
		{
			var combo_option="";
			var options_=""
			for (var i=0; i<options_array.length;i++) {
					
					combo_option+="<option value='"+options_array[i].work_item_id+"'> "+options_array[i].description+"</option> ";
					
				}
				var options_=combo_option;
				document.getElementById('select_object_id').innerHTML=options_;
				document.getElementById('select_object_id').selectedIndex=-1;
		}*/

		$('.stage-output-item').change(function(){
			var combo_option="";
			var options_=""
			var url='/ORT/Work_item_stage/get_stages_by_work_item_stage';
			$.post(url,{'values':$('.stage-output-item').val() },function(returned_data){
				
				for (var i = 0; i < returned_data.length; i++) {					
					combo_option+="<option value='"+returned_data[i].stage_id+"'> "+returned_data[i].description+"</option> ";
				};

				console.log(combo_option);
				document.getElementById('stage').innerHTML=combo_option;
				document.getElementById('stage').selectedIndex=-1;
				
			} ,'json');
		});
		
	});
	
