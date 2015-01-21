   <div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">


                <h2> Status </h2>



            </div>
        </div>

        <hr />
	
		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                Manage Status
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>		                        	
		                            <tr>
		                            	<td colspan="5">
			                            	<div class="toolbar">
							                    <a href="<?php echo base_url();?>Status/create_status_form" class="btn btn-primary btn-line">New</a>							                   
							                    <a href="#" class="btn btn-danger btn-line">Delete</a>                    
	                   						</div>
	                   					</td>
		                            </tr>
		                            <tr>
		                                <th>Description</th>
		                                <th>Actions</th>		                                
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<form>
		                        		<?php if (is_array($status)){ ?>
			                        	    <?php foreach ($status as $s): ?>
				                           		<tr class="gradeA">
				                           			<td>
				                           				<input type="checkbox" id="checkbox_<?php echo $s->status_id; ?>" value="<?php echo $s->status_id; ?>" name="checkbox">
					                           			<?php echo $s->description; ?></td>	
				                           			<td>
				                           				<div class="btn-group">
															<button class="btn btn-primary"><i class="icon-gear"></i> action</button>
															<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
																<ul class="dropdown-menu">
																	<li>
									                    				<a href="<?php echo base_url();?>Status/view_status/<?php echo $s->status_id; ?>"><i class="icon-eye-open"></i> View </a>
							                            			</li>
							                            			<li>
									                            		<a href="<?php echo base_url();?>Status/edit_status/<?php echo $s->status_id; ?>"><i class="icon-edit"></i> Edit </a>
									                           		</li>												                           												                            
									                           		<li>
									                            		<a href="<?php echo base_url();?>Status/delete_status/<?php echo $s->status_id; ?>"><i class="icon-remove-circle"></i> Delete </a>
									                            	</li>
														  </ul>
														</div>	
				                           			</td>			                           			
				                           		</tr>
				                           <?php  endforeach ; ?>
			                           <?php } ?>
			                        </form>
		                        </tbody>
		                    </table>
		                </div>		               
		            </div>
		        </div>
		    </div>
		</div>
	</div>
</div>