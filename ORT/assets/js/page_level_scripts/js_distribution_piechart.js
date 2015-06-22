

		
			window.onload = function(){
				var url='/ORT/Work_item/get_work_item_count_by_type';
				
				$.post(url,{},function(returned_data){
					var p_data= [];
					$.each(returned_data,function(){
						var color='';
						var highlights='';

						if(this.work_type_id==1)
						{
							color="#4D5360";
							highlights="#FF5A5E";
							
						} 
						else if (this.work_type_id==2) {
							color="#F7464A";
							highlights="#5AD3D1";
						}
						else if (this.work_type_id==3) {
							color="#46BFBD";
							highlights="#FFC870";
						}
						else if (this.work_type_id==4) {
							color="#949FB1";
							highlights="#A8B3C5";
						}
						else if (this.work_type_id==5) {
							color="#C0C0C0";
							highlights="#A8B3C5";
						}
						else if (this.work_type_id==6) {
							color="#200000";
							highlights="#FFFFFF";
						}
						var data_array = {
							value: this.work_item_count,
						}
						
						var data={
							value: Number(this.work_item_count),
							color: color,
							highlight: highlights,
							label: this.description
						}

						
						p_data.push(data);
					});
					var ctx = document.getElementById("chart-area").getContext("2d");
					window.myPie = new Chart(ctx).Pie(p_data);
					console.log(p_data);
					
				},'json');
			};


			function get_work_item_distribution()
			{
				var url='/ORT/Work_item/get_work_item_count_by_type';	
				var p_data= [];			
				$.post(url,{},function(returned_data){
					$.each(returned_data,function(){
						var color='';
						var highlights='';

						if(this.work_type_id==1)
						{
							color="#4D5360";
							highlights="#FF5A5E";
							
						} 
						else if (this.work_type_id==2) {
							color="#F7464A";
							highlights="#5AD3D1";
						}
						else if (this.work_type_id==3) {
							color="#46BFBD";
							highlights="#FFC870";
						}
						else if (this.work_type_id==4) {
							color="#949FB1";
							highlights="#A8B3C5";
						}
						else if (this.work_type_id==5) {
							color="#C0C0C0";
							highlights="#A8B3C5";
						}
						else if (this.work_type_id==6) {
							color="#200000";
							highlights="#FFFFFF";
						}
						var data_array = {
							value: this.work_item_count,
						}
						
						var data={
							value: this.work_item_count,
							color: color,
							highlight: highlights,
							label: this.description
						}

						
						p_data.push(data);
					});
					console.log(p_data);
					//var ctx = document.getElementById("chart-area").getContext("2d");
					//window.myPie = new Chart(ctx).Pie(p_data);
				},'json');

				
			}

