$(document).ready(function () {
	
//Variable Declarations
	var new_work_item_id;
	var work_item_type; 
	
	//setup Date picker Controls
	$('#date-received').datepicker({
		dateFormat:"yy-mm-dd"
	});
	$('#date-expected-back').datepicker({
		dateFormat:"yy-mm-dd"
	});
	$('#date-received').datepicker({
		dateFormat:"yy-mm-dd"
	});
	
	$('#submission-deadline').datepicker({
		dateFormat:"yy-mm-dd"
	});	
	$('.date_input').datepicker({
		dateFormat:"yy-mm-dd"
	});
	$('#btn-submit').click(function(){
		console.log($('#date-expected-back').val());
	});

	$('#work-item-type').selectedIndex=-1;
	//link click events
	$('.create_author').click(function(e){
		e.preventDefault();
		alert('asadad');
	});

	
	
	

	//search work items
	$('#btn-search').click(function(e){
		e.preventDefault();
		var base_url=$('#base_url').val();
		var post_url = '/ORT/Work_item/search_work_item_with_jpost';
		var search_text= $('#search-text').val();		
		$.post(post_url,{'search_text':search_text},function(returned_data){
			if(returned_data==false)
			{
				$('.hide-display').html('');
				$('#result_table').html('');
				var html='<div class="alert alert-danger alert-block fade in hide-display" id="success-alert">';
					html+='<button type="button" class="close" data-dismiss="alert">&times;</button>';
					html+='<h4>No Work Item?</h4><p>Please click <a href="'+base_url+'Work_item/create_work_items_form">here</a> to create a new work item </p></div>';
					$('.hide-display').html(html);
					
			}
			else
			{
				
				var table='<table class="table table-striped table-bordered table-hover" id="dataTables-example">';
					table+='<thead><tr><td colspan="5"><div class="toolbar"></div></td></tr>';
					table+='<tr><th>Title</th><th>Reference Number</th><th>Work Item Type</th><th>Submission Deadline</th><th>Action</th></tr>';
					table+='</thead><tfoot><tr><th>Title</th><th>Reference Number</th><th>Work Item Type </th><th>Submission Deadline</th><th>Action</th></tr></tfoot>';
		            table+='<tbody id="table-body<form>">';
		             
		            $.each(returned_data,function(){
		            	table+=	'<tr class="gradeA"><td>'+this.description+'</td>';
		            	table+= '<td>'+this.reference_number+'</td>';
		            	table+= '<td>'+this.Work_item_type+'</td><td>'+this.submission_deadline+'</td>';
		            	table+='<td><div class="btn-group"><button class="btn btn-primary"><i class="icon-gear"></i> action</button>';
		            	table+='<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>';
		            	table+='<ul class="dropdown-menu"><li><a class="create_author" href="'+base_url+'Work_item_author/create_work_items_author_form_with_author_list/'+this.work_item_id+'"><i class="icon-font"></i> Add Author </a></li>';
						table+='<li><a href="'+base_url+'Work_item/receive_document/'+this.work_item_id+'"><i class="icon-edit"></i> Receive Document </a></li>';												                           												                            
						table+='<li><a href="'+base_url+'Work_item/void_work_items_by_id/'+this.work_item_id+'"><i class="icon-remove-circle"></i> Update Status </a></li>';
						table+=' </ul></div> </td>	</tr>';

		            	      });           	
		                        	    
					    table+='</form></tbody></table>';
					    $('.hide-display').html('');
					    $('#result_table').html('');
					    $('#result_table').html(table);
			}
			
		},'json');

	});


	//Wizard controls
	$('#rootwizard').bootstrapWizard({onNext: function(tab, navigation, index) {
		if(index==2) {
			
			// Make sure we entered the name
			if(!$('#author').val()||!$('#author-type').val()) {
				if(!$('#author').val())
				{
					$('#author').focus();
				}
				else if(!$('#author-type').val())
				{
					$('#author-type').focus();
				}
				
				return false;
			}
		}

		else if (index==1)
		{
			
			if($('#title').val()==""||$('#work-item-type').val()=="")
			 {
			 	if($('#title').val()=="")
			 	{
			 		$('#title').focus();
			 	}
			 	else if($('#work-item-type').val()=="")
			 	{
			 		$('#work-item-type').focus();
			 	}
			 	return false;
			 }

			var work_item_title=$('#title').val();
            var work_item_type= $('#work-item-type').val();
                            
           var url='/ORT/Work_item/create_work_item_with_jpost'; 
           $.post(url,{'work_item_title':work_item_title,'work_item_type':work_item_type},function(returned_data){
              new_work_item_id=returned_data.work_item_id;
              $('#work-item-banner').html("<h2>Work Item Detais</h2>: <br/> Name: "+returned_data.description+"<br/>Work Item Type : "+returned_data.Work_item_type); 
           },'json');
                           
		}
	
		else if (index==3) {
			
		}

		}, onTabShow: function(tab, navigation, index) {
		var $total = navigation.find('li').length;
		var $current = index+1;
		var $percent = ($current/$total) * 100;
		$('#rootwizard').find('.bar').css({width:$percent+'%'});
},onTabClick: function(tab, navigation, index) {
	return false;
}});


$('#new_root_wizard').bootstrapWizard({onNext: function(tab, navigation, index) {
		if(index==2) {
			
			// Make sure we entered the name
			if(!$('#author').val()||!$('#author-type').val()) {
				if(!$('#author').val())
				{
					$('#author').focus();
				}
				else if(!$('#author-type').val())
				{
					$('#author-type').focus();
				}
				
				return false;
			}
		}

		else if (index==1)
		{
			
			if($('#work-item-type-filter').val()==""||$('#work-item').val()==""||$('#stage').val()==""||$('#date-received').val()=="")
			 {
			 	if($('#work-item-type-filter').val()=="")
			 	{
			 		$('#work-item-type-filter').focus();
			 	}
			 	else if($('#work-item').val()=="")
			 	{
			 		$('#work-item').focus();
			 	}
			 	else if($('#stage').val()=="")
			 	{
			 		$('#stage').focus();
			 	}
			 	else if($('#date-received').val()=="")
			 	{
			 		$('#date-received').focus();
			 	}
			 	
			 	return false;
			 }

			var work_item=$('#work-item').val();
            var work_item_type= $('#work-item-type-filter').val();
            var stage= $('#stage').val();
            var date_received= $('#date-received').val();
                            
           var url='/ORT/Document/create_new_document_entry_with_jpost'; 
           $.post(url,{'work_item':work_item,'stage':date_received,'stage':date_received},function(returned_data){
              new_work_item_id=returned_data.work_item_id;
              $('#work-item-banner').html("<h2>Work Item Detais</h2>: <br/> Name: "+returned_data.description+"<br/>Work Item Type : "+returned_data.Work_item_type); 
           },'json');
                           
		}
	
		else if (index==3) {
			
		}

		}, onTabShow: function(tab, navigation, index) {
		var $total = navigation.find('li').length;
		var $current = index+1;
		var $percent = ($current/$total) * 100;
		$('#rootwizard').find('.bar').css({width:$percent+'%'});
},onTabClick: function(tab, navigation, index) {
	return false;
}});

		$('.add-author').click(function(event){
                                   event.preventDefault();                                   
                                   var author_id = $('#author').val();
                                   var author_type_id = $('#author-type').val();

                                    var post_url= '/ORT/Work_item_author/create_work_item_author_using_jpost';
                                    var table="";
                                   		table+= '<br/><br/><table class="table table-striped table-bordered table-hover" id="dataTables-examples">';
									   table+='<thead><tr><th>Author Name</th><th>Author Type</th><th></th></tr></thead><tbody>';
                                   $.post(post_url,{'author_id': author_id, 'author_type_id':author_type_id, 'new_work_item_id':new_work_item_id }, function(returned_data){
											
											 $.each(returned_data,function(){
						                           	table+=	'<tr class="gradeA"><td>'+this.first_name+' '+this.second_name+' '+ this.last_name+'</td><td>'+this.author_type_description+'</td><td><a class="remove" href="#">remove</a></tr></tbody>';
											 	 });
											table+='<tfoot><tr><th>Author Name</th><th>Author Type</th></tr></tfoot></table>';											
											$('#author_names').html('');
											$('#author_names').append(table);
											var author_table=$('#dataTables-examples');
											DataTablesExample(author_table);
										},'json');

                                   	var new_post_url = '/ORT/Authors/get_authors_not_inserted_for_work_item_with_jpost';
                                   	$.post(new_post_url, {'new_work_item_id':new_work_item_id}, function(returned_data){
                                   	},'json');
											
                                    });
		

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

		$('#work-item-type-for-stage').change(function(){			
			
		});

		

		$('.stage-output-item').change(function(){
			var combo_option="";
			var options_=""
			var url='/ORT/Work_item_stage/get_stages_by_work_item_stage';
			$.post(url,{'values':$('.stage-output-item').val() },function(returned_data){
				
				for (var i = 0; i < returned_data.length; i++) {					
					combo_option+="<option value='"+returned_data[i].stage_id+"'> "+returned_data[i].description+"</option> ";
				};

			//	console.log(combo_option);
				document.getElementById('stage').innerHTML=combo_option;
				document.getElementById('stage').selectedIndex=-1;
				
			} ,'json');
		});
	
	});

// Functions 
function create_datepicker(text_box_id){

	$('#'+text_box_id).datepicker();
}
//function to create wizard
function create_wizard(wizard_id)
{
	
}
