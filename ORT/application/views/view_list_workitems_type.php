<div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">


                <h2> Work Item Types </h2>



            </div>
        </div>

        <hr />
		<?php if (isset($success)) { ?>
			<div class="alert alert-success alert-block fade in" id="success-alert">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<h4>Success</h4>
					<p><?php echo $success; ?> </p>
				</div><!--end alert-->
		<?php }; ?>
		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                Manage Work Item Types
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>
		                        	
		                            <tr>
		                            	<td colspan="5">
			                            	<div class="toolbar">
							                    <a href="<?php echo base_url();?>Work_item_type/create_work_item_type_form" class="btn btn-primary btn-line">New</a>							                   
							                    <a href="#" class="btn btn-danger btn-line">Delete</a>                    
	                   						</div>
	                   					</td>
		                            </tr>
		                            <tr>
		                                <th>Description</th>
		                                <th>Actions</th>
		                            </tr>
		                        </thead>
		                        <tfoot>
		                        	<th>Description</th>
		                            <th>Actions</th>
		                        </tfoot>
		                        <tbody>
		                        	<form>

		                        	    <?php 
		                        	    	if (is_array($work_item_types))
			                        	    	{
			                        	    		foreach ($work_item_types as $work_item_type): ?>
						                           		<tr class="gradeA">
						                           			<td>
						                           				<?php echo $work_item_type->description; ?></td>			                           			
						                           			<td>
						                           				<div class="btn-group">
																		<button class="btn btn-primary"><i class="icon-gear"></i> action</button>
																		<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
																			<ul class="dropdown-menu">
																				<li>
												                    				<a href="<?php echo base_url();?>Work_item_author/create_work_items_author_form/<?php echo $work_item_type->work_type_id; ?>"><i class="icon-eye-open"></i> View </a>
										                            			</li>
										                            			<li>
												                            		<a href="<?php echo base_url();?>Work_item/edit_work_items_form/<?php echo $work_item_type->work_type_id; ?>"><i class="icon-edit"></i> Edit </a>
												                           		</li>												                           												                            
												                           		<li>
												                            		<a href="<?php echo base_url();?>Work_item/edit_work_items_form/<?php echo $work_item_type->work_type_id; ?>"><i class="icon-remove-circle"></i> Delete </a>
												                            	</li>
																	  </ul>
																	</div>
						                           			</td>
						                           		</tr>
				                         		  	<?php endforeach ; 
												}
			                         		  ?>
		                        	    	
		                        	    	
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