   <div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">


                <h2> Work Item Stage </h2>



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
		                Manage Work Item Type Stage
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">
		                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>		                        	
		                            <tr>
		                            	<td colspan="5">
			                            	<div class="toolbar">
							                    <a href="<?php echo base_url();?>Work_item_stage/create_work_item_stage_form" class="btn btn-primary btn-line">New</a>							                   
							                    <a href="#" class="btn btn-danger btn-line">Delete</a>                    
	                   						</div>
	                   					</td>
		                            </tr>
		                            <tr>
		                                <th>Work Item</th>
		                                 <th>Submission Deadline</th>
		                                <th>Work Item Type</th>
		                                <th>Stage</th>
		                                <th>Action</th>
		                            </tr>
		                        </thead>
		                        <tfoot>
		                        	 <tr>
		                                <th>Work Item</th>
		                                <th>Submission Deadline</th>
		                                <th>Work Item Type</th>
		                                <th>Stage</th>
		                                <th>Action</th>
		                            </tr>
		                        </tfoot>
		                        <tbody>
		                        	<form>
		                        		<?php if (is_array($work_item_stage)){ ?>
			                        	    <?php foreach ($work_item_stage as $s): ?>
				                           		<tr class="gradeA">
				                           			<td><?php echo $s->title; ?></td>
					                           		<td><?php echo substr($s->submission_deadline,0,10); ?></td>
				                           			<td><?php echo $s->work_item_type; ?></td>
				                           			<td><?php echo $s->stage; ?></td>
				                           			<td>				                           				
												        <div class="btn-group">
															<button class="btn btn-primary"><i class="icon-gear"></i> action</button>
															<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
																<ul class="dropdown-menu">
																	<li>
									                    				<a href="<?php echo base_url();?>Work_item_stage/view_work_item_stage_form/<?php echo $s->work_item_stage_id; ?>"><i class="icon-eye-open"></i> View </a>
							                            			</li>
							                            			<li>
									                            		<a href="<?php echo base_url();?>Work_item_stage/edit_work_item_stage_form/<?php echo $s->work_item_stage_id; ?>"><i class="icon-edit"></i> Edit </a>
									                           		</li>												                           												                            
									                           		<li>
									                            		<a href="<?php echo base_url();?>Work_item_stage/delete_work_item_stage/<?php echo $s->work_item_stage_id; ?>"><i class="icon-remove-circle"></i> Delete </a>
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