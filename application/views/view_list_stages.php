   <div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">


                <h2> Stages </h2>



            </div>
        </div>

        <hr />
	
		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                Manage Stages
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>		                        	
		                            <tr>
		                            	<td colspan="5">
			                            	<div class="toolbar">
							                    <a href="<?php echo base_url();?>Stage/create_stages_form" class="btn btn-primary btn-line">New</a>							                   
							                    <a href="#" class="btn btn-danger btn-line">Delete</a>                    
	                   						</div>
	                   					</td>
		                            </tr>
		                            <tr>
		                                <th>Stage ID</th>
		                                <th>Description</th>
		                                <th>Actions</th>		                                
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	<form>
		                        		<?php if (is_array($stages)){ ?>
			                        	    <?php foreach ($stages as $s): ?>
				                           		<tr class="gradeA">
				                           			<td>
				                           				<?php echo $s->stage_id; ?>
				                           				<input type="checkbox" id="checkbox_<?php echo $s->stage_id; ?>" value="<?php echo $s->stage_id; ?>" name="checkbox">
				                           			</td>
				                           			<td><?php echo $s->description; ?></td>	
				                           			<td>
				                           				<div class="btn-group">
															<button class="btn btn-primary"><i class="icon-gear"></i> action</button>
															<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
																<ul class="dropdown-menu">
																	<li>
									                    				<a href="<?php echo base_url();?>Work_item_author/create_work_items_author_form/<?php echo $s->stage_id; ?>"><i class="icon-eye-open"></i> View </a>
							                            			</li>
							                            			<li>
									                            		<a href="<?php echo base_url();?>Work_item/edit_work_items_form/<?php echo $s->stage_id; ?>"><i class="icon-edit"></i> Edit </a>
									                           		</li>												                           												                            
									                           		<li>
									                            		<a href="<?php echo base_url();?>Work_item/edit_work_items_form/<?php echo $s->stage_id; ?>"><i class="icon-remove-circle"></i> Delete </a>
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