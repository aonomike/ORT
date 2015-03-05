   <div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
               <b> Ref No:</b> <?php echo $work_item_stage_output->reference_number ?>	<br/>
               <b> Work Item Name:</b> <?php echo $work_item_stage_output->work_item ?><br/>
               <b> Work Item Type:</b> <?php echo $work_item_stage_output->work_item_type ?>
            </div>
        </div>

        <hr />
		<?php if (isset($success)) { ?>
			<?php if (isset($error_message)) { ?>
				<div class="alert alert-danger alert-block fade in" id="success-alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<h4>Error</h4>
						<p><?php echo $success; ?> </p>
				</div>
				<?php }
				else{ ?>
				<div class="alert alert-success alert-block fade in" id="success-alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<h4>Success</h4>
						<p><?php echo $success; ?> </p>
				</div><!--end alert-->
		<?php }}; ?>

		<div class="row">
		    <div class="col-lg-12">
		        <div class="panel panel-default">
		            <div class="panel-heading">
		                <?php if (isset($page_sub_heading))
                			{
                				echo($page_sub_heading);
                			} ?>
		            </div>
		            <div class="panel-body">
		                <div class="table-responsive">

		                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
		                        <thead>		                        	
		                            <tr>
		                            	<td colspan="5">
			                            	<div class="toolbar">
							                    <a href="<?php echo base_url();?>Document/create_work_item_stage_output_assigment_form_pass_work_item_id/<?php echo $work_item_stage_output->work_item_stage_output_id ?>" class="btn btn-primary btn-line">New</a>
	                   						</div>
	                   					</td>
		                            </tr>
		                            <tr>
		                                <th>Assigned To</th>
		                                <th>Date Assigned</th>	
		                                <th>Date Expected Back</th>	                                
		                                <th>Action</th>
		                            </tr>
		                        </thead>
		                         <tfoot>
		                        	<tr>                                
		                                <th>Received From</th>
		                                <th>File Name</th>	
		                                <th>Output Desription</th>	                                
		                                <th>Action</th>
		                            </tr>
		                        </tfoot>
		                        <tbody>
		                        	<form>

		                        		<?php if (is_array($work_item_stage_output_assignments)){ ?>
			                        	    <?php foreach ($work_item_stage_output_assignments as $s): ?>
				                           		<tr class="gradeA">
				                           			<td><?php echo $s->doc_assigned_to; ?></td>
				                           			<td><?php echo substr($s->date_assigned, 0,10); ?></td>				                           			
				                           			<td><?php echo substr($s->date_expected_back, 0,10) ?></td>
				                           		    <td>				                           				
												        <div class="btn-group">
															<button class="btn btn-primary"><i class="icon-gear"></i> action</button>
															<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
																<ul class="dropdown-menu">
																	<li>
									                    				<a href="<?php echo base_url();?>Work_item_stage_output/view_work_item_stage_output/<?php echo $s->work_item_stage_output_id; ?>"><i class="icon-eye-open"></i> View Details</a>
							                            			</li>
							                            			<li>
									                            		<a href="<?php echo base_url();?>Document/list_work_item_stage_output_assignment_by_work_item_stage_output_id/<?php echo $s->work_item_stage_output_id; ?>"><i class="icon-edit"></i> View Assignments </a>
									                           		</li>												                           												                            
									                           		<li>
									                            		<a href="<?php echo base_url();?>Work_item_stage_output/void_work_item_stage_output/<?php echo $s->work_item_stage_output_id; ?>"><i class="icon-remove-circle"></i> Recycle Bin </a>
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