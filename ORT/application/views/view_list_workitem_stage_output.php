   <div id="content">
	<div class="inner">
        <div class="row">
            <div class="col-lg-12">
                <h2> <?php if (isset($page_heading))
                			{
                				echo($page_heading);
                			} ?></h2>
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
							                    <a href="<?php echo base_url();?>Work_item_stage_output/create_work_item_stage_output_form" class="btn btn-primary btn-line">New</a>
	                   						</div>
	                   					</td>
		                            </tr>
		                            <tr>
		                                <th>Work Item</th>
		                                <th>Work Item Type</th>
		                                <th>Stage</th>
		                                <th>File Name</th>	
		                                <th>Output Desription</th>	                                
		                                <th>Action</th>
		                            </tr>
		                        </thead>
		                         <tfoot>
		                        	<tr>                                
		                                <th>Work Item</th>
		                                <th>Work Item Type</th>
		                                <th>Stage</th>
		                                <th>File Name</th>	
		                                <th>Output Desription</th>	                                
		                                <th>Action</th>
		                            </tr>
		                        </tfoot>
		                        <tbody>
		                        	<form>

		                        		<?php if (is_array($work_item_stage_outputs)){ ?>
			                        	    <?php foreach ($work_item_stage_outputs as $s): ?>
				                           		<tr class="gradeA">
				                           			<td><?php echo $s->work_item; ?></td>
				                           			<td><?php echo $s->work_item_type; ?></td>					                           		
				                           			<td><?php echo $s->stage; ?></td>
				                           			<td><a href="<?php echo base_url();?>Work_item_stage_output/download_output/<?php echo $s->upload_document_id; ?>" title="click to download"><i class="icon-download-alt"><?php echo $s->file_name; ?></i></a></td>				                           			
				                           			<td><?php echo $s->Comments; ?></td>
				                           		    <td>				                           				
												        <div class="btn-group">
															<button class="btn btn-primary"><i class="icon-gear"></i> action</button>
															<button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
																<ul class="dropdown-menu">
																	<li>
									                    				<a href="<?php echo base_url();?>Work_item_stage_output/view_work_item_stage_output/<?php echo $s->work_item_stage_output_id; ?>"><i class="icon-eye-open"></i> View </a>
							                            			</li>
							                            			<li>
									                            		<a href="<?php echo base_url();?>Work_item_stage_output/edit_work_item_stage_output/<?php echo $s->work_item_stage_output_id; ?>"><i class="icon-edit"></i> Edit </a>
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