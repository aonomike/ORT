$(document).ready(function(){

	//call the get designations autocomplete function to designations text boxes
	get_designations_autocomplete();

	//call the get country autocomplete function to country text boxes
	get_countries_autocomplete();
	
	//call the get institution of affiliation autocomplete function to organisation text boxes
	get_institution_of_affiliation_autocomplete()

	

	$('#btn-add-another').click(function(){
		var author = $('#author').val();
		var author_type = $('#author-type').val();
		var organisation = $('#organisation').val();
		var designation = $('#designation').val();
		var country = $('#country').val();
		var work_item_id = $('#work-item-id').val();

		if(author==""||author_type==""||organisation==""||designation==""||country=="")
			{
				if(author=="")
				{
					$('#author').css('border-color','red');
					$('#author').focus();
				}
				if(author_type=="")
				{
					$('#author-type').css('border-color','red');
					$('#author-type').focus();
				}
				if(organisation=="")
				{
					//$('#second-name-error').html('second name required');
					$('#organisation').css('border-color','red');
					$('#organisation').focus();
				}
				if(designation=="")
				{
					$('#designation').css('border-color','red');
					$('#designation').focus();
				}
				if(country=="")
				{
					$('#country').css('border-color','red');
					$('#country').focus();
				}
				
				
				return false;
			}

			else
			{

				//call function to get author's institution of affiliation
				//get_author_institution_of_affiliation(organisation);
				//call function to get author's designation
				//get_author_designation(designation);
				//call function to get author's country
				//get_author_country(country);

				//post to database
				
				url='/ORT/Work_item_author/create_new_work_item_author';
				$.post(url,{'organisation':organisation, 'country':country, 'designation':designation, 'author':author, 'author-type':author_type, 'work-item-id':work_item_id},function(returned_data){
						$('#author').val(-1);
						$('#author-type').val(-1);
						$('#organisation').val('');
						$('#designation').val('');
						$('#country').val('');					
				},'json');
			}




	});

	//call validation color codes function

	$('#author-type').change(function(){
		change_border_color('#author-type');

	});

	$('#author').change(function(){
		change_border_color('#author');

	});

	$('#organisation').keypress(function(){
		change_border_color('#organisation');

	});
	$('#designation').keypress(function(){
		change_border_color('#designation');

	});

	$('#country').keypress(function(){
		change_border_color('#country');

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


//function to get an array of countries
function get_designations_autocomplete()
			{
				var designation_array = new Array();
					var url='/ORT/Designation/get_designations';
					$.post(url,{ },function(returned_data){
						$.each(returned_data,function(){
							designation_array.push(this.Name);
						});
						
						$('#designation').autocomplete({
							source:	designation_array,
							minLength:0,
							scroll: true
						}						
						);	
				} ,'json');
					
			}

//function to get an array of countries
function get_countries_autocomplete()
			{
				var country_array= new Array();
					var url='/ORT/Country/get_countries';
					$.post(url,{ },function(returned_data){
						$.each(returned_data,function(){
							country_array.push(this.Name);
						});
					// console.log(country_array);
					$('#country').autocomplete({source:	country_array}						
						);	
				} ,'json');
					
			}


//function to get an array of countries
function get_institution_of_affiliation_autocomplete()
			{
				var organisation_array= new Array();
					var url='/ORT/Organisation/get_oraganitions';
					$.post(url,{ },function(returned_data){
						$.each(returned_data,function(){
							organisation_array.push(this.name);
						});
					// console.log(country_array);
					$('#organisation').autocomplete({source:	organisation_array}						
						);	
				} ,'json');
					
			}


//function to get author's institution of affiliation
function get_author_institution_of_affiliation(organisation)
{
	
	url='/ORT/Organisation/get_organisation_by_name';
	$.post(url,{'organisation':organisation},function(returned_data){
		_organisation_id=returned_data;
		
	},'json');
	
	alert(_organisation_id);
}
	
//function to get author's designation
function get_author_designation(designation)
{
	
	url='/ORT/Designation/get_designation_by_name';
	$.post(url,{'designation':designation},function(returned_data){
		console.log(returned_data);
	},'json');
}
//function to get author's country
	
function get_author_country(country)
{
	
	url='/ORT/Country/get_country_by_name';
	$.post(url,{'country':country},function(returned_data){
		console.log(returned_data);
	},'json');
}